<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Attribute as Attr;
use App\Functions\Export;
use Str,Auth,PDF,Excel;
use Illuminate\Support\Facades\Mail;
//use Maatwebsite\Excel\Concerns\FromCollection;
use App\Mail\Listado;
class Attribute extends Component
{

    public $name;
    //status:publico/borrador/reciclaje/todos 
    public $status;
    //filter_type filtrado de status
    public $filter_type;
    //lista de atributos padres
    public $parent_attr;
    public $description;
    //$attr_id: data binding de input hidden en vista edit y en métodos edit,update y clear
    public $attr_id;
    public $typealert='success';
    //$attr: id de la categoría a la que pertenece el valor("subatributo"), puede 
    //generarse mediante el método renderValues() o obteniéndolo desde la url
    public $attr;
    //$attrlist contiene el id y name del atributo seleccionado para gestionar los valores
    public $attrlist = ['id' => null,'name' => null];
    //$value es el valor de type, que puede ser 0 indicando que es un atributo,
    //de lo contrario será un valor("subatributo"), en ese caso $value corresponderá
    //con el id del atributo padre, similar a categorías y subcategorías 
    public $value;
    //$btn_back: botón volver
    public $btn_back;
    //ordenamiento columnas
    public $order_type;
    //columna seleccionada para ordenamiento
    public $selectedCol;
    //campo de búsqueda
    public $search_data;

    //id temporal de atributo/valor para la eliminación
    public $attrIdTmp;
    public $count_attr;

    //exportación
    protected $pdf;
    public $checkpdf='1';
    public $checkexcel;
    public $email_export;

    public $listname ='attributes';
    public $username;

    //archivo temporal para poder eliminar el archivo Excel descargado, ya que 
    //al sobreescribir genera error.
    public $file_tmp;
    public function mount($filter_type){
        $this->filter_type = $filter_type;
        $this->order_type = 'asc';
        $this->username = Auth::user()->name;
    }

    public function set_type_query($export=false){
        $query;        
        $query = $this->set_filter_query($this->filter_type,$export,$this->attr);
        return $query;
    }

    public function set_filter_query($filter_type,$export=false,$attr=0){
        $res='';
        $search_data = '%'.$this->search_data.'%';

        $attr = ($attr) ? $attr : 0;
        $col_order = 'id';
        if($this->selectedCol)
            $col_order = $this->selectedCol;

        $order = $this->order_type;
        //si es reciclaje creamos consulta con onlyTrashed(los eliminados mediante softDelete())
        if($filter_type == 2){
            $init_query = ($this->search_data) ?
                Attr::onlyTrashed()->where('name','LIKE',$search_data)->where('type',$attr)
                :
                Attr::onlyTrashed()->orderBy($col_order,$order)->where('type',$attr);
        }elseif($filter_type == 3){
            $init_query = ($this->search_data) ?
                Attr::where('name','LIKE',$search_data)->where('type',$attr)
                :
                Attr::where('type',$attr);
        }else{            
            $init_query = ($this->search_data) ?
                Attr::where('name','LIKE',$search_data)->where('status',$filter_type)->where('type',$attr)
                :
                Attr::where('status',$filter_type)->where('type',$attr);


        }
        switch($filter_type):
            case '0':
                //$this->filterType = $filterType;
                ($export) ?
                    $res = $init_query->orderBy($col_order,$order)->get()
                    :
                    $res = $init_query->orderBy($col_order,$order)->paginate(10);
                break;
            case '1':                
                ($export) ?
                    $res = $init_query->orderBy($col_order,$order)->get()
                    :                
                    $res = $init_query->orderBy($col_order,$order)->paginate(10);
                break;
            case '2':
                ($export) ?
                    $res = $init_query->orderBy($col_order,$order)->get()
                    :
                    $res = $init_query->orderBy($col_order,$order)->paginate(10);
                break;
            case '3':
                //si el filtro es todos(3) realizamos la consulta sin filtrar status
                ($export) ?
                    $res = $init_query->orderBy($col_order,$order)->get()
                    :
                    $res = $init_query->orderBy($col_order,$order)->paginate(10);
                break;

        endswitch;
        return $res;

    }

    //el método store almacena atributo y valor diferenciando mediante $type
    public function store($type=0){
        if($type==0)
            $this->parent_attr = 0;
        
        $validated = $this->validate([
            'name' => 'required',
            'status' =>'required',
            //restricción del select si no se hace change(valor null) o si el select se 
            //cambia pero se vuelve a la opción de "Selecione..." (valor 0)-> sustituido
            //'parent_attr' =>'nullable|required_if:parent_attr,==,null|prohibited_if:parent_attr,==,0',

//modificar mensaje de error mostrado
            //restricción de null y espacio en blanco
            'parent_attr' => 'required_if:parent_attr,==,"",null',
            'description' => 'nullable'
        ]);
        
        $attribute = Attr::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'status' => $validated['status'],
            'type' => $validated['parent_attr'],
            'description' => $this->description
        ]);
        if($type==1){
            $attribute->fill(['type',$attribute->id]);
        }
        $this->typealert = 'success';
        $message = ($attribute->type == 0) ?
            "Atributo creado correctamente":"Valor creado correctamente";
        session()->flash('message',$message);
        $this->clear2();
        if($type == 0)
            $this->emit('addAttribute');
        else
            $this->emit('addValue');
    }

    public function edit($id,$type=0){

        if($this->filter_type == 2):
            $attr=Attr::onlyTrashed()->where('id',$id)->first();
        else:
            $attr=Attr::where('id',$id)->first();
        endif;

        $this->attr_id=$attr->id;
        //(se podría evitar la consulta $user y llamar al método user del modelo 
        //Profile belongsTo...)
        //asignación de datos mediante consulta a tabla users 
        $this->name = $attr->name;        
        $this->parent_attr=$attr->type;        
        $this->status=$attr->status;
        $this->description = $attr->description;
        $this->typealert="success";
        $this->emit('description2',$this->description);
    }
    //actualiza atributo y valor mediante $type
    public function update(){
        if(!$this->attr)
            $this->parent_attr = 0;

        if($this->attr_id){
            $validated = $this->validate([
                'name' => 'required',
                'status' =>'required',
                'parent_attr' =>'nullable|required_if:parent_attr,==,"",null',
                'description' => 'nullable'
            ]);
            
            $attr = Attr::where('id',$this->attr_id)->first();
            $attr->update([
                'name' => $validated['name'],
                'slug' => Str::slug($validated['name']),
                'status' => $validated['status'],
                'type' => $validated['parent_attr'],
                'description' => $this->description
            ]);
            //if($type==1){
                //$attr->fill(['type',$this->parent_attr]);
            //}
        }
        $this->typealert = 'success';
        $message = ($attr->type == 0) ?
            "Atributo actualizado correctamente":"Valor actualizado correctamente";
        session()->flash('message',$message);
        $this->clear2();
        $this->emit('editAttribute');
    }

    //se inicia cada vez que mostramos el modal que contiene editor
    public function setckeditor(){        
        $this->emit('description1');
    }
    //eliminación de categoría
    public function delete(){        
        if($this->attrIdTmp){
            $attr=Attr::where('id',$this->attrIdTmp)->first();
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
            $attr->delete();
            $this->typealert='danger';
            $message = ($attr->type == 0) ?
            "Atributo eliminado correctamente":"Valor eliminado correctamente";
            session()->flash('message', $message);
            $this->clear2();
            $this->emit('confirmDel');
        }
    }

    //restaurar categoría/subcategoría
    public function restore($id){
        $attr = Attr::onlyTrashed()->where('id',$id)->first();
        $attr->restore();
        $this->typealert = 'success';

        //según sea valor o atributo modificamos el mensaje        
        $message = ($attr->type == 0) ?
            "Atributo restaurado correctamente":"Valor restaurado correctamente";        
        session()->flash('message',$message);
    }

    //exportar archivo PDF al navegador del usuario
    public function exportPDF(){
    //opción actual         
        $attributes=$this->set_type_query(true);        
        $view="livewire.admin.attributes.export";
        $pdf=PDF::loadView($view,['attributes'=>$attributes,'attr' => $this->attr]);
        $this->pdf=$pdf;
        return response()->streamDownload(function(){
                    //con print o con echo
            print $this->pdf->stream();//echo $this->pdf->stream();
        },'test.pdf');
    }

    //exportar archivo Excel al navegador del usuario
    public function exportExcel(){
        $attributes=$this->set_type_query(true);
        
        return Excel::download(new Export($attributes,$this->listname,$this->attr),'exportexcel.xlsx');
    }
    //guardar el archivo PDF en el server para después poder enviar por correo 
    //como archivo adjunto
    public function savePDF(){
        $path_date=date('Y-m-d');
        $attributes=$this->set_type_query(true);        
        
        $view="livewire.admin.attributes.export";
        $pdf= PDF::loadView($view,['attributes'=>$attributes,'attr' => $this->attr]);
        $pdf->save('listado_'.$path_date.'.pdf');
    }
    //guardar archivo Excel en el server para después poder enviar por correo 
    //como archivo adjunto
    public function saveExcel(){
        $path_date=date('Y-m-d');
        $attributes=$this->set_type_query(true);
        //grabar en disco
    //si no añadimos aleatorio(random) en ocasiones genera un archivo corrupto, por ejemplo
    //cuando se genera una búsqueda con LIKE. Si se añade un nombre distinto, al no 
    //tener que sobreescribir sobre el anterior archivo, en el servidor, por alguna 
    //razón genera el archivo correctamente.
        $number_rand = Str::random(10);
        $this->file_tmp = 'listado'.$number_rand.'.xlsx';
        return  Excel::store(new Export($attributes,$this->listname,$this->attr),$this->file_tmp,'public');
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
        if(file_exists(public_path($this->file_tmp))){
            unlink(public_path($this->file_tmp));    
        }
        
        //sustituimos el flash por redirect(), ya que el div del message se muestra //correctamente pero genera conflicto con el dropdown de export, y al enviar
        //correo ya no desplega el dropdown de exportar 
        session()->flash('message',"Correo enviado correctamente");
        
        return redirect()->route('list_attributes',['filter_type' => $this->filter_type,'attr' => $this->attr])->with('message',"Correo enviado correctamente")->with('only_component','true');
            //limpiar datos de selección para el envio (correo y archivos adjuntos)
        $this->clearExport();
        $this->emit("sendModal");
        }
    }
    //Los 2 métodos siguientes (saveCatId, clearCatId) son necesarios para 
    //la confirmación de borrado de categoría (mediante un modal de bootstrap), 
    //guardar y limpiar el id de la categoría seleccionada de forma temporal 
    public function saveAttrId($attr_id){        
        $this->attrIdTmp=$attr_id;
        //revisar en producción
        //comprobamos si existen valores asociados a ese atributo, en caso de existir
        //no se puede eliminar y cambia el mensaje de confirm
        if($attr_id !=0){
            $this->count_attr = Attr::where('type',$attr_id)->count();
        }
    }
    //si se recarga la página tb se resetea el catIdTmp, en el método mount()
    public function clearAttrId(){
        $this->attrIdTmp='';
    }

    //limpiar datos de formulario
    public function clear(){
        if($this->attr_id)
            $this->attr_id='';        
        $this->name='';
        $this->type=0;
        $this->status=0;
        $this->description="";
    }

    //limpiar datos de exportación
    public function clearExport(){
        $this->checkpdf='1';
        $this->checkexcel='';
        $this->email_export='';
    }

    //método intermedio para limpiar datos de formulario
    public function clear2(){
        $this->clear();
        //resetea todos los mensajes de error
        $this->resetValidation();
    }

    //botón X de buscador para eliminar datos de búsqueda
    public function clearSearch(){
        $this->search_data='';
    }

    public function renderValues($attr_id,$attr_name){
        $this->attrlist['id'] = $attr_id;
        $this->attrlist['name'] = $attr_name;
        $this->emit('attribute',$attr_id,$attr_name);
        //value permite distinguir en la vista si es padre o hijo, como también realizar comprobaciones 
        //en cada renderizado (render()), si existe es que se ha iniciado el método renderValues()  
        //indicando que se ha accedido a un valor ("subatributo") en lugar de un atributo (atributo padre)
        $this->attr = $attr_id;
    }
    public function render()
    {

        $query = $this->set_type_query();        
        $attrs = Attr::where('status',1)->where('type',0)->orderBy('id','desc')->pluck('name','id');
        //añadimos a la opción por defecto del select NULL o "" en lugar de 0 para la validación 
        $attrs->prepend('Selecione...',NULL);
        

        if($this->attr){

            if($query[0] && $query[0]->parentattr->name){
                $this->attrlist['name'] = $query[0]->parentattr->name;
                $this->attrlist['id'] = $this->attr;    
            }else{
                $this->btn_back=true;
                if($this->filter_type == 1){
                    $attrtmp = $attrs;
                }else{
                    $attrtmp = Attr::where('status',$this->filter_type)->pluck('name','id');
                }
//revisar si en borrador,reciclaje y todos es necesario el attrlist['name'] y el attrlist['id'], da error si la consulta viene vacía, utilizado para mostrar el botón Atrás
                if($query->total() > 0){
                    $this->attrlist['name'] = $attrtmp[$this->attr];
                    $this->attrlist['id'] = $this->attr;
                }
            }
        }
        $data = ['attributes'=>$query,'filter_type' => $this->filter_type,'attrs' => $attrs,'typealert' => $this->typealert];
        //dd($this->attr);
        return view('livewire.admin.attributes.index',$data);
    }
}
