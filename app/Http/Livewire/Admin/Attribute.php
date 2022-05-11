<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Attribute as Attr;
use Str;
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
    public $typealert;
    //$attr: id de la categoría a la que pertenece el valor("subatributo")
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
    //búsqueda
    public $search_data;


    public function mount($filter_type){
        $this->filter_type = $filter_type;
        $this->order_type = 'asc';
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
                Attr::where('name','LIKE',$search_data)->where('status',$this->filter_type)->where('type',$attr)
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
        session()->flash('message','Atributo creado correctamente');
        $this->clear2();
        $this->emit('addAttribute');
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
        $this->type=$attr->type;        
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
        session()->flash('message','Atributo creado correctamente');
        $this->clear2();
        $this->emit('editAttribute');
    }

    public function exportPDF(){ }
    public function exportExcel(){ }
    public function sendEmail(){ }

    //se inicia cada vez que mostramos el modal que contiene editor
    public function setckeditor(){        
        $this->emit('description1');
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

    //método intermedio para limpiar datos de formulario
    public function clear2(){
        $this->clear();
        //resetea todos los mensajes de error
        $this->resetValidation();
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
            
                $this->attrlist['name'] = $attrtmp[$this->attr];
                $this->attrlist['id'] = $this->attr;
            }
        }
        
        $data = ['attributes'=>$query,'filter_type' => $this->filter_type,'attrs' => $attrs,'typealert' => $this->typealert];
        return view('livewire.admin.attributes.index',$data);
    }
}
