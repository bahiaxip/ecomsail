<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order, App\Models\Order_Item, App\Models\Product, App\Models\History_Order_Item;
use Auth;
use  Livewire\WithFileUploads;
use Livewire\WithPagination;
class HistoryOrder extends Component
{
    use WithFileUploads;
    use WithPagination;
    //public $orders;
    public $user_id;
    public $typealert= 'success';
    public $limit_page;

    public function mount(){
        $this->user_id = Auth::id();
        $this->limit_page = config('ecomsail.items_per_page') ?? 15;
    }
    
    public function render()
    {
        $orders = Order::where('user_id',$this->user_id)->where('status',1)->paginate($this->limit_page);
        //recorremos cada uno de los pedidos para mostrar el historial de 
        //pedidos, aunque la mejor forma sería crear un registro en una 
        //tabla nueva relacionada con cada order_id y después mostrarla directamente
        /*
        foreach($orders as $order){
            $order_items[$order->id] = Order_Item::where('order_id',$order->id)->get();            
            $o_items;
            //recorremos cada uno de los items de cada pedido
            foreach($order_items[$order->id] as $oi){
                    //obtenemos el producto de cada item para obtener la imagen y el nombre
                    $product = Product::where('id',$oi->product_id)->first();
                    //añadimos la propiedad image y el nombre del producto a
                    //la colección: se puede con "[]" o con "->"
                    $oi->image=$product->path_tag.$product->image;
                    $oi['product_name']=$product->name;
                    //con la propiedad image almacenada almacenamos cada uno de los items
                    $o_items[$order->id][] = $oi;
            }
        }
        */
        $orders_items=null;
        foreach($orders as $order){
            $orders_items[$order->id] = History_Order_Item::where('order_id',$order->id)->get();
        }
        

        //dd($this->orders);
        $data =['orders'=>$orders,'orders_items' => $orders_items];
        return view('livewire.home.history_order',$data)->extends('layouts.main');
    }
}
