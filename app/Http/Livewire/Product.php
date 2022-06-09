<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product as Prod, App\Models\Combination, App\Models\Attribute;
class Product extends Component
{

    public $product_id;
    public $option = [];
    public $combinations_list;
    public $quantity = 1;



    public function mount($id){
        $this->product_id = $id;
    }

    public function change_quantity($operator){
        if($operator == 'plus' )
            $this->quantity++;
        elseif($operator == 'minus' && $this->quantity > 1)
            $this->quantity--;

    }

    public function setCombinations(){
        $combinations = Combination::where('product_id',$this->product_id)->get();
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
    }
    public function render()
    {
        $this->setCombinations();
        $product = Prod::findOrFail($this->product_id);
        $data = ['prod' => $product,'combinations_list' => $this->combinations_list];
        return view('livewire.product',$data)->extends('layouts.main');
    }
}
