<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Address as Addr, App\Models\Location, App\Models\Zone, App\Models\City, App\Models\Province;
use Auth;
use App\Functions\Prov as Pr;
//edit_user
use  Livewire\WithFileUploads;
use App\Functions\Paises, App\Functions\Municipalities, App\Models\User;
class Address extends Component
{
    use WithFileUploads;
    
    public $user_id;
    public $name;
    public $lastname;    
    public $zone;
    public $location;
    public $province;
    public $city;
    public $address_home;
    public $apartment;
    public $cp;
    public $town;
    public $phone;
    public $email;    
    public $business;
    public $nif;
    public $title;
    public $ref;
    public $default;
    

    public $provinces;
    public $cities;
    public $addresses;
    public $selected_default;
    //public $zones;
    //public $locations;
    public $typealert;
    public $addressTmpId;

    //edit_user
    //redeclarado y pasado a $user_id2,phone2,email2,...   
    public $user_id2;
    public $nick;
    
    public $surname;
    public $email2;
    public $profile_image;
    public $thumb;
    //iteration es necesario resetear el caché del input file
    public $iteration;
    public $phone2;
    public $country;
    public $province2;
    public $city2;
    protected $paisesObj;
    public $provinces2;
    public $countries2;
    //provincia seleccionada
    public $prov_id_selected;
    //listado de municipios
    public $municipies_list;
    protected $prov;
    protected $municip;

    //fin edit_user

    public function mount($id){
        $this->user_id = Auth::id();
        //Class Países solo utilizada para obtener los paises (array all)
        $this->paisesObj = new Paises();
        $this->countries2 = $this->paisesObj->all_list;
        $this->prov = new Pr();
        $this->provinces_list = $this->prov->prov;
        $this->municip = new Municipalities();
        $this->municipies_list = $this->municip->cities;
    }

    public function clear(){
        $this->name=null;
        $this->lastname=null;        
        $this->zone = null;
        $this->location=null;
        $this->province = null;
        //$this->country_id=null;
        $this->address_home=null;
        $this->apartment=null;
        $this->cp=null;
        $this->town=null;
        $this->phone=null;
        $this->email=null;        
        $this->business = null;
        $this->nif = null;
        $this->title = null;
        $this->ref=null;
        $this->default;
        
    }

    public function store(){
        $validated = $this->validate([
            'name' => 'required',
            'lastname' => 'required',
            'zone' => 'required',
            'location' => 'required',
            'province' => 'nullable|integer',
            'city' => 'nullable|integer',
            'address_home' => 'required',
            'apartment' => 'nullable',
            'cp' => 'required',
            'town' => 'nullable',
            'phone' => 'required',
            'email' =>'required|email',            
            'business' => 'nullable',
            'nif' => 'nullable',
            'title' => 'nullable',
            'ref' => 'nullable'
        ]);
        //establecemos las direcciones que existan con default a 0
        //para marcar con 1 la nueva dirección creada como predeterminada
        $addresses = Addr::where('user_id',Auth::id())->get();
        if($addresses->count() > 0){
            foreach($addresses as $address){
                $address->update(['default' => 0]);
            }
        }
        $city = Addr::create([
            'name' => $validated['name'],
            'lastname' => $validated['lastname'],
            'zone' => $validated['zone'],
            'location_id' => $validated['location'],
            'province_id' => $validated['province'],
            'city_id' => $validated['city'],
            'address_home' => $validated['address_home'],
            'apartment' => $validated['apartment'],
            'cp' => $validated['cp'],
            'town' => $validated['town'],
            'phone' => $validated['phone'],
            'email' =>$validated['email'],
            'business' => $validated['business'],
            'nif' => $validated['nif'],
            'title' => $validated['title'],
            'ref' => $validated['ref'],
            'user_id' => Auth::id(),
            'default' => 1
        ]);
        $this->emit('addAddress');
        $this->typealert="success";
        session()->flash('message','La dirección ha sido guardada correctamente');
        $this->emit('message_opacity');
        $this->clear();
    }

    public function set_location(){
        $query= Location::where('zone',$this->zone);
        $this->locations = $query->pluck('name','id');
        //obtenemos el id del primer país para que al cambiar el listado de zonas
        //establezca el primero automáticamente
        if(!$this->location)
            $this->location = $query->pluck('id')->first();

        //$loc = $query->pluck('id','name')->first();
        
    }

    //establecer listado de provincias si se selecciona España en listado de país
    public function set_province(){
        //si es España añadimos las provincia
        if($this->location == 58){
            $query = Province::where('location_id',58);            
            $this->provinces = $query->pluck('name','id');
            //obtenemos el id de la primera provincia para que al cambiar el listado de 
            //países se establezca el primero automáticamente, esto solo es viable si 
            //muestra el listado automáticamente, en el caso de España(58)
        if(!$this->province)
            $this->province = $query->pluck('id')->first();
            $this->set_city();
        }else{
            $this->provinces=null;
            $this->cities = null;
        }
    }

    public function set_city(){

        if($this->province){
            //se podría evitar esta consulta, pasando el pluck con 
            //province_id en lugar de id
            $province = Province::findOrFail($this->province);

            $query = City::where('province_id',$province->province_id);
            $this->cities = $query->pluck('name','id');

            if(!$this->city){
                $this->city = $query->pluck('id')->first();
            }else{
                $this->city = null;
            }
        }
    }
    public function save_address_id($id){
        $this->addressTmpId = $id;
    }
    public function clear_address_id(){
        $this->addressTmpId = null;
    }
    public function delete(){
        $address = Addr::findOrFail($this->addressTmpId);
        $address->delete();
        $this->typealert="success";
        session()->flash('message','La dirección ha sido eliminada correctamente');
        $this->emit('confirmDel');
    }

    public function set_default($id){
        if($this->addresses->count() != 1){
            foreach($this->addresses as $adr){
                $adr->update([
                    'default' => 0
                ]);
            }
            $address = Addr::findOrFail($id);
            $address->update(['default' => 1]);    
        }else if ($this->addresses->count() == 1){
            $this->addresses->first()->default=1;
        }
    }

    //edit_user
    public function edit_user(){
        $user = User::findOrFail(Auth::id());
        if($user->id){
            $this->user_id2 = $user->id;
            $this->nick = $user->nick;
            $this->name=$user->name;
            $this->email2=$user->email;
            
            $this->surname=$user->lastname;
            //$this->image=$user->image;
            $this->thumb = $user->thumb;
            $this->phone2=$user->phone;
            $this->country=$user->country;
            $this->province2=$user->province;
            $this->city2 = $user->city;
        }
    }
    public function update(){
        //ocultamos el loading duplicado que se ha iniciado
        $this->emit('loading','loading');
        //dd($this->profile_image);
        if($this->user_id2){
            $validated = $this->validate([
                'nick' => 'required',
                'name' => 'required',
                'surname' => 'required',
                'phone2' => 'nullable',
                'country' => 'nullable',
                'province2' => 'nullable',
                'city2' => 'nullable',
                'profile_image' =>'nullable|image'
            ]);
            
            if($this->user_id2){
                $user = User::where('id',$this->user_id2)->first();
                $user->update([
                    'nick' => $validated['nick'],
                    'name' => $validated['name'],                
                    'lastname' => $validated['surname'],
                    'phone' => $validated['phone2'],
                    'country' => $validated['country'],
                    'province' => $validated['province2'],
                    'city' => $validated['city2'],
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
            $this->typealert = 'success';
            session()->flash('message','Usuario actualizado correctamente');
            $this->emit('message_opacity');
            $this->clear2();
            $this->emit('editUser');
        }

    }

    //limpiar datos de formulario
    public function clear1(){
        
        $this->user_id2='';
        $this->nick='';
        $this->name='';
        $this->surname='';
        $this->profile_image=null;
        //iteration es necesario resetear el caché del input file
        $this->iteration=rand();
    }

    public function clear2(){
        $this->clear1();
        //resetea todos los mensajes
        $this->resetValidation();
    }
    //fin_edit_user



    public function render()
    {
        $this->addresses = Addr::where('user_id',$this->user_id)->get();        
        //$locations = Location::where('status',1)->get();
        $zones = Zone::pluck('name','id');
        if(!$this->zone)
            $this->zone = Zone::first()->id;
        $partial_location = Location::where('zone',$this->zone);
        $locations = $partial_location->pluck('name','id');
        if(!$this->location)
            $this->location = $partial_location->first()->id;
        $data = ['addresses' => $this->addresses,'zones' => $zones,'locations' => $locations];
        
        return view('livewire.addresses.address',$data)->extends('layouts.main');
    }
}
