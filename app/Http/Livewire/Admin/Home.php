<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order, App\Models\User;
use Carbon\Carbon;
use Auth;
class Home extends Component
{
    public $count_orderstoday;
    public $user_id;

    public function mount(){
        $this->user_id = Auth::id();
        //día de la fecha de hoy (now())
        $day_today = Carbon::today()->format('d');        
        //pedidos actualizados (podríamos añadir el status 1 para que fueran pagados)
        $orders_today = Order::whereDay('created_at',$day_today)->get();
        $this->count_orderstoday = $orders_today->count();
    }
    public function render()
    {
        return view('livewire.admin.home');
    }
}
