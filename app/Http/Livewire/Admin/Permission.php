<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Permission as Perm, App\Models\Box, App\Models\Role;
use Auth;
use Livewire\WithPagination;
class Permission extends Component
{
    use WithPagination;

    public $limit_page=15;
    public $search_data;
    public $permission_id;
    public $name;
    public $slug;
    public $description;
    public $box_permission;
    public $status;

    public $filter_type;
    public $order_type;
    public $selectedCol = 'id';
    public $typealert;
    public $permissionIdTmp;
    public $count_roles;
    public $actionTmp;

    //personalizamos el nombre del atributo de los mensajes de error
    protected $validationAttributes = [
        'box_permission' => 'contenedor padre',
    ];
    public function mount($filter_type){
        $this->filter_type = $filter_type;
        $this->order_type = 'asc';
        $this->username = Auth::user()->name;
    }

    public function set_type_query($export=false){
        return $this->set_filter_query($this->filter_type,$export);
    }

    //filtrado de categorías (Borrador/Público/Reciclaje/Todos), filtrado de 
    //búsqueda y filtrado de export
    public function set_filter_query($filter_type,$export=false){
        $permission='';
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
                    Perm::where('name','LIKE',$search_data)->where('status',$this->filter_type)
                    :
                    Perm::where('status',$filter_type);
                break;
            case '2':
                $init_query = ($this->search_data) ?
                    Perm::onlyTrashed()->where('name','LIKE',$search_data)
                    :
                    Perm::onlyTrashed()->orderBy($col_order,$order);
                break;
            case '3':
                $init_query = ($this->search_data) ?
                    Perm::where('name','LIKE',$search_data)
                    :
                    Perm::orderBy($col_order,$order);
                break;
        endswitch;

        $permission = $init_query->paginate($this->limit_page);

        return $permission;
    }

    //actualizar datos de consulta de orden por columna (si se clica en el nombre las columnas)
    public function setColAndOrder($nameCol=null){
        //posibles columnas
        $cols=['id','name','description'];
        //comprobamos si la columna seleccionada existe, por si se intenta 
        //introducir otra de forma maliciosa
        if(in_array($nameCol, $cols))
            $this->selectedCol = $nameCol;
        $order = 'asc';
        //comprobando si el nombre de la columna seleccionado es distinto al 
        //anterior (en caso de haber pulsado la vez anterior)
        if($this->selectedCol != $nameCol)
            $order = 'asc';
        else
            //if($this->order_type=='' || $this->order_type =='desc')
            $order = ($this->order_type =='desc') ? 'asc': 'desc';
        //se establece el nombre de la columna
        $this->selectedCol = $nameCol;
        $this->order_type = $order;
    }

    public function store(){
        $validated = $this->validate([            
            'name' => 'required',
            'slug' => 'required',
            'box_permission' => 'required|gt:0',
            'description' => 'required',
            'status' => 'required|integer'

        ]);
        Perm::create([            
            'name' => $validated['name'],
            'slug' => $validated['slug'],
            'box_permission_id' => $validated['box_permission'],
            'description' => $validated['description'],
            'status' => $validated['status'],
        ]);
        $this->typealert = 'success';
        session()->flash('message','Permiso creado correctamente');
        $this->emit('addPermission');
    }

    public function edit($id){
        $permission = Perm::find($id);
        if($permission){
            $this->permission_id = $permission->id;
            $this->name = $permission->name;
            $this->slug = $permission->slug;
            $this->box_permission = $permission->box_permission_id;
            $this->description = $permission->description;
        }
    }

    public function update(){
        $validated = $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'box_permission' => 'required|gt:0',
            'description' => 'required',
            'status' => 'required|integer'
        ]);
        $permission = Perm::find($this->permission_id);
        $permission->update([            
            'name' => $validated['name'],
            'slug' => $validated['slug'],
            'box_permission_id' => $validated['box_permission'],
            'description' => $validated['description'],
            'status' => $validated['status'],
        ]);
        $this->typealert = 'success';
        session()->flash('message','Permiso actualizado correctamente');
        $this->emit('editPermission');
    }

    public function savePermissionId($permission_id,$action){
        if($permission_id && $action)
            if($action =="delete"){
                $permission = Perm::find($permission_id);
            }else{
                $permission = Perm::onlyTrashed()->find($permission_id);
            }
            
            if($permission){
                //$role = Role::
                $this->permissionIdTmp = $permission_id;
                $this->actionTmp = $action;        
            }
        
        
    }

    public function delete(){
        $permission = Perm::find($this->permissionIdTmp);
        if($permission){
            $permission->delete();
            $this->typealert = 'success';
            session()->flash('message','Permiso eliminado correctamente');
            $this->emit('confirmDel');
        }
    }

    //restaurar permiso eliminado
    public function restore($id){
        $permission = Perm::onlyTrashed()->where('id',$id)->first();
        $permission->restore();
        $this->typealert = 'success';
        $message = "Permiso restaurado correctamente";
        session()->flash('message',$message);
        $this->clear2();
        $this->emit('confirmDel');
    }

    public function clear(){
        if($this->permission_id)
            $this->permission_id = '';
        $this->name = null;
        $this->slug = null;
        $this->box_permission = null;
        $this->description = null;
        $this->status = null;
    }
    //método intermedio para limpiar datos de formulario
    public function clear2(){
        $this->clear();
        //resetea todos los mensajes de error
        $this->resetValidation();
    }

    //botón X de buscador para eliminar datos de búsqueda
    public function clearSearch(){
        $this->search_data='';
    }

    public function render()
    {

        $query = $this->set_type_query();

        $box_permissions = DB::table('box_permissions')->pluck('name','id');
        $box_permissions->prepend('Seleccione');

        $data = ['permissions' => $query,'box_permissions'=> $box_permissions];
        return view('livewire.admin.permissions.index',$data);
    }
}
