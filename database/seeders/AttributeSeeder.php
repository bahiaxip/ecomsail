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
            'name' => 'Longitud',
            'type' => 0,
            'slug' => 'longitud',
            'status' => 1,
            'description' => 'Longitud'
        ]);

        $colores = ['blanco','gris','azul','verde','rojo','amarillo'.'naranja','marrón','lila','dorado','plata'];
        $tallas = ['S','M','L','XL','XXL','XXXL'];
        $flexometros = ['3M','5M','8M'];

        foreach($colores as $color){
            Attribute::create([
                'name' => ucfirst($color),
                'type' => 1,
                'slug' => $color,
                'status' => 1,
                'description' => 'Color '.$color,
            ]);    
        }

        foreach($tallas as $talla){
            Attribute::create([
                'name' => ucfirst($talla),
                'type' => 2,
                'slug' => $talla,
                'status' => 1,
                'description' => 'Talla '.$talla
            ]);
        }
        foreach($flexometros as $flex){
            Attribute::create([
                'name' => $flex,
                'type' => 3,
                'slug' => $flex,
                'status' => 1,
                'description' => 'Talla '.$flex
            ]);
        }

        
    }
}
