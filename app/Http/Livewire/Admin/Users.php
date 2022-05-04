<?php

namespace App\Http\Livewire\Admin;

//use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
//Paises
use App\Functions\Paises;
use App\Functions\Prov as Pr, App\Functions\Municipalities;
use App\Functions\Permissions as Permis;
use App\Models\User;
//use Illuminate\Http\Request;
use Route;
use  Livewire\WithFileUploads;
use Livewire\WithPagination;
class Users extends Component
{    
    use WithFileUploads;
    use WithPagination;
    //use AuthorizesRequests;

    public $user_id;
    public $nick;
    public $name;
    public $surname;
    public $email;
    public $image;
    public $thumb;
    public $phone;
    public $country;
    public $province;
    public $city;
    //datos de paises,provincias, ciudades
    protected $paisesObj;
    public $provinces;
    public $countries;

    public $province_selected;
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
    

    protected $permissions2;
    protected $permissions3;
    protected $prov;
    protected $municip;

    public $typealert = 'success';

    public $filter_type;
    //campo de búsqueda (wire:model)
    public $search_data;
    //orden columnas (asc/desc)
    public $orderType;

    public $provinces_list;
    public $prov_id_selected;
    //public $provinces;
    public $municipies_list;
    //gestiona 
    public $data_tmp;
    public function mount($filter_type){

        //dd(request());
        $this->permissions2 = new Permis();
        //sustituimos paises por paises en array php
        $this->paisesObj = new Paises();
        $this->prov = new Pr();
        $this->provinces_list = $this->prov->prov;
        //dd($this->prov->prov);
        $this->countries = $this->paisesObj->all;
        $this->municip = new Municipalities();
        $this->municipies_list = $this->municip->cities;
        //$this->cities =  json_decode(file_get_contents('js/municipios.json'),true);
        /*
        //convirtiendo array de provincias en json a archivo php
        if(!file_exists('images/cms.php')){
            fopen('images/cms.php','w');
        }        
        $file=fopen('images/cms.php','w');
        fwrite($file,'<?php '.PHP_EOL);
        fwrite($file, 'namespace App\Functions;'.PHP_EOL);
        fwrite($file,'class Municipalities {'.PHP_EOL);
        fwrite($file,'public $cities = [ '.PHP_EOL);
        foreach($this->cities as $key=>$value){
            fwrite($file,$key.' => [');
            //fwrite($file,'  ['.PHP_EOL);
            fwrite($file,'"provincia_id" => "'.$value['provincia_id'].'",');
            fwrite($file,'"municipio_id" => "'.$value['municipio_id'].'",');
            fwrite($file,'"nombre" => "'.$value['nombre'].'"');
            fwrite($file,'],'.PHP_EOL);

        }
        fwrite($file,'];'.PHP_EOL);
        fwrite($file,'}'.PHP_EOL);
        fwrite($file, '?>'.PHP_EOL);
        fclose($file);
        dd("sadf");
        */
//como crear un archivo PHP desde un array de objetos en JSON y de esa forma importarlo
//directamente en PHP
        //leyendo archivo y decodificando
        //array de provincias (necesario el parámetro true para decodificar cada uno de los objetos)        
        /*
        $this->provincias =  json_decode(file_get_contents('js/provincias.json'),true);
        //convirtiendo array de provincias en json a archivo php
        if(!file_exists('images/cms.php')){
            fopen('images/cms.php','w');
        }        
        $file=fopen('images/cms.php','w');
        fwrite($file,'<?php '.PHP_EOL);
        fwrite($file, 'namespace App\Functions;'.PHP_EOL);
        fwrite($file,'class Prov {'.PHP_EOL);
        fwrite($file,'public $prov = [ '.PHP_EOL);
        foreach($this->provincias as $key=>$value){
            fwrite($file,$key.' => [');
            //fwrite($file,'  ['.PHP_EOL);
            fwrite($file,'\'provincia_id\' => \''.$value['provincia_id'].'\',');
            fwrite($file,'\'nombre\' => \''.$value['nombre'].'\'');
            fwrite($file,'],'.PHP_EOL);

        }
        fwrite($file,'];'.PHP_EOL);
        fwrite($file,'}'.PHP_EOL);
        fwrite($file, '?>'.PHP_EOL);
        fclose($file);
        */
        
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
                $user = User::where('status',$filter_type)->orderBy('id','desc')->paginate(10);
                break;
                //no mostramos ya que puede haber ususarios eliminados
            /*
            case '2':                
                $user = User::onlyTrashed()->orderBy('id','desc')->where('role',$role)->paginate(10);
                break;
            */
            case '3':
                //500 es usuario baneado                
                $user = User::where('status','!=',500)->orderBy('id','desc')->paginate(10);
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
        if($this->provinces){
            //si ha seleccionado uno nuevo pasamos el valor de city a null
            //no es necesario, tan solo es necesario si no añadimos el valor del id 
            //a los option
            if($this->province_selected != $this->province){
                //$this->city=0;
            }            
            $this->province_selected=$this->province;
            //$this->citiy=0;
            //dd($this->provinces);
        }
        //$this->data_tmp=$this->user_id;

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
        if($id != 0){
            $this->data_tmp=$id;
            //sleep(3);
            //registro de la tabla users con el usuario seleccionado
            $user=User::where('id',$id)->first();
            if($user->id){
                $this->user_id=$user->id;
                //(se podría evitar la consulta $user y llamar al método user del modelo 
                //Profile belongsTo...)
                //asignación de datos mediante consulta a tabla users 
                $this->nick = $user->nick;
                $this->name=$user->name;
                $this->email=$user->email;
                //asignación de datos mediante consulta con tabla profiles
                $this->surname=$user->lastname;
                //dd("dsfas");
                
                
                //$this->image=$user->image;
                $this->thumb = $user->thumb;
                $this->phone=$user->phone;
                $this->country=$user->country;
                $this->province=$user->province;
                $this->city = $user->city;
                //$this->file=$profile->file;
                //$this->thumb=$profile->thumb;
                //$this->file_title=$profile->file_name;
            }
        }
        
    }

    public function update(){
        //ocultamos el loading duplicado que se ha iniciado
        $this->emit('loading','loading');
        
        if($this->user_id){
            $validated = $this->validate([
                'nick' => 'required',
                'name' => 'required',
                'surname' => 'required',
                'phone' => 'nullable',
                'country' => 'nullable',
                'province' => 'nullable',
                'city' => 'nullable',
                'image' =>'nullable|image'
            ]);
            if($this->user_id){
                $user = User::where('id',$this->user_id)->first();
                $user->update([
                    'nick' => $validated['nick'],
                    'name' => $validated['name'],                
                    'lastname' => $validated['surname'],
                    'phone' => $validated['phone'],
                    'country' => $validated['country'],
                    'province' => $validated['province'],
                    'city' => $validated['city'],

                ]);
                //dd($this->image);
                if($validated['image'] !== null){
            //comprobar si existe imagen y eliminar la anterior            
                    $image_name = $this->image->getClientOriginalName();
                    $ext = $this->image->getClientOriginalExtension();
                    $path_date= date('Y-m-d');
                    $image = $this->image->store('public/files/'.$path_date,'');
                    $path_tag = 'public/files/'.$path_date.'/';                
                    //eliminamos el directorio public
                    $imagelesspublic = substr($image,7);
                    $thumb = $image;
                    $user->update([
                        'image' => $imagelesspublic,
                        'thumb' => $imagelesspublic,
                        'path_tag' => $path_tag,
                        'file_name' => $image_name,
                    ]);
                }
            }
            session()->flash('message','Usuario actualizado correctamente');
            $this->clear2();
            $this->emit('editUser');
        }

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
        //if($this->user_id)
        $this->user_id='';
        $this->nick='';
        $this->name='';
        $this->surname='';
        //$this->emit('editUser');
        $this->data_tmp='';
    }

    public function clear2(){
        $this->clear();
        //resetea todos los campos necesario para input file
        $this->resetValidation();
    }

    public function render()
    {
        /*
        $dato=array();        
        for($i=0;$i<count($this->provincias);$i++){
            array_push($dato,$this->provincias[$i]['nombre']);
        }
        */
        
        
        $this->permissions2 = new Permis();
        //$users = User::orderBy('id','desc')->paginate(20);
        //$users = $this->set_type_query();
        $users = $this->set_type_query();

        $data = ['users' => $users,'countries' => $this->countries,'provinces_list' => $this->provinces_list,'cities' => $this->municipies_list,'data_tmp'=> $this->data_tmp];
        //return view('livewire.admin.users.index',$data)->extends('layouts.admin');

        return view('livewire.admin.users.index',$data);
    }
}
