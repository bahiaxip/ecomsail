<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Permis extends Component
{
    public $limit_page=15;
    public $search_data;

    public $name;
    public $slug;
    public $description;

    public function mount(){
         $this->username = Auth::user()->name;
    }

    public function render()
    {
        //$permissions = Permission::paginate($this->limit_page);
        //$data = ['permissions' => $permissions];
        return view('livewire.admin.permissions.index');
    }
}
