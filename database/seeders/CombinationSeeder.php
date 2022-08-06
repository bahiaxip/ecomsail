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
        //Color
        Combination::create([
            'name' => 'Color > Blanco',            
            'list_ids' => 5,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 2
        ]);
        Combination::create([
            'name' => 'Color > Gris',
            'list_ids' => 7,
            'parent_attr' => 1,
            'amount' => 0,
            'added_price' => 2,
            'product_id' => 2
        ]);
    //product 31
        //Color
        Combination::create([
            'name' => 'Color > Blanco',            
            'list_ids' => 5,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 31
        ]);
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 31
        ]);
    //product 33
        //Color
        Combination::create([
            'name' => 'Color > Negro',            
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 33
        ]);
        Combination::create([
            'name' => 'Color > Verde',
            'list_ids' => 9,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 33
        ]);
        Combination::create([
            'name' => 'Color > Azul',
            'list_ids' => 8,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 33
        ]);
        Combination::create([
            'name' => 'Color > Blanco',
            'list_ids' => 5,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 33
        ]);
        //Talla
        Combination::create([
            'name' => 'Talla > XS',
            'list_ids' => 37,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 33
        ]);
        Combination::create([
            'name' => 'Talla > S',
            'list_ids' => 38,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 33
        ]);
        Combination::create([
            'name' => 'Talla > M',
            'list_ids' => 39,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 33
        ]);
        Combination::create([
            'name' => 'Talla > L',
            'list_ids' => 40,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 33
        ]);
        Combination::create([
            'name' => 'Talla > XL',
            'list_ids' => 41,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 33
        ]);
        
    //product 34
        
        Combination::create([
            'name' => 'Talla > XS',
            'list_ids' => 37,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 34
        ]);
        Combination::create([
            'name' => 'Talla > S',
            'list_ids' => 38,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 34
        ]);
        Combination::create([
            'name' => 'Talla > M',
            'list_ids' => 39,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 34
        ]);
        Combination::create([
            'name' => 'Talla > L',
            'list_ids' => 40,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 34
        ]);
        Combination::create([
            'name' => 'Talla > XL',
            'list_ids' => 41,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 34
        ]);
        
    //product 35
        //Color
        Combination::create([
            'name' => 'Color > Blanco',            
            'list_ids' => 5,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 35
        ]);
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 35
        ]);
        Combination::create([
            'name' => 'Color > Amarillo',
            'list_ids' => 11,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 35
        ]);
        Combination::create([
            'name' => 'Color > Azul',
            'list_ids' => 8,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 35
        ]);
        Combination::create([
            'name' => 'Color > Azul claro',
            'list_ids' => 26,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 35
        ]);
        Combination::create([
            'name' => 'Color > Violeta',
            'list_ids' => 27,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 35
        ]);
        Combination::create([
            'name' => 'Color > Azul marino',
            'list_ids' => 17,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 35
        ]);
        Combination::create([
            'name' => 'Color > Gris',
            'list_ids' => 7,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 35
        ]);
        Combination::create([
            'name' => 'Color > Rojo',
            'list_ids' => 10,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 35
        ]);
        Combination::create([
            'name' => 'Color > Rosa',
            'list_ids' => 29,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 35
        ]);

    //product 36
        Combination::create([
            'name' => 'Color > Blanco',
            'list_ids' => 5,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 36
        ]);
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 36
        ]);
        Combination::create([
            'name' => 'Color > Amarillo',
            'list_ids' => 11,
            'parent_attr' => 1,
            'amount' => 0,
            'added_price' => 2,
            'product_id' => 36
        ]);
        Combination::create([
            'name' => 'Color > Azul',
            'list_ids' => 8,
            'parent_attr' => 1,
            'amount' => 0,
            'added_price' => 2,
            'product_id' => 36
        ]);
        Combination::create([
            'name' => 'Color > Lila',
            'list_ids' => 14,
            'parent_attr' => 1,
            'amount' => 0,
            'added_price' => 2,
            'product_id' => 36
        ]);
        Combination::create([
            'name' => 'Color > Rojo oscuro',
            'list_ids' => 21,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 36
        ]);
        Combination::create([
            'name' => 'Color > Rosa',
            'list_ids' => 29,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 36
        ]);
        Combination::create([
            'name' => 'Color > Verde',
            'list_ids' => 9,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 36
        ]);
        //Talla
        Combination::create([
            'name' => 'Talla > XS',
            'list_ids' => 37,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 36
        ]);
        Combination::create([
            'name' => 'Talla > S',
            'list_ids' => 38,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 36
        ]);
        Combination::create([
            'name' => 'Talla > M',
            'list_ids' => 39,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 36
        ]);
        Combination::create([
            'name' => 'Talla > L',
            'list_ids' => 40,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 36
        ]);
        Combination::create([
            'name' => 'Talla > XL',
            'list_ids' => 41,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 36
        ]);
        
    //product 36
        //Color
        Combination::create([
            'name' => 'Color > Blanco',
            'list_ids' => 5,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 37
        ]);
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 37
        ]);        
        Combination::create([
            'name' => 'Color > Azul',
            'list_ids' => 8,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 37
        ]);
        
        Combination::create([
            'name' => 'Color > Rojo',
            'list_ids' => 10,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 37
        ]);
        Combination::create([
            'name' => 'Color > Rosa',
            'list_ids' => 28,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 37
        ]);
        Combination::create([
            'name' => 'Color > Rojo vino',
            'list_ids' => 30,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 37
        ]);
        Combination::create([
            'name' => 'Color > Azul marino',
            'list_ids' => 17,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 37
        ]);
        //Talla
        Combination::create([
            'name' => 'Talla > XS',
            'list_ids' => 37,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 37
        ]);
        Combination::create([
            'name' => 'Talla > S',
            'list_ids' => 38,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 37
        ]);
        Combination::create([
            'name' => 'Talla > M',
            'list_ids' => 39,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 37
        ]);
        Combination::create([
            'name' => 'Talla > L',
            'list_ids' => 40,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 37
        ]);
        Combination::create([
            'name' => 'Talla > XL',
            'list_ids' => 41,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 37
        ]);
        
    //product 38
        //Color
        Combination::create([
            'name' => 'Color > Azul',
            'list_ids' => 8,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 38
        ]);
        
        Combination::create([
            'name' => 'Color > Rojo',
            'list_ids' => 10,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 38
        ]);
        //Talla
        Combination::create([
            'name' => 'Talla > S',
            'list_ids' => 38,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 38
        ]);
        Combination::create([
            'name' => 'Talla > M',
            'list_ids' => 39,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 38
        ]);
        Combination::create([
            'name' => 'Talla > L',
            'list_ids' => 40,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 38
        ]);
        Combination::create([
            'name' => 'Talla > XL',
            'list_ids' => 41,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 38
        ]);
        
    //product 39
        //Color
        Combination::create([
            'name' => 'Color > Azul marino',
            'list_ids' => 17,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 39
        ]);
        Combination::create([
            'name' => 'Color > Burdeos',
            'list_ids' => 36,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 39
        ]);
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 39
        ]);
        Combination::create([
            'name' => 'Color > Violeta oscuro',
            'list_ids' => 28,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 39
        ]);
        Combination::create([
            'name' => 'Color > Verde oscuro',
            'list_ids' => 19,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 39
        ]);
    //product 40
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 40
        ]);
        Combination::create([
            'name' => 'Color > Rojo',
            'list_ids' => 10,
            'parent_attr' => 1,
            'amount' => 0,
            'added_price' => 1,
            'product_id' => 40
        ]);
        Combination::create([
            'name' => 'Color > Rosa',
            'list_ids' => 28,
            'parent_attr' => 1,
            'amount' => 0,
            'added_price' => 1,
            'product_id' => 40
        ]);
        Combination::create([
            'name' => 'Color > Burdeos',
            'list_ids' => 36,
            'parent_attr' => 1,
            'amount' => 0,
            'added_price' => 1,
            'product_id' => 40
        ]);
        Combination::create([
            'name' => 'Color > Azul marino',
            'list_ids' => 17,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 40
        ]);
        Combination::create([
            'name' => 'Color > Verde oscuro',
            'list_ids' => 19,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 40
        ]);
    //product 87
        Combination::create([
            'name' => 'Color > Verde',
            'list_ids' => 9,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 87
        ]);
        Combination::create([
            'name' => 'Color > Amarillo',
            'list_ids' => 11,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 87
        ]);
        Combination::create([
            'name' => 'Color > Azul marino',
            'list_ids' => 17,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 87
        ]);
        Combination::create([
            'name' => 'Color > Blanco',
            'list_ids' => 5,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 87
        ]);
        Combination::create([
            'name' => 'Color > Rojo',
            'list_ids' => 10,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 87
        ]);
    //product 89
        Combination::create([
            'name' => 'Color > Azul marino',
            'list_ids' => 17,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 89
        ]);
        Combination::create([
            'name' => 'Color > Blanco',
            'list_ids' => 5,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 89
        ]);
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 89
        ]);
    //product 90
        Combination::create([
            'name' => 'Color > Azul marino',
            'list_ids' => 17,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 90
        ]);
        Combination::create([
            'name' => 'Color > Rojo',
            'list_ids' => 10,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 90
        ]);
        Combination::create([
            'name' => 'Color > Azul',
            'list_ids' => 8,
            'parent_attr' => 1,
            'amount' => 8,
            'product_id' => 90
        ]);
        Combination::create([
            'name' => 'Color > Blanco',
            'list_ids' => 5,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 90
        ]);
    }

}
