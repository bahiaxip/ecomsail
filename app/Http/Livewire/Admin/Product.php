<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use  Livewire\WithFileUploads;

use App\Models\Product as Prod;
use Illuminate\Http\Request;
use App\Models\Category, App\Models\SettingsProducts, App\Models\InfopriceProducts, App\Models\Attribute as Attr, App\Models\Combination as Comb, App\Models\ImagesProducts;
use Str;
class Product extends Component
{
    use WithFileUploads;
    public $name;
    public $status=0;
    public $category=0;    
    //public $category_id=0;
    public $subcategory=0;    
    public $detail=null;

    public $image;
    //iteration es necesario resetear el caché del input file        
    public $iteration;
    public $code;
    public $price;
    public $stock;
    public $state_discount;
    
    public $short_detail;
    public $prod_id;

    //settings edit
    public $availability=0;
    public $product_state=0;
    //notificación mínimo stock activar/desactivar
    public $selected_minstock;
    public $not_minstock;
    //email mínimo stock activar/desactivar
    public $email_minstock;
    //stock mínimo
    public $minstock;
    //archivo adjunto
    public $attachment;
    //plazo de entrega determinado/personalizado
    public $delivery_time=0;
    //entrega personalizada (días)
    public $custom_delivery;
    public $custom_delivery_disabled="false";
    //gasto adicional de entrega
    public $amount_delivery;
    //dimensiones en settings
    public $long;
    public $width;
    public $height;
    public $weight;    
    
    //infoprice edit
    public $type_tax;
    public $tax;
    public $partial_price;
    public $discount_type;
    public $discount;    
    public $init_discount;
    public $end_discount;
    
    
    public $detail2 = null;
    //temporal de confirmación, quizás se podría usar $prod_id
    public $prodIdTmp;
    //tipo de filtrado (publico,borrador,reciclaje,todos)
    public $filter_type;
    
    public $typealert;
     //campo de búsqueda (wire:model)
    public $search_data;
    //orden columnas (asc/desc)
    public $orderType;

    public $list_combinations;
    public $combinations;
    //id de combinación para eliminar mediante confirmación
    public $combtmp_id;
    public $images_products;

    //importe adicional de combinaciones
    public $added_price;
    public $final_price;

    //personalizamos el nombre del atributo de los mensajes de error
    protected $validationAttributes = [
        'short_detail' => 'descipción corta',
        'category' => 'categoría',
        'detail' => 'descripción',
        'image' => 'imagen'

    ];

//comprobar antes si existen categorías, si no, mostrar enlace a crear categoría
    public function mount($filter_type){
        $this->filter_type = $filter_type;

    }

    public function setCheckbox(){
        dd($this->not_minstock);
    }
    public function updated(){
        //dd($this->delivery_term);
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

    public function set_type_query(){
        $query;
        if($this->search_data){
            $query= $this->set_filter_query(1);
            $search_data = '%'.$this->search_data.'%';
            if($this->filter_type==2){
                $query = Prod::onlyTrashed()->where('name','LIKE',$search_data)->paginate(10);
            }else{
                $query = Prod::where('name','LIKE',$search_data)->where('status',$this->filter_type)->paginate(10);    
            }
        }
        else{
            $query= $this->set_filter_query($this->filter_type);
        }
        return $query;
    }


//comprobar si existe otro slug igual
    public function store(){
        //regex con validación con coma y punto de máximo 2 decimales
        $validated = $this->validate([
            'name' => 'required',
            'status' => 'required',
            'category' => 'required|gt:0',
            'subcategory' =>'nullable',
            'image' => 'nullable|image',
            'code' => 'nullable',
            'price' => ['required','numeric','regex:/^(\d+)(,\d{1,2}|\.\d{1,2})?$/'],
            'stock' => 'required|gt:0',
            'short_detail' => 'required|max:40',
            'detail' => 'required',
        ]);
        
        //convertimos a double y formateamos a 2 decimales           
        //$float_price = floatval($validated['price']);        
        //$price = number_format($float_price,2);        
        //creamos registro
        //dd($price);
        $product = Prod::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'status' => $validated['status'],
            'category_id' => $validated['category'],
            'subcategory_id' => 0,
            'code' => $validated['code'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'short_detail' => $validated['short_detail'],
            'detail' =>$validated['detail'],
        ]);

        $settings_prod = SettingsProducts::create([
            'product_id' => $product->id
        ]);
        $infoprice_prod = InfopriceProducts::create([
            
            'product_id' => $product->id
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

        //necesario detectar si es un elemento de reciclaje
        if($this->filter_type == 2):
            $prod=Prod::onlyTrashed()->where('id',$id)->first();            
        else:
            $prod=Prod::where('id',$id)->first();
        endif;
        $this->prod_id=$prod->id;
        //(se podría evitar la consulta $user y llamar al método user del modelo 
        //Profile belongsTo...)
        //asignación de datos mediante consulta a tabla users 
        $this->name = $prod->name;
        $this->status=$prod->status;
        $this->category = $prod->category_id;
        $this->subcategory = 0;
        $this->code = $prod->code;
        $this->price = $prod->price;
        $this->stock = $prod->stock;
        $this->short_detail = $prod->short_detail;
        $this->detail=$prod->detail;
        
        $this->typealert = 'success';
        //pasamos el contenido del textarea de ckeditor
        $this->emit('description2',$this->detail);       
    }
    //recarga las imágenes de la galería al subir imágenes
    public function reload_image_products($id){
        //renderizamos las imágenes de la galería
        $this->images_products = ImagesProducts::where('product_id',$id)->get();
        //renderizamos la lista del drag&drop, por si hubiera algunas añadidas
        $this->emit('reload_images',$id);
    }

    public function edit_settings_product($id){

        $this->prod_id = $id;
        //para el precio $prod
        $prod = Prod::findOrFail($id);
        $this->price = $prod->price;
        //distinguimos estado de reciclaje del resto de estados en settings
        if($this->filter_type == 2):
            $settings_prod = SettingsProducts::onlyTrashed()->where('product_id',$id)->first();
        else:
            $settings_prod = SettingsProducts::where('product_id',$id)->first();
        endif;
        $this->availability = $settings_prod->availability;
        $this->product_state = $settings_prod->product_state;
        //es necesario pasarlo como boolean,así que usamos filter_var para convertir a bool
        //$this->not_minstock = $settings_prod->not_minstock;
        $this->not_minstock = filter_var($settings_prod->not_minstock,FILTER_VALIDATE_BOOLEAN);
        $this->email_minstock = filter_var($settings_prod->email_minstock,FILTER_VALIDATE_BOOLEAN);
        //$this->email_minstock = $settings_prod->email_minstock;
        $this->minstock = $settings_prod->minstock;
        //solo útil si no se modifica, si se modifica se hace uso del onclick()
        $this->delivery_time = $settings_prod->delivery_time;
        $this->custom_delivery = $settings_prod->custom_delivery;
        $this->amount_delivery = $settings_prod->amount_delivery;
        $this->long = $settings_prod->long;
        $this->width = $settings_prod->width;
        $this->height = $settings_prod->height;
        $this->weight = $settings_prod->weight;
        //distinguimos estado de reciclaje del resto de estados en price
        if($this->filter_type == 2):
            $infoprice_prod = InfopriceProducts::onlyTrashed()->where('product_id',$id)->first();
        else:
            $infoprice_prod = InfopriceProducts::where('product_id',$id)->first();
        endif;
        $this->type_tax=$infoprice_prod->type_tax;
        $this->tax =  $infoprice_prod->tax;
        $this->partial_price= $infoprice_prod->partial_price;
        $this->discount_type = $infoprice_prod->discount_type;
        $this->discount = $infoprice_prod->discount;
        $this->init_discount = $infoprice_prod->init_discount;
        $this->end_discount = $infoprice_prod->end_discount;
        $this->detail2=$infoprice_prod->aditional_detail;
        $this->emit('description3',$this->detail2);
        $this->typealert = 'success';        
        //pasamos el contenido del textarea de ckeditor
        
        //combinations
        $this->combinations = Comb::where('product_id',$id)->get();
        //imágenes de productos (galería)
        $this->images_products = ImagesProducts::where('product_id',$id)->get();
    }

    public function update_settings_products($id,$delivery_time){
        $validated = $this->validate([
            //settings
            'availability' => 'required|integer',
            'product_state' => 'required',
            'not_minstock' => 'required',
            'email_minstock' => 'nullable',
            'minstock' => 'nullable|integer',
            'attachment' => 'nullable',            
            'custom_delivery' => 'nullable|integer',
            'amount_delivery' => 'nullable',
            'long' => 'nullable',
            'width' => 'nullable',
            'height' => 'nullable',
            'weight' => 'nullable', 
            //price
            'type_tax' => 'required',
            'tax' => 'required',
            'partial_price' => 'nullable',
            'price' => 'required',
            'discount_type' => 'required|integer',
            'discount' => 'required|integer',
            'init_discount' => 'nullable',
            'end_discount' => 'nullable',
            'detail2' => 'nullable'
        ]);

        $prod = Prod::findOrFail($id);
        $prod->update([
            'price' => $validated['price']
        ]);

        if($delivery_time === null)
            $delivery_time=$this->delivery_time;
        
        //checkboxes de entrega
        $not_minstock = (!$this->not_minstock) ? 'false':'true';
        $email_minstock = (!$this->email_minstock) ? 'false':'true';
        //settings
        $settings_prod = SettingsProducts::where('product_id',$id)->first();
        $settings_prod->update([
            'availability' => $validated['availability'],
            'product_state' => $validated['product_state'],
            'not_minstock' => $not_minstock,
            'email_minstock' => $email_minstock,
            'minstock' => $validated['minstock'],            
            'attachment' => $validated['attachment'],            
            'delivery_time' => $delivery_time,
            'custom_delivery' => $validated['custom_delivery'],
            'amount_delivery' => $validated['amount_delivery'],
            'long' => $validated['long'],
            'width' => $validated['width'],
            'height' => $validated['height'],
            'weight' => $validated['weight'],
        ]);
        //price
        $infoprice_prod = InfopriceProducts::where('product_id',$id);
        $infoprice_prod->update([
            'type_tax' => $validated['type_tax'],
            'tax' => $validated['tax'],
            'partial_price' => $validated['partial_price'],
            'discount_type' => $validated['discount_type'],
            'discount' => $validated['discount'],
            'init_discount' => $validated['init_discount'],
            'end_discount' => $validated['end_discount'],
            'aditional_detail' => $validated['detail2']
        ]);
        
        $this->typealert = 'success';        
        session()->flash('message',"Configuración actualizada correctamente");
        $this->clear_settings();
        $this->emit('settings');

    }
//detectar si es onlyTrashed
    public function update(){
        $this->emit('loading','loading');
        $validated = $this->validate([
            'name' => 'required',
            'category' => 'required|gt:0',
            'price' => ['required','numeric','regex:/^(\d+)(,\d{1,2}|\.\d{1,2})?$/'],
            'status' => 'required',
            'code' => 'nullable',
            'stock' => 'required|gt:0',
            'short_detail' => 'required',
            'detail' => 'required',
            'image' => 'nullable|image',

            'availability' => 'required',
            'product_state' =>'required',
            'long' =>['nullable','numeric','regex:/^(\d+)(,\d{1,2}|\.\d{1,2})?$/'],
            'width' =>['nullable','numeric','regex:/^(\d+)(,\d{1,2}|\.\d{1,2})?$/'],
            'height' =>['nullable','numeric','regex:/^(\d+)(,\d{1,2}|\.\d{1,2})?$/'],
            'weight' =>['nullable','numeric','regex:/^(\d+)(,\d{1,2}|\.\d{1,2})?$/'],
            //'attachment' => 'nullable|mimetypes:application/pdf',
            'attachment' => 'nullable|mimes:pdf,ppt,doc,docx,xls,xlsx',

            'type_tax' => 'required|integer',
            'tax' => 'required|integer',
            'partial_price' => 'nullable',
            'discount_type' =>'nullable|integer',
            'discount' => 'nullable|integer',
            'init_discount' => 'nullable|date',
            'end_discount' => 'nullable|date',


        ]);
        
        if($this->prod_id){
            //dd($validated['availability']);
            $prod = Prod::where('id',$this->prod_id)->first();
            $prod->update([
                'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'status' => $validated['status'],
            'category_id' => $validated['category'],
            'subcategory_id' => 0,
            'code' => $validated['code'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'short_detail' => $validated['short_detail'],
            'detail' =>$validated['detail'],
            ]);            

            $settings_prod = SettingsProducts::where('product_id',$this->prod_id)->first();
            $settings_prod->update([
                'availability' => $validated['availability'],
                'product_state' => $validated['product_state'],
                'long' => $validated['long'],
                'width' => $validated['width'],
                'height' => $validated['height'],
                'weight' => $validated['weight'],
            ]);
            $infoprice_prod = InfopriceProducts::where('product_id',$this->prod_id)->first();
            $infoprice_prod->update([
                'type_tax' => $validated['type_tax'],
                'tax' => $validated['tax'],
                'partial_price' => $validated['partial_price'],
                'discount_type' => $validated['discount_type'],
                'discount' => $validated['discount'],
                'init_discount' => $validated['init_discount'],
                'end_discount' => $validated['end_discount'],
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
                $prod->update([
                    'image' => $imagelesspublic,
                    'thumb' => $imagelesspublic,
                    'file_name' => $image_name,
                    'file_ext' => $ext,
                    'path_tag' => $path_tag                
                ]);
            }
            if($validated['attachment'] !== null){
                $file_name = $this->attachment->getClientOriginalName();
                $ext = $this->attachment->getClientOriginalExtension();            
                //almacenamos con el método store que genera un nombre de archivo aleatorio
                $path_date= date('Y-m-d');
                $file = $this->attachment->store('public/files/'.$path_date,'');
                $path_tag = 'public/files/'.$path_date.'/';
                //eliminamos el directorio public
                $filelesspublic = substr($file,7);
                $thumb = $file;
                //dd($ext);
                $settings_prod->update([
                    'attachment_file' => $filelesspublic,
                    'thumb' => $filelesspublic,
                    'file_name' => $file_name,
                    'file_ext' => $ext,
                    'path_tag' => $path_tag                
                ]);
            }

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

    //botón X de buscador para eliminar datos de búsqueda
    public function clearSearch(){
        $this->search_data='';
    }

    //eliminación de producto
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
            $this->typealert = 'danger';
            session()->flash('message',"Producto eliminado correctamente");
            //$this->clear2();
            $this->emit('confirmDel');
        }
    }
    //restaurar producto
    public function restore($id){
        $prod = $prod=Prod::onlyTrashed()->where('id',$id)->first();
        $prod->restore();
        $this->typealert = 'success';
        session()->flash('message',"Producto restaurado correctamente");

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
        $this->price = 0.00;
        $this->status = 0;
        $this->image = null;
        $this->code = null;
        $this->short_detail = null;
        $this->detail = '';
        //$this->emit('userUpdated');
        //iteration es necesario resetear el caché del input file
        $this->iteration=null;
    }

    public function clear2(){
        $this->clear();
        //resetea todos los campos necesario para input file
        $this->resetValidation();        
    }
    public function clear_settings(){
        //settings
        $this->availability=null;
        $this->product_state=null;
        $this->not_minstock=null;
        $this->email_minstock=null;
        $this->minstock=null;
        $this->attachment=null;
        $this->custom_delivery=null;
        $this->amount_delivery=null;
        $this->long=null;
        $this->width=null;
        $this->height=null;
        $this->weight=null;
        //price
        $this->type_tax=null;
        $this->tax=null;
        $this->partial_price=null;
        $this->discount_type=null;
        $this->discount=null;
        $this->init_discount=null;
        $this->end_discount=null;
    }
    //crear combinaciones
    public function createCombinations($data,$product_id){    
        
        //$name_list=[];
        //$id_list=[];
        
        $parent;
        $name_list = [];
        $id_list = [];

        foreach($data as $d){
            $at = Attr::findOrFail($d['id']);
            $name_list[] = $at->parentattr->name.' > '.$at->name;
            $id_list[] = $at->id;
        }
        
        $name_list_string = implode(",",$name_list);
        $id_list_string = implode(",",$id_list);
        $comb = Comb::create([
            'name' => $name_list_string,
            'list_ids' => $id_list_string,
            'amount' => 0,
            'product_id' => $product_id
        ]);
        $this->combinations = Comb::where('product_id',$product_id)->get();
        $this->emit('combinations');

    }
    public function clearCombinations(){
        //list_combinations=[];
    }

    //eliminar combinación
    public function deleteComb($id){
        if($id){
            $comb = Comb::findOrFail($id);
            $comb->delete();
        }
            $this->typealert = 'danger';
            session()->flash('message2',"Combinación eliminada correctamente");
            //$this->clear2();
    }
    //eliminamos imágenes de la galería y recargamos galería y drag&drop
    public function deleteGallery($id){
        if($id){
            $image = ImagesProducts::findOrFail($id);
            $image->delete();            
        }
        //renderizamos las imágenes de la galería
        $this->images_products = ImagesProducts::where('product_id',$this->prod_id)->get();
        //renderizamos la lista del drag&drop, por si hubiera algunas añadidas
        $this->emit('reload_images',$this->prod_id);
    }
    //actualizar los precios de la combinación seleccionada
    public function save($id,$added_price,$final_price){
        
        if(!$added_price)
            $added_price = 0.00;
        if(!$final_price)
            $final_price = 0.00;
        
        $comb = Comb::findOrFail($id);
        //dd($id);
        $comb->update([
            'added_price' => $added_price,
            'final_price' => $final_price
        ]);
        //$this->combinations = Comb::where('product_id',$this->prod_id)->get();
    }

    public function uploadImages($images){
        dd($images);
    }

    public function render()
    {           
        $this->custom_delivery_disabled=false;
        //$query = $this->set_filter_query($this->filter_type);
        $query = $this->set_type_query();
        $cats = Category::where('status',1)->where('type',0)->orderBy('id','desc')->pluck('name','id');
        $cats->prepend('Ninguna', 0);

        $attributes = Attr::where('status',1)->where('type',0)->orderBy('id','asc')->get();
        $this->combinations = Comb::where('product_id',$this->prod_id)->get();


        $data = ['products' => $query,'cats'=> $cats,'filter_type' => $this->filter_type,'iteration'=>$this->iteration,'attributes' => $attributes];
        return view('livewire.admin.products.index',$data);
    }

}
