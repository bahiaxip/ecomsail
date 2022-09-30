<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Favorite as Fav, App\Models\Product;
use Auth,Route;

class Favorite extends Component
{
    
    public $user_id;
    public $typealert = 'success';
    //buscador global
    public $search_product;
    public $route_name;
    
    public function mount(){
        $this->user_id = Auth::id();
        $this->route_name = Route::currentRouteName();
    }

    //redirección del buscador genérico
    public function go_to_search(){
        if($this->search_product)
            return redirect()->route('store',['category' => 0,'subcategory'=>0,'type' =>$this->search_product]);
    }

    public function dehydrate(){
        if(session('message.title'))
            $this->dispatchBrowserEvent('eventModal',['data' => ['status' => $this->typealert]]);
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

    public function delete($id){
        $favorite = Fav::find($id);
        if(!$favorite){
            $this->set_session('danger','Error','Se originó un error y no se pudo eliminar el producto de la lista de favoritos');
            return false;
        }
        
        $favorite->delete();
        $message = 'El producto ha sido eliminado de la lista de favoritos';
        $title = 'Eliminado';
        $status = 'success';
        $this->set_session($status,$title,$message);
        $this->typealert = $status;
        
    }

    public function render()
    {
        $favorites = Fav::where('user_id',$this->user_id)->paginate(15);
        $data = ['favorites'=>$favorites];        
        return view('livewire.home.favorites',$data)->extends('layouts.main');
    }
}
