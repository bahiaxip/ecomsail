<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Favorite as Fav, App\Models\Product;
use Auth;

class Favorite extends Component
{
    
    public $user_id;
    public $typealert = 'success';

    public function mount(){
        $this->user_id = Auth::id();
    }

    public function render()
    {
        $favorites = Fav::where('user_id',$this->user_id)->paginate(15);
        $data = ['favorites'=>$favorites];        
        return view('livewire.home.favorites',$data)->extends('layouts.main');
    }
}
