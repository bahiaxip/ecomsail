<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product, App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use Route;
class Store extends Component
{
    use WithPagination;
    public $page_tmp;
    public $typealert='success';
    //si mantenmos category a 0 o null, la primera selección regresa erróneamente 
    //al primer elemento de la lista(Ropa), después de cargar los productos correctamente
    public $category;
    public $subcategory;
    public $type;
    public $computed_category;
    public $computed_subcategory;
    //switch para mostrar/ocultar icono de carga
    public $start = false;
    //categories para nav_user
    public $categories;
    public $limit_page;
    public $title;
    public $data;
    //Filtros especiales(Novedades,Vendidos,Precio,Valorados)
    public $special_filter;
    //temporal para poder mostrar más resultados del mismo tipo con infinite scroll
    public $special_filter_tmp;
    //switch_special_filter permite ocultar la paginación
    public $switch_special_filter=false;
    //switch_special_filter permite ocultar el botón de "Más" del infinite scroll
    public $inf_scroll_plus=false;
    //inf_scroll_counter indica cuantas veces se debe aumentar los resultados con infinite scroll
    public $inf_scroll_counter;
    public $inf_scroll_max;
    //identificador que permite cambiar de mayor precio a menor precio
    public $price_order;

    public $search_product;
    public $search_query;

    public $route_name;
    public function mount($category=null,$subcategory=null,$type=null){

    //el parámetro type es exclusivo del buscador genérico, que contiene 
    //la cadena a buscar. Disponible en todos los componentes de usuario
        if($type){
            $this->search_product = $type;
            $this->search_query = true;
        }
        else
            $this->search_query = false;
        //establecemos el primer contador del infinite scroll
        $this->inf_scroll_counter=1;
        //establecemos el máximo de resultados para mostrar el botón de "Mäs"
        $this->inf_scroll_max = 20;
        $this->price_order = "desc";
        //$this->page (generado por laravel/livewire y pagination);        
        $this->page_tmp = $this->page;

        $this->route_name = Route::currentRouteName();
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
        $this->limit_page = config('ecomsail.items_per_page') ?? 15;
        $title = $this->getTitle();
        if($title){
            $this->title = $this->getTitle();    
        }
    }
    
    public function updated(){
        //dd("antes0");
    }

    public function inf_scroll(){
        $this->start = false;
        $this->inf_scroll_counter++;
        $this->special_filter = $this->special_filter_tmp;        
    }
    
    //El método setPage() de Livewire es el encargado de enviar a la página, en lugar de
    //sobreescribir este método sobreescribimos el método gotoPage($page) y comprobamos 
    //si es cambio de página o cambio de los select y establecemos el método $refresh en
    // JavaScript para establecer el scroll a 0.
    //Además, el trait WithPagination incorpora $this->page permitiendo 
    //prescindir de pasar $page como parámetro.

    //redirección del buscador genérico, en este caso se mantiene el método por si se
    //da a enter después de una anterior búsqueda desde otra página y no se ha modificado la cadena de
    //búsqueda aunque se podría desde el layout omitir mediante el valor de $route_name
    public function go_to_search(){
        if($this->search_product)
            return redirect()->route('store',['category' => 0,'subcategory'=>0,'type' =>$this->search_product]);
    }
    public function gotoPage($page){
        if($page != $this->page_tmp){
            $this->setPage($page);            
        }
        //$this->emit('$refresh');
        $this->page_tmp = $page;
    }
    //limpiamos y desactivamos la consulta del buscador (en caso de existir
    //una consulta anterior)
    public function reset_searcher(){
        if($this->search_product){
            $this->search_product = '';
            $this->search_query = false;
        }
    }
    public function set_category(){
        
        //si existen caracteres en el buscador lo limpiamos
        $this->reset_searcher();
        if($this->page != 1)
            $this->resetPage();
        $this->inf_scroll_plus = false;
        //necesario para diferenciar de la colección de productos genérica y para que el
        // método render() de paginación no entre en conflicto.
        $this->switch_special_filter=false;
        $this->start = false;
        
        $title;

        if($this->category != $this->computed_category && $this->category != 0){
            $this->subcategory = 0;            
        }
        //si no existe categoría y se selecciona subcategoría se obtiene la 
        //categoría y se estable en $category.
        if(!$this->category && $this->subcategory ){
            $this->category = Category::findOrFail($this->subcategory)->type;
        }

        if(!$this->category)
            $this->category = 0;
        if($this->category == 0){
            $this->computed_category = 0;
        }

        
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
    public function set_special_filter($type){
        $this->start=false;
        //si existen caracteres en el buscador lo limpiamos
        $this->reset_searcher();
        //si se encuentra en otra página que no sea la primera reseteamos paginación
        if($this->page != 1)
            $this->resetPage();
        
        if($type){
            if($this->special_filter_tmp == $type){                
                if($this->price_order == "asc"){
                    $this->price_order = "desc";    
                }else{
                    $this->price_order = "asc";    
                }
                
            }
            //si necesitamos que vuelva a desc si pulsamos otro botón de listas mantener el else siguiente:
            /* 
            else{
                $this->price_order = "desc";
            }
            */
            //reseteamos el infinite scroll a 1
            $this->inf_scroll_counter=1;
            $this->special_filter=$type;
            $this->special_filter_tmp=$type;
            $this->switch_special_filter=true;
            $this->category=null;
            $this->subcategory=null;
            $this->computed_category = null;
        }
    }
    public function set_query_special_filter($type){
        $special_filter;
        $amount = 15*$this->inf_scroll_counter;
        //mostrar o ocultar el botón de "Más" según la máxima cantidad de productos permitidos
        if($amount <= $this->inf_scroll_max){
            $this->inf_scroll_plus = true;
        }else{
            $this->inf_scroll_plus = false;
        }

        if($type){
            switch($type){
                case 'news':
                    $special_filter = Product::where('status',1)->orderBy('id','desc')->take($amount)->get();
                    break;
                case 'sold':
                    $special_filter = Product::where('status',1)->orderBy('id','desc')->take($amount)->get();
                    break;
                case 'price':
                    $special_filter = Product::where('status',1)->orderBy('price',$this->price_order)->take($amount)->get();
                    break;
                case 'feed':
                    $special_filter = Product::where('status',1)->orderBy('id','desc')->paginate($this->limit_page);
                    break;
            }            
        }
        return $special_filter;
    }

    
    //se ejecuta antes de actualizar la variable $this->search_product
    public function updatingSearchProduct($search_product){

        //necesario cuando venimos de categoría seleccionada
        if($search_product){
            $this->set_search();
            //dd("search_product_nuevo");
        }else{
            $this->search_query = false;
        }
    }
    public function set_search(){
        $this->search_query = true;        
        //if($this->category){                
        $this->category=0;
        //}
        $this->subcategory=0;
    }

    public function dehydrate(){
        //dd("anda");
        if($this->inf_scroll_counter > 1){
           $this->emit('set_scroll');
        }
    }
    
    public function render()
    {
        
        $categories_list = Category::where('status',1)->where('type',0)->pluck('name','id');
        $categories_list->prepend('Seleccione...',0);
        



        if($this->category){
           //dd("existe category");
            $subcategories_list = Category::where('status',1)->where('type',$this->category)->pluck('name','id');            
            if(!$this->subcategory){                
                $subcategories_list->prepend('Seleccione...',0);
            }

        }else{
            
            //si se accede desde el enlace (sin ninguna categoría ni 
            //subcategoría seleccionada) creamos arrays con el texto 
            //"Seleccione..." y obtenemos la consulta de todas las subcategorías
            $subcategories_list = Category::where('status',1)->where('type','!=',0)->pluck('name','id');
            $subcategories_list->prepend('Seleccione...',0);            

        }
        //si existe consulta de búsqueda anulamos el resto y priorizamos
        //la búsqueda
        if($this->search_query){
            //dd($this->subcategory);
            //dd("existe search_query");
            $products = Product::where('status',1)->where('name','LIKE','%'.$this->search_product.'%')->orderBy('id','asc')->paginate($this->limit_page);
            $this->computed_category = $this->category;
        }else{
            //dd($this->category);
            if($this->special_filter){

                $products = $this->set_query_special_filter($this->special_filter);
                $this->special_filter=null;
                
                

            }
            if($this->category){
                //dd("llegando");
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
                }else if(!$this->switch_special_filter){
                    //dd("switch");
                    $products = Product::where('status',1)->orderBy('id','asc')->paginate($this->limit_page);
                    //$this->switch_special_filter=false;
                }else{
                    //dd("aqui");
                    //dd($products);
                }
            }
        }

        $this->start=true;
        $data = ['products' => $products,'categories_list' => $categories_list,'subcategories_list' => $subcategories_list,'computed_cat' => $this->computed_category];
        return view('livewire.store.store',$data)->extends('layouts.main');
    }
}
