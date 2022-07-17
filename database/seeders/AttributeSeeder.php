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
                'text'=>'rosa',
                'hex' => '#E3E4E5'
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

        ];
        
        $tallas = ['XS','S','M','L','XL','XXL','XXXL'];
        $flexometros = ['3M','5M','8M'];

        foreach($colores as $key =>$color){
            Attribute::create([
                'name' => ucfirst($color['text']),
                'type' => 1,
                'slug' => $color['text'],
                'status' => 1,
                'description' => 'Color '.$color['text'],
                'color' => $color['hex'],
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
