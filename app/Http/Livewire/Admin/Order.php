<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order as Ord;
use Livewire\WithPagination;
use App\Functions\Export;
use PDF,Excel,Str;
use App\Mail\Listado;
use Illuminate\Support\Facades\Mail;

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
    //temporal para enviar email
    public $file_tmp;

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

    //exportar archivo PDF al navegador del usuario
    public function exportPDF(){
    //opción actual         
        $orders=$this->set_type_query(true);        
        $view="livewire.admin.orders.export";
        $pdf=PDF::loadView($view,['orders'=>$orders]);
        $this->pdf=$pdf;
        return response()->streamDownload(function(){
                    //con print o con echo
            print $this->pdf->stream();//echo $this->pdf->stream();
        },'test.pdf');
    }

    //exportar archivo Excel al navegador del usuario
    public function exportExcel(){
        $orders=$this->set_type_query(true);
        
        return Excel::download(new Export($orders,$this->listname),'exportexcel.xlsx');
    }

    //guardar el archivo PDF en el server para después poder enviar por correo 
    //como archivo adjunto
    public function savePDF(){
        $path_date=date('Y-m-d');
        $orders=$this->set_type_query(true);
        $view="livewire.admin.orders.export";
        $pdf= PDF::loadView($view,['orders'=>$orders]);
        $pdf->save('listado_'.$path_date.'.pdf');
    }
    //guardar archivo Excel en el server para después poder enviar por correo 
    //como archivo adjunto
    public function saveExcel(){
        $path_date=date('Y-m-d');
        $orders=$this->set_type_query(true);
        //grabar en disco
    //si no añadimos aleatorio(random) en ocasiones genera un archivo corrupto, por ejemplo
    //cuando se genera una búsqueda con LIKE. Si se añade un nombre distinto, al no 
    //tener que sobreescribir sobre el anterior archivo, en el servidor, por alguna 
    //razón genera el archivo correctamente.
        $number_rand = Str::random(10);
        $this->file_tmp = 'listado'.$number_rand.'.xlsx';
        return  Excel::store(new Export($orders,$this->listname),$this->file_tmp,'public');
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
        
        return redirect()->route('list_orders',['filter_type' => $this->filter_type])->with('message',"Correo enviado correctamente")->with('only_component','true');
            //limpiar datos de selección para el envio (correo y archivos adjuntos)
        $this->clearExport();
        $this->emit("sendModal");
        }
    }

    //comprobamos la acción seleccionada
    public function set_action_massive(){        
        $action = $this->action_selected_ids;
        $list = $this->selected_list;
        $this->emit('massiveConfirm');
        if(!empty($list) && count($list) > 0){
    //añadir icono loading      
            switch($action):
                //Eliminar
                case '1':
                    $this->delete_list();
                    break;
                //Restaurar                
                case '2':
                    $this->restore_list();
                    break;
            endswitch;
            //devolvemos el select a 0
            $this->action_selected_ids = 0;
        }        
        $this->typealert = 'success';
        session()->flash('message','Acción ejecutada correctamente');
        $this->selected_list=[];
    }
    //eliminar seleccionados(aplicar acción de eliminar en lote)
    public function delete_list(){
        Ord::destroy($this->selected_list);
    }

    public function restore_list(){
        Ord::whereIn('id',$this->selected_list)->restore();
    }
    public function render()
    {

        $query = $this->set_type_query();
        $data = ['orders' => $query];
        return view('livewire.admin.orders.index',$data);
    }
}
