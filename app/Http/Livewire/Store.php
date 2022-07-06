<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product, App\Models\Category;
use Livewire\WithPagination;
class Store extends Component
{
    use WithPagination;

    public $typealert='success';
    public $category;
    public $subcategory;
    public $computed_category;
    public $computed_subcategory;
    public $start = false;
    //categories para nav_user
    public $categories;
    public $limit_page;
    
    public function mount($category=null,$subcategory=null){
        /*
        if($category && !$subcategory){
            dd("hay solo category");
        }elseif($subcategory){
            dd("existe subcategory");        
        }
        */
        if($category)
            $this->category = $category;
        if($subcategory)
            $this->subcategory = $subcategory;
        //categories para el menú de nav_user
        $this->categories = Category::where('status',1)->where('type',0)->get();
        $this->limit_page = 15;
        
    }
    public function set_category(){
        $this->start = false;
        if($this->category != $this->computed_category){            
            $this->subcategory = null;
        }
        if(!$this->category && $this->subcategory){
            $this->category = Category::findOrFail($this->subcategory)->type;
        }

        $this->resetPage();

    }
    
    public function render()
    {
        $categories_list = Category::where('status',1)->where('type',0)->pluck('name','id');
        if($this->category){
            //dd($this->subcategory);
            
            $subcategories_list = Category::where('status',1)->where('type',$this->category)->pluck('name','id');
            if(!$this->subcategory)
                $subcategories_list->prepend('Seleccione...',0);

        }else{
            $categories_list->prepend('Seleccione...',0);
            $subcategories_list = Category::where('status',1)->where('type','!=',0)->pluck('name','id');
            $subcategories_list->prepend('Seleccione...',0);

            
        }

        if($this->category){
            //actualizamos la copia 
            $this->computed_category = $this->category;
            if($this->subcategory){
                //actualizamos la copia
                $this->computed_subcategory = $this->subcategory;

                $products = Product::where('status',1)->where('subcategory_id',$this->subcategory)->orderBy('id','asc')->paginate($this->limit_page);                
            }else{                
                $products = Product::where('status',1)->where('category_id',$this->category)->orderBy('id','asc')->paginate($this->limit_page);
            }
            
        }else{
            $products = Product::where('status',1)->orderBy('id','asc')->paginate($this->limit_page);
        }

        $this->start=true;
        $data = ['products' => $products,'categories_list' => $categories_list,'subcategories_list' => $subcategories_list];
        return view('livewire.store.store',$data)->extends('layouts.main');
    }
}
