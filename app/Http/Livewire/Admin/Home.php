<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order, App\Models\User, App\Models\Visitor;
use Carbon\Carbon;
use Auth;
class Home extends Component
{
    public $count_orderstoday;
    public $user_id;
    public $visitors_today;
    public $day_today;
    public function mount(){        
        $this->user_id = Auth::id();
        //día de la fecha de hoy (now())
        $this->day_today = Carbon::today()->format('d');
        $this->visitors_today = $this->get_visitors_today();
        //pedidos actualizados (podríamos añadir el status 1 para que fueran pagados)
        $orders_today = Order::whereDay('created_at',$this->day_today)->get();
        $this->count_orderstoday = $orders_today->count();
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
