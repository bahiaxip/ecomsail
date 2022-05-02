<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use  Livewire\WithFileUploads;
use Livewire\WithPagination;
//models
use App\Models\Category as Cat,App\Models\Product;
use Illuminate\Http\Request;
use Str;

class Category extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $home="nada";
    public $name;
    public $type=0;
    public $status=0;
    public $icon;
    public $thumb;
    public $file_name;
    public $cat_id=0;
    public $description;
    //public $categories;
    public $catIdTmp;

    public $filter_type;
    public $subcat;
    public $subcatname;
    public $typealert='success';
    public $count_cat;

    //campo de búsqueda (wire:model)
    public $search_data;
    //orden columnas (asc/desc)
    public $orderType;

    //el construct genera conflictos con el parámetro
    //@this para manejar los datos desde javascript
    /*
    public function __construct(){
        //$this->middleware('admin');        
    }
    */
    public function mount($filter_type){
        
        //reseteamos subcat
//se debería revisar si existe subcategoría al recargar la página
//y establecer el link de subcategorías
        //$this->subcat = null;

        $this->filter_type = $filter_type;

        //$this->categories = Cat::where('type',0)->where('status','1')->orderBy('id','desc')->get();
        //$data = ['categories' => $categories];
    }
    //filtrado de categorías (Borrador/Público/Reciclaje/Todos)
    public function set_filter_query($filter_type,$subcat=null){
        $cat=[];
        $typecat=0;
        if($subcat){
            $typecat=$subcat;
        }
        switch($filter_type):
            case '0':
                //$this->filterType = $filterType;
                $cat = Cat::where('status',$filter_type)->where('type',$typecat)->orderBy('id','desc')->paginate(10);
                break;
            case '1':                
                $cat = Cat::where('status',$filter_type)->where('type',$typecat)->orderBy('id','desc')->paginate(10);
                break;
            case '2':                
                $cat = Cat::onlyTrashed()->orderBy('id','desc')->where('type',$typecat)->paginate(10);
                break;
            case '3':                
                $cat = Cat::orderBy('id','desc')->where('type',$typecat)->paginate(10);
                break;

        endswitch;
        return $cat;
    }

    public function set_type_query(){
        $query;
        if($this->search_data){
            $query= $this->set_filter_query($this->filter_type);
            $search_data = '%'.$this->search_data.'%';
            if($this->filter_type==2){
                $query = Cat::onlyTrashed()->where('name','LIKE',$search_data)->paginate(10);
            }else{
                $query = Cat::where('name','LIKE',$search_data)->where('status',$this->filter_type)->paginate(10);    
            }
        }
        else{
            $query= $this->set_filter_query($this->filter_type,$this->subcat);
        }
        return $query;
    }



    public function create(){

        //return redirect()->to('admin')
    }

    public function store(){
        
        //$this->emit('description1',$this->description);
        $validated = $this->validate([
            'name' => 'required',            
            'type' => 'required',
            'status' => 'required',
            'icon' => 'nullable',
            'description' => 'nullable'
        ]);
        $icon;
        $icon_name;
        $thumb;
        $iconlesspublic="";
        $icon_name="";        
        $ext;

//comprobar si existe otro slug igual
        $category = Cat::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'type' => $validated['type'],
            'status' => $validated['status'],           
            'description' => $this->description,
        ]);        
        if($validated['icon'] !== null){
//comprobar si existe imagen y eliminar la anterior
            $icon_name = $this->icon->getClientOriginalName();
            $ext = $this->icon->getClientOriginalExtension();            
            //almacenamos con el método store que genera un nombre de archivo aleatorio
            $path_date= date('Y-m-d');
            $icon = $this->icon->store('public/files/'.$path_date,'');
            $path_tag = 'public/files/'.$path_date.'/';
            //eliminamos el directorio public
            $iconlesspublic = substr($icon,7);
            $thumb = $icon;
            //dd($ext);
            $category->update([
                'image' => $iconlesspublic,
                'thumb' => $iconlesspublic,
                'file_name' => $icon_name,
                'file_ext' => $ext,
                'path_tag' => $path_tag                
            ]);
        }
        $this->typealert="success";
        //el session()->flash() genera error con el setData de ckeditor
        //para solucionarlo realizamos el setData() cuando abre el modal
        //Agregar categoría,la pega es que al agregar otra se cierra 
        //el mensaje de session() sin esperar los segundos
        session()->flash('message',"Categoría creada correctamente");
        //session()->put('message',"Categoría creada correctamente");
        //session()->now('typealert','success');
        $this->clear2();
        $this->emit('addCategory');
        //limpiamos el textarea de ckeditor
    }

    public function edit($id){
        if($this->filter_type == 2):
            $cat=Cat::onlyTrashed()->where('id',$id)->first();
        else:
            $cat=Cat::where('id',$id)->first();
        endif;

        $this->cat_id=$cat->id;
        //(se podría evitar la consulta $user y llamar al método user del modelo 
        //Profile belongsTo...)
        //asignación de datos mediante consulta a tabla users 
        $this->name = $cat->name;        
        $this->type=$cat->type;        
        $this->status=$cat->status;
        $this->description = $cat->description;
        $this->file_name = $cat->file_name;
        //$this->icon = $cat->image;
        $this->thumb = $cat->thumb;
        $this->typealert="success";
        $this->emit('description2',$this->description);        

    }

    public function update(){
        if($this->cat_id){            
            $validated = $this->validate([
                'name' => 'required',
                'type' => 'required',
                'status' => 'required',
                'icon' => 'nullable|image',
                'description' => 'nullable|string'
            ]);
            $icon;
            $icon_name;
            $thumb;
            $iconlesspublic;
            $icon_name;
            //dd($validated['icon'] );
            $cat = Cat::where('id',$this->cat_id)->first();
            if($validated['icon'] === null ){            
                //dd($validated['icon']);
                $cat->update([
                    'name' => $validated['name'],
                    'slug' => Str::slug($validated['name']),
                    'type' => $validated['type'],                
                    'status' => $validated['status'],                
                    'description' => $validated['description']
                ]);
            }else{
                
    //comprobar si existe imagen y eliminar la anterior            
                $icon_name = $this->icon->getClientOriginalName();
                $ext = $this->icon->getClientOriginalExtension();
                //almacenamos con el método store que genera un nombre de archivo aleatorio
                $path_date= date('Y-m-d');
                $icon = $this->icon->store('public/files/'.$path_date,'');
                $path_tag = 'public/files/'.$path_date.'/';                
                //eliminamos el directorio public
                $iconlesspublic = substr($icon,7);
                $thumb = $icon;

                $cat->update([
                    'name' => $this->name,
                    'slug' => Str::slug($validated['name']),
                    'type' => $this->type,                
                    'status' => $this->status,
                    'image' => $iconlesspublic,
                    'thumb' => $iconlesspublic,
                    'file_name' => $icon_name,
                    'description' => $this->description,
                    'file_ext' => $ext,
                    'path_tag' => $path_tag
                ]);    
                
            }
        }
        $this->typealert="success";
        session()->flash('message','Categoría actualizada correctamente');
        $this->clear2();
        $this->emit('editCategory');
    }
    public function saveCatId($catId){
        //dd($catId);
        $this->catIdTmp=$catId;
        $this->count_cat = Product::where('category_id',$catId)->count();        
    }
    //si se recarga la página tb ser resetea el userIdTmp, en el método mount()
    public function clearCatId(){
        $this->catIdTmp='';
    }

    //botón X de buscador para eliminar datos de búsqueda
    public function clearSearch(){
        $this->search_data='';
    }
    public function updated(){
        //$this->description="eooo";
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
            $this->typealert='danger';
            session()->flash('message', "Categoría eliminada correctamente");

            //session()->flash('typealert' , 'success');
            $this->clear2();
            $this->emit('confirmDel');
        }
    }

    //restaurar producto
    public function restore($id){
        $cat = $cat=Cat::onlyTrashed()->where('id',$id)->first();
        $cat->restore();
        $this->typealert = 'success';
        session()->flash('message',"Categoría restaurada correctamente");

    }

    //limpiar datos de formulario
    public function clear(){
        if($this->cat_id)
            $this->cat_id='';        
        $this->name='';
        $this->type=0;
        $this->status=0;
        $this->description="";
        $this->icon = null;
        $this->file_name="";
        $this->thumb= "";
        //$this->emit('userUpdated');
    }

    public function clear2(){
        $this->clear();
        //resetea todos los mensajes de error
        $this->resetValidation();
    }
    public function setckeditor(){
        $this->emit('description1');
    }

    public function renderSubCat($subcat_id,$name){
        $this->subcatname=$name;
        //falta pasar a active la clase subcat de <li> para subcategorías
        $this->emit('subcat',$subcat_id,$name);
        $this->subcat=$subcat_id;
    }

    public function render()
    {
        /*
        $subcat=null;        
        if($this->subcat){

            $subcat=$this->subcat;            
            $query = $this->set_filter_query($this->filter_type,$subcat);
        }else{            
            //$query = $this->set_filter_query($this->filter_type);    
            $query = $this->set_type_query();
        }
        */
        $query = $this->set_type_query();
        //iteration es necesario resetear el caché del input file
        $iteration=rand();
        //$cats[0] = 'Ninguna';
        $cats = Cat::where('status',1)->where('type',0)->orderBy('id','desc')->pluck('name','id');
        //añadimos al comienzo la opción por defecto
        $cats->prepend('Ninguna','0');
        //dd($cats);        
        $data = ['categories' => $query,'filter_type' => $this->filter_type,'cats' => $cats,'iteration' => $iteration,'typealert' => $this->typealert,'subcatname' => $this->subcatname];

        return view('livewire.admin.categories.index',$data);
    }
}
