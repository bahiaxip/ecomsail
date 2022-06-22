<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order, App\Models\Order_Item, App\Models\Product, App\Models\History_Order_Item;
//edit_user
use App\Functions\Paises, App\Functions\Prov as Pr, App\Functions\Municipalities, App\Models\User;
use Auth;
use  Livewire\WithFileUploads;
use Livewire\WithPagination;
class HistoryOrder extends Component
{
    use WithFileUploads;
    use WithPagination;
    //public $orders;
    public $user_id;

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
    public $typealert= 'success';
    public $limit_page=15;

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
        $this->emit('loading','loading');
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
        foreach($orders as $order){
            $orders_items[$order->id] = History_Order_Item::where('order_id',$order->id)->get();
        }
        

        //dd($this->orders);
        $data =['orders'=>$orders,'orders_items' => $orders_items];
        return view('livewire.home.history_order',$data)->extends('layouts.main');
    }
}
