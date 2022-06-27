<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
class Store extends Component
{
    public $typealert='success';
    public $category;

    public function mount($category=null){        
        if($category)
            $this->category = $category;
    }
    public function render()
    {
        if($this->category){
            $products = Product::where('status',1)->where('category_id',$this->category)->orderBy('id','asc')->paginate(15);            
        }else{
            $products = Product::where('status',1)->orderBy('id','asc')->paginate(15);            
        }
        $data = ['products' => $products];
        return view('livewire.store.store',$data)->extends('layouts.main');
    }
}
