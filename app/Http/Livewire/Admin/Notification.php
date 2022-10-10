<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Notification as Not;
use Auth;
class Notification extends Component
{
    use WithPagination;
    public $user_id;

    public $filter_type;
    public $typealert;
    public $notIdTmp;
    //campo de búsqueda (wire:model)
    public $search_data;
    //orden columnas (asc/desc)
    public $order_type = 'asc';
    //columna seleccionada
    public $selectedCol='id';
    public $actionTmp;
    public $listname;
    public $limit_page = 15;

    public function mount($filter_type){
        $this->user_id = Auth::id();
        $this->filter_type = $filter_type;
        $this->order_type = 'asc';
        $this->listname = 'notifications';

    }

    public function set_type_query($export=false){
        return $this->set_filter_query($this->filter_type,$export);
    }

    public function set_filter_query($filter_type,$export){
        $not='';
        $search_data = '%'.$this->search_data.'%';
        //columna de referencia para ordenar
        $col_order='id';
        //si $this->selectedCol no es null establecemos la columna seleccionada 
        if($this->selectedCol)
            $col_order=$this->selectedCol;
        //tipo de ordenamiento        
        $order = $this->order_type;

        //si es reciclaje creamos consulta con onlyTrashed(los eliminados mediante softDelete())
        switch($filter_type):
            case '0':
            case '1':
                $init_query = ($this->search_data) ?
                    Not::where('title','LIKE',$search_data)->where('status',$this->filter_type)
                    :
                    Not::where('status',$filter_type);
                break;
            case '2':
                $init_query = ($this->search_data) ?
                    Not::onlyTrashed()->where('title','LIKE',$search_data)
                    :
                    Not::onlyTrashed()->orderBy($col_order,$order);
                break;
            case '3':
                $init_query = ($this->search_data) ?
                    Not::where('title','LIKE',$search_data)
                    :
                    Not::orderBy($col_order,$order);
                break;
        endswitch;
        $not = $init_query->paginate($this->limit_page);
        return $not;
    }

    public function saveNotId($id,$action){
        $this->notIdTmp=$id;
        $this->actionTmp = $action;
    }

    public function delete(){
        if($this->notIdTmp){
            $not = Not::find($this->notIdTmp);
            $not->delete();
            $this->typealert='success';
            session()->flash('message', "Notificación eliminada correctamente");
            $this->clear2();
            $this->emit('confirmDel');
        }
    }

    public function restore(){
        $not = Not::onlyTrashed()->where('id',$this->notIdTmp)->first();
        $not->restore();
        $this->typealert = 'success';
        $message = "Notificación restaurada correctamente";
        session()->flash('message',$message);
        $this->clear2();
        $this->emit('confirmDel');
    }

    public function clear(){

    }

    public function clear2(){
        $this->clear();

        $this->resetValidation();
    }

    //botón X de buscador para eliminar datos de búsqueda
    public function clearSearch(){
        $this->search_data='';
    }

    public function render()
    {
        $query = $this->set_type_query();
        
        $data = ['notifications' => $query];
        return view('livewire.admin.notifications.notification',$data);
    }
}
