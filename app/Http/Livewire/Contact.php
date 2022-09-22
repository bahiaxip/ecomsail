<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Route;
class Contact extends Component
{
    public $typealert;
    public $name;
    public $lastname;
    public $subject;
    public $email;
    public $message;
    //buscador global
    public $search_product;
    public $route_name;
    public function mount(){
        $this->route_name = Route::currentRouteName();
    }

    //redirección del buscador genérico
    public function go_to_search(){
        if($this->search_product)
            return redirect()->route('store',['category' => 0,'subcategory'=>0,'type' =>$this->search_product]);
    }
    public function add_ticket(){
        $validated = $this->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'subject' => 'required|integer',
            'message' => 'required'
        ]);
        //almacenar en DB necesaria nueva tabla
        //enviar email


    }

    public function clear2(){
        $this->name = null;
        $this->lastname = null;
        $this->subject = null;
        $this->email = null;
        $this->message = null;
    }
    public function clear(){
        $this->clear2();
    }
    public function render()
    {
        return view('livewire.contact.contact')->extends('layouts.main');
    }
}
