<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Combination;
class CombinationSeeder extends Seeder
{
    /**
     

     Recordar que si se añaden Atributos nuevos los list_ids deben cambiarse (sumarse 1 por cada atributo nuevo)
     */
    public function run()
    {
        Combination::create([
            'name' => 'Color > Blanco',            
            'list_ids' => 4,
            'amount' => 0,
            'product_id' => 2
        ]);
        Combination::create([
            'name' => 'Color > Gris',
            'list_ids' => 5,
            'amount' => 0,
            'product_id' => 2
        ]);        
    }
}
