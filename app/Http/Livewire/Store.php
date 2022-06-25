<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
class Store extends Component
{
    public $typealert='success';
    public function render()
    {
        $products = Product::where('status',1)->orderBy('id','asc')->paginate(15);
        $data = ['products' => $products];
        return view('livewire.store.store',$data)->extends('layouts.main');
    }
}
