<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Offer extends Component
{
    public $typealert;

    public function render()
    {
        return view('livewire.store.offers')->extends('layouts.main');
    }
}
