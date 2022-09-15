<?php

namespace App\Http\Livewire;

use Livewire\Component;
//edit_user
use App\Functions\Paises, App\Functions\Prov as Pr, App\Functions\Municipalities, App\Models\User;
use Auth;
use Livewire\WithFileUploads;
class EditUser extends Component
{
    use WithFileUploads;
    //edit_user
    //redeclarado y pasado a $user_id2   
    public $user_id;
    public $nick;
    
    public $surname;
    public $email;
    public $profile_image;
    public $thumb;
    //iteration es necesario resetear el caché del input file
    public $iteration;
    public $phone;
    public $country;
    public $province;
    public $city;
    protected $paisesObj;
    public $provinces;
    public $countries;
    //provincia seleccionada
    public $prov_id_selected;
    //listado de municipios
    public $municipies_list;
    protected $prov;
    protected $municip;
    //fin edit_user
    public $typealert='success';
    //buscador global
    public $search_product;
    
    public function mount(){
        $this->user_id = Auth::id();
        //Class Países solo utilizada para obtener los paises (array all)
        $this->paisesObj = new Paises();
        $this->countries = $this->paisesObj->all_list;
        $this->prov = new Pr();
        $this->provinces_list = $this->prov->prov;
        $this->municip = new Municipalities();
        $this->municipies_list = $this->municip->cities;
        $this->edit_user();
    }

    //redirección del buscador genérico
    public function go_to_search(){
        return redirect()->route('store',['category' => 0,'subcategory'=>0,'type' =>$this->search_product]);
    }

    //edit_user
    public function edit_user(){
        $user = User::findOrFail(Auth::id());
        if($user->id){
            $this->user_id = $user->id;
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

        }
    }
    public function update(){
        //ocultamos el loading duplicado que se ha iniciado
        $this->emit('loading','loading');
        //dd($this->profile_image);
        if($this->user_id){
            $validated = $this->validate([
                'nick' => 'required',
                'name' => 'required',
                'surname' => 'required',
                'phone' => 'nullable',
                'country' => 'nullable',
                'province' => 'nullable',
                'city' => 'nullable',
                'profile_image' =>'nullable|image'
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
            $this->edit_user();
            $this->typealert = 'success';
            session()->flash('message','Usuario actualizado correctamente');
            $this->emit('message_opacity');
            //$this->clear2();
            /*
            $this->emit('message_opacity');
            $this->clear2();
            $this->emit('editUser');
            */
        }

    }

    //limpiar datos de formulario
    public function clear(){
        //anulamos el reset a user_id
        //$this->user_id='';
        $this->nick='';
        $this->name='';
        $this->surname='';
        $this->profile_image=null;
        //iteration es necesario resetear el caché del input file
        $this->iteration=rand();
    }

    public function clear2(){
        $this->clear();
        //resetea todos los mensajes
        $this->resetValidation();
    }
    //fin_edit_user
    public function render()
    {
        $data=['iteration'=>$this->iteration];
        return view('livewire.home.edituser',$data)->extends('layouts.main');
    }
}
