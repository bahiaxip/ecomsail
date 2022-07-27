<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product as Prod, App\Models\Combination, App\Models\Attribute, App\Models\Order, App\Models\Order_Item, App\Models\ImagesProducts, App\Models\Favorite;
use Auth;
class Product extends Component
{

    public $product_id;
    public $option = [];
    public $combinations_list;
    public $quantity = 1;
    public $quantity_tmp=1;
    public $product;
    public $price_tmp=0;
    public $added_price;
    public $computed_option;
    public $counter;
    public $user_id;
    public $typealert='success';
    public $favorite;
    public function mount($id){        
        $this->product_id = $id;
        $this->product = Prod::findOrFail($this->product_id);
        $this->price_tmp = $this->product->price;
        $this->setCombinations();
        $this->counter=0;
        $this->images_products = ImagesProducts::where('product_id',$id)->get();
        if(Auth::id()){
            $this->user_id = Auth::id();    
        }
        /*
        else{
            $this->typealert = 'danger';
            session()->flash('message','Se originó un error con la autenticación de usuario, inicie sesión');
        }
        */
        
    }
    public function hydrate(){        
        if($this->counter == 0){
            
            //$this->emit('slick2');
        }
        $this->counter++;
    }

    public function change_quantity($operator){
        $this->quantity_tmp = $this->quantity;
        if($operator == 'plus' )
            $this->quantity++;
        elseif($operator == 'minus' && $this->quantity > 1)
            $this->quantity--;
        
        $this->price_tmp = $this->product->price * $this->quantity;        
        if($this->added_price){
            $this->set_price_combinations();
            $this->added_price = $this->added_price * $this->quantity;
        }
        $this->price_tmp = $this->price_tmp + $this->added_price;
        //$this->price_tmp = $this->item->price + $this->added_price;
        //$this->dispatchBrowserEvent('contentChanged2');
    }

    public function set_quantity(){        
        $this->price_tmp = $this->product->price * $this->quantity;        
        if($this->added_price){
            $this->set_price_combinations();
            $this->added_price = $this->added_price * $this->quantity;
        }
        $this->price_tmp = $this->price_tmp + $this->added_price;
    }

    public function setCombinations(){
        $combinations = Combination::where('product_id',$this->product_id)->get();
        if($combinations->count() > 0){
            //revisamos coincidencias del mismo atributo
            foreach($combinations as $k=>$comb){                
                //las combinaciones están preparadas para que solo se pueda crear
                //atributo>valor, es decir no puede traer 2 valores del mismo
                //atributo, pero si puede traer varios atributos>valor en la misma combinación:
                //Pot tanto...
                    //con distinto atributo padre se puede:
                    // Color>blanco,Talla>S...
                    //con el mismo atributo padre no se puede
                    //Color>blanco,Color>gris,Color>rojo...
                //convertimos en array las listas de cada combinación                
                $attr_list_ids = explode(",",$comb->list_ids);
                    //recorremos el array de listas de cada combinación
                    foreach($attr_list_ids as $key=>$attr_id){
                        $attribute=Attribute::findOrFail($attr_id);
                        //if($k==8 && $key==2)
                        //Establecemos el nombre del atributo
                        //padre, que en la vista será necesario
                        //comprobar el atributo name, ya que es
                        //el único de tipo string
                        
                        if(!isset($list[$attribute->type])){

                            $list[$attribute->type]['name']=$attribute->parentattr->name;

                            //$this->option[$attribute->type];
                        }else{
                            //$this->option[$attribute->type];
                        }
                        $color=NULL;
                        //si existe valor en el campo color añadimos al array
                        if($attribute->color != null){                            
                            $color = $attribute->color;
                        }
                        $list[$attribute->type][] =[
                            'id' => $attribute->id,
                            'name' => $attribute->name,
                            'color' => $color
                        ];
                        
                            
                    }
                    //dd($list);
            }
            //dd($list);
            $this->combinations_list = $list;
            //dd($this->combinations_list = $list);

        }else{
            $this->combinations_list=[];
        }
    }

    public function updated(){
        

    }

    public function add_cart(){
        //validamos datos para crear el carrito o añadir al carrito
        $validated = $this->validate([
            'option' => 'nullable|array',
            'option.*' => 'integer',
            'quantity' => 'required|integer'
        ]);
        //$product = Product::findOrFail($this->product_id);
        //creamos o actualizamos el pedido
        $order = $this->create_or_update_order();
        $list=NULL;
        
        if(count($this->option) > 0){
            foreach($this->option as $key=>$o){
                $list[]=[
                    'attribute' => $key,
                    'value' => $o
                ];
            }
        }        

        $orders_items = Order_Item::where('order_id',$order->id)->where('product_id',$this->product_id)->get();
        if($orders_items->count() > 0){
            $diff = [];            
            foreach($orders_items as $key => $oi){
                if($oi->combinations != "null"){                    
            //obtenemos el resultado de cada comparación  entre la 
            //combinación y la lista seleccionada y lo añadimos al 
            //array $diff
                    $diff[]=strcmp($oi->combinations,json_encode($list));
        //si ya existe uno que no tiene combinaciones, devolvemos 
        //mensaje y detenemos la ejecución
                }else{
                    $this->typealert = 'danger';
                    session()->flash('message2','Ya existe ese producto en el carrito');
                    return false;    
                }
            }
            //recorremos el array $diff, si alguno devuelve 0
            //es que ya existe ese producto con esa combinación
            $test = array_filter($diff,function($v,$k){
                return $v == 0;
            },ARRAY_FILTER_USE_BOTH);
            if(count($test) > 0){
                //$this->dispatchBrowserEvent('contentChanged');
                //$this->emit('fastview');
                $this->typealert = 'danger';
                session()->flash('message2','Ya existe ese producto en el carrito');
                return false;
            }
        }
        $product = Prod::findOrFail($this->product_id);
        if(!$product){
            $this->typealert = 'danger';
            session()->flash('message2','No existe ese producto');
            $this->emit('message_opacity');
            return false;
        }
        //comprobamos si existe suplemento de precio por alguna
        // combinación mediante added_price y la añadimos al 
        //registro para luego poder sumar o restar desde el carrito.
        $quantity = 1;
        $added_price=NULL;
        if($this->quantity && $this->quantity > 1)
            $quantity = $this->quantity; 
        if($this->added_price){
            $added_price = $this->added_price / $quantity;
        }
        //si en el array $diff no existe ningún resultado(0), 
        //indicando que no existe esa combinación o simplemente no 
        //existe ese item de ese producto creamos nuevo order_item
        $order_item = Order_Item::create([
            'combinations' => json_encode($list),
            'quantity' => $this->quantity,
            'state_discount' => $this->product->state_discount,
            'end_discount' => $this->product->end_discount,
            'added_price' => $added_price,
            'price_unit' => $this->product->price,
            'total' => $this->price_tmp,
            'title' => $product->name,
            'path_tag' => $product->path_tag,
            'image' => $product->image,
            'user_id' => Auth::id(),
            'product_id' => $this->product->id,
            'order_id' => $order->id
        ]);
        
        //$this->dispatchBrowserEvent('contentChanged');
        //$this->emit('fastview');
        $this->typealert = 'success';
        session()->flash('message2','Producto añadido al carrito correctamente');
        
    }

    

    public function create_or_update_order(){
        $user_id = Auth::id();
        $order;
        $count_order = Order::where('status',0)->where('user_id',$user_id)->count();
        if($count_order == 0){
            $order = new Order();
            $order->user_id = $user_id;            
            $order->save();
        }else{
            $order = Order::where('status',0)->where('user_id',$user_id)->first();
        }
        return $order;
    }

    //Establece el suplemento de precio (si hubiere) de cada una de las 
    //características seleccionadas
    public function set_price_combinations(){
        $list_values = [];
        //dd($this->option);
        //recorremos los boxes seleccionados
        foreach($this->option as $o){
            //$o es el attribute_id que representa el valor(subatributo)
            //generamos un array de los valores
            $list_values[] = $o;            
        }
        $list_values_string = implode(",",$list_values);
        //comprobamos si existe un suplemento de precio 
        //primero comprobamos si existe una combinación que coincida
        //con todos los valores o si es solo un único valor de un único atributo
        $full_combination = Combination::where('list_ids',$list_values_string)->first();            
        if($full_combination && $full_combination->count() > 0){
            
            if($full_combination->added_price){
                $this->added_price = $full_combination->added_price;
            }
        //si no existe una multiple combinación revisamos si existe suplemento de
        //precio uno por uno y sumamos todos
        }else{
            $sum = 0;
            foreach($list_values as $value){
                $partial_combination = Combination::where('list_ids',$value)->first();
                if($partial_combination){
                    $sum = $sum + $partial_combination->added_price;
                }
            }
            $this->added_price = $sum;
        }
    }

    public function add_favorite(){
        //(al pulsar el botón de favoritos debe existir el $this->user_id)
        $favorite = Favorite::where('product_id',$this->product_id)->where('user_id',$this->user_id)->first();
        if(!$favorite){
            Favorite::create([
                'product_id' => $this->product_id,
                'user_id' => $this->user_id
            ]);
            $message = 'El producto ha sido añadido a la lista de favoritos';
        }else{
            $favorite->delete();
            $message = 'El producto ha sido eliminado de la lista de favoritos';
        }
        $this->typealert = 'success';
        session()->flash('message',$message);
        $this->emit('message_opacity');  
    }
    public function render()
    {
        //dd($this->combinations_list);
        $this->set_price_combinations();
        $this->computed_option = $this->option;
        $favorite = Favorite::where('user_id',$this->user_id)->where('product_id',$this->product_id)->first();
        if($favorite)
            $this->favorite = true;
        else
            $this->favorite = false;
        $data = ['prod' => $this->product,'combinations_list' => $this->combinations_list];
        return view('livewire.products.product',$data)->extends('layouts.main',['typealert'=>$this->typealert]);
    }
        
}
