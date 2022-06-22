<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Favorite extends Component
{
    public $favorites;
    
    public function render()
    {
        $data = ['favorites',$this->favorites];
        return view('livewire.home.favorite',$data)->extends('layouts.main');
    }
}
