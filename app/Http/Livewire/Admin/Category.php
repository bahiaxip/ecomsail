<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use  Livewire\WithFileUploads;
use Livewire\WithPagination;
//models
use App\Models\Category as Cat,App\Models\Product;
use Illuminate\Http\Request;
use App\Functions\Export;
use Str,PDF,Excel,Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Listado;
//validaciones para icono de ofertas(revisar para optimizar...)
use App\Rules\IconAwesomeOffer;
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
    public $iteration;
    public $file_name;
    public $cat_id=0;
    public $description;
    //offers
    public $offer;
    public $title_offer;
    public $icon_awesome_offer;
    public $icon_image_offer;
    public $icon_image_offer_hover;
    
    //public $categories;
    public $catIdTmp;

    public $filter_type;
    public $subcat;
    public $subcatlist=['id' => null,'name' => null];
    public $typealert='success';
    public $count_cat;

    //campo de búsqueda (wire:model)
    public $search_data;
    //orden columnas (asc/desc)
    public $order_type = 'asc';
    //columna seleccionada
    public $selectedCol='id';

    //pdf
    protected $pdf;
    public $checkpdf;
    public $checkexcel;
    public $email_export;
    //el construct genera conflictos con el parámetro
    //@this para manejar los datos desde javascript
    /*
    public function __construct(){
        //$this->middleware('admin');        
    }
    */
    //nombre de listado para envió de email
    public $listname;
    //nombre de usuario para envió de email
    public $username;
    //listado de registros seleccionados mediante checkbox    
    public $selected_list;
    //select de acciones por lote(anulado)
    //public $action_selected_ids;
    //acción temporal para el modal confirm (delete/restore)
    public $actionTmp;

    //archivo temporal para poder eliminar el archivo Excel descargado, ya que 
    //al sobreescribir genera error.
    public $file_tmp;

    //variable exclusiva para mostrar el botón volver al recargar página en
    //subcategorías que no contienen resultados, y por tanto no existe $subcatlist['name']
    public $btn_back;
    public $switch_type;
    //solución accediendo a subcategorías desde una página > 1
    public $current_url;
    //personalizamos el nombre del atributo de los mensajes de error
    protected $validationAttributes = [
        'main_title' => 'título',
        'second_title' => 'título adicional',
        'image' => 'imagen'
    ];


    public function mount($filter_type){
        
        //reseteamos subcat, no necesario
        //$this->subcat = null;
        $this->filter_type = $filter_type;
        $this->order_type = 'asc';
        $this->listname = 'categories';
        $this->username=Auth::user()->name;
        $this->checkpdf = 1;
        $this->current_url = url()->current();


    }

    //comprobamos la acción seleccionada
    public function set_action_massive($list_ids,$action_selected){        
        $action = $action_selected;
        $list = $list_ids;
        
        foreach($list as $l){
            if($l != 0){
                //comprobamos si esta categoría tiene subcategorías ( no se podrá eliminar ) - mediante count_cat comprobamos en la vista
                $this->count_cat = Cat::where('type',$l)->count();
                if($this->count_cat == 0){
                    //comprobamos si esta categoría tiene productos asociados ( no se podrá eliminar )
                    $this->count_cat = Product::where('category_id',$l)
                                    ->orWhere('subcategory_id',$l)->count();
                }
                if($this->count_cat >0){
                    $this->typealert = 'danger';
                    session()->flash('message','No ha sido posible eliminar las categorías. Alguna de las categorías seleccionadas tienen subcategorías o productos asociados');
                    $this->emit('massiveConfirm');
                    $this->selected_list=[];
                    $this->emit('clearcheckbox');
                    return false;
                }
            }
        }
        $this->selected_list = $list;
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
        $this->typealert="success";
        session()->flash('message','Acción ejecutada correctamente');
        $this->selected_list=[];
        $this->emit('clearcheckbox');
    }

    //eliminar seleccionados(aplicar acción de eliminar en lote)
    public function delete_list(){
        Cat::destroy($this->selected_list);
    }

    public function restore_list(){
        Cat::whereIn('id',$this->selected_list)->restore();
    }
    

    
    //actualizar datos de consulta de orden por columna (si se clica en el nombre las columnas)
    public function setColAndOrder($nameCol=null){
        //posibles columnas
        $cols=['id','name','description'];
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
    //filtrado de categorías (Borrador/Público/Reciclaje/Todos), filtrado de 
    //búsqueda y filtrado de export
    public function set_filter_query($filter_type,$export=false,$subcat=0){
        $cat='';
        $search_data = '%'.$this->search_data.'%';
        //el subcat indica si es categoría padre(0) o subcategoría(1)
        $subcat = ($subcat) ? $subcat : 0;        
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
                    Cat::where('name','LIKE',$search_data)->where('status',$this->filter_type)->where('type',$subcat)
                    :
                    Cat::where('status',$filter_type)->where('type',$subcat);
                break;
            case '2':
                $init_query = ($this->search_data) ?
                    Cat::onlyTrashed()->where('name','LIKE',$search_data)->where('type',$subcat)
                    :
                    Cat::onlyTrashed()->orderBy($col_order,$order)->where('type',$subcat);
                break;
            case '3':
                $init_query = ($this->search_data) ?
                    Cat::where('name','LIKE',$search_data)->where('type',$subcat)
                    :
                    Cat::where('type',$subcat);
                break;
        endswitch;

        ($export) ?
            $cat = $init_query->orderBy($col_order,$order)->get()
            :
            $cat = $init_query->orderBy($col_order,$order)->paginate(10);

        return $cat;
    }

    public function set_type_query($export=false){
        return $this->set_filter_query($this->filter_type,$export,$this->subcat);
    }

    //creación de categoría/subcategoría
    public function store(){
        
        $this->emit('loading','loading');
        //$this->emit('description1',$this->description);
        $validated = $this->validate([
            'name' => 'required',            
            'type' => 'required',
            'status' => 'required',
            'icon' => 'nullable',
            'description' => 'nullable',
            'offer' =>'nullable|boolean',
            'title_offer' => 'nullable',
            'icon_awesome_offer' => ['nullable', new IconAwesomeOffer],
            'icon_image_offer' => 'nullable|image',
            'icon_image_offer_hover' => 'nullable|image'
        ]);        
        $icon='images/categoria.png';
        $icon_name='categoria.png';
        $thumb='categoria.png';
        $ext='png';
        $path_tag = '/storage/';
        //si no es categoría(type=0) debe de ser subcategoría (type=1)
        if($validated['type'] != 0){
            $icon='images/subcategoria.png';
            $icon_name='subcategoria.png';
            $thumb='subcategoria.png';
        }        
//comprobar si existe otro slug igual
        $category = Cat::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'type' => $validated['type'],
            'status' => $validated['status'],           
            'description' => $this->description,
            'path_tag' => $path_tag,
            'file_name' => $icon_name,
            'file_ext' => $ext,
            'image' => $icon,
            'thumb' => $thumb,
            'offer' => $validated['offer'],
            'title_offer' => $validated['title_offer'],
            'icon_awesome_offer' => $validated['icon_awesome_offer'],
            'icon_image_offer' => $validated['icon_image_offer'],
            'icon_image_offer_hover' => $validated['icon_image_offer_hover']

        ]);
        if($validated['icon'] !== null){
//comprobar si existe imagen y eliminar la anterior
            $icon_name = $this->icon->getClientOriginalName();
            $ext = $this->icon->getClientOriginalExtension();            
            //almacenamos con el método store que genera un nombre de archivo aleatorio
            $path_date= date('Y-m-d');
            $icon = $this->icon->store('public/files/'.$path_date,'local');

            $path_tag = '/storage/';
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
    //edición de categoría/subcategoría
    public function edit($id){
        if($this->filter_type == 2):
            $cat=Cat::onlyTrashed()->where('id',$id)->first();
        else:
            $cat=Cat::where('id',$id)->first();
        endif;

        $this->cat_id=$cat->id;
//por comprobar em método parent_cat
        //(se podría evitar la consulta $cat y llamar al método parent_cat del modelo 
        //Profile belongsTo...)
        //asignación de datos mediante consulta a tabla categories 
        $this->name = $cat->name;        
        $this->type=$cat->type;        
        $this->status=$cat->status;
        $this->description = $cat->description;
        $this->offer = $cat->offer;
        $this->title_offer = $cat->title_offer;
        $this->icon_awesome_offer = $cat->icon_awesome_offer;
        $this->file_name = $cat->file_name;
        //$this->icon = $cat->image;

        $this->thumb = $cat->thumb;
        $this->typealert="success";
        $this->emit('description2',$this->description);
    }
    //actualización de categoría/subcategoría
    public function update(){
        $this->emit('loading','loading');
        if($this->cat_id){            
            $validated = $this->validate([
                'name' => 'required',
                'type' => 'required',
                'status' => 'required',
                'icon' => 'nullable|image',
                'description' => 'nullable|string',
                'offer' =>'nullable|boolean',
                'title_offer' => 'nullable|string',
                'icon_awesome_offer' => ['nullable', new IconAwesomeOffer],
                'icon_image_offer' => 'nullable|image',
                'icon_image_offer_hover' => 'nullable|image'
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
                    'description' => $validated['description'],
                    'offer' => $validated['offer'],
                    'title_offer' => $validated['title_offer'],
                    'icon_awesome_offer' => $validated['icon_awesome_offer'],
                    'icon_image_offer' => $validated['icon_image_offer'],
                    'icon_image_offer_hover' => $validated['icon_image_offer_hover']
                ]);
            }else{
                
    //comprobar si existe imagen y eliminar la anterior            
                $icon_name = $this->icon->getClientOriginalName();
                $ext = $this->icon->getClientOriginalExtension();
                //almacenamos con el método store que genera un nombre de archivo aleatorio
                $path_date= date('Y-m-d');
                $icon = $this->icon->store('public/files/'.$path_date,'');
                $path_tag = '/storage/';                
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
                    'offer' => $validated['offer'],
                    'title_offer' => $validated['title_offer'],
                    'icon_awesome_offer' => $validated['icon_awesome_offer'],
                    'icon_image_offer' => $validated['icon_image_offer'],
                    'icon_image_offer_hover' => $validated['icon_image_offer_hover'],
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
    //Los 2 métodos siguientes (saveCatId, clearCatId) son necesarios para 
    //la confirmación de borrado de categoría (mediante un modal de bootstrap), 
    //guardar y limpiar el id de la categoría seleccionada de forma temporal 
    public function saveCatId($cat_id,$action){        
        $this->catIdTmp=$cat_id;
        $this->actionTmp = $action;
        
        if($cat_id != 0){
            //comprobamos si esta categoría tiene subcategorías ( no se podrá eliminar ) - mediante count_cat comprobamos en la vista
            $this->count_cat = Cat::where('type',$cat_id)->count();
            if($this->count_cat == 0){
                //comprobamos si esta categoría tiene productos asociados ( no se podrá eliminar )
                $this->count_cat = Product::where('category_id',$cat_id)
                            ->orWhere('subcategory_id',$cat_id)->count();
            }
        }
    }
    //quizás sea necesario establecer a null el catIdTmp en el método mount() al recargar la página
    public function clearCatId(){
        $this->catIdTmp='';
    }

    //botón X de buscador para eliminar datos de búsqueda
    public function clearSearch(){
        $this->search_data='';
    }
    //no utlizado
    
    public function updated(){
        
        //si establecemos categoría padre como ninguna, se puede acceder a la
        //sección de ofertas, si seleccionamos alguna categoría ya existente 
        //se restringe el acceso, esto se hace desde la vista.
        //Mediante la variable offer establecemos el switch de ofertas a false para
        //desactivarlo cuando seleccionamos una categoría ya existente (cualquiera distinta a Ninguna)
        if($this->type != 0){
            //$this->emit('editor_destroy');
            $this->offer = false;
            
        }
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

    //restaurar categoría/subcategoría
    public function restore($id){
        $cat = Cat::onlyTrashed()->where('id',$id)->first();
        $cat->restore();
        $this->typealert = 'success';
        $message = ($cat->type == 0) ?
            "Categoría restaurada correctamente":"Subcategoría restaurada correctamente";
        session()->flash('message',"Categoría restaurada correctamente");
        $this->clear2();
        $this->emit('confirmDel');
    }

    //limpiar datos de formulario
    public function clear(){
        if($this->cat_id)
            $this->cat_id='';        
        $this->name='';
        $this->type=0;
        $this->status=0;
        $this->description="";
        $this->offer = "";
        $this->title_offer= "";
        $this->icon_awesome_offer = "";
        $this->icon_image_offer = null;
        $this->icon_image_offer_hover = null;
//revisar si es necesario limpiar icon,thumb...
        $this->icon = null;
        $this->file_name="";
        $this->thumb= "";        
        //iteration es necesario resetear el caché del input file
        $this->iteration=rand();
        //$this->emit('userUpdated');
    }

    //método intermedio para limpiar datos de formulario
    public function clear2(){
        $this->clear();
        //resetea todos los mensajes de error
        $this->resetValidation();
    }

    //limpiar datos de exportación
    public function clearExport(){
        $this->checkpdf='1';
        $this->checkexcel='';
        $this->email_export='';
    }

    //necesario para limpiar el textarea (CKEDITOR) cuando se cancela la creación
    //de uno nuevo

    public function setckeditor(){
        $this->emit('description1');
    }

    //exportar archivo PDF al navegador del usuario
    public function exportPDF(){
    //opción actual         
        $categories=$this->set_type_query(true);
        //dd($categories);
        $view="livewire.admin.categories.export";
        $pdf=PDF::loadView($view,['categories'=>$categories]);
        $rand = Str::random(10);
        $this->pdf=$pdf;
        return response()->streamDownload(function(){
                    //con print o con echo
            print $this->pdf->stream();//echo $this->pdf->stream();
        },$rand.'.pdf');
    }

    //exportar archivo Excel al navegador del usuario
    public function exportExcel(){
        $categories=$this->set_type_query(true);
        return Excel::download(new Export($categories,$this->listname),'exportexcel.xlsx');
    }
    //guardar el archivo PDF en el server para después poder enviar por correo 
    //como archivo adjunto
    public function savePDF(){
        $path_date=date('Y-m-d');
        $categories=$this->set_type_query(true);
        $view="livewire.admin.categories.export";
        $pdf= PDF::loadView($view,['categories'=>$categories]);
        $pdf->save('listado_'.$path_date.'.pdf');
    }
    //guardar archivo Excel en el server para después poder enviar por correo 
    //como archivo adjunto
    public function saveExcel(){
        $path_date=date('Y-m-d');
        $categories=$this->set_type_query(true);
        //grabar en disco

        //si no añadimos aleatorio(random) en ocasiones genera un archivo corrupto, por ejemplo
    //cuando se genera una búsqueda con LIKE. Si se añade un nombre distinto, al no 
    //tener que sobreescribir sobre el anterior archivo, en el servidor, por alguna 
    //razón genera el archivo correctamente.
        $number_rand = Str::random(10);
        $this->file_tmp = 'listado'.$number_rand.'.xlsx';
        return  Excel::store(new Export($categories,$this->listname),$this->file_tmp,'public');
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
            
            if($this->checkexcel && file_exists(public_path($this->file_tmp))){
                unlink(public_path($this->file_tmp));    
            }
        //sustituimos el flash por redirect(), ya que el div del message se muestra //correctamente pero genera conflicto con el dropdown de export, y al enviar
        //correo ya no desplega el dropdown de exportar 
        //session()->flash('message',"Correo enviado correctamente");
        return redirect()->route('list_categories',['filter_type' => $this->filter_type])->with('message',"Correo enviado correctamente")->with('only_component','true');
            //limpiar datos de selección para el envio (correo y archivos adjuntos)
        $this->clearExport();
        $this->emit("sendModal");
        }
    }

    //mostrar listado de subcategorías
    public function renderSubCat($subcat_id,$name){
        
        if($this->page != 1){
            $this->resetPage();
        }
        
        //dd(url()->current());
        $this->subcatlist['name']=$name;
        $this->subcatlist['id'] = $subcat_id;
        //método para mostrar el minilink de subcategorías
        $this->emit('minilink',$subcat_id,$name,'icon_subcat');
        //subcat permite distinguir en la vista si es padre o hijo, como también realizar comprobaciones 
        //en cada renderizado (render()), si existe es que se ha iniciado el método renderSubCat()  
        //indicando que se ha accedido a una subcategoría
        $this->subcat=$subcat_id;
    }

    public function render()
    {
        //fopen(public_path('hola.txt'),'w');
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
        
        //$cats[0] = 'Ninguna';
        $cats = Cat::where('status',1)->where('type',0)->orderBy('id','desc')->pluck('name','id');
        //añadimos al comienzo la opción por defecto
        $cats->prepend('Ninguna','0');

        //si subcat contiene valor establecemos el title, este método es solo si
        // al recargar la página se encuentra en subcategorías, en lugar de usar el
        //evento popstate en javascript, para el resto de opciones usamos popstate

        //reseteamos botón de volver
        $this->btn_back=false;
        //dd($this->subcat);
        if($this->subcat){  
            
            //obtenemos el nombre de la categoría padre del primer elemento de la lista
            //comprobando si existe
    //el subcatlist['id'] representa el id de la categoría seleccionada
    //el subcatlist['name'] representa el nombre de la categoría seleccionada
            if($query[0] && $query[0]->parentcat->name){
                $this->subcatlist['name'] = $query[0]->parentcat->name;
                $this->subcatlist['id'] = $this->subcat;
            }else{
                //si no existen elementos pasamos la variable "btn_back" a true,
                //de esa forma podemos mostrar el botón volver
                $this->btn_back = true;
                //para obtener el nombre en un listado sin elementos aprovechamos la 
                //consulta $cats destinada para el select, pero solo funciona si el 
                //filtrado es público(filter_type = 1), si no, necesitamos realiza otra
                //consulta. Esto es solo necesario para poder mostrar el enlace de
                //"minilink" mostrando el nombre de la subcategoría y solo al recargar
                //la página ya que en el método renderSubcat ya enviamos el nombre
                
                //si el filtrado es público aprovechamos el resultado $cats;
                if(($this->filter_type == 1)){                    
                    $cattmp=$cats;
                //si no es público realizamos la consulta, no afectará en rendimiento
                //de forma visible ya que solo será necesario si se recarga la página
                }else{
                    $cattmp = Cat::where('status',$this->filter_type)->pluck('name','id');
                }
                if($query->total() > 0){
                    $this->subcatlist['name']=$cattmp[$this->subcat];
                    $this->subcatlist['id'] = $this->subcat;
                }
            }
        }
        $data = ['categories' => $query,'filter_type' => $this->filter_type,'cats' => $cats,'iteration' => $this->iteration,'typealert' => $this->typealert,'subcatname' => $this->subcatlist['name']];
        
        return view('livewire.admin.categories.index',$data);
    }
}
