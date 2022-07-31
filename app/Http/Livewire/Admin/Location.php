<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use  Livewire\WithFileUploads;
use Livewire\WithPagination;
//models
use App\Models\Location as Loc, App\Models\Zone;

use App\Functions\Export;
use Str,PDF,Excel,Auth;

use Illuminate\Support\Facades\Mail;
use App\Mail\Listado;
class Location extends Component
{

    use WithFileUploads;
    use WithPagination;

    public $country_name;
    public $status;
    public $zone;
    public $vat;
    public $prefix_phone;
    public $coin;
    public $icon;
    public $isocode_alpha2;
    public $isocode_num;
    public $price_default;
    public $default_delivery;
    public $filter_type;

    public $location_id;

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
    //nombre de listado para envió de email
    public $listname;
    //nombre de usuario para envió de email
    public $username;
    //listado de registros seleccionados mediante checkbox    
    public $selected_list;
    //select de acciones por lote
    public $action_selected_ids;
    //acción temporal para el modal confirm (delete/restore)
    public $actionTmp;
    //archivo temporal para poder eliminar el archivo Excel descargado, ya que 
    //al sobreescribir genera error.
    public $file_tmp;

    //consulta para el select de continentes(zones)
    public $zones;

    public $limit_page=10;
    public $typealert = 'success';

    public function mount($filter_type){
        $this->filter_type = $filter_type;
        if($filter_type != 0 && $filter_type != 1 && $filter_type != 3){
            return redirect()->route('home')->with('message','Error en la consulta');
        }
        $this->order_type = 'asc';
        $this->listname = 'locations';
        $this->username=Auth::user()->name;
        $this->checkpdf = 1;
    }

    //actualizar datos de consulta de orden por columna (si se clica en el nombre las columnas)
    public function setColAndOrder($nameCol=null){
        //posibles columnas
        $cols=['id','name','zone'];
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

    public function set_type_query($export=false){  
        $query;

        $query = $this->set_filter_query($this->filter_type,$export);
        return $query;
    }

    public function set_filter_query($filter_type,$export){
        $location='';
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
        
        //si es todos no establecemos status en la consulta para que englobe a 
        //los 2 posibles estados (tanto los de status=0 como los de status=1)        
        switch($filter_type):
            case '0':                
            case '1':                
                $init_query = ($this->search_data) ?
                    Loc::where('name','LIKE',$search_data)->where('status',$filter_type)->orderBy($col_order,$order)
                    :
                    Loc::where('status',$filter_type)->orderBy($col_order,$order);
                break;            
            case '3':
                $init_query = ($this->search_data) ?
                    Loc::where('name','LIKE',$search_data)->orderBy($col_order,$order)
                    :
                    Loc::orderBy($col_order,$order);
                break;

        endswitch;

        ($export) ?
            $res = $init_query->get()
            :
            $res = $init_query->paginate($this->limit_page);

        return $res;
    }

    public function edit($id){
        $location = Loc::findOrFail($id);
        $this->zones = Zone::pluck('name','id');
        
        if($location){
            $this->location_id = $id;
            $this->country_name=$location->name;
            $this->status = $location->status;
            $this->zone = $location->zone;
            if($location->vat)
                $this->vat = $location->vat;
            $this->isocode_alpha2 = $location->isocode_alpha2;
            $this->isocode_num = $location->isocode_num;
            $this->prefix_phone = $location->prefix_phone;
            $this->default_delivery = $location->default_delivery;
        }
    }

    public function update(){
        
        $validated = $this->validate([
            'country_name' => 'required',
            'zone' => 'required|integer',
            'icon' => 'nullable|image',
            'status' => 'required',
            'coin' => 'nullable',
            'vat' => 'nullable|integer',
            'isocode_alpha2' => 'nullable',
            'isocode_num' => 'nullable',
            'prefix_phone' =>'nullable|integer',
            'default_delivery' => 'nullable|integer'
        ]);
        if($this->location_id){
            $location = Loc::findOrFail($this->location_id);

            if($validated['icon'] === null ){
                $location->update([
                    'name' => $validated['country_name'],
                    'zone' => $validated['zone'],                    
                    'status' => $validated['status'],
                    'coin' => $validated['coin'],
                    'vat' => $validated['vat'],
                    'isocode_alpha2' => $validated['isocode_alpha2'],
                    'isocode_num' => $validated['isocode_num'],
                    'prefix_phone' =>$validated['prefix_phone'],
                    'default_delivery' => $validated['default_delivery'],
                ]);
            }else{
                
                //si existe imagen anterior la eliminamos para no sobrecargar el servidor
                if(file_exists($city->path_tag.$city->icon))
                    unlink($city->path_tag.$city->icon);
                
                $icon_name = $this->icon->getClientOriginalName();
                $ext = $this->icon->getClientOriginalExtension();
                //almacenamos con el método store que genera un nombre de archivo aleatorio
                $path_date= date('Y-m-d');
                $icon = $this->icon->store('public/files/'.$path_date,'');
                $path_tag = 'public/files/'.$path_date.'/';                
                //sustituimos el directorio public por storage
                $path_tag2 = str_replace('public','storage',$path_tag);                
                $icon = str_replace($path_tag,"",$icon);

                $location->update([
                    'name' => $validated['country_name'],
                    'zone' => $validated['zone'],
                    'path_tag' => $path_tag2,
                    'icon' => $icon,
                    'status' => $validated['status'],
                    'coin' => $validated['coin'],
                    'vat' => $validated['vat'],
                    'isocode_alpha2' => $validated['isocode_alpha2'],
                    'isocode_num' => $validated['isocode_num'],
                    'prefix_phone' =>$validated['prefix_phone'],
                    'default_delivery' => $validated['default_delivery'],
                ]);
            }
            $this->typealert="success";
            session()->flash('message','País actualizado correctamente');
        }
        $this->clear2();
        $this->emit('editLocation');
    }

    //botón X de buscador para eliminar datos de búsqueda
    public function clearSearch(){
        $this->search_data='';
    }
//falta limpiar icono si no se mantiene el nombre en el input
    //limpiar datos de formulario
    public function clear(){
        if($this->location_id)
            $this->location_id='';        
        $this->name='';
        $this->status=0;
        $this->zone=null;
        $this->vat = null;
        $this->icon=null;        
        $this->isocode_alpha2=null;
        $this->isocode_num=null;
        $this->price_default=null;
        $this->default_delivery=null;
        //iteration es necesario resetear el caché del input file
        //$this->iteration=rand();
        
        $this->emit('editLocation');
    }
    public function clear2(){
        $this->clear();
    }
    //location_id representa el id del pais
    public function renderCities($location_id){     
        return redirect()->route('list_cities',['country' => $location_id,'filter_type' => 1]);
    }

    public function render()
    {

        //$locations = Loc::orderBy('id','asc')->where('status',$this->filter_type)->paginate(10);
        $locations = $this->set_type_query();
        $data = ['locations' => $locations,'filter_type' => $this->filter_type];
        return view('livewire.admin.locations.index',$data);
    }
}
