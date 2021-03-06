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

    public function mount($id){
        $this->user_id = Auth::id();
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
        //para marcar con 1 la nueva direcci??n creada como predeterminada
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
        session()->flash('message','La direcci??n ha sido guardada correctamente');
        $this->emit('message_opacity');
        $this->clear();
    }

    public function set_location(){
        $query= Location::where('zone',$this->zone);
        $this->locations = $query->pluck('name','id');
        //obtenemos el id del primer pa??s para que al cambiar el listado de zonas
        //establezca el primero autom??ticamente
        if(!$this->location)
            $this->location = $query->pluck('id')->first();

        //$loc = $query->pluck('id','name')->first();
        
    }

    //establecer listado de provincias si se selecciona Espa??a en listado de pa??s
    public function set_province(){
        //si es Espa??a a??adimos las provincia
        if($this->location == 58){
            $query = Province::where('location_id',58);            
            $this->provinces = $query->pluck('name','id');
            //obtenemos el id de la primera provincia para que al cambiar el listado de 
            //pa??ses se establezca el primero autom??ticamente, esto solo es viable si 
            //muestra el listado autom??ticamente, en el caso de Espa??a(58)
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
            //se podr??a evitar esta consulta, pasando el pluck con 
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
        session()->flash('message','La direcci??n ha sido eliminada correctamente');
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
