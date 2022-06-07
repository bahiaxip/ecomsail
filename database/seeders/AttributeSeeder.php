<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attribute;
class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
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

        $colores = ['blanco','gris','azul','verde','rojo','amarillo'.'naranja','marrón','lila','dorado','plata'];
        $tallas = ['S','M','L','XL','XXL','XXXL'];

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

        
    }
}
