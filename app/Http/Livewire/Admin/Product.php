<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Functions\Export;
use App\Models\Product as Prod;
use Illuminate\Http\Request;
use App\Models\Category, App\Models\SettingsProducts, App\Models\InfopriceProducts, App\Models\Attribute as Attr, App\Models\Combination as Comb, App\Models\ImagesProducts, App\Models\ParentCombinations as ParentComb;
use Str,PDF,Excel;
use Illuminate\Support\Facades\Mail;
use App\Mail\Listado;
class Product extends Component
{
    use WithFileUploads;
    use WithPagination;
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
    //stock total del producto
    public $stock;
    //stock después de restar los stock de todas las combinaciones
    public $stock_final;
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
    public $option=[];
    
    
    public $detail2 = null;
    //temporal de confirmación, quizás se podría usar $prod_id
    public $prodIdTmp;
    //tipo de filtrado (publico,borrador,reciclaje,todos)
    public $filter_type;
    
    public $typealert='success';   

    public $list_combinations;
    public $combinations;
    //id de combinación para eliminar mediante confirmación
    public $combtmp_id;
    //padres de combinaciones
    public $parent_combinations;
    //boolean para identificar si se ha llegado al límite de listas de
    //combinaciones con el mismo padre
    public $switch_parent_combinations = false;
    public $images_products;

    //importe adicional de combinaciones
    public $added_price;
    //anulado $final_price y añadido stock
    public $final_price;
    public $stock_comb;
    
    //campo de búsqueda (wire:model)
    public $search_data;
    //orden columnas (asc/desc)
    public $order_type = 'asc';
    //columna seleccionada
    public $selectedCol='id';
    //export
    protected $pdf;
    public $checkpdf;
    public $checkexcel;
    public $email_export;

    //archivo temporal para poder eliminar el archivo Excel descargado, ya que 
    //al sobreescribir genera error.
    public $file_tmp;
    
    //nombre de listado para envió de email
    public $listname;
    //nombre de usuario para envió de email
    public $username;
    //elementos por página
    public $limit_page=10;
    //listado de registros seleccionados mediante checkbox    
    public $selected_list;
    //select de acciones por lote
    //public $action_selected_ids;
    //acción temporal para el modal confirm (delete/restore)
    public $actionTmp;
    //contador de productos en el método saveProdId, que junto a actionTmp permite
    //rendir el mismo modal para eliminación y para restauración evitando duplicar 
    public $count_prod;

    //lista de ids de padres presentes en las combinaciones, para limitar
    //la cantidad de listas del mismo padre
    public $list_parents_limit;
    //cantidad límite de listas de combinaciones con el mismo padre
    public $limit_parent_combinations = 2;

    public $subcats;
    //personalizamos el nombre del atributo de los mensajes de error
    protected $validationAttributes = [
        'short_detail' => 'descripción corta',
        'category' => 'categoría',
        'subcategory' => 'subcategoría',
        'detail' => 'descripción',
        'image' => 'imagen'
    ];

    

//comprobar antes si existen categorías, si no, mostrar enlace a crear categoría
    public function mount($filter_type){
        $this->filter_type = $filter_type;
        $this->order_type = 'asc';
        $this->listname = 'products';
        $this->checkpdf = 1;

    }
    
    public function updated(){
        //si se encuentra en otra página resetea, si no, el buscador
        //no realiza correctamente la búsqueda
        
        if($this->search_data)
            $this->resetPage();
    }

    //actualizar datos de consulta de productos por columna (si se clica en el nombre las columnas)
    public function setColAndOrder($nameCol=null){
        //posibles columnas
        $cols=['id','name','short_detail'];
        //comprobamos si la columna seleccionada existe, por si se intenta 
        //introducir otra de forma maliciosa
        if(in_array($nameCol, $cols))
            $this->selectedCol = $nameCol;
        $order = 'asc';
        //comprobando si el nombre de la columna seleccionado es distinto al 
        //anterior (en caso de haber pulsado la vez anterior)
        if($this->selectedCol != $nameCol)
            $order = 'asc';
        else
            //if($this->order_type=='' || $this->order_type =='desc')
            $order = ($this->order_type =='desc') ? 'asc': 'desc';
        //se establece el nombre de la columna
        $this->selectedCol = $nameCol;
        $this->order_type = $order;
    }

    //comprobamos la acción seleccionada
    public function set_action_massive($list_ids,$action_selected){
        //if($action_selected)
        //dd($action_selected);
        $action = $action_selected;                
        $list = $list_ids;
        $this->selected_list = $list;
        //dd($lista);        
        $this->emit('massiveConfirm');
        if(!empty($list) && count($list) > 0){
    //añadir icono loading      
            switch($action):
                //Eliminar
                case 'delete':                    
                    $this->delete_list();
                    break;
                //Restaurar                
                case 'restore':                    
                    $this->restore_list();
                    break;
            endswitch;
            //devolvemos el select a 0
            //$this->action_selected_ids = 0;
        }
        $this->typealert = 'success';
        session()->flash('message','Acción ejecutada correctamente');
        //limpiamos los checkbox
        $this->selected_list=[];
        $this->emit('clearcheckbox');

    }

    //eliminar seleccionados(aplicar acción de eliminar en lote) massive
    public function delete_list(){        
        //Se puede usar whereIn con each() o tb se puede usar  destroy() para
        //que las relaciones en los modelos tb sean eliminados
        Prod::whereIn('id',$this->selected_list)->each(function ($prod,$key){
            $prod->delete();
        });
        //con destroy
        //Prod::destroy($this->selected_list);
        
    }

    public function restore_list(){
        //el operador de laravel whereIn puede no funcionar con más de 999 registros
        //sin el método each restaura el producto pero no restaura las relaciones de los modelos asociados
        //Prod::withTrashed()->whereIn('id',$this->selected_list)->restore();
        
        Prod::withTrashed()->whereIn('id',$this->selected_list)->each(function ($prod,$key){
            $prod->restore();
        });
        
    }


    //filtrado de productos(tipo de filtro pasado por url)
    public function set_filter_query($filter_type,$export=false){
        //$prod=[];
        $prod='';
        $search_data = '%'.$this->search_data.'%';        
        //columna de referencia para ordenar
        $col_order='id';
        //si $this->selectedCol no es null establecemos la columna seleccionada 
        if($this->selectedCol)
            $col_order=$this->selectedCol;
        //tipo de ordenamiento
        //$order='desc';
        $order = $this->order_type;
        //si es reciclaje creamos consulta con onlyTrashed(los eliminados mediante softDelete())        
        switch($filter_type):
            case '0':                
            case '1':                
                $init_query = ($this->search_data) ?
                    Prod::where([
                        ['name','LIKE',$search_data],
                        ['status',$filter_type]
                    ])
                    ->orWhere([
                        ['short_detail','LIKE',$search_data],
                        ['status',$filter_type]  
                    ])
                    ->orderBy($col_order,$order)
                    :
                    Prod::where('status',$filter_type)->orderBy($col_order,$order);
                break;
            case '2':                
                $init_query = ($this->search_data) ?
                    Prod::onlyTrashed()->where('name','LIKE',$search_data)
                    :
                    Prod::onlyTrashed()->orderBy($col_order,$order);
                break;
            case '3':                
                $init_query = ($this->search_data) ?
                    Prod::where('name','LIKE',$search_data)->orderBy($col_order,$order)
                    :
                    Prod::orderBy($col_order,$order);
                break;
        endswitch;

        ($export) ?
            $res = $init_query->get()            
            :
            $res = $init_query->paginate($this->limit_page);
        return $res;
    }


    public function set_type_query($export=false){
        $query;
        $query= $this->set_filter_query($this->filter_type,$export);
        return $query;
    }


//comprobar si existe otro slug igual
    public function store(){
        //regex con validación con coma y punto de máximo 2 decimales
        $validated = $this->validate([
            'name' => 'required',
            'status' => 'required',
            'category' => 'required|gt:0',
            'subcategory' =>'required|gt:0',
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
            'subcategory_id' => $validated['subcategory'],
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
            $path_tag = '/storage/';
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
        $this->subcategory = $prod->subcategory_id;
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
    //obtener el stock final disponible después de sumar todos los stocks
    //de todas las combinaciones y restar del total. Después, en la vista
    //sumamos el stock de cada combinación para restringir el máximo de cada uno
    public function get_stockfinal($id,$total){
        $combs = Comb::where('product_id',$id)->get();
        $stock_final = $total;
        if($combs->count() > 0){
            $sum = 0;
            foreach($combs as $comb){
                $sum = $sum + $comb->stock;
            }
            $stock_final = $total - $sum;
        }
        return $stock_final;
    }

    public function edit_settings_product($id){
        //$temp = SettingsProducts::where('product_id',5)->first();
        
        $this->prod_id = $id;

        //para el precio $prod
        $prod = Prod::findOrFail($id);        
        $this->price = $prod->price;
        $this->stock = $prod->stock;
        $this->stock_final = $this->get_stockfinal($this->prod_id,$this->stock);
        
        //recorremos todas las combinaciones para obtener los stock
        // asignados y sumarlos, la resta definirá el máximo de stock final 
        //de cualquier combinación.

        //distinguimos estado de reciclaje del resto de estados en settings
        $settings_prod;
        
        
        if($this->filter_type == 2):
            $settings_prod = SettingsProducts::onlyTrashed()->where('product_id',$id)->first();
        else:
            $settings_prod = SettingsProducts::where('product_id',$id)->first();
        endif;
        //dd(SettingsProducts::where('product_id',$id)->get());
        //availability inicia con 1(online y tienda), por defecto
        
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
        $this->get_type_selection();
//Estableciendo límite de listas de combinaciones
        /*
        if($this->parent_combinations->count() >= $this->limit_parent_combinations){
            //indicamos que existe alguna combinación
            $this->switch_parent_combinations = false;
            $list = [];
            foreach($this->parent_combinations as $pc){                
                $list[] = $pc->parent_id;
            }
            //comprobamos si ya existe el límite de listas de combinaciones
            //y
            if(count($list) >= $this->limit_parent_combinations){
                $this->list_parents_limit = $list;    
            }else{
                $this->list_parents_limit = null;
            }


            
            
        //generamos una variable para no permitir más combinaciónes, o más bien,
        //desactivar siempre las pestañas que no sean de uno de los padres 
        //existentes en parent_combinations;
        }else{
            //indicamos que NO existe ninguna combinación
            $this->switch_parent_combinations = false;
            //dd($this->parent_combinations->count());
        }
        */
        $this->set_limit_combinations();

        
        //$this->show_attributes($id);
        //imágenes de productos (galería)
        $this->images_products = ImagesProducts::where('product_id',$id)->get();
        //desactivamos(disabled) las listas de atributos si rebasan el límite establecido
        $this->emit('maxParentCombinations');
        //no es necesario cargarlo aquí, se puede cargar al iniciar products
        //$this->emit('inputFile');
    }
    //revisamos si se ha alcanzado el límite de listas de combinaciones
    //
    public function set_limit_combinations(){
        if($this->parent_combinations->count() >= $this->limit_parent_combinations){
            //indicamos que existe alguna combinación
            $this->switch_parent_combinations = true;
            $list = [];
            foreach($this->parent_combinations as $pc){                
                $list[] = $pc->parent_id;
            }
            //comprobamos si ya existe el límite de listas de combinaciones
            //y
            if(count($list) >= $this->limit_parent_combinations){
                $this->list_parents_limit = $list;    
            }else{
                $this->list_parents_limit = null;
            }


            
            
        //generamos una variable para no permitir más combinaciónes, o más bien,
        //desactivar siempre las pestañas que no sean de uno de los padres 
        //existentes en parent_combinations;
        }else{
            //indicamos que NO existe ninguna combinación
            $this->switch_parent_combinations = false;
            //dd($this->parent_combinations->count());
        }
    }
    //anulación debido a cambio de metodología, a través de una 
    //nueva tabla (parent_combinations), para establecer a todas 
    //las combinaciones del mismo atributo padre de un producto
    //un tipo de selección distinta(colores, desplegable, botones)

    //creamos array con los atributos padre de todas las combinaciones y poder 
    //mostrar select para modificar el tipo de selección de la combinación del producto
    public function show_attributes($id){
        $this->combinations = Comb::where('product_id',$id)->get();
        //comprobamos si existen combinaciones del producto
        if($this->combinations->count() > 0){
            $parent = [];
            //recorremos la lista de atributos(list_ids) y comprobamos
            //y añadimos los padres en un array
            foreach($this->combinations as $c){
                $list = explode(",",$c->list_ids);
                foreach($list as $l){
                    $attr = Attr::findOrFail($l);
                    if($attr){
                        //si es el primero
                        if(count($parent) == 0){
                            $parent[$attr->parentattr->id]=$attr->parentattr->name;
                        }else{
                            if(!isset($parent[$attr->parentattr->id])){
                                $parent[$attr->parentattr->id]=$attr->parentattr->name;
                            }
                        }
                    }
                }
            }
            //establecemos el array de atributos padre: parent[id_atributo_padre => nombre_atributo_padre, ...]
            $this->parent_combinations = $parent;
        }
    }

    //obtener colección de parent_combinations de todas las  combinaciones 
    //de un producto
    public function get_type_selection(){
        $parent_comb = ParentComb::where('product_id',$this->prod_id)->get();
        $this->parent_combinations = $parent_comb;
    }
    //establecer el tipo de selección de las combinaciones con el mismo atributo 
    //padre  de un producto. Pueden ser círculos con fondo de color o botones.
    //El select se encuentra anulado temporalmente, es necesario desarrollar la fórmula
    //para realizar click() de forma automatizada en el select
    public function set_type_selection($id,$data){
        $parent_comb = ParentComb::findOrFail($id);
        $parent_comb->update([
            'type_selection' => $data
        ]);
    }

    public function update_settings_products($id,$delivery_time){
        $validated = $this->validate([
            //settings
            'availability' => 'required|integer',
            'product_state' => 'required',
            'not_minstock' => 'required',
            'email_minstock' => 'nullable',
            'minstock' => 'nullable|integer',
            //'attachment' => 'nullable|mimetypes:application/pdf',
            'attachment' => 'nullable|mimes:pdf,ppt,doc,docx,xls,xlsx',           
            'custom_delivery' => 'nullable|integer',
            'amount_delivery' => 'nullable',
            'long' =>['nullable','numeric','regex:/^(\d+)(,\d{1,2}|\.\d{1,2})?$/'],
            'width' =>['nullable','numeric','regex:/^(\d+)(,\d{1,2}|\.\d{1,2})?$/'],
            'height' =>['nullable','numeric','regex:/^(\d+)(,\d{1,2}|\.\d{1,2})?$/'],
            'weight' =>['nullable','numeric','regex:/^(\d+)(,\d{1,2}|\.\d{1,2})?$/'], 
            //price
            'type_tax' => 'required|integer',
            'tax' => 'required|integer',
            'partial_price' => 'nullable',
            'price' => 'required',            
            'discount_type' =>'nullable|integer',
            'discount' => 'nullable|integer',
            'init_discount' => 'nullable|date',
            'end_discount' => 'nullable|date',            
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
            'subcategory' =>'required|gt:0',
            'price' => ['required','numeric','regex:/^(\d+)(,\d{1,2}|\.\d{1,2})?$/'],
            'status' => 'required',
            'code' => 'nullable',
            'stock' => 'required|integer',
            'short_detail' => 'required',
            'detail' => 'required',
            'image' => 'nullable|image'
        ]);
        
        if($this->prod_id){
            //dd($validated['availability']);
            $prod = Prod::where('id',$this->prod_id)->first();
            $prod->update([
                'name' => $validated['name'],
                'slug' => Str::slug($validated['name']),
                'status' => $validated['status'],
                'category_id' => $validated['category'],
                'subcategory_id' => $validated['subcategory'],
                'code' => $validated['code'],
                'price' => $validated['price'],
                'stock' => $validated['stock'],
                'short_detail' => $validated['short_detail'],
                'detail' =>$validated['detail'],
            ]);
            if($validated['image'] !== null){
//comprobar si existe imagen y eliminar la anterior
                $image_name = $this->image->getClientOriginalName();
                $ext = $this->image->getClientOriginalExtension();            
                //almacenamos con el método store que genera un nombre de archivo aleatorio
                $path_date= date('Y-m-d');
                $image = $this->image->store('public/files/'.$path_date,'');
                $path_tag = '/storage/';
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
            

        }
        $this->typealert = 'success';

        session()->flash('message','Producto actualizado correctamente');
        $this->clear2();
        $this->emit('editProduct');
    }

    //limpiar datos de exportación
    public function clearExport(){
        $this->checkpdf='1';
        $this->checkexcel='';
        $this->email_export='';
    }

    //exportar archivo PDF al navegador del usuario
    public function exportPDF(){
    //opción actual         
        $products=$this->set_type_query(true);        
        $view="livewire.admin.products.export";
        $pdf=PDF::loadView($view,['products'=>$products]);
        $this->pdf=$pdf;
        $rand = Str::random(10);
        return response()->streamDownload(function(){
                    //con print o con echo
            print $this->pdf->stream();//echo $this->pdf->stream();
        },$rand.'.pdf');
    }

    //exportar archivo Excel al navegador del usuario
    public function exportExcel(){
        $products=$this->set_type_query(true);
        return Excel::download(new Export($products,$this->listname),'exportexcel.xlsx');
    }

    //guardar el archivo PDF en el server para después poder enviar por correo 
    //como archivo adjunto
    public function savePDF(){
        $path_date=date('Y-m-d');
        $products=$this->set_type_query(true);
        $view="livewire.admin.products.export";
        $pdf= PDF::loadView($view,['products'=>$products]);
        $pdf->save('listado_'.$path_date.'.pdf');
    }
    //guardar archivo Excel en el server para después poder enviar por correo 
    //como archivo adjunto
    public function saveExcel(){
        $path_date=date('Y-m-d');
        $products=$this->set_type_query(true);
        //grabar en disco

        //si no añadimos aleatorio(random) en ocasiones genera un archivo corrupto, por ejemplo
    //cuando se genera una búsqueda con LIKE. Si se añade un nombre distinto, al no 
    //tener que sobreescribir sobre el anterior archivo, en el servidor, por alguna 
    //razón genera el archivo correctamente.
        $number_rand = Str::random(10);
        $this->file_tmp = 'listado'.$number_rand.'.xlsx';
        return  Excel::store(new Export($products,$this->listname),$this->file_tmp,'public');
    }

    //Enviar email con opción de enviar documento PDF y/o Excel como archivos adjuntos
    public function sendEmail(){
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
            //eliminamos el archivo enviado al email para no sobrecargar el servidor de
            //archivos siempre y cuando 
//necesario cambiar pk el pdf debe ser tb aleatorio y eliminarlo
            if($this->checkexcel && file_exists(public_path($this->file_tmp))){
                unlink(public_path($this->file_tmp));    
            }
        //sustituimos el flash por redirect(), ya que el div del message se muestra //correctamente pero genera conflicto con el dropdown de export, y al enviar
        //correo ya no desplega el dropdown de exportar 
        //session()->flash('message',"Correo enviado correctamente");
        return redirect()->route('list_products',['filter_type' => $this->filter_type])->with('message',"Correo enviado correctamente")->with('only_component','true');
            //limpiar datos de selección para el envio (correo y archivos adjuntos)
        $this->clearExport();
        $this->emit("sendModal");
        }
    }

    public function saveProdId($prodId,$action){
        $this->prodIdTmp=$prodId;
        $this->actionTmp = $action;
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
            if($this->actionTmp == 'deleteend'){
                $prod=Prod::onlyTrashed()->where('id',$this->prodIdTmp)->first();    
            }else{
                $prod=Prod::where('id',$this->prodIdTmp)->first();    
            }
            
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
            if($this->actionTmp == 'deleteend'){
                $prod->forceDelete();    
            }else{
                $prod->delete();
            }
            
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
        $this->emit('confirmDel');

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
        $this->stock = null;
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
        $this->combinations = null;
        
        $this->parent_combinations=null;        
    }
    /*
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
    */
    //obtenemos un array que contiene todos los list_ids en formato array
    public function testListDuplicate($product_id,$list2=null){
        $combinations = Comb::where('product_id',$product_id)->get();
        $data = true;

        $list2 = [];
        foreach($combinations as $key => $comb){
            //convertimos el campo list_ids a array y comprobamos si algunos de
            //los valores del array ya existe.
            //$list: lista de valores que tiene cada una de las combinaciones convertida a array                
            $list = explode(",",$comb->list_ids);
            $list_name = explode(",",$comb->name);            
            $list2[] = $list;
            /*
            if(count($list2) > 1){                
                foreach($list2 as $l){                    
                    $convert = implode(",",$l);
                    if($convert == $comb->list_ids){
                        //dd($comb->list_ids);
                    }
                }
                //$dif = array_diff($list,$list2[0]);                
            }
            */
        }
        return $list2;
    }
    //crear combinaciones (límite 2)
    public function createCombinations($data,$product_id){
//añadimos un tope de 2 listas con el mismo atributo padre
        if($this->parent_combinations->count() <= $this->limit_parent_combinations){
            //si no existen valores selccionados mantenemos la pestaña y detenemos
            if(!$data){
                //activamos la pestaña de combinaciones
                $this->emit('activeTabConfigProduct',2);
                return false;            
            }
            $parent;
            $name_list = [];
            $id_list = [];
            $parent = [];
            $switchbol = false;
            //dd($data);
            //la cantidad de atributos seleccionados
            $counter_data = count($data);
            //$data: lista de elementos seleccionados
            $combinations = Comb::where('product_id',$product_id)->get();

            foreach($data as $key => $d){
                //dd($data);
                //obtenemos el registro de cada uno de los valores seleccionados
                $at = Attr::findOrFail($d['id']);

        
                //lista de combinaciones de la db del producto
                
                $same_value=false;
                if($combinations->count() > 0){
                //primero comprobamos si alguno de los valores seleccionados ya se 
                //encuentra en alguna de las combinaciones, en ese caso enviamos
                //mensaje y detenemos.
                    $lista3 = [];
                    foreach($combinations as $comb){
                        $list_not_parents=[];
                //convertimos el campo list_ids a array y comprobamos si algunos de
                //los valores del array ya existe.

                //$list: lista de valores que tiene cada una de las combinaciones convertida a array                
                        $list = explode(",",$comb->list_ids);
                        $list_name = explode(",",$comb->name);
                        $lista3[] = $list;
                        foreach($list as $k => $l){
                            
                            //si ya existe el mismo valor en una de las combinaciones
                            //devolvemos mensaje de error, así nos aseguramos de que 
                            //nunca haya valores duplicados
                            if($l == $at->id){
                                $this->typealert = 'danger';
                                session()->flash('message2',"Ya existe ese valor");
                                $this->emit('combinations');
                                $same_value = true;
                                break;
                            }
                        }
                    }
                    //si existe el mismo valor detenemos
                    if($same_value){
                        return false;
                    }
                    
                    
                    foreach($combinations as $comb){

                        //$lista = $this->testListDuplicate($product_id);
                        $lista = $lista3;

                        //dd($lista);
                        
                //convertimos el campo list_ids a array y comprobamos si existe ya //el mismo valor
                        $same_parent = false;
                        
                //$list: lista de valores que tiene cada una de las combinaciones convertida a array 
                                       
                        $list = explode(",",$comb->list_ids);
                        $list_name = explode(",",$comb->name);
                        $list_parent = explode(",",$comb->parent_attr);

                        //$list2[] = $list;
                        $counter_values = 0;

                        foreach($list as $k => $l){
                            if($k == 0){
                                //dd($list);
                            }
                        //if($this->testValueInCombinations($product_id,$at->id)){
                        //cantidad de elementos list_ids (atributos) de la combinación
                                
                            
                            //obtenemos el registro(DB) de cada uno de los valores de list_ids (en formato array)
                            $at_comb = Attr::findOrFail($l);
                //comprobamos si los elementos seleccionados tienen el mismo 
                //atributo padre. Como solo se pueden seleccionar valores del 
                //mismo padre en una selección, revisando el primero es suficiente.
                            if($at_comb->type == $d['parent_id']){
                    //si es del mismo padre se crean las combinaciones 
                    //nuevas, copiando el $list y $list_name y sustituyendo el valor
                    //de los que tienen el mismo atributo padre por el nuevo.
                                
                                $list[$k] = $at->id;
                                $list_name[$k] = $at->parentattr->name.' > '.$at->name;

                                $lista2 = $lista;
                                $lista2[] = $list;
                                
                                $unique = array_unique($lista2,SORT_REGULAR);
                                //dd($unique);
                                if(count($lista2) == count($unique)){
                                    
                                
                                
                                //dd(count($lista) == count(array_unique($lista2)));
                                //convertimos a string
                                $list_name = implode(",",$list_name);
                                $list = implode(',',$list);
                                //creamos combinación nueva
                                $comb = Comb::create([
                                    'name' => $list_name,
                                    'list_ids' => $list,
                                    'parent_attr' => $at->parentattr->id,
                                    'amount' => 0,
                                    'product_id' => $product_id,
                                    'final_price' => 0.00,                
                                ]);
                                }
                                //con parent=true rompemos el foreach de combinaciones
                                $same_parent = true;

                                //con break rompemos el foreach de list_ids
                                //break;
                    
                                //dd("es el mismo padre");
                                
                                
                            }
                            $counter_values ++;
                            if($k == 1){
                                //dd($list);
                            }
                            
                            //dd($at_comb->type);
                            if($at_comb->type != $d['parent_id']){
                                $list_not_parents[] = $at->id;
                            }
                            //almacenar los atributos no duplicados 
                            
                            /*
                            else{
                                //if($list[$k])
                                    $list_name[$k] = $list_name[$k].', '.$at->parentattr->name.' > '.$at->name;
                                    $list[$k] = $list[$k].','.$at->id;
                                    $comb->update([
                                        'name' => $list_name[$k],
                                        'list_ids' => $list[$k],
                                    ]);
                                
                                //si no es el mismo padre, habrá que actualizar las combinaciones actuales añadiendo el nuevo valor
                                //dd("no es el mismo padre");
                                $parent = false;
                            }
                            */
                        //}
                        }                    
                        if($same_parent){

                            if($counter_values == 1){
                                if(count($data) == 1){
                                    break;    
                                }else{
                                    
                                }
                                
                            }elseif($counter_values == 2){
                                //dd($lista);
                                //revisar todos los atributos que no sean el padre y repetirlos
                                //dd($list_not_parents);
                            }
                            //break;
                            
                        }else{
                            $list_name[$k] = $list_name[$k].', '.$at->parentattr->name.' > '.$at->name;
                            $list[$k] = $list[$k].','.$at->id;
                            $list_parent[] = $at->type;                            
                            $parentattr = implode(",",$list_parent);
                            //convertimos a string
                            $list_name = implode(",",$list_name);
                            $list = implode(',',$list);
                            $comb->update([
                                'name' => $list_name,
                                'list_ids' => $list,
                                'parent_attr' => $parentattr,
                            ]);
                            
                        }
                        //dd($comb->name);
                        /*
                        if($parent){
                            break;
                        }
                        */                    
                    
                    }
                    
                    //si tienen el mismo padre añadimos nuevas combinaciones
                }else{
                    $name_list = $at->parentattr->name.' > '.$at->name;

                    //$product = Prod::findOrFail($product_id);
                    //$price = $product->price;
                                    
                    $comb = Comb::create([
                        'name' => $name_list,
                        'list_ids' => $at->id,
                        'parent_attr' => $at->parentattr->id,
                        'amount' => 0,
                        'product_id' => $product_id,
                        'final_price' => 0.00,                
                    ]);        
                }
                /*
                $name_list[] = $at->parentattr->name.' > '.$at->name;
                $id_list[] = $at->id;
                */
            /*$name_list = $at->parentattr->name.' > '.$at->name;

            $product = Prod::findOrFail($product_id);
            $price = $product->price;
                            
            $comb = Comb::create([
                'name' => $name_list,
                'list_ids' => $at->id,
                'parent_attr' => $at->parentattr->id,
                'amount' => 0,
                'product_id' => $product_id,
                'final_price' => 0.00,                
            ]);
            */
    //se debe comprobar si ya existe un parentcomb con ese padre, si no se crea
                //si no existe registro del producto de ese atributo
                //padre, se crea uno.


                $parent_comb = ParentComb::where('product_id',$product_id)->where('parent_id',$at->parentattr->id)->first();
                $type_selection = 2;
                //si el Atributo padre es Color (atributo->id = 1 en la db)
                //asignamos el type_selection a 3
                if($at->parentattr->id == 1){
                    $type_selection = 3;
                }
                if(!$parent_comb){                
                    ParentComb::create([
                        'parent_id' => $at->parentattr->id,
                        'parent_name' => $at->parentattr->name,
                        'type_selection' =>  $type_selection,
                        'product_id' => $product_id
                    ]);
                    //actualizamos parent_combinations
                    $this->get_type_selection();
                }
                


            }
        
            //obtenemos el precio del producto para añadirlo a la combinación
            //en la creación
            /*
            $product = Prod::findOrFail($product_id);
            $price = $product->price;
            $name_list_string = implode(",",$name_list);
            $id_list_string = implode(",",$id_list);        
            $comb = Comb::create([
                'name' => $name_list_string,
                'list_ids' => $id_list_string,
                'amount' => 0,
                'product_id' => $product_id,
                'final_price' => 0.00
            ]);
            */
            $this->combinations = Comb::where('product_id',$product_id)->get();
            $this->emit('combinations');    
        }else{
            //enviar mensaje se ha llegado al límite de combinaciones
        }
        $this->set_limit_combinations();
        $this->emit('maxParentCombinations');
    }
    public function clearCombinations(){
        //list_combinations=[];
    }

//revisar que se hace con el precio: el precio de la combinación puede ser independiente
    //eliminar combinación
    public function deleteComb($id){        
        if($id){
            //combinación seleccionada
            $comb = Comb::findOrFail($id);            
            if($comb){
                //array de padres de la combinación seleccionada
                $selected_parents = explode(",",$comb->parent_attr);
                //todas las combinaciones del producto
                $combs = Comb::where('product_id',$this->prod_id)->get();
                //contador de coincidencias de combinación que contiene valores de un 
                //mismo atributo padre
                $match_parent = [];
                foreach($combs as $c){
                    //array de padres de cada una de las combinaciones del producto
                    $list_parents = explode(",",$c->parent_attr);
                    foreach($selected_parents as $sp){
                        //$sp: valor del atributo padre (Color: 1, Talla:2,...)
                        //de la combinación seleccionada
                        if(in_array($sp,$list_parents)){
                            //si ya existe un elemento con el mismo índice sumamos 1.
                            if(isset($match_parent[$sp]))
                                $match_parent[$sp]=$match_parent[$sp] + 1;
                            else
                                $match_parent[$sp]=1;
                        }
                    }
                }
                //comprobamos el contador de coincidencias si es tan solo 1
                //eliminamos el registro de "parent_combinations"
                foreach($match_parent as $k => $m){
                    if($m == 1){
                        $parent_comb = ParentComb::where('product_id',$this->prod_id)
                            ->where('parent_id',$k)->first();
                        if($parent_comb)
                            $parent_comb->delete();
                    }
                }
                $comb->delete();
            }
        }
        //actualizamos las opciones de selección
        $this->get_type_selection();
        $this->typealert = 'danger';        
        session()->flash('message2',"Combinación eliminada correctamente");
        $this->emit('activeTabConfigProduct',2);
        //$this->clear2();
    }
    //eliminamos imágenes de la galería y recargamos galería y drag&drop
    public function deleteGallery($id){
        if($id){
            dd($id);
            $image = ImagesProducts::findOrFail($id);
            $image->delete();            
        }
        //renderizamos las imágenes de la galería
        $this->images_products = ImagesProducts::where('product_id',$this->prod_id)->get();
        //renderizamos la lista del drag&drop, por si hubiera algunas añadidas
        $this->emit('reload_images',$this->prod_id);
    }
    //actualizar los precios de la combinación seleccionada
    //sustituido final_price por stock
    //public function save($id,$added_price,$final_price){
    public function save($id,$added_price,$stock){        
        /*
        if(!$final_price)
            $final_price = 0.00;
        if($added_price)
            $final_price = $added_price+$final_price;
        */
        if(!$added_price)
            $added_price = 0;
        if(!$stock)
            $stock = 0;
        
        $comb = Comb::findOrFail($id);
        //dd($id);
        $comb->update([
            'added_price' => $added_price,
            //'final_price' => $final_price
            'stock' => $stock
        ]);
        //actualizamos el stock disponible para cualquier combinación
        $this->stock_final = $this->get_stockfinal($this->prod_id,$this->stock);
        //dd($this->stock_final);
        //$this->combinations = Comb::where('product_id',$this->prod_id)->get();
    }

    public function uploadImages($images){
        dd($images);
    }

    public function setSubcategories(){

        
        
    }

    public function set_tax(){
        //almacenamos las tasas
        $taxes = [
            config('ecomsail.standard_tax'),
            config('ecomsail.reduce_tax'),
            config('ecomsail.zero_tax'),
        ];
        //obtenemos la tasa seleccionada mediante el tipo de tasa seleccionado
        $this->tax = $taxes[$this->type_tax];
        $this->emit('activeTabConfigProduct',1);
    }

    public function render()
    {
        
        $this->subcats = null;        
        if($this->category != 0){
            $this->subcats = Category::where('status',1)->where('type',$this->category)->orderBy('id','desc')->pluck('name','id');    
        }

        $this->custom_delivery_disabled=false;
        //$query = $this->set_filter_query($this->filter_type);
        $query = $this->set_type_query();
        $cats = Category::where('status',1)->where('type',0)->orderBy('id','desc')->pluck('name','id');
        $cats->prepend('Ninguna', 0);

        $attributes = Attr::where('status',1)->where('type',0)->orderBy('id','asc')->get();
        //recargamos combinaciones por si eliminamos
        $this->combinations = Comb::where('product_id',$this->prod_id)->get();

        /*
        if($this->combinations->count() > 0){
            $parent = [];
            //dd(count($this->combinations));
            foreach($this->combinations as $c){
                $list = explode(",",$c->list_ids);
                foreach($list as $l){
                    $attr = Attr::findOrFail($l);
                    if($attr){
                        //si es el primero
                        if(count($parent) == 0){
                            $parent[$attr->parentattr->id]=$attr->parentattr->name;
                        }else{
                            if(!isset($parent[$attr->parentattr->id])){
                                $parent[$attr->parentattr->id]=$attr->parentattr->name;        
                            }else{

                            }
                            
                        }

                    }
                    
                }                
                
            }
            $this->parent_combinations = $parent;
        }
        */
        


        $data = ['products' => $query,'cats'=> $cats,'filter_type' => $this->filter_type,'iteration'=>$this->iteration,'attributes' => $attributes];
        return view('livewire.admin.products.index',$data);
    }

}
