<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product, App\Models\Category, App\Models\Combination, App\Models\Attribute;
class Home extends Component
{
    public $hola;

    public $name;
    public $item;
    public $quantity=1;
    public $combinations;
    public $combinations_list;
    public $option=[];
    public $option_selected = "true";
    public $option_notselected = "false";
    public function fastview($id){        
        $list = [];
        $this->item = Product::findOrFail($id);
        $combinations = Combination::where('product_id',$this->item->id)->get();
        if($combinations->count() > 0){
            //revisamos coincidencias del mismo atributo
            foreach($combinations as $k=>$comb){                
                //las combinaciones están preparadas para que solo se pueda crear
                //atributo>valor, es decir no puede traer 2 valores del mismo
                //atributo, pero si puede traer varios atributos>valor en la misma combinación:
                //con distinto atributo padre se puede:
                // Color>blanco,Talla>S...
                //con el mismo atributo padre no se puede
                //Color>blanco,Color>gris,Color>rojo...
                //convertimos en array las listas de cada combinación                
                $attr_list_ids = explode(",",$comb->list_ids);
                    //recorremos el array de listas de cada combinación
                    foreach($attr_list_ids as $key=>$attr_id){
                        $attribute=Attribute::findOrFail($attr_id);
                        //if($k==8 && $key==2)
                        if(!isset($list[$attribute->type])){
                            $list[$attribute->type]['name']=$attribute->parentattr->name;
                            //$this->option[$attribute->type];
                        }else{
                            //$this->option[$attribute->type];
                        }
                            $list[$attribute->type][] =[
                                'id' => $attribute->id,
                                'name' => $attribute->name
                            ];
                            
                            
                    }
            }
            //dd($list);
            $this->combinations_list = $list;
            //dd($this->combinations_list = $list);

        }else{
            $this->combinations_list=[];
        }
        //dd($this->combinations_list);
        //dd($this->option);
    }
    

    public function clear_product(){
        $this->quantity = 1;
        $this->combinations_list=null;
    }
    

    public function change_quantity($operator){
        if($operator == 'plus' )
            $this->quantity++;
        elseif($operator == 'minus' && $this->quantity > 1)
            $this->quantity--;

    }
    public function add_cart(){
        $list=[];
        foreach($this->option as $key=>$o){
            $list[]=[
                'attribute' => $key,
                'value' => $o
            ];
            
        }
        dd(json_encode($list));
        
    }
    

    public function render()
    {
        
        //destacados
        $products = Product::where('status',1)->paginate(15);
        $categories = Category::where('status',1)->where('type',0)->get();
        $data = ['products' => $products,'categories' => $categories];
        //el slider falla con el layouts.app por duplicado de la clase content
        return view('livewire.home',$data)->extends('layouts.main');    
        
        
    }
}
