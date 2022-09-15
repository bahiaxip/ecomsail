<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Favorite as Fav, App\Models\Product;
use Auth;

class Favorite extends Component
{
    
    public $user_id;
    public $typealert = 'success';
    //buscador global
    public $search_product;
    
    public function mount(){
        $this->user_id = Auth::id();
    }

    //redirección del buscador genérico
    public function go_to_search(){
        if($this->search_product)
            return redirect()->route('store',['category' => 0,'subcategory'=>0,'type' =>$this->search_product]);
    }

    public function render()
    {
        $favorites = Fav::where('user_id',$this->user_id)->paginate(15);
        $data = ['favorites'=>$favorites];        
        return view('livewire.home.favorites',$data)->extends('layouts.main');
    }
}
