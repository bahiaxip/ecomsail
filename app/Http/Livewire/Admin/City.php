<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use  Livewire\WithFileUploads;
use Livewire\WithPagination;
//models
use App\Models\City as Ci,App\Models\Zone, App\Models\Location, App\Models\Province;

use App\Functions\Export;
use Str,PDF,Excel,Auth;

use Illuminate\Support\Facades\Mail;
use App\Mail\Listado;
class City extends Component
{

    use WithFileUploads;
    use WithPagination;

    public $city_name;
    public $zone;
    public $location;
    public $province;
    public $icon;
    public $status;    
    public $isocode_alpha2;
    public $isocode_num;

    //parámetros URL
    public $location_id;
    public $filter_type;
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

    //public $zones;
    public $city_id;
    public $locations;
    public $provinces;
    public $zones;
    //continente/zona del país seleccionado
    public $zone_location_selected;

    //id temporal
    public $cityIdTmp;

    public $limit_page=10;

    public function mount($country,$filter_type){

        $this->location_id = $country;
        $this->filter_type = $filter_type;
        $this->order_type = 'asc';
        $this->listname = 'locations';
        $this->username=Auth::user()->name;
        $this->checkpdf = 1;
    }

    //actualizar datos de consulta de orden por columna (si se clica en el nombre las columnas)
    public function setColAndOrder($nameCol=null){
        //posibles columnas
        $cols=['id','name','province_id'];
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
        $city='';
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
        if($filter_type==2){
            $init_query = ($this->search_data) ?
                Ci::onlyTrashed()->where('name','LIKE',$search_data)->where('location_id',$this->location_id)->orderBy($col_order,$order)
                :
                Ci::onlyTrashed()->where('location_id',$this->location_id)->orderBy($col_order,$order);
        }        
        else if($filter_type==3){
            $init_query = ($this->search_data) ?
                Ci::where('name','LIKE',$search_data)->where('location_id',$this->location_id)->orderBy($col_order,$order)
                :
                Ci::where('location_id',$this->location_id)->orderBy($col_order,$order);
        }else{
            $init_query = ($this->search_data) ?
                Ci::where('name','LIKE',$search_data)->where('location_id',$this->location_id)->where('status',$filter_type)->orderBy($col_order,$order)
                :
                Ci::where('status',$filter_type)->where('location_id',$this->location_id)->orderBy($col_order,$order);
        }
        
        switch($filter_type):
            case '0':
                //$this->filterType = $filterType;
                ($export) ?
                    $res = $init_query->get()
                    :
                    $res = $init_query->paginate($this->limit_page);
                break;
            case '1':                
                ($export) ?
                    $res = $init_query->get()
                    :                
                    $res = $init_query->paginate($this->limit_page);
                break;
            case '2':                
                ($export) ?
                    $res = $init_query->get()
                    :                
                    $res = $init_query->paginate($this->limit_page);
                break;            
            case '3':
                //si el filtro es todos(3) realizamos la consulta sin filtrar status
                ($export) ?
                    $res = $init_query->get()
                    :
                    $res = $init_query->paginate($this->limit_page);
                break;
        endswitch;
        return $res;
    }

    public function store(){
        $validated = $this->validate([
            'city_name' => 'required',            
            'location' => 'required',
            'province' => 'nullable',
            'icon' => 'nullable',
            'status' => 'required',
            'isocode_alpha2' => 'nullable',
            'isocode_num' => 'nullable'
        ]);
        $city = Ci::create([
            'name' => $validated['city_name'],
            'status' => $validated['status'],
            'location_id' => $validated['location'],
            'province_id' => $validated['province'],
            'isocode_alpha2' => $validated['isocode_alpha2'],
            'isocode_num' => $validated['isocode_num'],
        ]);
        if($validated['icon'] !== null){
//comprobar si existe imagen y eliminar la anterior
            $icon_name = $this->icon->getClientOriginalName();
            $ext = $this->icon->getClientOriginalExtension();
            //almacenamos con el método store que genera un nombre de archivo aleatorio
            $path_date= date('Y-m-d');
            $icon = $this->icon->store('public/files/'.$path_date,'');
            $path_tag = 'public/files/'.$path_date.'/';                
            //sustituimos el directorio public por storage
            $path_tag2 = str_replace('public','storage',$path_tag);                
            $icon = str_replace($path_tag,"",$icon);

            $city->update([
                'path_tag' => $path_tag2,
                'icon' => $icon,
            ]);
        }
        
        $this->typealert = 'success';
        session()->flash('message','Ciudad creada correctamente');
        $this->clear2();
        $this->emit('addCity');
    }
    public function edit($id){
        $city = Ci::findOrFail($id);
        $this->city_id = $city->id;

        $this->city_name = $city->name;
        $this->location = $city->location_id;
        $this->province = $city->province_id;
        $this->status = $city->status;
        $this->isocode_alpha2 = $city->isocode_alpha2;
        $this->isocode_num = $city->isocode_num;

        $this->zones = Zone::pluck('name','id');
        if(!$this->locations){
            //obtenemos el continente del país(location) seleccionado
            $zone = Location::findOrFail($this->location_id);
            $this->zone_location_selected = $zone->zone;
            $this->zone = $zone->zone;
            //dd($this->location_id);
            $this->location = $this->location_id;            

            //obtenemos los paises del mismo continente al seleccionado
            $this->locations = Location::where('zone',$zone->zone)->pluck('name','id');
        }
    }

    public function update(){

        $validated = $this->validate([
            'city_name' => 'required',            
            'location' => 'required',
            'province' => 'nullable',
            'icon' => 'nullable',
            'status' => 'required',
            'isocode_alpha2' => 'nullable',
            'isocode_num' => 'nullable'
        ]);

        $city = Ci::findOrFail($this->city_id);
        $city->update([
            'name' => $validated['city_name'],
            'status' => $validated['status'],
            'location_id' => $validated['location'],
            'province_id' => $validated['province'],
            'isocode_alpha2' => $validated['isocode_alpha2'],
            'isocode_num' => $validated['isocode_num'],
        ]);
        if($validated['icon'] !== null){

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

            $city->update([
                'path_tag' => $path_tag2,
                'icon' => $icon,
            ]);
        }
        
        $this->typealert = 'success';
        session()->flash('message','Ciudad actualizada correctamente');
        $this->clear2();
        $this->emit('editCity');
    }

    //Los 2 métodos siguientes (saveCatId, clearCatId) son necesarios para 
    //la confirmación de borrado de categoría (mediante un modal de bootstrap), 
    //guardar y limpiar el id de la categoría seleccionada de forma temporal 
    public function saveCityId($city_id,$action){        
        $this->cityIdTmp=$city_id;
        $this->actionTmp = $action;
        /*
        if($city_id != 0){
            //comprobamos si esta categoría tiene subcategorías ( no se podrá eliminar )
            $this->count_cities = Cat::where('type',$city_id)->count();
            if($this->count_cities == 0){
                //comprobamos si esta categoría tiene productos asociados ( no se podrá eliminar )
                $this->count_cities = City::where('category_id',$cat_id)->count();
            }
        }
        */  
    }
    //quizás sea necesario establecer a null el catIdTmp en el método mount() al recargar la página
    public function clearCityId(){
        $this->cityIdTmp='';
    }

    //eliminación de categoría
    public function delete(){
        if($this->cityIdTmp){
            $city=Ci::where('id',$this->cityIdTmp)->first();
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
            
            $city->delete();
            
            $this->typealert='danger';
            session()->flash('message', "Ciudad eliminada correctamente");

            //session()->flash('typealert' , 'success');
            $this->clear2();
            $this->emit('confirmDel');
        }
    }

    //restaurar categoría/subcategoría
    public function restore($id){
        $city = Ci::onlyTrashed()->where('id',$id)->first();
        $city->restore();
        $this->typealert = 'success';
        session()->flash('message',"Categoría restaurada correctamente");
        $this->clear2();
        $this->emit('confirmDel');
    }

    //establecer listado de países según zona
    public function set_location(){
        $query= Location::where('zone',$this->zone);
        $this->locations = $query->pluck('name','id');
        //obtenemos el id del primer país para que al cambiar el listado de zonas
        //establezca el primero automáticamente
        if(!$this->location)
            $this->location = $query->pluck('id')->first();

        //$loc = $query->pluck('id','name')->first();
        
    }
    //establecer listado de provincias si se selecciona España en listado de país
    public function set_province(){
        //si es España añadimos las provincia
        if($this->location == 58){
            $query = Province::where('location_id',58);
            $this->provinces = $query->pluck('name','id');
            //obtenemos el id de la primera provincia para que al cambiar el listado de 
            //países se establezca el primero automáticamente, esto solo es viable si 
            //muestra el listado automáticamente, en el caso de España(58)
            if(!$this->province)
                $this->province = $query->pluck('id')->first();
        }else{
            $this->provinces=null;
        }
    }
    //crear ciudad
    public function addCity(){
        $this->zones = Zone::pluck('name','id');
        if(!$this->locations){
            //obtenemos el continente del país(location) seleccionado
            $zone = Location::findOrFail($this->location_id);
            $this->zone_location_selected = $zone->zone;
            $this->zone = $zone->zone;
            //dd($this->location_id);
            $this->location = $this->location_id;
            $this->status = 0;

            //obtenemos los paises del mismo continente al seleccionado
            $this->locations = Location::where('zone',$zone->zone)->pluck('name','id');
        }
    }

    public function clear(){
        if($this->city_id)
            $this->city_id='';        
        $this->city_name='';
        $this->zone=null;
        $this->locations=null;        
        $this->location=null;
        $this->province=null;
        $this->provinces=null;
        $this->iso_alpha2=null;
        $this->iso_num=null;
        
        
//revisar si es necesario limpiar icon,thumb...
        $this->icon = null;        
        //iteration es necesario resetear el caché del input file
        //$this->iteration=rand();
        //$this->emit('addCity');
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

    public function render()
    {           
        
        //$cities = Ci::orderBy('id','asc')->where('location_id',$this->location_id)->paginate(10);
        $cities = $this->set_type_query();
        //no sería necesario pasar filter_type ni location_id, ya que son globales
        $data = ['cities' => $cities,'filter_type' => $this->filter_type,'location_id' => $this->location_id];
        return view('livewire.admin.cities.index',$data);
    }
}
