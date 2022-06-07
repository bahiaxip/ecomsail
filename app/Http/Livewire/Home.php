<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product, App\Models\Category;
class Home extends Component
{
    public $hola;

    public $name;
    public $item;

    public function fastview($id){        
        $this->item = Product::findOrFail($id);
    }
    public function updated(){

        dd("ea");
    }

    public function clear_fastview(){
        $this->item=null;

        //dd('sadf');
    }

    public function render()
    {
        
        //destacados
        $products = Product::where('status',1)->paginate(15);
        $categories = Category::where('status',1)->where('type',0)->get();
        $data = ['products' => $products,'categories' => $categories];
        //el slider falla con el layouts.app por duplicado de la clase content
        return view('livewire.home',$data)->extends('layouts.main');    
        
        
    }
}
