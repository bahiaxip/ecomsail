<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product, App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Http\Request;
class Store extends Component
{
    use WithPagination;
    public $page_tmp;
    public $typealert='success';
    //si mantenmos category a 0 o null, la primera selección regresa erróneamente 
    //al primer elemento de la lista(Ropa), después de cargar los productos correctamente
    public $category;
    public $subcategory;    
    public $computed_category;
    public $computed_subcategory;
    //switch para mostrar/ocultar icono de carga
    public $start = false;
    //categories para nav_user
    public $categories;
    public $limit_page;
    public $title;
    public $data;
    
    public function mount($category=null,$subcategory=null){
        $this->page_tmp = $this->page;
        /*
        if($category && !$subcategory){
            dd("hay solo category");
        }elseif($subcategory){
            dd("existe subcategory");        
        }
        */
        
        if($category){            
            $this->category = $category;
        }
        if($subcategory)
            $this->subcategory = $subcategory;            
        
        //categories para el menú de nav_user
        $this->categories = Category::where('status',1)->where('type',0)->get();
        //limite de productos por página
        $this->limit_page = 15;
        $title = $this->getTitle();
        if($title){
            $this->title = $this->getTitle();    
        }
    }
    //método de pagination de Livewire, permite realizar scroll Top al pasar página.
    //Con setPage() comprobamos si es cambio de página o cambio en alguno de los 
    //selects. Además, el trait WithPagination incorpora $this->page permitiendo 
    //prescindir de pasar $page como parámetro.
    public function setPage($page){
        if($page != $this->page_tmp){
            $this->emit('$refresh');
        }else{
            $this->page_tmp = $page;
        }
        
    }
    public function set_category(){
        $this->start = false;
        
        $title;        
        if($this->category != $this->computed_category && $this->category != 0){
            $this->subcategory = null;            
        }

        if(!$this->category && $this->subcategory && $this->category != 0){        
            $this->category = Category::findOrFail($this->subcategory)->type;
        }
        if($this->category == 0){
            $this->computed_category = null;
        }

        $this->resetPage();
        $title = $this->getTitle();        
        $this->emit('title',['title' => $title]);
    }
    public function getTitle(){
        //pasamos el nuevo título de store
        $name_category;
        $name_subcategory;
        $title=null;
        if($this->category){

            $name_category = Category::findOrFail($this->category)->name;
            $title = $name_category;
        }
        if($this->subcategory){
            $name_subcategory = Category::findOrFail($this->subcategory)->name;
            if(!$this->category){
               $title = $name_subcategory;
            }else{
                $title = $name_category.' > '.$name_subcategory;
            }
        }
        return $title;
    }

    
    public function render()
    {        
        //dd($this->category);
        $categories_list = Category::where('status',1)->where('type',0)->pluck('name','id');
        $categories_list->prepend('Seleccione...',0);
        
        if($this->category){
                       
            $subcategories_list = Category::where('status',1)->where('type',$this->category)->pluck('name','id');            
            if(!$this->subcategory)
                $subcategories_list->prepend('Seleccione...',0);

        }else{
            
            //si se accede desde el enlace (sin ninguna categoría ni 
            //subcategoría seleccionada) creamos arrays con el texto 
            //"Seleccione..." y obtenemos la consulta de todas las subcategorías
            
            $subcategories_list = Category::where('status',1)->where('type','!=',0)->pluck('name','id');
            $subcategories_list->prepend('Seleccione...',0);
        }
        //dd($this->category);
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
            if($this->subcategory){
                $products = Product::where('status',1)->where('subcategory_id',$this->subcategory)->orderBy('id','asc')->paginate($this->limit_page);
            }else{
            //dd($this->category);
                $products = Product::where('status',1)->orderBy('id','asc')->paginate($this->limit_page);
            }
        }

        $this->start=true;
        //dd($this->category);
        $data = ['products' => $products,'categories_list' => $categories_list,'subcategories_list' => $subcategories_list,'computed_cat' => $this->computed_category];
        return view('livewire.store.store',$data)->extends('layouts.main');
    }
}
