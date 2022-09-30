<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category, App\Models\Product;
use Livewire\WithPagination;
use Route;
class Offer extends Component
{
    use WithPagination;
    public $typealert;
    public $offer;
    //necesario nombre diferente para no generar conflicto con "cat" y "subcat" de store en el layout nav_user
    public $offers_cat;
    public $offers_subcat;
    public $limit_page;
    //buscador global
    public $search_product;

    public $route_name;
    
    public function mount($offers_cat = null,$offers_subcat = null){        
        $this->limit_page = config('ecomsail.items_per_page') ?? 15;
        $this->typealert = 'success';
        $this->route_name = Route::currentRouteName();
        
        if(!$offers_cat)
            $this->offers_cat = 0;
        else
            $this->offers_cat = $offers_cat;
        
        if($offers_subcat)
            $this->offers_subcat = $offers_subcat;

    }

    //redirección del buscador genérico
    public function go_to_search(){
        if($this->search_product)
            return redirect()->route('store',['category' => 0,'subcategory'=>0,'type' =>$this->search_product]);
    }
    
    public function set_offer($cat_id){
        if($this->offers_subcat)
            $this->offers_subcat = NULL;
        if($cat_id){
            $this->offers_cat = $cat_id;            
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

        if($this->offers_subcat){
            $this->offers_cat = 0;
            $products = Product::where('status',1)->where('subcategory_id',$this->offers_subcat)
                    ->whereHas('infoprice',function($query){
                        $query->where('discount_type',1)
                        ->where('init_discount','<=',date('Y-m-d'))
                        ->where('end_discount','>=',date('Y-m-d'));
                    })->paginate($this->limit_page);
        }
        elseif($this->offers_cat)
            $products = Product::where('status',1)->where('category_id',$this->offers_cat)
                    ->whereHas('infoprice',function($query){
                        $query->where('discount_type',1)
                        ->where('init_discount','<=',date('Y-m-d'))
                        ->where('end_discount','>=',date('Y-m-d'));
                    })->paginate($this->limit_page);        
        else
            //si no existe ninguna categoría establecemos la primera de la lista
            $products = Product::where('status',1)->where('category_id',$categories[0]->id)
                    ->whereHas('infoprice',function($query){
                        $query->where('discount_type',1)
                        ->where('init_discount','<=',date('Y-m-d'))
                        ->where('end_discount','>=',date('Y-m-d'));
                    })->paginate($this->limit_page);
        $offers =  Product::where('status',1)
                ->whereHas('infoprice',function($query){
                    $query->where('discount_type',1)
                    ->where('init_discount','<=',date('Y-m-d'))
                    ->where('end_discount','>=',date('Y-m-d'));
                })->get()->take(20);

        $data = ['categories'=>$categories,'products' => $products,'offers' => $offers];
        return view('livewire.store.offers',$data)->extends('layouts.main');
    }
}
