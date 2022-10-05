<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Role;

use App\Functions\Permissions as Permis;

use Auth;
class Roles extends Component
{

    public $limit_page=10;
    public $search_data;

    public $name;
    public $slug;
    public $description;
    //public $special;

    protected $role_permissions;


    public function mount(){
        $this->username = Auth::user()->name;
        $this->role_permissions = new Permis();
    }

    public function store($data){
        //validamos datos del rol        
        $validated = $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'nullable',            
        ]);
        //creamos el registro del rol
        Role::create([
            'name' => $validated['name'],
            'slug' => $validated['slug'],
            'description' => $validated['description']
        ]);
        
    }

    public function edit($id){

    }

    public function update(){

    }

    public function delete(){

    }

    public function clear(){

    }

    public function clearSearch(){

    }

    public function render()
    {
        $roles = Role::paginate($this->limit_page);
        $data = ['roles' => $roles];
        return view('livewire.admin.roles.roles',$data);
    }
}
