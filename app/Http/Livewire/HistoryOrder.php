<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order, App\Models\Order_Item, App\Models\Product, App\Models\History_Order_Item, App\Models\Feedback_Product;
use Auth, Route;
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
    //buscador global
    public $search_product;
    public $route_name;

    public $feed;
    public $description;

    public $product_id_tmp;
    public $order_id_tmp;
    public $order_item_id_tmp;
    public function mount(){
        $this->user_id = Auth::id();
        $this->limit_page = config('ecomsail.items_per_page') ?? 15;
        $this->route_name = Route::currentRouteName();
    }

    //redirección del buscador genérico
    public function go_to_search(){
        if($this->search_product)
            return redirect()->route('store',['category' => 0,'subcategory'=>0,'type' =>$this->search_product]);
    }

    public function set_feedback($data){
        $this->feed = $data;
        
    }

    public function submit($data){        
        $this->feed = $data['feed'];        
        $validated = $this->validate([
            'feed' => 'required',
            'description' => 'required'
        ]);
        //dd($this->order_item_id_tmp);
        Feedback_Product::create([
            'status' => 1,            
            'feedback' => $validated['feed'],
            'description' => $validated['description'],
            'order_id' => $this->order_id_tmp,
            'order_item_id' => $this->order_item_id_tmp,
            'product_id' =>$this->product_id_tmp,
            'user_id'=> $this->user_id
        ]);
        $this->emit('addFeedback');
        $this->product_id_tmp = null;
        $this->order_id_tmp = null;
        $this->order_item_id_tmp = null;
        $this->description = null;
        $this->feed = null;
        $this->set_session('success','Feedback enviado','Valoración enviada correctamente');
    }
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
    //método que se ejecuta después de renderizar (exceptuando la primera vez que carga la 
    //página, en ese caso se puede usar mount()
    public function dehydrate()
    {
        if(session('message.title'))
            $this->dispatchBrowserEvent('eventModal',['data' => ['status' => $this->typealert]]);
    }

    public function clear_feedback(){
        $this->product_id_tmp=null;
    }

    public function set_data($product_id,$order_id,$order_item_id){

        $this->order_id_tmp = $order_id;
        $this->product_id_tmp = $product_id;
        $this->order_item_id_tmp = $order_item_id;
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
