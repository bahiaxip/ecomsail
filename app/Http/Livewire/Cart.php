<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order, App\Models\Order_Item, App\Models\Address, App\Models\Invoice, App\Models\History_Order_Item, App\Models\Product, App\Models\Sold_Product, App\Models\Attribute, App\Models\Combination, App\Models\Notification;
use Auth,Str,PDF,Route;
//edit_user
use App\Functions\Paises, App\Functions\Prov as Pr, App\Functions\Municipalities, App\Models\User;
use App\Mail\Factura;

use  Livewire\WithFileUploads;
use Illuminate\Support\Facades\Mail;
class Cart extends Component
{
    use WithFileUploads;

    public $order_id;
    public $user_id;
    public $quantity=[];
    public $quantity_tmp;
    //id temporal de order_item para la eliminación
    public $oiIdTmp;
    //dirección seleccionada
    public $address_selected;
    //tipo de pago seleccionado,tarjeta por defecto: 1
    public $payment_selected=1;
    public $location_id;
    public $comment;
    public $typealert;
    //lista de direcciones anotadas
    public $addresses;

    public $sum;
    public $total;

    //edit_user
    //redeclarado y pasado a $user_id2   
    public $user_id2;
    public $nick;
    
    public $surname;
    public $email;
    public $profile_image;
    public $thumb;
    //iteration es necesario resetear el caché del input file
    public $iteration;
    public $phone;
    public $country;
    public $province;
    public $city;
    protected $paisesObj;
    public $provinces;
    public $countries;
    //provincia seleccionada
    public $prov_id_selected;
    //listado de municipios
    public $municipies_list;
    protected $prov;
    protected $municip;
    //fin edit_user

    public $orders_items;
    public $pdf_tmp;
    //buscador global
    public $search_product;
    //id del elemento a eliminar
    public $id_tmp;

    public $route_name;

//falta establecer la combinación de cada producto    
    public function mount(){        
        $this->user_id = Auth::id();
        //Class Países solo utilizada para obtener los paises (array all)
        $this->paisesObj = new Paises();
        $this->countries = $this->paisesObj->all_list;
        $this->prov = new Pr();
        $this->provinces_list = $this->prov->prov;
        $this->municip = new Municipalities();
        $this->municipies_list = $this->municip->cities;
        $this->route_name = Route::currentRouteName();
    }
    //método que se ejecuta después de renderizar (exceptuando la primera vez que carga la 
    //página, en ese caso se puede usar mount()
    public function dehydrate()
    {
        if(session('message.title'))
            $this->dispatchBrowserEvent('eventModal',['data' => ['status' => $this->typealert]]);
    }

    //redirección del buscador genérico
    public function go_to_search(){
        if($this->search_product)
            return redirect()->route('store',['category' => 0,'subcategory'=>0,'type' =>$this->search_product]);
    }
    /*
    public function set_payment($type){
        $type;
        switch($type){
            case 'target':
                $type = 1;
                break;
            case 'transfer':
                $type = 2;
                break;
            case 'paypal':
                $type = 3;
                break;
        }
        $this->payment_selected = $type;
    }
    */

    public function get_order(){
        $order = Order::where('user_id',$this->user_id)->where('status',0)->first();
        if(!$order || $order->count() == 0){
            $order = new Order();
            $order->user_id = $this->user_id;            
            $order->order_state = 1;
            $order->save();
        }
        /*else{
            $order = Order::where('user_id',$this->user_id)->where('status',1)->first();
        }
        */
        return $order;
    }

    public function get_orders_items($id){
//comprobar si el pedido temporal aun tiene stock de todos sus items
//no sería necesaria la búsqueda del índice "user_id"
        return Order_Item::where('order_id',$id)->where('user_id',Auth::id())->get();
    }
    //save_product_id() y clear_oi_id() no necesarios con el nuevo modal
    //(todo desde JS)
    /*
    public function save_product_id($id){
        //almacenamos el id
        
        $this->typealert = 'success';
        $this->oiIdTmp = $id;
        $this->id_tmp = true;
        $data = ['status' => 'success','confirm' => true];
        $this->emit('modal',$data);
    }
    
    public function clear_oi_id(){
        $this->oiIdTmp='';
    }
    */
    //establecer session temporal
    public function set_session($typealert,$title,$message){
        $this->typealert=$typealert;
        $data = [
            'message' => $message,
            'title' => $title,
            'status' => $typealert
        ];
        session()->flash('message',$data);
    }
    public function delete($id=null){
        $oi = Order_Item::find($id);
        if(!$oi){
            $this->set_session('danger','Error','Se originó un error y no se pudo eliminar el producto');
            return false;
        }
        $oi->delete();
        $this->set_session('success','Eliminado','Producto eliminado correctamente');
        $this->typealert = 'success';
    }
    public function updated(){
        //dd($this->id_tmp);
        if($this->quantity_tmp != $this->quantity){
            $this->set_quantity();
        }

        
    }
    public function set_vat_to_price($total,$vat,$type){
        $result;
        $data = 100/(100+intval($vat));
        if($type == 'minus'){
            $result = $total * $data;
        }
        return number_format($result,2,'.','');
    }
    //enviar factura al realizar el pago del pedido.
    //destino:  admin y usuario loqueado
    public function send_email($products_invoice,$order_name){
        //email de destino seleccionado
        $user_name = Auth::user()->name;
        $admin_name="";
        if(config('ecomsail.admin_name')){
            $admin_name = config('ecomsail.admin_name');
        }
        $to = [];
        //generamos el archivo en PDF
        $this->savePDF($products_invoice,$order_name);
        //si el switch de ajustes está activado enviamos email al admin
        if(config('ecomsail.send_email') == 'on'){
            //obtenemos el correo electrónico del administrador
            $admin_email = config('ecomsail.email_site');
            $title_site = config('ecomsail.title_site');
            if($admin_email){
                //$to[] = ['email' => $admin_email,'name' => 'admin'];
                Mail::to($admin_email, $title_site ?? '')
                ->send(new Factura('','admin_email',$this->pdf_tmp,$order_name,$admin_name));
            }            
            //falta condicional por si falla el servidor de correo
            
        }
        //si el switch de ajustes está activado enviamos la notificación al admin
        if(config('ecomsail.send_not') == 'on'){
            //creamos la notificación
            
        }
        //podemos añadir más destinatarios añadiendo a $to[].
        $customer_email = Auth::user()->email;
            if($customer_email){
                $to[] = ['email' => $customer_email,'name' => 'customer'];
            }
        

        //si no se obtiene ningún correo devolvemos false para enviar 
        //mensaje error
        if(count($to) == 0){
            return false;
        }

        //obtenemos el correo electrónico del cliente
        //array con nombre
            /*
            $to=[
                ['email' =>'mangergormiti@gmail.com','name'=> 'admin'],
                ['email'=>'mundaxip@gmail.com','name' => 'customer']
            ];
            */
        //array abreviado
            //$to = ['mangergormiti@gmail.com','mundaxip@gmail.com'];
        
        //Envío de factura por Mail
        Mail::to($to)
                //copia a otros destinatarios
                //->cc(['mangergormiti@gmail.com'])
                //copia oculta a otros destinatarios
                //->bcc(['mangergormiti@gmail.com'])
                ->send(new Factura($products_invoice,"invoice",$this->pdf_tmp,$order_name,$user_name));
        if(file_exists(public_path($this->pdf_tmp))){
            unlink(public_path($this->pdf_tmp));    
        }
        return true;
    }
    //guardar el archivo PDF en el server para después poder enviar por correo 
    //como archivo adjunto
    public function savePDF($orders_items,$order_name){
        $path_date=date('Y-m-d');
        $path_date2 = date('Y-m-d H:i:s');
        $user_id = Auth::id();
        $user = Auth::user()->name;
        //$attributes=$this->set_type_query(true);
        
        $view="livewire.products.export";
        //generamos el nombre del archivo pdf
        $pdf_name = $order_name.'_'.$path_date.'pdf';
        //almacenamos el pdf_tmp para después eliminarlo
        $this->pdf_tmp = $pdf_name;
        $pdf= PDF::loadView($view,['orders_items'=>$orders_items,'order_name' => $order_name,'date' => $path_date2]);
        $pdf->save($pdf_name);
        
    }
    public function finish_order(){
        $this->emit('loading','loading');
        
        $validated = $this->validate([
            'payment_selected' => 'required',
            'comment' => 'nullable',
            'sum' => 'required|integer'
        ]);
        $error = NULL;
    //Para crear la factura, necesitamos la dirección Address para
    //obtener el IVA y los productos que componen la factura, 
    //falta revisar los descuentos
        $address = Address::findOrFail($this->address_selected);
        if(!$address->get_location->vat){
            $this->set_session('danger','Error','Su país no dispone de IVA para generar la factura');            
            return;
        }
        //obtenemos el iva del país
        $location_vat = $address->get_location->vat;

        $order = Order::where('user_id',$this->user_id)->where('status','0')->first();
        //generamos un nombre de pedido aleatorio y convertimos a mayúsculas
        $rand= strtoupper(Str::random(20));
//REvisar el descuento aquí
        //obtenemos el subtotal(total sin impuestos) para el pedido(Order) y para la factura(Invoice)
        $net = (float)$this->set_vat_to_price($this->total,$location_vat,'minus');
        
        $message;
        $typealert;
        //actualizamos pedido
        $order->update([
            'status'=>1,
            'order_num' => $rand,
            'location'=> $address->get_location->id,
            'selected_address' => $this->address_selected,
            'subtotal' => $net,
            'total' => $this->total,
            'payment_method' => $validated['payment_selected'],
            'order_comment' => $validated['comment'],
            'quantity' => $validated['sum']
        ]);
//se podría obtener mediante get_orders_items()
        $orders_items = Order_Item::where('order_id',$order->id)->where('checked_stock',1)->get();
        $totals = $this->get_total_items($orders_items);
        if(!$totals)
            $error = [
                'status' => 'error',
                'typealert' => 'danger',
                'message' => 'Error: Productos del pedido',
                'function' => 'get_total_items()'
            ];
//quizás debería realizarse al final en envío de E-Mail
        //enviamos el E-Mail
        if(!$error){
            $send_email = $this->send_email($orders_items,$order->order_num);

            if(!$send_email){
                $error = [
                    'status' => 'error',
                    'typealert' => 'danger',
                    'message' => 'Error: Envío de E-Mail',
                    'function' => 'send_email()'
                ];
            }
        }

        
        $totals['location_vat'] = $location_vat;
        $totals['net'] = $net;
        //creamos el registro de la factura
        if(!$error){            
            $invoice = $this->create_invoice($totals,$order->id);
            if(!$invoice)
                $error = [
                    'status' => 'error',
                    'typealert' => 'danger',
                    'message' => 'Error: Creación factura',
                    'function' => 'create_invoice()'
                ];
        }
    //creamos los registros de: historial, vendidos
    //actualizamos registros de: producto, combinación (si existe)
        if(!$error){
            $new_tables = $this->create_and_update_tables($orders_items);
            if(!$new_tables)
                $error = [
                    'status' => 'error',
                    'typealert' => 'danger',
                    'message' => 'Error: actualizando stock',
                    'function' => 'create_and_update_tables()'
                ];
        }
        //enviamos mensaje        
        if($error){            
            $typealert = $error['typealert'];
            $title = 'Error';
            $message = $error['message'].' (Function: '.$error['function'].')';
        }else{
            $typealert = 'success';
            $title = 'Compra realizada';
            $message = 'La compra se ha completado correctamente';    
        }
    //notificaciones
        $notification = Notification::create([
            'status' => 1,
            'title' => 'Compra realizada',
            'description' => 'Pedido ... completado',
            'type' => 'purchase',
            'user_id' => $this->user_id
        ]);
        $this->set_session($typealert,$title,$message);
    }

    //creamos los registros de: historial, vendidos
    //actualizamos registros de: producto, combinación (si existe)
    //notificación de stock mínimo si está activado
//devolver array con typealert y message en lugar de solamente false
    public function create_and_update_tables($orders_items){
        //comprobación de al menos un producto en el pedido
        if($orders_items && $orders_items->count() > 0){
            //creamos el historial del pedido
            //
            //
            foreach($orders_items as $order_item){
            //reducimos el stock general del producto y la combinación(si existe)            
                $reduce = $this->reduce_stock($order_item);
                //dd($reduce);
                if(!$reduce)
                    return false;
    //falta:
    //comprobación de configuración para enviar 
    //notificación y email al admin
    //enviar email de confirmación al cliente
    //enviar email con factura al cliente

            //creamos el historial de cada item                
                $history = $this->set_history_order($order_item);
                if(!$history)
                    return false;
            //creamos el registro de producto vendido
                $sold_product = $this->set_sold_product($order_item->product_id,$order_item->quantity);
                if(!$sold_product)
                    return false;
            }
            return true;
        }else{
            return false;
        }
    }
    //reduce el stock global y el de la combinación(si existe) del producto.
    public function reduce_stock($order_item){
        if($order_item->combinations != "null"){
        //decodificamos en un array de objetos
            $decoded_combinations = json_decode($order_item->combinations);
            
            $list_comb=[];
            //creamos un array recorriendo el array de objetos ($comb)
            foreach($decoded_combinations as $comb){
                $list_comb[] = $comb->value;
            }
            
            //convertimos en string
            $list_ids = implode(',',$list_comb);

            //obtenemos la combinación mediante el string y la columna list_ids
            $match_comb = Combination::where('list_ids',$list_ids)->first();
            
            if(!$match_comb)
                return false;                    
            $comb_stock = $match_comb->stock;
            //reducimos el stock de la combinación y actualizamos combinación
            if($comb_stock >= $order_item->quantity && $comb_stock > 0){
                $updated_stock = $comb_stock - $order_item->quantity;
                $match_comb->update([
                    'stock' => $updated_stock
                ]);
            }else{                        
                return false;
            }
        }
        //reducimos el stock global del producto
        $product = Product::findOrFail($order_item->product_id);
        $global_stock = $product->stock;
        if($global_stock >= $order_item->quantity && $global_stock > 0){
            $updated_global_stock = $global_stock - $order_item->quantity;
            $product->update([
                'stock' => $updated_global_stock
            ]);
            return true;
        }else{
            return false;
        }

    }
    //crear historial del pedido
    public function set_history_order($order_item){
        $history = History_Order_Item::create([
            'combinations' => $order_item->combinations,
            'quantity' => $order_item->quantity,
            'state_discount' => $order_item->state_discount,
            'end_discount' => $order_item->end_discount,
            'price_unit' => $order_item->price_unit,
            'total' => $order_item->total,
            'title' => $order_item->title,
            'path_tag' => $order_item->path_tag,
            'image' => $order_item->image,
            'user_id' => $order_item->user_id,
            'product_id' => $order_item->product_id,
            'order_id' => $order_item->order_id,
            'order_item_id' => $order_item->id
        ]);
        if($history)
            return true;
        else
            return false;
    }
    //crear producto vendido
    public function set_sold_product($order_item_product_id,$quantity){
        $counter=0;
        $sold_product = Sold_Product::where('product_id',$order_item_product_id)->first();
        if($sold_product && $sold_product->count() > 0){
            $sold_nums = $sold_product->sold_nums;
            $sum = $sold_nums + $quantity;
            $sold_product->update([
                'sold_nums' => $sum
            ]);
        }else{
            $sold_product = Sold_Product::create([
                'sold_nums' => $counter+$quantity,
                'product_id' => $order_item_product_id
            ]);    
        }
        
        if($sold_product)
            return true;
        else
            return false;
    }
    //obtener la cantidad total de productos y el precio total 
    //del pedido sumando el total de todos los items
    public function get_total_items($orders_items){
        $total=0;
        $sum = 0;
        $total_items = 0;
        //recorremos todos los items asociados al pedido
        foreach($orders_items as $oi){
            if(!$oi || !$oi->total){
                return false;
            }
            $total = $total + $oi->total;
            $total_items = $total_items +$oi->quantity;
        }

        return ['total' => $total,'total_items' => $total_items];
    }
//crear la factura y guardarla en pdf en el directorio
    public function create_invoice($totals,$order_id){
        //$invoice=NULL;
        if(!isset($totals['net']) || !isset($totals['location_vat']))
            return false;
        $invoice = Invoice::create([
            'status' => 1,
            'net' => floatval($totals['net']),
            'vat' => $totals['location_vat'],
            'total' =>$this->total,
            'quantity' =>$totals['total_items'],
            'order_id' => $order_id
        ]);
        
        return $invoice;
    }
    

    public function change_quantity($operator,$id){
            //dd($this->quantity);
            if($operator == 'plus' ){
                $order_item = Order_Item::find($id);
                if(!$order_item){
                    $this->set_session('danger','Error','Se originó un error y no se pudo modificar la cantidad');
                    return;
                }

                
                //si el stock global del producto es mayor que la cantidad actual,
                //indica que podemos aumentar por lo menos 1                
                if($order_item->product->stock > $this->quantity[$id]['quantity']){
                //comprobamos si el order item tiene combinaciones(combinations != 'null')
                // y comprobamos el stock de esa combinación 
                    if($order_item->combinations != 'null'){
                        $list_combinations = json_decode($order_item->combinations);
                        //dd($list_combinations);
                        $list_ids = [];
                        if(count($list_combinations) > 0){
                            foreach($list_combinations as $lc){
                                $list_ids[] = $lc->value;
                            }
                            //obtenemos combinación con el list_ids del order_item
                            //para saber si dispone de stock suficiente
                            $combination = Combination::where('list_ids',implode($list_ids))->where('product_id',$order_item->product_id)->first();
                            if($combination->stock > $this->quantity[$id]['quantity']){
                                $this->quantity[$id]['quantity']++;
                            }
                            else{
                                $this->set_session('info','Stock','No existe suficiente stock');
                                return;
                            }
                        }
                    }else{
                        $this->quantity[$id]['quantity']++;
                    }
                }else{
                    $this->set_session('info','Stock','No existe suficiente stock');
                    return;
                }
            }
            elseif($operator == 'minus' && $this->quantity[$id]['quantity'] > 1)
                $this->quantity[$id]['quantity']--;
            else{
                $this->emit('loading','loading');
                return;
            }
            
            $this->update_order_item($id,$this->quantity[$id]['quantity']);
            $this->emit('loading','loading');
//faltan la comprobacion de combinaciones y su added_price
            //en el caso de combinaciones establecidas en el producto
            /*
            if($this->added_price){
                $this->set_price_combinations();
                $this->added_price = $this->added_price * $this->quantity;
            }
            */
            //$this->price_tmp = $this->price_tmp + $this->added_price;
            //$this->price_tmp = $this->item->price + $this->added_price;
            //$this->dispatchBrowserEvent('contentChanged2');    
        
            
        
    }
    //actualización de order_item (quantity, total)
    public function update_order_item($id,$quantity){
        $order_item = Order_Item::findOrFail($id);
        //dd($order_item->id);
        if($order_item){
            $added_price=0;
            //comprobar added_price para añadirle el suplemento 
            if($order_item->added_price){
                $added_price = $order_item->added_price;
            }
            //comprobación de combinaciones
            /*
            if($order_item->combinations != "null"){
                $list_combinations = $order_item->combinations;
                dd(json_decode($order_item->combinations));
            }else{
                dd("NO existen combinaciones");
            }
            */
            $order_item->quantity = $quantity;
            $order_item->total = ($order_item->price_unit * $quantity) + ($added_price * $quantity);
            $order_item->save();
        }else{
            dd("error");
            //mensaje de error de producto
        }
    }

    public function set_quantity(){
//faltan la comprobacion de combinaciones y su added_price        
        foreach($this->quantity as $key=>$q){
            if($this->quantity_tmp[$key]['quantity'] != $this->quantity[$key]['quantity']){
                //actualizamos el order_item
                $this->update_order_item($key,$this->quantity[$key]['quantity']);
            }
        }
    }

//edit_user
    //método para la vista edit_user
    public function edit_user(){
        $user = User::findOrFail(Auth::id());
        if($user->id){
            $this->user_id2 = $user->id;
            $this->nick = $user->nick;
            $this->name=$user->name;
            $this->email=$user->email;
            
            $this->surname=$user->lastname;
            //$this->image=$user->image;
            $this->thumb = $user->thumb;
            $this->phone=$user->phone;
            $this->country=$user->country;
            $this->province=$user->province;
            $this->city = $user->city;
        }
    }
    //método para la vista edit_user
    public function update(){
        //ocultamos el loading duplicado que se ha iniciado
        $this->emit('loading','loading_user');
        //dd($this->profile_image);
        if($this->user_id2){
            $validated = $this->validate([
                'nick' => 'required',
                'name' => 'required',
                'surname' => 'required',
                'phone' => 'nullable',
                'country' => 'nullable',
                'province' => 'nullable',
                'city' => 'nullable',
                'profile_image' =>'nullable|image'
            ]);
            
            if($this->user_id2){
                $user = User::where('id',$this->user_id2)->first();
                $user->update([
                    'nick' => $validated['nick'],
                    'name' => $validated['name'],                
                    'lastname' => $validated['surname'],
                    'phone' => $validated['phone'],
                    'country' => $validated['country'],
                    'province' => $validated['province'],
                    'city' => $validated['city'],
                ]);
                
                if($validated['profile_image'] !== null){

//comprobar si existe imagen y eliminar la anterior            
                    $image_name = $this->profile_image->getClientOriginalName();

                    $ext = $this->profile_image->getClientOriginalExtension();
                    $path_date= date('Y-m-d');
                    $image = $this->profile_image->store('public/files/'.$path_date,'');
                    $path_tag = 'public/files/'.$path_date.'/';
                    //eliminamos el directorio public
                    $imagelesspublic = substr($image,7);
                    $thumb = $image;
                    $user->update([
                        'image' => $imagelesspublic,
                        'thumb' => $imagelesspublic,
                        'path_tag' => $path_tag,
                        'file_name' => $image_name,
                    ]);
                }
            }
            //$this->set_session('success','Actualizado','Usuario actualizado correctamente');
            $this->typealert = 'success';
            session()->flash('message','Usuario actualizado correctamente');
            $this->emit('modal',['status'=> 'success']);
            $this->clear2();
            $this->emit('editUser');
        }

    }
    //método para la vista edit_user
    //limpiar datos de formulario
    public function clear(){
        
        $this->user_id2='';
        $this->nick='';
        $this->name='';
        $this->surname='';
        $this->profile_image=null;
        //iteration es necesario resetear el caché del input file
        $this->iteration=rand();
    }
    //método para la vista edit_user
    public function clear2(){
        $this->clear();
        //resetea todos los mensajes
        $this->resetValidation();
    }
    //fin_edit_user

    //creamos el array quantity con 2 propiedades: quantity y total estableciendo
    //el id del order_item como índice 
    public function set_list_quantity_and_total_by_id(){
        foreach($this->orders_items as $o_items){
            //if($o_items->checked_stock == 1){
                $this->quantity[$o_items->id]['quantity'] = $o_items->quantity;
                $this->quantity[$o_items->id]['total'] = $o_items->total;    
            //}
            
        }
    }
    //comprobamos si el stock del producto o la combinación del producto 
    //dispone del stock suficiente, si no es así, actualizamos el campo
    //checked_stock a 0, de esa forma se mostrará como desactivado y no 
    //serán sumados en la cantidad de productos ni en el precio total.
    //Si se pulsa "finalizar compra" los productos desactivados serán excluidos del pedido.
    public function test_current_stock($order_items){
        foreach($this->orders_items as $oi){
            if($oi->combinations != 'null'){
                //decodificamos
                $combs = json_decode($oi->combinations);
                $list = [];
                foreach($combs as $c){
                    $list[]=$c->value;
                }
                $list_ids=implode($list);
                $combination = Combination::where('product_id',$oi->product_id)->where('list_ids',$list_ids)->first();
                if($combination->stock < $oi->quantity){
                    $oi->update(['checked_stock' => 0]);
                }
            }else{
                if($oi->product->stock < $oi->quantity){
                    $oi->update(['checked_stock' => 0]);       
                }
            }
        }
    }
    public function render()
    {
        
        $this->addresses = Address::where('user_id',$this->user_id)->get();
        //establecemos el input radio de las direcciones como predeterminado
        if(!$this->address_selected){
            foreach($this->addresses as $adr){
                if($adr->default == 1){                
                    $this->address_selected = $adr->id;
                    $this->location_id = $adr->location_id;
                }
            }    
        }
        
        //$this->orders_items = $this->get_orders_items($this->order_id);
        //$data = ['orders_items' => $orders_items,'addresses' => $this->addresses];
        //productos
        $this->order_id = $this->get_order()->id;
        $this->orders_items = $this->get_orders_items($this->order_id);
        //comprobamos si cada uno de los productos dispone del stock suficiente con
        //los productos del carrito, si alguno no dispone se desactiva. 
        //(Al ser un pedido temporal es posible que se haya agotado el stock) 
        $this->test_current_stock($this->orders_items);
        //dd($oi->checked_stock);
        //creamos el array quantity con las propiedades quantity y total        
        $this->set_list_quantity_and_total_by_id();
        
        $this->quantity_tmp=$this->quantity;
        //dd($this->payment_selected);
        //dd($this->address_selected);


        //return view('livewire.cart.cart')->extends('layouts.main',['typealert' => $this->typealert]);
        return view('livewire.cart.cart')->extends('layouts.main');
    }
}
