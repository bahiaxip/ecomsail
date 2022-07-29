<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
class Offer extends Component
{
    public $typealert;

    public function render()
    {
        $categories = Category::where('status',1)->where('type',0)->get();
        $data = ['categories'=>$categories];
        return view('livewire.store.offers',$data)->extends('layouts.main');
    }
}
