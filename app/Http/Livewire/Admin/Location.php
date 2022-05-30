<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use  Livewire\WithFileUploads;
use Livewire\WithPagination;
//models
use App\Models\Location as Loc;

use App\Functions\Export;
use Str,PDF,Excel,Auth;

use Illuminate\Support\Facades\Mail;
use App\Mail\Listado;
class Location extends Component
{

    use WithFileUploads;
    use WithPagination;

    public $name;
    public $status;
    public $icon;
    public $iso_alpha2;
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

    public function mount($filter_type){
        $this->filter_type = $filter_type;
        $this->order_type = 'asc';
        $this->listname = 'locations';
        $this->username=Auth::user()->name;
        $this->checkpdf = 1;
    }

    public function render()
    {

        $locations = Loc::orderBy('id','asc')->paginate(10);
        $data = ['locations' => $locations,'filter_type' => $this->filter_type];
        return view('livewire.admin.locations.index',$data);
    }
}
