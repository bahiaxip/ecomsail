<?php

namespace App\Functions;

use Maatwebsite\Excel\Concerns\FromCollection;
//use App\Models\Category;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

//clase necesaria para exportar en Excel con el módulo Maatwebsite
class Export implements FromView
{
    //datos users(eloquent)
    protected $data;
    public function __construct($data=null){
        $this->data=$data;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    
    public function collection()
    {
        return $this->data;
    }

    public function view():View{
        return view('livewire.admin.categories.excel',['categories'=>$this->data]);
    }
}

?>