<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product, App\Models\Category, App\Models\Combination, App\Models\Attribute, App\Models\ImagesProducts, App\Models\Order, App\Models\Order_Item, App\Models\Visitor, App\Models\User, App\Models\Sold_Product;
use Auth,Str,Route;
use App\Models\Carousel;
//use Config;
//use App\Functions\Paises, App\Functions\Prov as Pr, App\Functions\Municipalities;

//use  Livewire\WithFileUploads;
class Home extends Component
{
    //use WithFileUploads;

    

    public $name;
    public $item;
    public $quantity=1;
    public $combinations;
    public $combinations_list;
    public $option=[];
    public $option_selected = "true";
    public $option_notselected = "false";

    public $images_products;
    public $counter=0;
    public $imagen;
    public $data=false;
    public $computed_option; 
    //precio temporal que se muestra y realiza las operaciones
    public $price_tmp=0;
    //precio añadido de las combinaciones
    public $added_price=0;
    public $typealert='success';

    public $main_slider;
    public $autoslide;
    public $time_interval;
    public $limit_page;
    //buscador global
    public $search_product;
    
    public $route_name;
//error si no hay combinaciones

    public function mount(){        
        //comprobamos ajustes establecidos del slider (MDSlider)
        $this->main_slider = config('ecomsail.main_slider');
        $this->autoslide = config('ecomsail.autoslide');
        $this->time_interval = config('ecomsail.time_interval');
        
        try{
            $this->set_new_visitor();
        }catch(Exception $ex){
            dd($ex->getMessage());
        }
        $this->limit_page = config('ecomsail.items_per_page') ?? 15;
        $this->route_name = Route::currentRouteName();
    }
    //redirección del buscador genérico
    public function go_to_search(){
        if($this->search_product)
            return redirect()->route('store',['category' => 0,'subcategory'=>0,'type' =>$this->search_product]);
    }

    
    //insertamos datos del visitante cada vez que accede al home (de usuario)
    public function set_new_visitor(){
        
        //ip
        $ip_address = (isset($ip_address)) ? $_SERVER['REMOTE_ADDR'] : NULL;        
        //page
        $page = (isset($page)) ? $_SERVER['HTTP_HOST']."".$_SERVER['PHP_SELF'] : NULL;        
        //referer
        $referer = (isset($referer)) ? $_SERVER['HTTP_REFERER']:NULL;
        //browser
        $user_agent = (isset($user_agent)) ? $_SERVER['HTTP_USER_AGENT'] : NULL;
        //port
        $port = (isset($port)) ? $_SERVER['REMOTE_PORT'] : NULL;
        //method
        $method = (isset($method)) ? $_SERVER['REQUEST_METHOD'] : NULL;
        //date now
        $datetime = date("F j, Y, g:i a");
        $visitor = Visitor::create([
            'ip_address' => $ip_address,
            'page' => $page,
            'referer' => $referer,
            'time' => $datetime,
            'user_agent' => $user_agent,
            'port' => $port,
            'method' => $method
        ]);
    }

    public function fastview($id){        
        $list = [];
        $this->item = Product::findOrFail($id);
        $this->price_tmp = $this->item->price;
        //dd($this->item->image);
        $combinations = Combination::where('product_id',$this->item->id)->get();
        if($combinations->count() > 0){

            //revisamos coincidencias del mismo atributo
            foreach($combinations as $k=>$comb){                
                //las combinaciones están preparadas para que solo se pueda crear
                //atributo>valor, es decir no puede traer 2 valores del mismo
                //atributo, pero si puede traer varios atributos>valor en la misma combinación:
                //con distinto atributo padre se puede:
                // Color>blanco,Talla>S...
                //con el mismo atributo padre no se puede
                //Color>blanco,Color>gris,Color>rojo...
                //convertimos en array las listas de cada combinación                
                $attr_list_ids = explode(",",$comb->list_ids);
                    //recorremos el array de listas de cada combinación
                    foreach($attr_list_ids as $key=>$attr_id){

                        $attribute=Attribute::findOrFail($attr_id);
                        if($attribute->type!=0){
                                
                            //if($k==8 && $key==2)
                            if(!isset($list[$attribute->type])){
                                $list[$attribute->type]['name']=$attribute->parentattr->name;
                                //$this->option[$attribute->type];
                            }else{
                                
                                //$this->option[$attribute->type];
                            }
                            $list[$attribute->type][] =[
                                'id' => $attribute->id,
                                'name' => $attribute->name
                            ];
                        }
                    }
            }
            //dd($list);
            $this->combinations_list = $list;
            //dd($this->combinations_list = $list);

        }else{
            $this->combinations_list=[];
        }
        $this->images_products = ImagesProducts::where('product_id',$id)->get();
        //dd($this->combinations_list);
        //dd($this->option);
        //si no es la primera vez que muestra la imagen pasamos true para que
        //ejecute el slider slick con refresh
        $this->imagen=$this->item->path_tag.$this->item->image;
        if($this->counter > 0){
            $this->emit('slick',true);
        }
        else
            $this->emit('slick');
        $this->counter++;

        //activamos las primeras opciones de cada combinación (si existen)
        $this->emit('activeCombinations');

    }
    public function setComb($data){
        dd($this->$data);
    }

    //Establece el suplemento de precio (si hubiere) de cada una de las 
    //características seleccionadas
    public function set_price_combinations(){
        $list_values = [];
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
    //hook updated usado para actualizar los boxes
    //se comprueba el objeto creado para los boxes con un duplicado(computed_option)
    //y se actualiza el precio
    

    public function add_favorite(){

    }

    public function clear_product(){

        $this->quantity = 1;
        $this->combinations_list=[];
        $this->item=null;
        //con counter devolvemos a 0 para reinicializar el nuevo slider
        $this->counter = 0;
        //$this->emit('unslick');
        //$this->emit('galleryslider');
        //$this->fastview(2);
        //$this->emit('slick');
    }

    
    
    public function updated(){
        
        if($this->option != $this->computed_option){
            $this->set_price_combinations();
            $this->price_tmp = $this->item->price * $this->quantity;
            if($this->added_price){
                 $this->added_price = $this->added_price * $this->quantity;   
            }
            $this->price_tmp = $this->added_price + $this->price_tmp;
            $this->dispatchBrowserEvent('contentChanged');
        }

    }
    public function change_quantity($operator){
        if($operator == 'plus' )
            $this->quantity++;
        elseif($operator == 'minus' && $this->quantity > 1)
            $this->quantity--;
        
        $this->price_tmp = $this->item->price * $this->quantity;        
        if($this->added_price){
            $this->set_price_combinations();
            $this->added_price = $this->added_price * $this->quantity;
        }
        $this->price_tmp = $this->price_tmp + $this->added_price;
        //$this->price_tmp = $this->item->price + $this->added_price;
        $this->dispatchBrowserEvent('contentChanged');

    }
    public function add_cart(){
        //validamos datos para crear el carrito o añadir al carrito
        $validated = $this->validate([
            'option' => 'nullable|array',
            'option.*' => 'integer',
            'quantity' => 'required|integer'
        ]);
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

        $orders_items = Order_Item::where('order_id',$order->id)->where('product_id',$this->item->id)->get();
        if($orders_items->count() > 0){
            $diff = [];            
            foreach($orders_items as $key => $oi){
                if($oi->combinations != "null"){                    
            //obtenemos el resultado de cada comparación  entre la 
            //combinación y la lista seleccionada y lo añadimos al 
            //array $diff
                    $diff[]=strcmp($oi->combinations,json_encode($list));
                }
            }
            //recorremos el array $diff, si alguno devuelve 0
            //es que ya existe ese producto con esa combinación
            $test = array_filter($diff,function($v,$k){
                return $v == 0;
            },ARRAY_FILTER_USE_BOTH);
            if(count($test) > 0){
                $this->dispatchBrowserEvent('contentChanged');
                //$this->emit('fastview');
                $this->typealert = 'danger';
                session()->flash('message2','Ya existe ese producto en el carrito');
                return false;
            }
        }
        //si en el array $diff no existe ningún resultado(0), 
        //indicando que no existe esa combinación o simplemente no 
        //existe ese item de ese producto creamos nuevo order_item
        $order_item = Order_Item::create([
            'combinations' => json_encode($list),
            'quantity' => $this->quantity,
            'state_discount' => $this->item->state_discount,
            'end_discount' => $this->item->end_discount,
            'price_unit' => $this->item->price,
            'total' => $this->price_tmp,
            'title' => $this->item->name,
            'path_tag' => $this->item->path_tag,
            'image' => $this->item->image,
            'user_id' => Auth::id(),
            'product_id' => $this->item->id,
            'order_id' => $order->id,
        ]);
        
        $this->dispatchBrowserEvent('contentChanged');
        //$this->emit('fastview');
        $this->typealert = 'success';
        session()->flash('message2','Producto añadido al carrito correctamente');
        
    }

    public function create_or_update_order(){
        $user_id = Auth::id();
        $order;
        $count_order = Order::where('status',0)->where('user_id',$user_id)->count();
        if($count_order == 0){
            $rand = Str::rand(0,999999);
            $order = new Order();
            $order->user_id = $user_id;
            $order->order_num=$rand;            
            $order->save();
        }else{
            $order = Order::where('status',0)->where('user_id',$user_id)->first();
        }
        return $order;
    }

    public function product($id){
        
    }

    public function render()
    {
        $sliders = Carousel::where('status',1)->orderBy('position')->get();
        $this->computed_option = $this->option;

        //destacados
        $products = Product::where('status',1)->orderBy('id','desc')->paginate($this->limit_page);
        $categories = Category::where('status',1)->where('type',0)->get();
//necesario ordenar los vendidos con más cantidad
        $sold_products = Sold_Product::all();
        /*
        $offers =  Product::where('status',1)
                    ->whereHas('infoprice',function($query){
                        $query->where('discount_type',1)
                        ->where('init_discount','<=',date('Y-m-d'))
                        ->where('end_discount','>=',date('Y-m-d'));
                    })->get()->take(20);
        */
        $data = ['products' => $products,'categories' => $categories,'sliders' => $sliders,'sold_products' => $sold_products,
            //'offers' => $offers
        ];

        //el slider falla con el layouts.app por duplicado de la clase content
        return view('livewire.home.home',$data)->extends('layouts.main');
    }
}
