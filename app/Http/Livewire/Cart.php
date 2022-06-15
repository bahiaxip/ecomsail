<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order, App\Models\Order_Item, App\Models\Address;
use Auth;
class Cart extends Component
{
    public $order_id;
    public $user_id;
    public $quantity;
    //id temporal de order_item para la eliminación
    public $oiIdTmp;
    public $address_selected;
    public $typealert;
    public function mount(){
        $this->user_id = Auth::id();
        
        
    }

    public function get_order(){
        $order = Order::where('user_id',$this->user_id)->where('status',0)->first();
        
        if(!$order || $order->count() == 0){
            $order = new Order();
            $order->user_id = Auth::id();
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

    public function finish_order(){
        $order = Order::where('user_id',$this->user_id)->where('status','0')->first();
        
        $order->update(['status'=>1]);
        $this->typealert = 'success';
        session()->flash('message','Compra realizada correctamente');        
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
        $addresses = Address::where('user_id',$this->user_id)->get();
        //establecemos el input radio de las direcciones como predeterminado
        foreach($addresses as $adr){
            if($adr->default == 1){                
                $this->address_selected = $adr->id;
            }
        }
        $data = ['orders_items' => $orders_items,'addresses' => $addresses];
        return view('livewire.cart.cart',$data)->extends('layouts.main');
    }
}
