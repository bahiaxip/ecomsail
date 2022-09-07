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
    public $total_month;

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
        //obtenemos las ventas totales de todos los meses 
        $posts = [];
        $total = [];

        for($i=1;$i<count($this->months)+1;$i++){
            $posts[$i] = Order::whereMonth('created_at',$i)->pluck('total');
            $sum=0;
            foreach($posts[$i] as $p){
                $sum += floatval($p);
            }
            $total[] = $sum;

        }
        
        $this->total_months = $total;
        //dd($this->total_months);
    }

    public function get_visitors_today(){
        $visitors = Visitor::whereDay('created_at',$this->day_today)->get();
        return $visitors->count();
    }
    
    public function render()
    {
        return view('livewire.admin.home');
    }
}
