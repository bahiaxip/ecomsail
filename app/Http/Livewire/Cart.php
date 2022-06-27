<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order, App\Models\Order_Item, App\Models\Address, App\Models\Invoice, App\Models\History_Order_Item, App\Models\Product, App\Models\Sold_Product;
use Auth,Str;
//edit_user
use App\Functions\Paises, App\Functions\Prov as Pr, App\Functions\Municipalities, App\Models\User;

use  Livewire\WithFileUploads;

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
    public $typealert='success';
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
        return Order_Item::where('order_id',$id)->where('user_id',Auth::id())->get();
    }
    public function save_product_id($id){
        $this->oiIdTmp = $id;
    }
    public function clear_oi_id(){
        $this->oiIdTmp='';
    }

    public function delete(){
        $oi = Order_Item::findOrFail($this->oiIdTmp);
        $oi->delete();
        $this->typealert = 'success';
        session()->flash('message','Producto eliminado correctamente');
        $this->emit('message_opacity');
    }
    public function updated(){
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

    public function finish_order(){        
        $this->emit('loading','loading');
        $validated = $this->validate([
            'payment_selected' => 'required',
            'comment' => 'nullable',
            'sum' => 'required|integer'
        ]);
        $address = Address::findOrFail($this->address_selected);
        if(!$address->get_location->vat){
            $this->typealert = 'success';
            session()->flash('message','Su país no dispone de IVA para generar la factura');
            $this->emit('message_opacity');
            return;
        }

        $location_vat = $address->get_location->vat;

        $order = Order::where('user_id',$this->user_id)->where('status','0')->first();
        //generamos un nombre de pedido aleatorio y convertimos a mayúsculas
        $rand= strtoupper(Str::random(20));
        //obtenemos el subtotal(total sin impuestos) para el pedido(Order) y para la factura(Invoice)
        $net = (float)$this->set_vat_to_price($this->total,$location_vat,'minus');
        
        $message;
        $typealert;        
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
        
//creamos factura, necesitamos la dirección Address para
//el iva y los productos que componen la factura y revisar
//los descuentos
        $orders_items = Order_Item::where('order_id',$order->id)->get();
        foreach($orders_items as $order_item){
            History_Order_Item::create([
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
            //creamos el registro de producto vendido
            $counter=0;
            $counter_sold_product = Sold_Product::where('product_id',$order_item->product_id)->count();
            if($counter_sold_product > 0){
                $counter=$counter_sold_product;
            }
            Sold_Product::create([
                'sold_nums' => $counter+1,
                'product_id' => $order_item->product_id
            ]);
        }
        if($orders_items->count() > 0){
            //crear la factura y guardarla en pdf en el directorio
            $total;
            $sum = 0;
            $total_items = 0;
            foreach($orders_items as $oi){
                $total = $oi->total;

                $total_items = $total_items +$oi->quantity;

            }
            
            $invoice = Invoice::create([
                'status' => 1,
                'net' => floatval($net),
                'vat' => $location_vat,
                'total' =>$this->total,
                'quantity' =>$total_items,
                'order_id' => $order->id            
            ]);
            
            $typealert = 'success';
            $message = 'Compra realizada correctamente';
        }else{
            $typealert = 'danger';
            $message = 'No existen productos asociados a este pedido';
        }
        $this->typealert = $typealert;
        session()->flash('message',$message);
        $this->emit('message_opacity');
//falta el clear()
    }

    public function change_quantity($operator,$id){
            if($operator == 'plus' )
                $this->quantity[$id]['quantity']++;
            elseif($operator == 'minus' && $this->quantity[$id]['quantity'] > 1)
                $this->quantity[$id]['quantity']--;
            $this->update_order_item($id,$this->quantity[$id]['quantity']);
            
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
    public function update_order_item($id,$quantity){
        $order_item = Order_Item::findOrFail($id);
        if($order_item){
            $order_item->quantity = $quantity;
            $order_item->total = $order_item->price_unit * $quantity;
            $order_item->save();
        }else{
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
            $this->typealert = 'success';
            session()->flash('message','Usuario actualizado correctamente');
            $this->emit('message_opacity');
            $this->clear2();
            $this->emit('editUser');
        }

    }

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

    public function clear2(){
        $this->clear();
        //resetea todos los mensajes
        $this->resetValidation();
    }
    //fin_edit_user

    public function render()
    {
        
        $this->addresses = Address::where('user_id',$this->user_id)->get();
        //establecemos el input radio de las direcciones como predeterminado
        foreach($this->addresses as $adr){
            if($adr->default == 1){                
                $this->address_selected = $adr->id;
                $this->location_id = $adr->location_id;
            }
        }
        //$this->orders_items = $this->get_orders_items($this->order_id);
        //$data = ['orders_items' => $orders_items,'addresses' => $this->addresses];
        //productos
        $this->order_id = $this->get_order()->id;
        $this->orders_items = $this->get_orders_items($this->order_id);
        
        foreach($this->orders_items as $o_items){
            $this->quantity[$o_items->id]['quantity'] = $o_items->quantity;
            $this->quantity[$o_items->id]['total'] = $o_items->total;
        }
        $this->quantity_tmp=$this->quantity;

        return view('livewire.cart.cart')->extends('layouts.main',['typealert' => $this->typealert]);
    }
}
