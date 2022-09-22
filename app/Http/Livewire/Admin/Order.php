<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order as Ord, App\Models\Invoice;
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
    //select de acciones por lote (anulado)
    //public $action_selected_ids;
    //acción temporal para el modal confirm (delete/restore)
    public $actionTmp;
    //temporal para enviar email
    public $file_tmp;

    public $orderIdTmp;
    public $typealert='success';
    //necesario count_order para indicar a los modals que el pedido tiene 
    //facturas asociadas y no se puede eliminar
    public $count_order;



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
    //actualizar datos de consulta de orden por columna (si se clica en el nombre las columnas)
    public function setColAndOrder($nameCol=null){
        //posibles columnas
        $cols=['id','order_num','selected_address'];
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
    public function set_filter_query($filter_type,$export=false){
        $res='';
        $search_data = '%'.$this->search_data.'%';

        $col_order = 'id';
        if($this->selectedCol)
            $col_order = $this->selectedCol;

        $order = $this->order_type;
        //si es reciclaje creamos consulta con onlyTrashed(los eliminados mediante softDelete())
        
        switch($filter_type):
            case '0':
            case '1':
                $init_query = ($this->search_data) ?
                    Ord::whereHas('get_history_address',function($query) use ($search_data){
                        $query->where('lastname','like',$search_data)
                            ->orWhere('name','like',$search_data);
                        })
                        ->orWhere('order_num','like',$search_data)

                    //Ord::where('order_num','LIKE',$search_data)->where('status',$filter_type)->orderBy($col_order,$order)
                    :

                    Ord::where('status',$filter_type);
                break;
            case '2':
                $init_query = ($this->search_data) ?
                    Ord::onlyTrashed()->whereHas('get_history_address',function($query) use ($search_data){
                        $query->where('lastname','like',$search_data)
                            ->orWhere('name','like',$search_data);
                        })
                        ->orWhere('order_num','like',$search_data)
                    :
                    Ord::onlyTrashed();
                break;
            case '3':
                $init_query = ($this->search_data) ?
                    Ord::whereHas('get_history_address',function($query) use ($search_data){
                        $query->where('lastname','like',$search_data)
                            ->orWhere('name','like',$search_data);
                        })
                        ->orWhere('order_num','like',$search_data)
                    :
                    Ord::orderBy($col_order,$order);
                break;

        endswitch;
        //(ANULADA LA EXCLUSIÓN):excluimos los pedidos con selected_address en 0,
        //que indica que no se ha finalizado la compra(no se ha añadido una dirección)

        //comprobamos export por si es para generar excel,pdf o para consulta en pantalla
        ($export) ?
            $res = $init_query->orderBy($col_order,$order)->get()
            :
            $res = $init_query->orderBy($col_order,$order)->paginate($this->limit_page);

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
        if($order_id != 0){
        //comprobamos si este pedido tiene facturas asociadas, por tanto,
        //no se puede eliminar, ya que generaría error al mostrar las facturas
            $this->count_order = Invoice::where('order_id',$order_id)->count();
            //dd($this->count_order);
        }
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

    //limpiar datos de exportación
    public function clearExport(){
        $this->checkpdf='1';
        $this->checkexcel='';
        $this->email_export='';
    }
    //comprobamos la acción seleccionada
    public function set_action_massive($list_ids,$action_selected){        
        $action = $action_selected;
        $list = $list_ids;
        foreach($list as $l){
            if($l != 0){
        //comprobamos si este pedido tiene facturas asociadas, por tanto,
        //no se puede eliminar, ya que generaría error al mostrar las facturas
                $this->count_order = Invoice::where('order_id',$l)->count();
                if($this->count_order > 0){
                    $this->typealert = 'danger';
                    session()->flash('message','No ha sido posible eliminar los pedidos. Alguno de los pedidos seleccionados tienen facturas asociadas');
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
        $this->typealert = 'success';
        session()->flash('message','Acción ejecutada correctamente');        
        $this->selected_list=[];
        $this->emit('clearcheckbox');

    }
    //eliminar seleccionados(aplicar acción de eliminar en lote)
    public function delete_list(){
        Ord::destroy($this->selected_list);
    }

    public function restore_list(){
        Ord::withTrashed()->whereIn('id',$this->selected_list)->each(function ($order,$key){
            $order->restore();
        });
    }

    public function invoices($order_id){
        return redirect()->route('list_invoices',['filter_type'=> 1,'order_id'=> $order_id]);
    }
    public function render()
    {

        $query = $this->set_type_query();
        //$query = Order::where('status',1)->get();
        
        //$q = Ord::where('status',1)->with('get_address')->where('name','like','%'.'asdf'.'%')->get();
        /*
        $search = 'fernando';
        $q = Ord::with(['get_user' => function($query) use ($search){
            $query->where('name','like','%'.$search.'%');
        }])->get();
        foreach($q as $t){
            //dd($t->id);
        }
        */
        //consulta para busqueda de nombre y apellido en tabla relacionada
        /*
        $search = 'gomez';
        $q = Ord::whereHas('get_address',function($query) use ($search){
            $query->where('lastname','like','%'.$search.'%')
            ->orWhere('name','like','%'.$search.'%');
        })->get();
        */
            /*
            with(['get_address' => function($query) use ($search){
            $query->where('name','like','%'.$search.'%');
        }])->get();
        */

        //dd($q->count());
        //dd($query->count());
        $data = ['orders' => $query];
        return view('livewire.admin.orders.index',$data);
    }
}
