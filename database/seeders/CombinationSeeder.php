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
            'list_ids' => 5,
            'amount' => 0,
            'product_id' => 2
        ]);
        Combination::create([
            'name' => 'Color > Gris',
            'list_ids' => 7,
            'amount' => 0,
            'product_id' => 2
        ]);
        //product 31
        Combination::create([
            'name' => 'Color > Blanco',            
            'list_ids' => 5,
            'amount' => 0,
            'product_id' => 31
        ]);
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'amount' => 0,
            'product_id' => 31
        ]);
        //product 33
        Combination::create([
            'name' => 'Color > Negro',            
            'list_ids' => 6,
            'amount' => 0,
            'product_id' => 33
        ]);
        Combination::create([
            'name' => 'Color > Verde',
            'list_ids' => 9,
            'amount' => 0,
            'product_id' => 33
        ]);
        Combination::create([
            'name' => 'Color > Azul',
            'list_ids' => 8,
            'amount' => 0,
            'product_id' => 33
        ]);
        Combination::create([
            'name' => 'Color > Blanco',
            'list_ids' => 5,
            'amount' => 0,
            'product_id' => 33
        ]);
        /*
        Combination::create([
            'name' => 'Talla > XS',
            'list_ids' => 28,
            'amount' => 0,
            'product_id' => 33
        ]);
        Combination::create([
            'name' => 'Talla > S',
            'list_ids' => 30,
            'amount' => 0,
            'product_id' => 33
        ]);
        Combination::create([
            'name' => 'Talla > M',
            'list_ids' => 31,
            'amount' => 0,
            'product_id' => 33
        ]);
        Combination::create([
            'name' => 'Talla > L',
            'list_ids' => 32,
            'amount' => 0,
            'product_id' => 33
        ]);
        Combination::create([
            'name' => 'Talla > XL',
            'list_ids' => 33,
            'amount' => 0,
            'product_id' => 33
        ]);
        */
        //product 34
        /*
        Combination::create([
            'name' => 'Talla > XS',
            'list_ids' => 28,
            'amount' => 0,
            'product_id' => 34
        ]);
        Combination::create([
            'name' => 'Talla > S',
            'list_ids' => 30,
            'amount' => 0,
            'product_id' => 34
        ]);
        Combination::create([
            'name' => 'Talla > M',
            'list_ids' => 31,
            'amount' => 0,
            'product_id' => 34
        ]);
        Combination::create([
            'name' => 'Talla > L',
            'list_ids' => 32,
            'amount' => 0,
            'product_id' => 34
        ]);
        Combination::create([
            'name' => 'Talla > XL',
            'list_ids' => 33,
            'amount' => 0,
            'product_id' => 34
        ]);
        */
        //product 35
        Combination::create([
            'name' => 'Color > Blanco',            
            'list_ids' => 5,
            'amount' => 0,
            'product_id' => 35
        ]);
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'amount' => 0,
            'product_id' => 35
        ]);
        Combination::create([
            'name' => 'Color > Amarillo',
            'list_ids' => 11,
            'amount' => 0,
            'product_id' => 35
        ]);
        Combination::create([
            'name' => 'Color > Azul',
            'list_ids' => 8,
            'amount' => 0,
            'product_id' => 35
        ]);
        Combination::create([
            'name' => 'Color > Azul claro',
            'list_ids' => 26,
            'amount' => 0,
            'product_id' => 35
        ]);
        Combination::create([
            'name' => 'Color > Violeta',
            'list_ids' => 27,
            'amount' => 0,
            'product_id' => 35
        ]);
        Combination::create([
            'name' => 'Color > Azul marino',
            'list_ids' => 17,
            'amount' => 0,
            'product_id' => 35
        ]);
        Combination::create([
            'name' => 'Color > Gris',
            'list_ids' => 7,
            'amount' => 0,
            'product_id' => 35
        ]);
        Combination::create([
            'name' => 'Color > Rojo',
            'list_ids' => 10,
            'amount' => 0,
            'product_id' => 35
        ]);
        Combination::create([
            'name' => 'Color > Rosa',
            'list_ids' => 29,
            'amount' => 0,
            'product_id' => 35
        ]);

        //product 36
        Combination::create([
            'name' => 'Color > Blanco',
            'list_ids' => 5,
            'amount' => 0,
            'product_id' => 36
        ]);
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'amount' => 0,
            'product_id' => 36
        ]);
        Combination::create([
            'name' => 'Color > Amarillo',
            'list_ids' => 11,
            'amount' => 0,
            'product_id' => 36
        ]);
        Combination::create([
            'name' => 'Color > Azul',
            'list_ids' => 8,
            'amount' => 0,
            'product_id' => 36
        ]);
        Combination::create([
            'name' => 'Color > Lila',
            'list_ids' => 14,
            'amount' => 0,
            'product_id' => 36
        ]);
        Combination::create([
            'name' => 'Color > Rojo oscuro',
            'list_ids' => 21,
            'amount' => 0,
            'product_id' => 36
        ]);
        Combination::create([
            'name' => 'Color > Rosa',
            'list_ids' => 29,
            'amount' => 0,
            'product_id' => 36
        ]);
        Combination::create([
            'name' => 'Color > Verde',
            'list_ids' => 9,
            'amount' => 0,
            'product_id' => 36
        ]);
        /*
        Combination::create([
            'name' => 'Talla > XS',
            'list_ids' => 28,
            'amount' => 0,
            'product_id' => 36
        ]);
        Combination::create([
            'name' => 'Talla > S',
            'list_ids' => 30,
            'amount' => 0,
            'product_id' => 36
        ]);
        Combination::create([
            'name' => 'Talla > M',
            'list_ids' => 31,
            'amount' => 0,
            'product_id' => 36
        ]);
        Combination::create([
            'name' => 'Talla > L',
            'list_ids' => 32,
            'amount' => 0,
            'product_id' => 36
        ]);
        Combination::create([
            'name' => 'Talla > XL',
            'list_ids' => 33,
            'amount' => 0,
            'product_id' => 36
        ]);
        */
        //product 36
        Combination::create([
            'name' => 'Color > Blanco',
            'list_ids' => 5,
            'amount' => 0,
            'product_id' => 37
        ]);
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'amount' => 0,
            'product_id' => 37
        ]);        
        Combination::create([
            'name' => 'Color > Azul',
            'list_ids' => 8,
            'amount' => 0,
            'product_id' => 36
        ]);
        
        Combination::create([
            'name' => 'Color > Rojo',
            'list_ids' => 10,
            'amount' => 0,
            'product_id' => 37
        ]);
        Combination::create([
            'name' => 'Color > Rosa',
            'list_ids' => 28,
            'amount' => 0,
            'product_id' => 37
        ]);
        Combination::create([
            'name' => 'Color > Rojo vino',
            'list_ids' => 30,
            'amount' => 0,
            'product_id' => 37
        ]);
        Combination::create([
            'name' => 'Color > Azul marino',
            'list_ids' => 17,
            'amount' => 0,
            'product_id' => 37
        ]);
        /*
        Combination::create([
            'name' => 'Talla > XS',
            'list_ids' => 28,
            'amount' => 0,
            'product_id' => 37
        ]);
        Combination::create([
            'name' => 'Talla > S',
            'list_ids' => 30,
            'amount' => 0,
            'product_id' => 37
        ]);
        Combination::create([
            'name' => 'Talla > M',
            'list_ids' => 31,
            'amount' => 0,
            'product_id' => 37
        ]);
        Combination::create([
            'name' => 'Talla > L',
            'list_ids' => 32,
            'amount' => 0,
            'product_id' => 37
        ]);
        Combination::create([
            'name' => 'Talla > XL',
            'list_ids' => 33,
            'amount' => 0,
            'product_id' => 37
        ]);
        */
        //product 38
        Combination::create([
            'name' => 'Color > Azul',
            'list_ids' => 8,
            'amount' => 0,
            'product_id' => 38
        ]);
        
        Combination::create([
            'name' => 'Color > Rojo',
            'list_ids' => 10,
            'amount' => 0,
            'product_id' => 38
        ]);
        /*
        Combination::create([
            'name' => 'Talla > S',
            'list_ids' => 30,
            'amount' => 0,
            'product_id' => 38
        ]);
        Combination::create([
            'name' => 'Talla > M',
            'list_ids' => 31,
            'amount' => 0,
            'product_id' => 38
        ]);
        Combination::create([
            'name' => 'Talla > L',
            'list_ids' => 32,
            'amount' => 0,
            'product_id' => 38
        ]);
        Combination::create([
            'name' => 'Talla > XL',
            'list_ids' => 33,
            'amount' => 0,
            'product_id' => 38
        ]);
        */
        //product 39
        Combination::create([
            'name' => 'Color > Azul marino',
            'list_ids' => 17,
            'amount' => 0,
            'product_id' => 39
        ]);
        Combination::create([
            'name' => 'Color > Burdeos',
            'list_ids' => 36,
            'amount' => 0,
            'product_id' => 39
        ]);
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'amount' => 0,
            'product_id' => 39
        ]);
        Combination::create([
            'name' => 'Color > Violeta oscuro',
            'list_ids' => 28,
            'amount' => 0,
            'product_id' => 39
        ]);
        Combination::create([
            'name' => 'Color > Verde oscuro',
            'list_ids' => 19,
            'amount' => 0,
            'product_id' => 39
        ]);
        //product 40
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'amount' => 0,
            'product_id' => 40
        ]);
        Combination::create([
            'name' => 'Color > Rojo',
            'list_ids' => 10,
            'amount' => 0,
            'product_id' => 40
        ]);
        Combination::create([
            'name' => 'Color > Rosa',
            'list_ids' => 28,
            'amount' => 0,
            'product_id' => 40
        ]);
        Combination::create([
            'name' => 'Color > Burdeos',
            'list_ids' => 36,
            'amount' => 0,
            'product_id' => 40
        ]);
        Combination::create([
            'name' => 'Color > Azul marino',
            'list_ids' => 17,
            'amount' => 0,
            'product_id' => 40
        ]);
        Combination::create([
            'name' => 'Color > Verde oscuro',
            'list_ids' => 19,
            'amount' => 0,
            'product_id' => 40
        ]);
    }
}
