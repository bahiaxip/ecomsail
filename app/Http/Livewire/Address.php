<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Address as Addr, App\Models\Location, App\Models\Zone, App\Models\City, App\Models\Province;
use Auth;
use App\Functions\Prov as Pr;

class Address extends Component
{
    
    
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
    public $address_selected;
    public $selected_default;
    //public $zones;
    //public $locations;
    public $typealert;
    public $addressTmpId;
    //buscador global
    public $search_product;
    //personalizamos el nombre del atributo de los mensajes de error
    protected $validationAttributes = [
        'lastname' => 'apellidos',
        'address_home' => 'dirección',
        'cp' => 'código postal',        
    ]; 
    public function mount($id){
        $this->user_id = Auth::id();
        $this->addresses = Addr::where('user_id',$this->user_id)->get();
        $counter_default=0;
        //comprobamos si ha habido algún error y existen más de una dirección por defecto, 
        //en ese caso mantenemos solo la primera obtenida, es una forma de corregir
        //en caso de error o conflicto anterior.
        foreach($this->addresses as $address){
            if($address->default == 1){
                if($counter_default > 0)
                    $address->update(['default' => 0]);
                else
                    $counter_default++;
            }
        }
        //dd($counter_default);
    }

    //redirección del buscador genérico
    public function go_to_search(){
        if($this->search_product)
            return redirect()->route('store',['category' => 0,'subcategory'=>0,'type' =>$this->search_product]);
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
        //cerrar el modal
        $this->emit('addAddress');        
        $this->set_session('success','Dirección creada','La dirección ha sido creada correctamente');
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
    //anulados por nuevo modal
    /*
    public function save_address_id($id){
        $this->addressTmpId = $id;
    }
    public function clear_address_id(){
        $this->addressTmpId = null;
    }
    */
    //método que se ejecuta después de renderizar (exceptuando la primera vez que carga la 
    //página, en ese caso se puede usar mount()
    public function dehydrate()
    {
        if(session('message.title')){
            $this->dispatchBrowserEvent('eventModal',['data' => ['status' => $this->typealert]]);
        }
        //$this->dispatchBrowserEvent('initSomething',['dato'=>'dato']);
    //if(session('message.title')){
            
            //$this->emit('modal',['status' => 'success']);
    //}else{
    //        $this->dispatchBrowserEvent('modal',['midato' => ['dato1' => 'hola','dato2'=>'hola2']]);
            //$this->dispatchBrowserEvent('initSomething',['midato' => "datos"]);
    //}
    }
    //establecer session temporal
    public function set_session($typealert,$title,$message){
        $this->typealert=$typealert;
        $data = [
            'message' => $message,
            'title' => $title,
            'status' => $typealert
        ];
        session()->flash('message',$data);
    }
    public function delete($id){
        $address = Addr::find($id);
        //si no existe devolvemos modal de error
        if(!$address){
            $this->set_session('danger','Error','Se originó un error y no se pudo eliminar la dirección');
            return false;
        }
        //si la dirección a eliminar es la establecida por defecto, comprobamos si existen 
        //direcciones y establecemos la primera obtenida por defecto
        if($address->default == 1){
            $count_addresses = $this->addresses = Addr::where('user_id',$this->user_id)->count();
            if($count_addresses >= 1){
                $default_address = Addr::where('user_id',$this->user_id)->first();
                $default_address->update(['default' => 1]);
            }    
        }
        //eliminamos
        $address->delete();
        $this->set_session('success','Dirección eliminada','La dirección ha sido eliminada correctamente');
        //el emit "modal" se ejecuta ahora en el método(hook de livewire) "dehydrate()"
        //$this->emit('modal',['status' => $data['status']]);
    }
    //establecer dirección como predeterminada
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
