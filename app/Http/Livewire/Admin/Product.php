<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product as Prod;

class Product extends Component
{
    public $prod;

    public function mount(){
        $prod = Prod::where('status',1)->orderBy('id','desc')->paginate(20);
    }
    public function render()
    {
        $data = ['products' => $this->prod];
        return view('livewire.admin.product',$data)->extends('layouts.admin');
    }
}
