<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order, App\Models\User, App\Models\Visitor;
use Carbon\Carbon;
use Auth;
class Home extends Component
{
    public $count_orderstoday=0;
    public $user_id;
    public $visitors_today;
    public $day_today;
    public $subtotal;
    public $cart= 0;
    public $months;
    public $total_months;
    public $selected_type;
    public $switch_chart = false;

    public function mount(){        
        $this->user_id = Auth::id();
        //día de la fecha de hoy (now())
        $this->day_today = Carbon::today()->format('d');
        $this->visitors_today = $this->get_visitors_today();
        //pedidos actualizados (podríamos añadir el status 1 para que fueran pagados)
        $orders_today = Order::whereDay('created_at',$this->day_today)->get();
        $this->count_orderstoday = $orders_today->count();
        //ventas
        $subtotal = 0;
        foreach($orders_today as $ot){
            $subtotal += $ot->subtotal;
        }
        $this->subtotal = $subtotal;
        if($this->count_orderstoday)
            $this->cart = $subtotal / $this->count_orderstoday;
        //meses
        $this->months = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
        //iniciamos la gráfica de pedidos
        $this->set_type_graphic('orders');
        $this->switch_chart = true;
    }

    
    public function set_type_graphic($type){
        
        //actualizamos si el tipo seleccionado es distinto al tipo actual.

        if($this->selected_type != $type){
            //dd("anda");
            $this->switch_chart = false;
            $this->selected_type = $type;
            $label;
            if($type){
                switch($type){
                    case 'orders':
                        $label = 'Pedidos';
                        $total = $this->get_orders_by_months();
                        break;
                    case 'visitors':
                        $label = 'Visitas';
                        $total = $this->get_visitors_by_months();
                        break;
                    case 'sales':
                        $label = 'Ventas';
                        $total = $this->get_sales_by_months();
                        break;
                    case 'cart':
                        $label = 'Valor';
                        $total = $this->get_cart_by_months();
                        break;
                }
            }
            $this->total_months = $total;

            $this->emit('chart',$label,$this->total_months);
            $this->switch_chart = true;
        }
    }

    public function get_visitors_today(){
        $visitors = Visitor::whereDay('created_at',$this->day_today)->get();
        return $visitors->count();
    }
    //obtener visitantes por mes
    public function get_visitors_by_months(){        
        $total = [];
        for($i=1;$i<count($this->months)+1;$i++){
            $visitors = Visitor::whereMonth('created_at',$i)->get();
            $total[] = $visitors->count();
        }
        return $total;
    }
    //obtener cantidad de pedidos por mes
    public function get_orders_by_months(){
        $total = [];
        for($i=1;$i<count($this->months)+1;$i++){
            $orders = Order::whereMonth('created_at',$i)->get();
            $total[] = $orders->count();
        }
        return $total;
    }
    //obtener ventas por mes
    public function get_sales_by_months(){
        //obtenemos las ventas de todos los meses (imp.excluidos)
        $sales = [];
        $total = [];
        for($i=1;$i<count($this->months)+1;$i++){
            $sales[$i] = Order::whereMonth('created_at',$i)->pluck('subtotal');
            $sum=0;
            foreach($sales[$i] as $s){
                $sum += floatval($s);
            }
            $total[] = $sum;
        }
        return $total;
    }
    //obtener valor del carro por mes
    public function get_cart_by_months(){
        $cart = [];
        $total = [];
        for($i=1;$i<count($this->months)+1;$i++){
            $cart[$i] = Order::whereMonth('created_at',$i)->pluck('subtotal');
            $sum=0;
            foreach($cart[$i] as $c){
                $sum += floatval($c);
            }
            if($cart[$i]->count() > 0){
                $total[] = $sum / $cart[$i]->count();                    
            }else{
                $total[] = $sum;
            }
        }
        return $total;
    }
    
    public function render()
    {   
        return view('livewire.admin.home');
    }
}
