<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order, App\Models\Order_Item;
use Auth;
class Cart extends Component
{
    public $order_id;
    public $user_id;
    public $quantity;
    //id temporal de order_item para la eliminación
    public $oiIdTmp;

    public function mount(){
        $this->user_id = Auth::id();
        $this->order_id = $this->get_order()->id;
        
    }

    public function get_order(){
        $order = Order::where('user_id',$this->user_id)->where('status',0)->first();
        
        if($order->count() == 0){
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

    public function render()
    {
        $orders_items = $this->get_orders_items($this->order_id);
        
        $data = ['orders_items' => $orders_items];
        return view('livewire.cart',$data)->extends('layouts.main');
    }
}
