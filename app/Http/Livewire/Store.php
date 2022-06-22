<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Store extends Component
{
    public function render()
    {
        return view('livewire.store.store')->extends('layouts.main');
    }
}
