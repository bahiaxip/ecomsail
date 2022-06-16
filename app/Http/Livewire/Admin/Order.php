<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order as Ord;
class Order extends Component
{
    public $orders;
    public $filter_type;
    public function mount($filter_type){
        $this->filter_type = $filter_type;
        $this->orders = Ord::where('status',1)->get();
    }
    public function render()
    {
        $data = ['orders' => $this->orders];
        return view('livewire.admin.orders.index',$data);
    }
}
