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
        //product 2
        Combination::create([
            'name' => 'Color > Blanco',            
            'list_ids' => 4,
            'amount' => 0,
            'product_id' => 2
        ]);
        Combination::create([
            'name' => 'Color > Gris',
            'list_ids' => 6,
            'amount' => 0,
            'product_id' => 2
        ]);
        //product 31
        Combination::create([
            'name' => 'Color > Blanco',            
            'list_ids' => 4,
            'amount' => 0,
            'product_id' => 31
        ]);
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 5,
            'amount' => 0,
            'product_id' => 31
        ]);
        //product 33
        Combination::create([
            'name' => 'Color > Negro',            
            'list_ids' => 5,
            'amount' => 0,
            'product_id' => 33
        ]);
        Combination::create([
            'name' => 'Color > Verde',
            'list_ids' => 8,
            'amount' => 0,
            'product_id' => 33
        ]);
        Combination::create([
            'name' => 'Color > Azul',
            'list_ids' => 7,
            'amount' => 0,
            'product_id' => 33
        ]);
        Combination::create([
            'name' => 'Color > Blanco',
            'list_ids' => 4,
            'amount' => 0,
            'product_id' => 33
        ]);
        Combination::create([
            'name' => 'Talla > XS',
            'list_ids' => 16,
            'amount' => 0,
            'product_id' => 33
        ]);
        Combination::create([
            'name' => 'Talla > S',
            'list_ids' => 17,
            'amount' => 0,
            'product_id' => 33
        ]);
        Combination::create([
            'name' => 'Talla > M',
            'list_ids' => 18,
            'amount' => 0,
            'product_id' => 33
        ]);
        Combination::create([
            'name' => 'Talla > L',
            'list_ids' => 19,
            'amount' => 0,
            'product_id' => 33
        ]);
        Combination::create([
            'name' => 'Talla > XL',
            'list_ids' => 20,
            'amount' => 0,
            'product_id' => 33
        ]);
        //product 34
        Combination::create([
            'name' => 'Talla > XS',
            'list_ids' => 16,
            'amount' => 0,
            'product_id' => 34
        ]);
        Combination::create([
            'name' => 'Talla > S',
            'list_ids' => 17,
            'amount' => 0,
            'product_id' => 34
        ]);
        Combination::create([
            'name' => 'Talla > M',
            'list_ids' => 18,
            'amount' => 0,
            'product_id' => 34
        ]);
        Combination::create([
            'name' => 'Talla > L',
            'list_ids' => 19,
            'amount' => 0,
            'product_id' => 34
        ]);
        Combination::create([
            'name' => 'Talla > XL',
            'list_ids' => 20,
            'amount' => 0,
            'product_id' => 34
        ]);

    }
}
