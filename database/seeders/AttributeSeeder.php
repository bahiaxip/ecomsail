<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attribute;
class AttributeSeeder extends Seeder
{
    /**
 ¡¡¡Recordar que si se añaden Atributos padres nuevos los list_ids de combinations deben cambiarse (sumarse 1 por cada atributo nuevo)!!!
     */
    public function run()
    {
        Attribute::create([
            'name' => 'Color',
            'type' => 0,
            'slug' => 'color',
            'status' => 1,
            'description' => 'Colores'
        ]);
        Attribute::create([
            'name' => 'Talla',
            'type' => 0,
            'slug' => 'talla',
            'status' => 1,
            'description' => 'Tallas'
        ]);
        Attribute::create([
            'name' => 'Tallas V',
            'type' => 0,
            'slug' => 'tallas v',
            'status' => 1,
            'description' => 'Tallas Vaqueros'
        ]);
        Attribute::create([
            'name' => 'Longitud',
            'type' => 0,
            'slug' => 'longitud',
            'status' => 1,
            'description' => 'Longitud'
        ]);
        /*Attribute::create([
            'name' => 'Números',
            'type' => 0,
            'slug' => 'numeros',
            'status' => 1,
            'description' => 'Números Calzado'
        ]);*/
        for($i=0;$i<20;$i++){
            $separator[] = [
                'text'=>NULL,
                'hex' => NULL
            ];
            $separator_tallas[] = NULL;
            $separator_tallas_v[] = NULL;
        };
        

        $colores = [
            [
                'text'=>'blanco',
                'hex' => '#FFFFFF'
            ],
            [
                'text'=>'negro',
                'hex' => '#000000'
            ],
            [
                'text'=>'gris',
                'hex' => '#BEBEBE'
            ],
            [
                'text'=>'azul',
                'hex' => '#0000FF'
            ],
            [
                'text'=>'verde',
                'hex' => '#008000'
            ],
            [
                'text'=>'rojo',
                'hex' => '#FF0000'
            ],
            [
                'text'=>'amarillo',
                'hex' => '#FFFF00'
            ],
            [
                'text'=>'naranja',
                'hex' => '#FFA500'
            ],
            [
                'text'=>'marrón',
                'hex' => '#6C3B2A'
            ],
            [
                'text'=>'lila',
                'hex' => '#6C4675'
            ],
            [
                'text'=>'dorado',
                'hex' => '#EFB810'
            ],
            [
                'text'=>'plata',
                'hex' => '#E3E4E5'
            ],
            [
                'text'=>'azul marino',
                'hex' => '#000080'
            ],
            [
                'text'=>'azul oscuro',
                'hex' => '#00008B'
            ],
            [
                'text'=>'verde oscuro',
                'hex' => '#006400'
            ],
            [
                'text'=>'verde claro',
                'hex' => '#90EE90'
            ],
            [
                'text'=>'rojo oscuro',
                'hex' => '#8B0000'
            ],
            [
                'text'=>'crema',
                'hex' => '#F5FFFA'
            ],
            [
                'text'=>'marfil',
                'hex' => '#FFFFF0'
            ],
            [
                'text'=>'gris claro',
                'hex' => '#D3D3D3'
            ],
            [
                'text'=>'naranja oscuro',
                'hex' => '#FF8C00'
            ],
            [
                'text'=>'azul claro',
                'hex' => '#ADD8E6'
            ],
            [
                'text'=>'violeta',
                'hex' => '#EE82EE'
            ],
            [
                'text'=>'violeta oscuro',
                'hex' => '#8400D3'
            ],
            [
                'text'=>'rosa',
                'hex' => '#FFC0CB'
            ],
            [
                'text'=>'rojo vino',
                'hex' => '#83072D'
            ],
            [
                'text'=>'turquesa',
                'hex' => '#40E0D0'
            ],
            [
                'text'=>'turquesa oscuro',
                'hex' => '#00CED1'
            ],
            [
                'text'=>'salmón',
                'hex' => '#FA8072'
            ],
            [
                'text'=>'chocolate',
                'hex' => '#D2691E'
            ],
            [
                'text'=>'fucsia',
                'hex' => '#FF00FF'
            ],
            [
                'text'=>'burdeos',
                'hex' => '#641C34'
            ],
            [
                'text'=>'Gris oscuro',
                'hex' => '#353535'
            ],
            
        ];
        
        
        
        
        $tallas = ['XS','S','M','L','XL','XXL','XXXL','2 años','3 años','4 años','XXS','5 años','6 años','7 años','8 años','9 años','10 años','12 años', '14 años', '16 años','6 meses','9 meses','12 meses', '18 meses'];
        $tallas_v = ['26W / 28L','26W / 30L','26W / 34L','27W / 28L','27W / 30L','28W / 28L','28W / 30L','28W / 32L','28W / 34L','29W / 28L','29W / 30L','29W / 32L','29W / 34L','30W / 30L','30W / 32L','30W / 33L','30W / 34L','31W / 30L','31W / 32L','31W / 34L','32W / 29L','32W / 30L','32W / 32L','32W / 33L','32W / 34L','32W / 36L','33W / 30L','33W / 32L','33W / 34L','33W / 36L','34W / 30L','34W / 32L','34W / 33L','34W / 34L','34W / 36L','35W / 30L','35W / 36L','36W / 30L','36W / 32L','36W / 34L','36W / 36L','36W / 38L','36W / 40L','38W / 30L','38W / 31L','38W / 32L','38W / 34L','38W / 36L','40W / 32L','40W / 34L','40W / 36L','42W / 32L','42W / 33L','42W / 34L','44W / 34L'];
        $flexometros = ['3M','5M','8M'];
        //añadiendo 20 atributos en borrador por si es necesario añadir más valores en 
        //seeders durante el desarrollo 
        $colores = array_merge($colores,$separator);
        $tallas  = array_merge($tallas,$separator_tallas);
        $tallas_v  = array_merge($tallas_v,$separator_tallas_v);
        foreach($colores as $key =>$color){
            if($color['text'] != NULL){
                Attribute::create([
                    'name' => ucfirst($color['text']),
                    'type' => 1,
                    'slug' => $color['text'],
                    'status' => 1,
                    'description' => 'Color '.$color['text'],
                    'color' => $color['hex'],
                ]);        
            }else{
                Attribute::create([
                    'name' => ucfirst($color['text']),
                    'type' => 1,
                    'slug' => $color['text'],
                    'status' => 0,
                    'description' => 'Color '.$color['text'],
                    'color' => $color['hex'],
                ]);        

            }
            
        }

        foreach($tallas as $key_talla => $talla){
            if($talla != NULL){
                Attribute::create([
                    'name' => ucfirst($talla),
                    'type' => 2,
                    'slug' => $talla,
                    'status' => 1,
                    'description' => 'Talla '.$talla
                ]);
            }else{
                Attribute::create([
                    'name' => "Borrador",
                    'type' => 2,
                    'slug' => "borrador ".$key_talla,
                    'status' => 0,
                    'description' => 'Talla ',                    
                ]);  
            }
        }
        foreach($tallas_v as $key_tallav => $talla_v){

            if($talla_v != NULL){
                Attribute::create([
                    'name' => ucfirst($talla_v),
                    'type' => 3,
                    'slug' => $talla_v,
                    'status' => 1,
                    'description' => 'Talla '.$talla_v
                ]);    
            }else{
                Attribute::create([
                    'name' => "Borrador",
                    'type' => 3,
                    'slug' => "borrador ".$key_tallav,
                    'status' => 0,
                    'description' => 'Talla vaqueros'
                ]);
            }
            
        }


        foreach($flexometros as $flex){
            Attribute::create([
                'name' => $flex,
                'type' => 4,
                'slug' => $flex,
                'status' => 1,
                'description' => 'Talla '.$flex
            ]);
        }

        
    }
}
