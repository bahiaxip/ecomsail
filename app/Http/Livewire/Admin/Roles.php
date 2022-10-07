<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Role, App\Models\Permission as Perm, App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Functions\Permissions as Permis;

use Auth;
class Roles extends Component
{

    public $limit_page=10;
    public $search_data;

    public $name;
    public $slug;
    public $description;
    public $status;
    //public $special;

    protected $role_permissions;
    public $filter_type;

    public $roleIdTmp;
    public $actionTmp;
    public $count_roles;
    public $selectedCol;
    public $order_type;
    public $role_id;

    public function mount($filter_type){
        $this->filter_type = $filter_type;
        $this->order_type = 'asc';        
        $this->username = Auth::user()->name;
        $this->role_permissions = new Permis();
    }

    public function set_type_query($export=false){
        return $this->set_filter_query($this->filter_type,$export);
    }

    //filtrado de categorías (Borrador/Público/Reciclaje/Todos), filtrado de 
    //búsqueda y filtrado de export
    public function set_filter_query($filter_type,$export=false){
        $role='';
        $search_data = '%'.$this->search_data.'%';
        
        $col_order='id';
        //si $this->selectedCol no es null establecemos la columna seleccionada 
        if($this->selectedCol)
            $col_order=$this->selectedCol;
        //tipo de ordenamiento        
        $order = $this->order_type;

        //si es reciclaje creamos consulta con onlyTrashed(los eliminados mediante softDelete())
        switch($filter_type):
            case '0':
            case '1':
                $init_query = ($this->search_data) ?
                    Role::where('name','LIKE',$search_data)->where('status',$this->filter_type)
                    :
                    Role::where('status',$filter_type);
                break;
            case '2':
                $init_query = ($this->search_data) ?
                    Role::onlyTrashed()->where('name','LIKE',$search_data)
                    :
                    Role::onlyTrashed()->orderBy($col_order,$order);
                break;
            case '3':
                $init_query = ($this->search_data) ?
                    Role::where('name','LIKE',$search_data)
                    :
                    Role::orderBy($col_order,$order);
                break;
        endswitch;

        $role = $init_query->paginate($this->limit_page);

        return $role;
    }

    public function store($data){        
        //validamos datos del rol        
        $validated = $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'nullable',
            'status' => 'required|integer'
        ]);
        //creamos el registro del rol
        Role::create([
            'status' => $validated['status'],
            'name' => $validated['name'],
            'slug' => $validated['slug'],
            'description' => $validated['description']
        ]);
        $this->typealert = 'success';
        session()->flash('message','Rol creado correctamente');
        $this->emit('addRole');
        $this->clear2();
    }

    public function edit($id){
        $role = Role::find($id);
        if($role){
            $this->role_id = $role->id;
            $this->name = $role->name;
            $this->slug = $role->slug;
            $this->description = $role->description;
            $this->status = $role->status;
        }        

    }

    public function update($data){
        if($this->role_id){
            $role = Role::find($this->role_id);
            if($role){
                //validamos datos del rol        
                $validated = $this->validate([
                    'name' => 'required',
                    'slug' => 'required',
                    'description' => 'nullable',
                    'status' => 'required|integer',
                ]);
                $role->update([
                    'status' => $validated['status'],
                    'name' => $validated['name'],
                    'slug' => $validated['slug'],
                    'description' => $validated['description']
                ]);
                $this->typealert = 'success';
                session()->flash('message','Rol actualizado correctamente');
                $this->emit('editRole');
            }
        }
        
    }

    public function delete(){
        if($this->roleIdTmp){
            $role = Role::find($this->roleIdTmp);
            $role->delete();
            $this->typealert = 'success';
            session()->flash('message','Role eliminado correctamente');
            $this->emit('confirmDel');
        }
    }

    //restaurar permiso eliminado
    public function restore($id){
        $role = Role::onlyTrashed()->where('id',$id)->first();
        $role->restore();
        $this->typealert = 'success';
        $message = "Permiso restaurado correctamente";
        session()->flash('message',$message);
        $this->clear2();
        $this->emit('confirmDel');
    }

    public function saveRoleId($role_id,$action){
        $this->roleIdTmp = $role_id;
        $this->actionTmp = $action;
        $this->count_roles = 0;
        //$user = User::where('')
    }

    public function clear(){
        $this->name = null;
        $this->slug = null;
        $this->description = null;
        $this->status = null;
    }
    public function clear2(){
        $this->clear();
        $this->resetValidation();
    }

    public function clearSearch(){
        $this->search_data = '';

    }

    public function render()
    {
        $roles = $this->set_type_query();
        $permissions = [];
        $box_permissions = DB::table('box_permissions')->where('status',1)->get();
        foreach($box_permissions as $box_permission){
            $permissions[$box_permission->id] = Perm::where('status',1)->where('box_permission_id',$box_permission->id)->get();
        }
        
        $data = ['roles' => $roles,'permissions' => $permissions,'box_permissions'=>$box_permissions];
        return view('livewire.admin.roles.index',$data);
    }
}
