<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product, App\Models\Category;
class Store extends Component
{
    public $typealert='success';
    public $category;
    public $subcategory;
    
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
    }
    public function render()
    {
        if($this->category){

            if($this->subcategory){

                $products = Product::where('status',1)->where('subcategory_id',$this->subcategory)->orderBy('id','asc')->paginate(15);                
            }else{                
                $products = Product::where('status',1)->where('category_id',$this->category)->orderBy('id','asc')->paginate(15);
            }
            
        }else{
            $products = Product::where('status',1)->orderBy('id','asc')->paginate(15);            
        }
        $categories = Category::where('status',1)->where('type',0)->get();
        $data = ['products' => $products,'categories' => $categories];
        return view('livewire.store.store',$data)->extends('layouts.main');
    }
}
