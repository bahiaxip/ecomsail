<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use  Livewire\WithFileUploads;

use App\Models\Product as Prod;
use Illuminate\Http\Request;
use App\Models\Category;
use Str;
class Product extends Component
{
    use WithFileUploads;
    public $name;
    public $status=0;
    public $category=0;
    //public $category_id=0;
    public $subcategory_id;    
    public $detail=null;

    public $image;
    public $code;
    public $price=1.00;
    public $stock=1;
    public $state_discount;
    public $discount;
    public $init_date_discount;
    public $end_date_discount;
    public $short_detail;
    public $prod_id;

    //edit
    public $availability;
    public $weight;    
    public $long;
    public $width;
    public $height;    
    public $tax;
    public $attachment;
    public $detail2 = null;
    //temporal de confirmación
    public $prodIdTmp;
    //tipo de filtrado (publico,borrador,reciclaje,todos)
    public $filter_type;
    
    public $typealert;

    //personalizamos el nombre del atributo de los mensajes de error
    protected $validationAttributes = [
        'short_detail' => 'descipción corta',
        'category' => 'categoría',
        'detail' => 'descripción',
        'image' => 'imagen'

    ];
    public function mount($filter_type){
        $this->filter_type = $filter_type;    
    }
    public function updated(){
        
    }

    public function set_filter_query($filter_type){
        $prod=[];
        switch($filter_type):
            case '0':
                //$this->filterType = $filterType;
                $prod = Prod::where('status',$filter_type)->orderBy('id','desc')->paginate(20);
                break;
            case '1':                
                $prod = Prod::where('status',$filter_type)->orderBy('id','desc')->paginate(20);
                break;
            case '2':                
                $prod = Prod::onlyTrashed()->orderBy('id','desc')->paginate(20);
                break;
            case '3':                
                $prod = Prod::orderBy('id','desc')->paginate(20);
                break;

        endswitch;
        return $prod;
    }



    public function store(){
        //regex con validación con coma y punto de máximo 2 decimales
        $validated = $this->validate([
            'name' => 'required',
            'category' => 'required|gt:0',
            'price' => ['required','numeric','regex:/^(\d+)(,\d{1,2}|\.\d{1,2})?$/'],
            'status' => 'required',
            'code' => 'nullable',
            'stock' => 'required|gt:0',
            'short_detail' => 'required|max:40',
            'detail' => 'required',
            'image' => 'nullable|image'
        ]);
        
        //convertimos a double y formateamos a 2 decimales           
        //$float_price = floatval($validated['price']);        
        //$price = number_format($float_price,2);        
        //creamos registro
        //dd($price);
        $product = Prod::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'category_id' => $validated['category'],
            'subcategory_id' => 0,
            'price' => $validated['price'],
            'status' => $validated['status'],
            'code' => $validated['code'],
            'stock' => $validated['stock'],
            'detail' =>$validated['detail'],
            'short_detail' => $validated['short_detail'],
        ]);

        if($validated['image'] !== null){
//comprobar si existe imagen y eliminar la anterior
            $image_name = $this->image->getClientOriginalName();
            $ext = $this->image->getClientOriginalExtension();            
            //almacenamos con el método store que genera un nombre de archivo aleatorio
            $path_date= date('Y-m-d');
            $image = $this->image->store('public/files/'.$path_date,'');
            $path_tag = 'public/files/'.$path_date.'/';
            //eliminamos el directorio public
            $imagelesspublic = substr($image,7);
            $thumb = $image;
            //dd($ext);
            $product->update([
                'image' => $imagelesspublic,
                'thumb' => $imagelesspublic,
                'file_name' => $image_name,
                'file_ext' => $ext,
                'path_tag' => $path_tag                
            ]);
        }
//prueba para añadir excepciones en caso de error en la vista
        if(!$product){
            $errorProduct = "Se produjo un error";
            $this->typalert = 'danger';
        }

        $this->typealert = 'success';
        //dd($validated['category']);
        session()->flash('message',"Producto creado correctamente");
        $this->clear2();
        $this->emit('addProduct');
    }

    public function edit($id){
        //sleep(3);
        //registro de la tabla users con el usuario seleccionado
        $prod=Prod::where('id',$id)->first();
        $this->prod_id=$prod->id;
        //(se podría evitar la consulta $user y llamar al método user del modelo 
        //Profile belongsTo...)
        //asignación de datos mediante consulta a tabla users 
        $this->name = $prod->name;        
        $this->detail=$prod->detail;
        $this->category = $prod->category_id;
        $this->status=$prod->status;
        $this->price = $prod->price;
        $this->short_detail = $prod->short_detail;
        $this->stock = $prod->stock; 
        $this->typealert = 'success';
        //$this->availability = $p
        $this->emit('description2',$this->detail);       
    }

    public function update(){        
        $validated = $this->validate([
            'name' => 'required',
            'category' => 'required|gt:0',
            'price' => ['required','numeric','regex:/^(\d+)(,\d{1,2}|\.\d{1,2})?$/'],
            'status' => 'required',
            'code' => 'nullable',
            'stock' => 'required|gt:0',
            'short_detail' => 'required',
            'detail' => 'required',
        ]);

        if($this->prod_id){
            $prod = Prod::where('id',$this->prod_id)->first();
            $prod->update([
                'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'category_id' => $validated['category'],
            'subcategory_id' => 0,
            'price' => $validated['price'],
            'status' => $validated['status'],
            'code' => $validated['code'],
            'stock' => $validated['stock'],
            'detail' =>$validated['detail'],
            'short_detail' => $validated['short_detail'],
            ]);
        }
        $this->typealert = 'success';

        session()->flash('message','Producto actualizado correctamente');
        $this->clear2();
        $this->emit('editProduct');
    }

    public function saveProdId($prodId){
        $this->prodIdTmp=$prodId;
    }
    //si se recarga la página tb ser resetea el userIdTmp, en el método mount()
    public function clearProdId(){
        $this->prodIdTmp='';
    }

    //eliminación de categoría
    public function delete(){
        if($this->prodIdTmp){
            $prod=Prod::where('id',$this->prodIdTmp)->first();
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
            $prod->delete();
            session()->flash('message',"Producto eliminado correctamente");
            $this->clear2();
            $this->emit('confirmDel');
        }
    }
    //se inicia cada vez que mostramos el modal que contiene editor
    public function setckeditor(){        
        $this->emit('description1');
    }

    //limpiar datos de formulario
    public function clear(){
        if($this->prod_id)
            $this->prod_id='';        
        $this->name='';
        $this->category = 0;
        $this->price = 1.00;
        $this->status = 0;
        $this->image = null;
        $this->code = null;
        $this->short_detail = null;
        $this->detail = '';
        


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
        $cats = Category::where('status',1)->where('type',0)->orderBy('id','desc')->pluck('name','id');
        $cats->prepend('Ninguna', 0);
        $data = ['products' => $query,'cats'=> $cats];
        return view('livewire.admin.products.index',$data);
    }

}
