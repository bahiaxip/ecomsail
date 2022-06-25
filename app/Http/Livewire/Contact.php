<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Contact extends Component
{
    public $typealert;
    public function render()
    {
        return view('livewire.contact.contact')->extends('layouts.main');
    }
}
