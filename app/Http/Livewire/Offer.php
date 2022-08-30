<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category, App\Models\Product;
use Livewire\WithPagination;

class Offer extends Component
{
    use WithPagination;
    public $typealert;
    public $offer;
    public $cat_id;
    public $limit_page;

    public function mount(){
        $this->limit_page = 15;
        $this->typealert = 'success';
    }
    
    public function set_offer($cat_id){
        if($cat_id){
            $this->cat_id = $cat_id;            
        }
    }
    public function gotoPage($page){
        if($page != $this->page_tmp){
            $this->setPage($page);            
        }
        $this->emit('$refresh');
        $this->page_tmp = $page;
    }

    public function render()
    {   
        $products;
        $categories = Category::where('status',1)->where('type',0)->where('offer',1)->get();

        if($this->cat_id)        
            $products = Product::where('status',1)->where('category_id',$this->cat_id)
                    ->whereHas('infoprice',function($query){
                        $query->where('discount_type',1)
                        ->where('init_discount','<=',date('Y-m-d'))
                        ->where('end_discount','>=',date('Y-m-d'));
                    })->paginate($this->limit_page);
        else
            $products = Product::where('status',1)->where('category_id',$categories[0]->id)
                    ->whereHas('infoprice',function($query){
                        $query->where('discount_type',1)
                        ->where('init_discount','<=',date('Y-m-d'))
                        ->where('end_discount','>=',date('Y-m-d'));
                    })->paginate($this->limit_page);

        $data = ['categories'=>$categories,'products' => $products];
        return view('livewire.store.offers',$data)->extends('layouts.main');
    }
}
