<?php

namespace App\Http\Livewire\Admin;

//use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
//Paises
use App\Functions\Paises, App\Functions\Functions;
use App\Functions\Prov as Pr, App\Functions\Municipalities, App\Models\Role;
//método para testear acceso a bloques en función del permiso del usuario
use App\Functions\Permissions as Permis;
use App\Models\User;
use Illuminate\Http\Request;
use App\Functions\Export;
use Route,Auth,Str,PDF,Excel;
use  Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Mail;
use App\Mail\Listado;
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
    public $profile_image;
    public $thumb;
    public $status;
    //iteration es necesario resetear el caché del input file
    public $iteration;
    public $phone;
    public $country;
    public $province;
    public $city;
    //datos de paises,provincias, ciudades
    protected $paisesObj;
    public $provinces;
    public $countries;
    //provincia seleccionada
    public $province_selected;
    //listado de permisos(archivo externo)
    public $permissions=[]; 

    protected $role_permissions;
    protected $permissions3;
    protected $prov;
    protected $municip;

    public $typealert = 'success';

    public $count_user;
    //listado de provincias
    public $provinces_list;
    //provincia seleccionada
    public $prov_id_selected;
    //listado de municipios
    public $municipies_list;
    
    //tipo de filtrado (Público/Borrador/Todos), en usuarios no existe softDeletes ya que no se pueden eliminar
    public $filter_type;
    //campo de búsqueda (wire:model)
    public $search_data;
    //orden columnas (asc/desc)
    public $order_type;
    //columna seleccionada
    public $selectedCol;
    //anulado 
    //public $data_tmp;
    
    
    //pdf/excel
    protected $pdf;
    public $checkpdf;
    public $checkexcel;
    public $email_export;
    //nombre de listado para envió de email
    public $listname;
    //nombre de usuario para envió de email
    public $username;
    //id de user temporal para eliminar
    public $userIdTmp;

    //roles
    public $role;
    //lista de roles para el select de edición de rol del usuario
    public $roles;

    public function mount($filter_type){
        
        $this->role_permissions = new Permis();
        $this->permissions = $this->role_permissions->permissions_list;
        //Class Países solo utilizada para obtener los paises (array all)
        $this->paisesObj = new Paises();
        $this->countries = $this->paisesObj->all_list;
        //class Pr con listado de provincias
        $this->prov = new Pr();
        $this->provinces_list = $this->prov->prov;
        //class Municipalities con listado de municipios/ciudades relacionados con el
        //listado de provincias mediante provincia_id
        $this->municip = new Municipalities();
        $this->municipies_list = $this->municip->cities;

        $this->filter_type = $filter_type;
        $this->order_type = 'asc';
        //datos para email y saveexport
        $this->listname = 'users';
        $this->username=Auth::user()->name;
        $this->checkpdf=1;
    }

    public function set_filter_query($filter_type,$export=false,$role=0){
        $user=[];
        //$role=1;
        $search_data = '%'.$this->search_data.'%';
        $col_order='id';
        if($this->selectedCol)
            $col_order = $this->selectedCol;
        $order = $this->order_type;
        //en usuario no existe la opción 2 ya que no existen eliminados

        //500 es si están baneados
        /*
        if($filter_type==3){
            if( ($this->search_data)) 
                $init_query = User::where('status','==',500)->where('name','LIKE',$search_data)->orWhere('nick','LIKE',$search_data);
            else
                $init_query = User::where('status','==',500);
        */
        if($filter_type==3){
            
        }else{
            
        }
            
        switch($filter_type):
            case '0':
            case '1':                
                if($this->search_data) 
                    $init_query = User::where('status',$filter_type)->where('name','LIKE',$search_data)->orWhere('nick','LIKE',$search_data);
                else
                    $init_query = User::where('status',$filter_type);
                break;
                //no mostramos ya que puede haber ususarios eliminados
            /*
            case '2':                
                $user = User::onlyTrashed()->orderBy('id','desc')->where('role',$role)->paginate(10);
                break;
            */
            case '3':                
                //500 es usuario baneado 
                if( ($this->search_data)) 
                    $init_query = User::where('name','LIKE',$search_data)->orWhere('nick','LIKE',$search_data)->orderBy('id','desc');
                else
                    $init_query = User::orderBy('id','desc');
                break;
        endswitch;
        
        ($export) ?
            $user = $init_query->get()
            :
            $user = $init_query->paginate(10);
        return $user;
    }

//se debería realizar mediante la eliminación de columnas de forma visual, poder 
    //eliminar la búsqueda de esas columnas
    public function set_type_query($export=false){
        $query;
        $query= $this->set_filter_query($this->filter_type,$export);
        return $query;
    }    

    public function updated($fields){
        //if($this->provinces){
            //si ha seleccionado uno nuevo pasamos el valor de city a null
            //no es necesario, tan solo es necesario si no añadimos el valor del id 
            //a los option
            /*
            if($this->province_selected != $this->province){
                //$this->city=0;
            }            
            $this->province_selected=$this->province;
            */
            //$this->citiy=0;
            //dd($this->provinces);
        //}
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
        $this->order_type='asc';
    }

    public function edit($id){
        if($id != 0){
            //anulado
            //$this->data_tmp=$id;
            
            //registro de la tabla users con el usuario seleccionado
            $user=User::where('id',$id)->first();
            if($user->id){
                $this->user_id=$user->id;
                //(se podría evitar la consulta $user y llamar al método user del modelo 
                //Profile belongsTo...)
                //asignación de datos mediante consulta a tabla users 
                $this->status = $user->status;
                $this->nick = $user->nick;
                $this->name=$user->name;
                $this->email=$user->email;
               
                $this->surname=$user->lastname;
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
        //dd($this->profile_image);
        if($this->user_id){
            $validated = $this->validate([
                'status' => 'required',
                'nick' => 'required',
                'name' => 'required',
                'surname' => 'required',
                'phone' => 'nullable',
                'country' => 'nullable',
                'province' => 'nullable',
                'city' => 'nullable',
                'profile_image' =>'nullable|image',

            ]);
            
            if($this->user_id){
                $user = User::where('id',$this->user_id)->first();
                $user->update([
                    'status' => $validated['status'],
                    'nick' => $validated['nick'],
                    'name' => $validated['name'],                
                    'lastname' => $validated['surname'],
                    'phone' => $validated['phone'],
                    'country' => $validated['country'],
                    'province' => $validated['province'],
                    'city' => $validated['city'],
                ]);
                
                if($validated['profile_image'] !== null){

//comprobar si existe imagen y eliminar la anterior            
                    $image_name = $this->profile_image->getClientOriginalName();

                    $ext = $this->profile_image->getClientOriginalExtension();
                    $path_date= date('Y-m-d');
                    $image = $this->profile_image->store('public/files/'.$path_date,'');
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

    public function edit_roles($id){
        $user = User::find($id);
        if($user){
            $this->user_id = $id;
            $this->role = $user->role;
            $this->roles = Role::where('status',1)->pluck('name','id');
        }
    }
    public function update_roles(){
        if($this->user_id){
            $user = User::find($this->user_id);
            $user->update(['role'=> $this->role]);
        }
        session()->flash('message','Usuario actualizado correctamente');
        $this->clear2();
        $this->emit('userRole');
    }
    //edición de permisos de usuario
    public function edit_permissions($id){        
        $user = User::find($id);
        if($user){
            $data = $user->permissions;            
            $this->permissions3 = $data;
            $this->role_permissions = new Permis();
            $this->user_id = $id;    
        }
    }
    //actualización de permisos de usuario
    public function update_permissions($data){
        //genera errores si no es user bahiaxip, no necesario, ya que
        //realizamos una redirección 
        //$this->emit('loading','loading');
        $user = User::findOrFail($data['id']);
        //eliminamos id y token del array
        unset($data['id']);
        unset($data['_token']);
        //dd(json_encode($data));
        $user->update([
            'permissions' => json_encode($data)
        ]);
        //$this->typealert = 'success';
        //session()->flash('message',"Permisos actualizados correctamente");
        //$this->emit('editPermissions');
        
        //esto permite recargar la página pero no genera mensaje         
        //return redirect(request()->header('Referer','datos'));
        
        //con redirect() recargamos la página para no mostrar el elemento del sidebar en caso de restricción de acceso
        //añadimos la variable only_component para solo mostrar el session message del componente y no mostrar el session message del layout
        return redirect()->route('list_users',['filter_type' => $this->filter_type])->with('message',"permisos actualizados")->with('only_component','true');
    }

    //si se selecciona España se activan los select de province y city
    //si no se desactivan
    public function testCountry(){
        //58 es el id de España
    }

    //botón X de buscador para eliminar datos de búsqueda
    public function clearSearch(){
        $this->search_data='';
    }

    //limpiar datos de formulario
    public function clear(){
        
        $this->user_id='';
        $this->status = null;
        $this->nick='';
        $this->name='';
        $this->surname='';
        $this->profile_image=null;
        //iteration es necesario resetear el caché del input file
        $this->iteration=rand();
        $this->role = null;
    }

    public function clear2(){
        $this->clear();
        //resetea todos los mensajes
        $this->resetValidation();
    }

    //si se recarga la página tb se resetea el catIdTmp, en el método mount()
    public function clearUserId(){
        $this->userIdTmp='';
    }

    //exportar archivo PDF al navegador del usuario
    public function exportPDF(){    
        $users=$this->set_type_query(true);
        $view="livewire.admin.users.export";
        $pdf=PDF::loadView($view,['users'=>$users]);
        $this->pdf=$pdf;
        return response()->streamDownload(function(){
                    //con print o con echo
            print $this->pdf->stream();//echo $this->pdf->stream();
        },'listado.pdf');
    }
    //exportar archivo Excel al navegador del usuario
    public function exportExcel(){
        $users=$this->set_type_query(true);
        return Excel::download(new Export($users,$this->listname),'exportexcel.xlsx');
    }

    //guardar el archivo PDF en el server para después poder enviar por correo 
    //como archivo adjunto
    public function savePDF(){
        $path_date=date('Y-m-d');
        $users=$this->set_type_query(true);
        $view="livewire.admin.users.export";
        $pdf= PDF::loadView($view,['users'=>$users]);
        $pdf->save('listado_'.$path_date.'.pdf');
    }
    //guardar archivo Excel en el server para después poder enviar por correo 
    //como archivo adjunto
    public function saveExcel(){
        $path_date=date('Y-m-d');
        $users=$this->set_type_query(true);
        //grabar en disco
        //si no añadimos aleatorio(random) en ocasiones genera un archivo corrupto, por ejemplo
        //cuando se genera una búsqueda con LIKE. Si se añade un nombre distinto, al no 
        //tener que sobreescribir sobre el anterior archivo, en el servidor, por alguna 
        //razón genera el archivo correctamente.
        $number_rand = Str::random(10);
        $this->file_tmp = 'listado'.$number_rand.'.xlsx';

        return  Excel::store(new Export($users,$this->listname),$this->file_tmp,'public');
    }

    //Enviar email con opción de enviar documento PDF y/o Excel como archivos adjuntos
    public function sendEmailUser(){
        $attach=["pdf"=>0,"excel"=>0];
        $validated = $this->validate([
            'email_export'=>'required|email'
        ]);
        //mensaje de validación de checkbox
        if($this->checkpdf == '' && $this->checkexcel==''){
            session()->flash('check','Es necesario marcar al menos uno');
        }else{
            if($this->checkpdf){
                $this->savePDF();                
                $attach["pdf"]="1";
            }
            if($this->checkexcel){
                $this->saveExcel();                
                $attach["excel"]="1";
            }

        //falta condicional por si falla el servidor de correo
            Mail::to($validated["email_export"], "eHidra")
            ->send(new Listado($attach,$this->username,$this->listname,$this->file_tmp));
        //sustituimos el flash por redirect(), ya que el div del message se muestra //correctamente pero genera conflicto con el dropdown de export, y al enviar
        //correo ya no desplega el dropdown de exportar 
        //session()->flash('message',"Correo enviado correctamente");
        if(file_exists(public_path($this->file_tmp))){
            unlink(public_path($this->file_tmp));    
        }
        
        return redirect()->route('list_users',['filter_type' => $this->filter_type])->with('message',"Correo enviado correctamente")->with('only_component','true');
            //limpiar datos de selección para el envio (correo y archivos adjuntos)
        $this->clearExport();
        $this->emit("sendModal");
        }
    }
    //limpiar datos de exportación
    public function clearExport(){
        $this->checkpdf='1';
        $this->checkexcel='';
        $this->email_export='';
    }

    public function render()
    {
        //iteration es necesario resetear el caché del input file
        $iteration=rand();
        $this->role_permissions = new Permis();
        $users = $this->set_type_query();
        //$data = ['users' => $users,'countries' => $this->countries,'provinces_list' => $this->provinces_list,'cities' => $this->municipies_list,'iteration'=>$this->iteration];
        $data = ['users' => $users,'countries' => $this->countries,'iteration'=>$this->iteration];
        //return view('livewire.admin.users.index',$data)->extends('layouts.admin');

        return view('livewire.admin.users.index',$data);
    }
}
