<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order, App\Models\Order_Item, App\Models\Address, App\Models\Invoice;
use Auth,Str;
class Cart extends Component
{
    public $order_id;
    public $user_id;
    public $quantity;
    //id temporal de order_item para la eliminación
    public $oiIdTmp;
    //dirección seleccionada
    public $address_selected;
    //tipo de pago seleccionado
    public $payment_selected;
    public $location_id;
    public $comment;
    public $typealert;
    //lista de direcciones anotadas
    public $addresses;

    public $sum;
    public $total;

    public function mount(){
        $this->user_id = Auth::id();
        
        
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
    }
    public function updated(){
        
    }
    public function set_vat_to_price($total,$vat,$type){
        $result;
        $data = 100/(100+intval($vat));
        if($type == 'minus'){
            $result = $total * $data;
        }
        return number_format($result,2);
    }

    public function finish_order(){
        
        $validated = $this->validate([
            'payment_selected' => 'required',
            'comment' => 'nullable',
            'sum' => 'required|integer'
        ]);
        $address = Address::findOrFail($this->address_selected);
        if(!$address->get_location->vat){
            $this->typealert = 'success';
            session()->flash('message','Su país no dispone de IVA para generar la factura');
            return;
        }

        $location_vat = $address->get_location->vat;

        $order = Order::where('user_id',$this->user_id)->where('status','0')->first();
        //generamos un nombre de pedido aleatorio y convertimos a mayúsculas
        $rand= strtoupper(Str::random(20));
        $message;
        $typealert;
        $order->update([
            'status'=>1,
            'order_num' => $rand,
            'location'=> $address->get_location->id,
            'selected_address' => $this->address_selected,
            'total' => $this->total,
            'payment_method' => $validated['payment_selected'],
            'order_comment' => $validated['comment'],
            'quantity' => $validated['sum']
        ]);
        $net = $this->set_vat_to_price($this->total,$location_vat,'minus');
//creamos factura, necesitamos la dirección Address para
//el iva y los productos que componen la factura y revisar
//los descuentos
        $orders_items = Order_Item::where('order_id',$order->id)->get();
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
    }

    public function change_quantity($operator){
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

    public function render()
    {
        $this->order_id = $this->get_order()->id;
        $orders_items = $this->get_orders_items($this->order_id);
        $this->addresses = Address::where('user_id',$this->user_id)->get();
        //establecemos el input radio de las direcciones como predeterminado
        foreach($this->addresses as $adr){
            if($adr->default == 1){                
                $this->address_selected = $adr->id;
                $this->location_id = $adr->location_id;
            }
        }
        $data = ['orders_items' => $orders_items,'addresses' => $this->addresses];
        return view('livewire.cart.cart',$data)->extends('layouts.main',['typealert' => $this->typealert]);
    }
}
