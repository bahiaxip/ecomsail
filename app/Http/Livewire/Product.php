<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product as Prod, App\Models\Combination, App\Models\Attribute, App\Models\Order, App\Models\Order_Item, App\Models\ImagesProducts, App\Models\Favorite, App\Models\ParentCombinations as ParentComb;
use Auth;
class Product extends Component
{

    public $product_id;
    public $option = [];
    public $option_name = [];
    public $combinations_list;
    public $selected_value;
    public $selected_parentvalue;
    public $selected_comb;
    public $parent_combinations;
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
    //suma de todos los stock para restingir el botón de "Agregar al carrito"
    public $sum_stock;

    
    public function mount($id){        
        $this->product_id = $id;
        $this->product = Prod::findOrFail($this->product_id);
        $this->price_tmp = $this->product->price;
        //establecemos al sum_stock el stock total
        $this->sum_stock = $this->product->stock;
        //con setCombinations generamos la lista de combinaciones y actualizamos 
        //sum_stock si existe alguna combinación
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

    public function testStock2(){

    }
    //comprueba si existe combinación y en caso afirmativo comprueba si existe stock suficiente
    //$bol determina si se debe añadir a quantity uno más, ya que aun no se ha actualizado
    public function testStock($bol){
        if($this->parent_combinations && $this->parent_combinations->count() > 0){
            
            //se comprueba el stock total
            //if(count($this->option) > 1){
            if(count($this->parent_combinations) > count($this->option)){

            }else{

                $quantity = $this->quantity;

                //foreach($this->option as $key => $op){
                    $imp = implode(',',$this->option);
                    
                    $comb = Combination::where('product_id',$this->product_id)->where('list_ids',$imp)->first();

                    //dd($comb);
                    if($bol)
                        $quantity++;
                    if($comb->stock >= $quantity)
                        return true;
                //}
            }
            
        }else{
            if($this->product->stock >= $this->quantity)
                return true;
        }
        return false;
    }

    public function change_quantity($operator){
        //(anulado,antiguo) si existen combinaciones
        /*
        if(!$this->testStock(true) && $operator == 'plus'){
            //dd("no existe stock suficiente");
            return;
        }
        */
        //comprobar si existe stock suficiente de ese producto o de esa combinación 
        //para poder seguir aumentando la cantidad.
        if($operator == 'plus'){
            //si existe combinación...
            if($this->selected_comb){
                if($this->selected_comb->stock <= $this->quantity){
                    return;
                }
            //si no existe combinación se comprueba el stock del producto
            }else if($this->product->stock <= $this->quantity){
                return;
            }
            

        }  

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

    //El método setCombinations establece la lista o listas de combinaciones
    //generando un array por cada atributo padre que exista en todas las 
    //combinaciones. Cada uno de estos arrays contiene:
    //1.- Una clave>valor que especifíca el nombre del atributo padre ('name' => nombre_atr_padre)
    //2.- Un array por cada atributo hijo que pertenezca al mismo atributo padre
    //Nota: Necesario indicar que la primera lista de combinaciones va a //distinguirse del resto, ya que, independientemente de la pulsación en el 
    //resto de combinaciones, solo con que exista una combinación posible se 
    //mostrará como enabled y al pulsarse el resto de combinaciones automátmente,
    //se pulsarán en el primer input enabled si es que el que se encontraba
    //seleccionado no lo es. De esta forma evitamos tener que ir pulsando
    //muchas combinaciones para conseguir que se activen los de la primera lista.

    public function setCombinations($data=null){

        
        if($this->option){
            //dd($this->option);
            $parent_option = array_keys($this->option)[0];
            $value_option = $this->option[$parent_option];                
        }
        if($data){
            //obtenemos el índice del primer option que corresponde
            //al padre de la primera lista de combinaciones que se muestra
            //desde el panel de usuario
            
            //obtenemos el registro del valor(attributo hijo) de $data
            $attribute_param = Attribute::findOrFail($data);
            //dd("data");
            $combinations = Combination::where('product_id',$this->product_id)->get();
            $parent = $attribute_param->type;
            //convertimos en array cada list_ids de cada combinación
            /*
            foreach($combinations as $key => $c){
                $list_ids = explode(",",$c->list_ids);
                if(in_array($data,$list_ids)){
                    //unset($combinations[$key]);
                }
            }
            */

            
        }else{
            $combinations = Combination::where('product_id',$this->product_id)->get();
        }
        
        if($combinations->count() > 0){

            //creamos un sum_stock que suma todos los stock, si no existe ningún
            //stock de ninguna combinación nos permitirá desactivar el botón de agregar al carrito
            $sum_stock = 0;
            //revisamos coincidencias del mismo atributo en cada combinación
            //$list_ids1=[];
            foreach($combinations as $k=>$comb){  
                $sum_stock = $sum_stock + $comb->stock;
                //anulado: solo se puede un atributo valor por cada 
                //combinación, esto invalida el siguiente párrafo 
                //explicativo, sin embargo se mantiene la misma estructura
                //del array.

                    //párrafo explicativo:
                    /*las combinaciones están preparadas para que solo se pueda crear
                    atributo>valor, es decir no puede traer 2 valores del mismo
                    atributo, pero si puede traer varios atributos>valor en la misma combinación:
                    Por tanto...
                        con distinto atributo padre se puede:
                         Color>blanco,Talla>S...
                        con el mismo atributo padre no se puede
                        Color>blanco,Color>gris,Color>rojo...
                    */

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
                    
                    //si no existe un array con ese índice lo creamos y 
                    //añadimos el valor de su atributo padre  a la clave 'name'
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
                    $disabled = false;
                    //si existe parámetro y el padre del atributo 
                    //pasado por parámetro(que pertenece al elemento seleccionado en la primera lista de combinaciones) 
                    //es distinto del obtenido por la combinación 
                    //se comprueban para asignar como disabled
                    if($data){
//revisar si debería ser en lugar del atributo de $data, el atributo de 
//selected_parentvalue generado en el método set_value(), que sería el padre
//del atributo pulsado

//es necesario comprobar si el stock de la combinación es 0 y por tanto
//será disabled, pk de esa forma se asignará el primero que si tenga stock
//y se deberá sumar el added_price, para ello es necesario comprobar si 
//el array option con el valor del mismo atributo padre de la lista creada
//tiene stock 0, entonces pasar al siguiente que tenga stock > 0.
                        if($parent_option != $attribute->type){
                            //$disable=true
                            //si existe ese atributo en la combinación
                            
                            if(in_array($value_option,$attr_list_ids)){
                                //if(!in_array($attribute->id,$list_ids1)){
                                    $list[$attribute->type][] =[
                                        'id' => $attribute->id,
                                        'name' => $attribute->name,
                                        'parent' => $attribute->type,
                                        'color' => $color,
                                        'stock' => $comb->stock,
                                        'disabled' => $disabled,
                                        'selected' => false
                                    ];
                                //}
                                //$list_ids1[] = $attribute->id;
                            }
                        }else{

                            $list[$attribute->type][] =[
                                'id' => $attribute->id,
                                'name' => $attribute->name,
                                'parent' => $attribute->type,
                                'color' => $color,
                                'stock' => $comb->stock,
                                'disabled' => $disabled,
                                'selected' => false
                            ];

                        }
                    }else{

                        $list[$attribute->type][] =[
                            'id' => $attribute->id,
                            'name' => $attribute->name,
                            'parent' => $attribute->type,
                            'color' => $color,
                            'stock' => $comb->stock,
                            'disabled' => $disabled,
                            'selected' => false
                        ];
                    }
                }
            }
            //dd($list);
            foreach($list as $k=>$l){
                $list2= [];
                $list_ids = [];
                //dd($l);
                $list2['name'] = $l['name'];
                if($this->option){
                    //recorremos el array creado y comprobamos los duplicados
                    //solo los de la primera lista de combinaciones. Si ya se 
                    //existe uno no añadimos más, pero lo comprobamos por si
                    //el stock del duplicado es mayor, si es así sustituimos 
                    //por el de más stock, es importante pk si no lo hacemos
                    //la vista tomará en cuenta el primero y si el stock es 0
                    //aparecerá disabled
        //si alguna de las listas no tiene stock en ninguno de sus valores que 
        //coincida con uno de la primera lista combinaciones se pasa a disabled
        //el de la primera lista
                    foreach($l as $m => $c){
                        if($m != 'name'){
                            if($parent_option == $c['parent']){
                        //si el elemento no existe en la lista se crea
                                if(!in_array($c['id'],$list_ids)){  
                                    $list2[]=$c;
                                    $list_ids[] = $c['id'];
                                }else{
                        //si existe se comprueba si tiene mayor stock
                        //y en caso afirmativo se actuliza por el de la lista
                                    if(count($list2) > 0){
                                    
                                        for($i=0;$i<count($list2)-1;$i++){
                                            
                                            if($c['id'] == $list2[$i]['id']){
                                                
                                                if($c['stock'] > $list2[$i]['stock']){
                                                    $list2[$i] = $c;
                                                }
                                            }
                                        }
                                    }
                                    
                                }
                            }else{                                
                                if(!in_array($c['id'],$list_ids)){  
                                    $list2[]=$c;
                                    $list_ids[] = $c['id'];
                                }else{
                        //si existe se comprueba si tiene mayor stock
                        //y en caso afirmativo se actuliza por el de la lista
                                    if(count($list2) > 0){
                                    
                                        for($i=0;$i<count($list2)-1;$i++){
                                            
                                            if($c['id'] == $list2[$i]['id']){
                                                
                                                if($c['stock'] > $list2[$i]['stock']){
                                                    $list2[$i] = $c;
                                                }
                                            }
                                        }
                                    }
                                    
                                }
                                
                            }
                        }
                    }
                    $list[$k] = $list2;    
                }else{
                    //para el primer inicio de carga del producto con combinaciones
                    //pero que aun no se iniciado la pulsación automática de la primera
                    //combinación
                    foreach($l as $m => $c){
                        if($m != 'name'){
                                if(!in_array($c['id'],$list_ids)){  
                                    $list2[]=$c;
                                    $list_ids[] = $c['id'];
                                }else{                        
                                    if(count($list2) > 0){                  
                                        for($i=0;$i<count($list2)-1;$i++){
                                            if($c['id'] == $list2[$i]['id']){
                                                if($c['stock'] > $list2[$i]['stock']){
                                                    $list2[$i] = $c;
                                                }
                                            }
                                        }
                                    }
                                    
                                }
                        }
                    }
                    $list[$k] = $list2;
                }
            }            
            //dd($list);            
            $this->sum_stock = $sum_stock;
            $this->combinations_list = $list;
            $this->parent_combinations = ParentComb::where('product_id',$this->product_id)->get();
        }else{
            $this->combinations_list=[];
        }
    }


    public function updated(){
       
        //dd($this->option);
        if(!$this->quantity){
            //$this->quantity = 1;
         //actualizamos el precio si seleccionamos combinacion
        }
        if($this->quantity != $this->quantity_tmp)
            //$this->set_quantity();

        if($this->option != $this->computed_option){
            
            
            //comprobamos con testStock por si la combinación seleccionada
            //es distinta y no dispone de stock suficiente, en ese caso pasamos
            //cantidad a 1, ya que si no tuviera ninguna no sería seleccionable

 //anulado temporalmente
            /*
            if(!$this->testStock(false)){
                $this->quantity = 1;            
            }
            */

            /*
            $this->set_price_combinations();
            $this->price_tmp = $this->product->price * $this->quantity;
            $total_added_price = 0;
            if($this->added_price){                
                $total_added_price = $this->added_price * $this->quantity;
            }
            $this->price_tmp = $total_added_price + $this->price_tmp;
            */
            //$this->dispatchBrowserEvent('contentChanged');
            
        }
    }
    //establecer combinacíon seleccionada ($this->option)
    //si pasamos data además de establecer la combinación en 
    //la global de componente "selected_comb" tb la devolvemos.
    public function select_combination($data = null){
        $list_values = [];        
        foreach($this->option as $o){
            $list_values[] = $o;            
        }
        $list_values_string = implode(",",$list_values);
        
        $combination = Combination::where('product_id',$this->product_id)->where('list_ids',$list_values_string)->first();
        if($combination){
            $this->selected_comb = $combination;
            if($data)
                return $combination;
        }

        
    }

    //set_value()
    public function set_value($value_id,$data=null){
        if($data){
            $this->option[$data] = $value_id;
            //dd($value_id);
        }
        //dd($value_id);
        $this->selected_value = $value_id;
        //dd($this->selected_value);
        $value = Attribute::findOrFail($value_id);
        $this->selected_parentvalue = $value->type;
        if($this->option){
            $this->setCombinations($value_id);
            $comb_id;
            //si el stock de la combinación es menor al establecido en cantidad
            //antes de seleccionar una combinación distinta actualizamos quantity a 1
            $c = $this->select_combination(true);            
            if($c && $c->stock < $this->quantity){
                    $this->quantity = 1;
            }
            
            //actualizar precio adicional de la combinación
//se podría optimizar el set_price_combinations pasando como parámetro
//el id de la combinación mediante $c->id del "select_combination(true)"

            $this->set_price_combinations();
            //actualizar precio con la cantidad
            $this->price_tmp = $this->product->price * $this->quantity;
            $total_added_price = 0;
            if($this->added_price){                
                $total_added_price = $this->added_price * $this->quantity;
            }
            //dd($this->price_tmp);
            $this->price_tmp = $total_added_price + $this->price_tmp;
        }


        //dd($this->combinations_list);
        $this->emit('setValue',$this->selected_value,$this->selected_parentvalue,$this->option);
        //dd($value->type);
        //$this->emit('setValue',$value_id,$value->type,$this->option);
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
        //comprobamos si existe combinación y si existe creamos el array de combinaciones
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
            //comprobamos si ya existe un producto igual, en caso de contener 
            //combinaciones se comprueba si es la misma combinación
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
        //si no existe un producto con ese id en la db se devuelve mensaje de error
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
        $discount = 0;
        $state_discount = 0;
        $end_discount = NULL;
        if($this->quantity && $this->quantity > 1)
            $quantity = $this->quantity; 
        if($this->added_price){
            //$added_price = $this->added_price / $quantity;
            $added_price = $this->added_price;
        }
        //comprobamos si existe descuento y lo añadimos al order_item
        if($product->infoprice->discount_type
            && date('Y-m-d') >= $product->infoprice->init_discount && date('Y-m-d') <= $product->infoprice->end_discount){
            $state_discount = $product->infoprice->discount_type;
            $discount = $product->infoprice->discount;
            $end_discount = $product->infoprice->end_discount;
        }
        //si en el array $diff no existe ningún resultado(0), 
        //indicando que no existe esa combinación o simplemente no 
        //existe ese item de ese producto creamos nuevo order_item
        $order_item = Order_Item::create([
            'combinations' => json_encode($list),
            'quantity' => $this->quantity,
            'state_discount' => $state_discount,
            'discount' => $discount,
            'end_discount' => $end_discount,
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

    //Establece el suplemento de precio (si hubiere) de la combinación 
    //seleccionada en $this->added_price, los descuentos se calculan en la vista
    //y en la factura
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
        //dd($this->option);
        $combination = Combination::where('product_id',$this->product_id)->where('list_ids',$list_values_string)->first();

        if($combination){
            
            //dd("hay combinación");
            $this->added_price = $combination->added_price;
            //dd($this->option);
        }else{
        //si existen combinaciones y la combinación seleccionada no devuelve 
        //resultado, añadir al elemento del precio un "No disponible" o similar.
            //dd("no hay combinación");
        }
    /*
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
                
                $partial_combination = Combination::where('list_ids',$value)->where('product_id',$this->product_id)->first();                
                if($partial_combination){                    
                    $sum = $sum + $partial_combination->added_price;
                }
            }            
            $this->added_price = $sum;
            //dd($this->added_price);
        }
    */
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
    //revisar por si es necesario
        //$this->set_price_combinations();
        $this->computed_option = $this->option;
        
        //mostramos el título del valor seleccionado a continuación
        //del nombre del atributo padre
        if(count($this->option) > 0){
            foreach($this->option as $key=>$op){
                $attribute = Attribute::findOrFail($op);
                $this->option_name[$key] =$attribute->name;
            }
            //dd($this->option_name);
        }

        
        $favorite = Favorite::where('user_id',$this->user_id)->where('product_id',$this->product_id)->first();
        if($favorite)
            $this->favorite = true;
        else
            $this->favorite = false;
        $data = ['prod' => $this->product,'combinations_list' => $this->combinations_list];
        return view('livewire.products.product',$data)->extends('layouts.main',['typealert'=>$this->typealert]);
    }
        
}
