<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

//models
use App\Models\Category as Cat;

class Category extends Component
{

    public $name;
    public $type=0;
    public $status=0;
    public $cat_id=0;
    public $categories;
    public $catIdTmp;

    public $filter_type;


    //se ha añadido el middleware en el archivo RouteServiceProvider, de forma genérica
    //ya que no encuentra la ruta desde aquí
    public function __construct(){
        //$this->middleware('admin');
    }

    public function mount($filter_type){
        $this->filter_type = $filter_type;

        //$this->categories = Cat::where('type',0)->where('status','1')->orderBy('id','desc')->get();
        //$data = ['categories' => $categories];
    }

    public function set_filter_query($filter_type){
        $cat=[];
        switch($filter_type):
            case '0':
                //$this->filterType = $filterType;
                $cat = Cat::where('status',$filter_type)->orderBy('id','desc')->paginate(20);
                break;
            case '1':                
                $cat = Cat::where('status',$filter_type)->orderBy('id','desc')->paginate(20);
                break;
            case '2':                
                $cat = Cat::onlyTrashed()->orderBy('id','desc')->paginate(20);
                break;
            case '3':                
                $cat = Cat::orderBy('id','desc')->paginate(20);
                break;

        endswitch;
        return $cat;
    }

    public function create(){

        //return redirect()->to('admin')
    }

    public function store(){
        $validated = $this->validate([
            'name' => 'required',
            'type' => 'required',
            'status' => 'required'
        ]);
        $category = Cat::create([
            'name' => $validated['name'],
            'type' => $validated['type'],
            'status' => $validated['status']
        ]);
        session()->flash('message',"Categoría creada correctamente");
        $this->clear2();
        $this->emit('addCategory');
    }

    public function edit($id){
        //sleep(3);
        //registro de la tabla users con el usuario seleccionado
        $cat=Cat::where('id',$id)->first();
        $this->cat_id=$cat->id;
        //(se podría evitar la consulta $user y llamar al método user del modelo 
        //Profile belongsTo...)
        //asignación de datos mediante consulta a tabla users 
        $this->name = $cat->name;        
        $this->type=$cat->type;        
        $this->status=$cat->status;        
    }

    public function update(){
        $validated = $this->validate([
            'name' => 'required',
            'type' => 'required',
            'status' => 'required'
        ]);
        if($this->cat_id){
            $cat = Cat::where('id',$this->cat_id)->first();
            $cat->update([
                'name' => $this->name,
                'type' => $this->type,                
                'status' => $this->status
            ]);
        }
        session()->flash('message','Categoría actualizada correctamente');
        $this->clear2();
        $this->emit('editCategory');
    }
    public function saveCatId($catId){
        $this->catIdTmp=$catId;
    }
    //si se recarga la página tb ser resetea el userIdTmp, en el método mount()
    public function clearCatId(){
        $this->catIdTmp='';
    }

    //eliminación de categoría
    public function delete(){
        if($this->catIdTmp){
            $cat=Cat::where('id',$this->catIdTmp)->first();
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
            $cat->delete();
            session()->flash('message',"Categoría eliminada correctamente");
            $this->clear2();
            $this->emit('confirmDel');
        }
    }

    //limpiar datos de formulario
    public function clear(){
        if($this->cat_id)
            $this->cat_id='';        
        $this->name='';
        $this->type=0;
        $this->status=0;
        //$this->emit('userUpdated');
    }

    public function clear2(){
        $this->clear();
        //resetea todos los campos necesario para input file
        //$this->resetValidation();
    }

    public function render()
    {        
        $query = $this->set_filter_query($this->filter_type);
        $data = ['categ' => $query];
        return view('livewire.admin.categories.index',$data);
    }
}
