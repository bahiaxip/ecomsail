<?php

namespace App\Http\Livewire\Admin;

//use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
//Paises
use App\Functions\Paises;
use App\Functions\Permissions as Permis;
use App\Models\User;
//use Illuminate\Http\Request;
use Route;
class Users extends Component
{    

    //use AuthorizesRequests;

    public $user_id;
    public $nick;
    public $name;
    public $surname;
    public $email;
    public $file;
    //public $pass;

    //permissions

    public $permissions = [
        'users' => [
            'list_users' => null,
            'add_users' => null,
            'edit_users' => null,
            'delete_users' => null,
        ],
        'categories' =>[
            'list_categories' => null,
            'add_categories' => null,
            'edit_categories' => null,
            'delete_categories' => null
        ],
        'products' =>[
            'list_products' => null,
            'add_products' => null,
            'edit_products' => null,
            'delete_products' => null
        ]
    ];
    protected $paisesObj;
    public $province;
    public $country;

    protected $permissions2;
    protected $permissions3;

    public $typealert = 'success';

    public $filter_type;
    //campo de búsqueda (wire:model)
    public $search_data;
    //orden columnas (asc/desc)
    public $orderType;

    public function __construct(){
        

    }
    

    public function mount($filter_type){
        //dd(request());
        $this->permissions2 = new Permis();
        $this->paisesObj = new Paises();
        //$this->permissions2 = new Permis();
        $this->countries = $this->paisesObj->all;
        $this->provincias = $this->paisesObj->provincias;
        $this->filter_type = $filter_type;
    }

    public function set_filter_query($filter_type,$subcat=null){
        $user=[];
        $role=1;
        
        switch($filter_type):
            case '0':
                //$this->filterType = $filterType;
                $user = User::where('status',$filter_type)->orderBy('id','desc')->paginate(10);
                break;
            case '1':                
                $user = User::where('status',$filter_type)->where('role',$role)->orderBy('id','desc')->paginate(10);
                break;
                //no mostramos ya que puede haber ususarios eliminados
            /*
            case '2':                
                $user = User::onlyTrashed()->orderBy('id','desc')->where('role',$role)->paginate(10);
                break;
            */
            case '3':
                //500 es usuario baneado                
                $user = User::where('status','!=',500)->where('role',$role)->orderBy('id','desc')->paginate(10);
                break;

        endswitch;
        return $user;
    }

//se debería realizar mediante la eliminación de columnas de forma visual, poder 
    //eliminar la búsqueda de esas columnas
    public function set_type_query(){
        $query;
        if($this->search_data){
            $query= $this->set_filter_query($this->filter_type);
            $search_data = '%'.$this->search_data.'%';
            //no mostramos ya que puede haber ususarios eliminados
            /*if($this->filter_type==2){
                $query = User::onlyTrashed()->where('name','LIKE',$search_data)->orWhere('nick','LIKE',$search_data)->orWhere('lastname','LIKE',$search_data)->paginate(10);
            }else{
            */
                $query = User::where('name','LIKE',$search_data)->where('status',$this->filter_type)->orWhere('nick','LIKE',$search_data)->orWhere('lastname','LIKE',$search_data)->paginate(10);    
            //}
        }
        else{
            $query= $this->set_filter_query($this->filter_type);
        }
        return $query;
    }    

    public function updated($fields){
        
        /*
        if($this->searchData){
            $this->resetPage();
        }else{
            $this->clear_query();
        }
        */
        /*
        $this->validateOnly($fields,[
            'nick' => 'required',
            'name'=>'required',
            'surname'=>'nullable',
            
        ]);
        */
    }

    public function clear_query(){
        $this->orderType='asc';
    }

    public function edit($id){
        //sleep(3);
        //registro de la tabla users con el usuario seleccionado
        $user=User::where('id',$id)->first();
        $this->user_id=$user->id;
        //(se podría evitar la consulta $user y llamar al método user del modelo 
        //Profile belongsTo...)
        //asignación de datos mediante consulta a tabla users 
        $this->nick = $user->nick;
        $this->name=$user->name;
        $this->email=$user->email;
        //asignación de datos mediante consulta con tabla profiles
        $this->surname=$user->lastname;
        //$this->phone=$user->phone;
        //$this->country=$profile->country;
        //$this->province=$profile->province;
        //$this->file=$profile->file;
        //$this->thumb=$profile->thumb;
        //$this->file_title=$profile->file_name;
    }

    public function update(){
        $this->validate([
            'nick' => 'required',
            'name' => 'required',
            'surname' => 'required',            
        ]);
        if($this->user_id){
            $user = User::where('id',$this->user_id)->first();
            $user->update([
                'nick' => $this->nick,
                'name' => $this->name,                
                'lastname' => $this->surname
            ]);
        }
        session()->flash('message','Usuario actualizado correctamente');
        $this->clear2();

    }

//no se puede eliminar usuarios
    //Los 2 métodos siguientes (saveUserId, clearUserId) son necesarios para 
    //la confirmación de borrado de usuario (mediante un modal de bootstrap), 
    //guardar y limpiar el id del usuario seleccionado de forma temporal    
    public function saveUserId($userId){
        $this->userIdTmp=$userId;
    }
    //si se recarga la página tb ser resetea el userIdTmp, en el método mount()
    public function clearUserId(){
        $this->userIdTmp='';
    }

    //eliminación de usuario
    public function delete(){
        if($this->userIdTmp){
            $user=User::where('id',$this->userIdTmp)->first();
            //comprobamos si existe imagen y si existe y
            //es distinta a la asignada por defecto se elimina del server
            /*
            $exists=Storage::disk('public')->exists($profile->file);
            if($exists && $profile->file != 'img/person.png'){
                Storage::disk('public')->delete($profile->file);
                session()->flash('message',$profile->file);    
            }
            */            
            //$user=User::where('id',$this->userIdTmp)->first();
            //$profile->delete();
            $user->delete();
            session()->flash('message',"Usuario eliminado correctamente");
            $this->clear2();
        }
    }

    public function edit_permissions($id){        
        $user = User::findOrFail($id);
        $data = $user->permissions;
        //dd($data);
        $this->permissions3 = $data;
        $this->permissions2 = new Permis();
        //$dato = $dato->testPermission('hola','list_users');
        //dd($dato);
        
        $this->user_id = $id;
    }
    public function submit($data){

        $user = User::findOrFail($data['id']);
        //eliminamos id del arraay
        unset($data['id']);
        unset($data['_token']);
        //dd(json_encode($data));
        $user->update([
            'permissions' => json_encode($data)
        ]);
        //$this->typealert = 'success';
        //session()->flash('message',"Permisos actualizados correctamente");
        //$this->emit('editPermissions');

        //esto permite recargar la página pero no genera mensaje, conveniente //eliminar con javascript el elemento del sidebar correspondiente
        //return redirect(request()->header('Referer','datos'));
        return redirect()->route('list_users',['filter_type' => $this->filter_type])->with('message',"permisos actualizados")->with('only_component','true');
        //Route::get('/users',['hola']);
        
    }

    //botón X de buscador para eliminar datos de búsqueda
    public function clearSearch(){
        $this->search_data='';
    }

    //limpiar datos de formulario
    public function clear(){
        if($this->user_id)
            $this->user_id='';
        $this->nick='';
        $this->name='';
        $this->surnames='';
        $this->emit('userUpdated');
    }

    public function clear2(){
        $this->clear();
        //resetea todos los campos necesario para input file
        $this->resetValidation();
    }

    public function render()
    {
        $this->permissions2 = new Permis();
        //$users = User::orderBy('id','desc')->paginate(20);
        //$users = $this->set_type_query();
        $users = $this->set_type_query();

        $data = ['users' => $users,'countries' => $this->countries,'provincias' => $this->provincias];
        //return view('livewire.admin.users.index',$data)->extends('layouts.admin');
        return view('livewire.admin.users.index',$data);
    }
}
