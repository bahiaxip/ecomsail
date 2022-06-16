<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order as Ord;
use Livewire\WithPagination;
class Order extends Component
{
    use WithPagination;
    //public $orders;
    public $filter_type;

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

    //nombre de listado para envió de email
    public $listname;
    //nombre de usuario para envió de email
    public $username;
    //elementos por página
    public $limit_page=10;
    //listado de registros seleccionados mediante checkbox    
    public $selected_list;
    //select de acciones por lote
    public $action_selected_ids;
    //acción temporal para el modal confirm (delete/restore)
    public $actionTmp;

    public $orderIdTmp;
    public $typealert;

    public function mount($filter_type){
        $this->filter_type = $filter_type;
        $this->order_type = 'asc';
        $this->listname = 'orders';
        $this->checkpdf = 1;
    }

    public function updated(){
        //si se encuentra en otra página resetea, si no, el buscador
        //no realiza correctamente la búsqueda
        if($this->search_data)
            $this->resetPage();

    }

    public function set_type_query($export=false){
        $query;        
        $query = $this->set_filter_query($this->filter_type,$export);
        return $query;
    }
    public function set_filter_query($filter_type,$export=false){
        $res='';
        $search_data = '%'.$this->search_data.'%';

        $col_order = 'id';
        if($this->selectedCol)
            $col_order = $this->selectedCol;

        $order = $this->order_type;
        //si es reciclaje creamos consulta con onlyTrashed(los eliminados mediante softDelete())
        if($filter_type == 2){
            $init_query = ($this->search_data) ?
                Ord::onlyTrashed()->where('order_num','LIKE',$search_data)
                ->orderBy($col_order,$order)
                :
                Ord::onlyTrashed()->orderBy($col_order,$order);
        }elseif($filter_type == 3){
            $init_query = ($this->search_data) ?
                Ord::where('order_num','LIKE',$search_data)->orderBy($col_order,$order)
                :
                Ord::orderBy($col_order,$order);
        }else{            
            $init_query = ($this->search_data) ?
                Ord::where('order_num','LIKE',$search_data)->where('status',$filter_type)->orderBy($col_order,$order)
                :

                Ord::where('status',$filter_type)->orderBy($col_order,$order);
                


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

    //eliminación de categoría
    public function delete(){        
        if($this->orderIdTmp){
            //$order=Ord::where('id',$this->orderIdTmp)->first();
            $order = Ord::findOrFail($this->orderIdTmp);
            $order->delete();
            $this->typealert='danger';
            $message = "Pedido eliminado correctamente";
            session()->flash('message', $message);
            //$this->clear2();
            $this->emit('confirmDel');
        }
    }

    //restaurar categoría/subcategoría
    public function restore($id){
        $order = Ord::onlyTrashed()->where('id',$id)->first();
        $order->restore();
        $this->typealert = 'success';

        //según sea valor o atributo modificamos el mensaje        
        $message = "Pedido restaurado correctamente";
        session()->flash('message',$message);
        //$this->clear2();
        $this->emit('confirmDel');
    }

    public function saveOrderId($order_id,$action){        
        $this->orderIdTmp = $order_id;
        $this->actionTmp = $action;
    }
    //si se recarga la página tb se resetea el catIdTmp, en el método mount()
    public function clearOrderId(){
        $this->orderIdTmp='';
    }
    //botón X de buscador para eliminar datos de búsqueda
    public function clearSearch(){
        $this->search_data='';
    }
    public function render()
    {

        $query = $this->set_type_query();
        $data = ['orders' => $query];
        return view('livewire.admin.orders.index',$data);
    }
}
