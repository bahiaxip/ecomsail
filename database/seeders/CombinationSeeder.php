<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Combination, App\Models\ParentCombinations as ParentComb;

class CombinationSeeder extends Seeder
{
    /**
     

     Recordar que si se añaden Atributos nuevos en el AttributeSeeder  los list_ids deben cambiarse (sumarse 1 por cada atributo nuevo, ya que los atributos y los valores se encuentran en la misma tabla)
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
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 2
        ]);
    //product 31
        //Color
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
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 36
        ]);
    //product 38 //camiseta dri-fit-strike        
        //Color
        Combination::create([
            'name' => 'Color > Negro',            
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 38
        ]);
        Combination::create([
            'name' => 'Color > Verde',
            'list_ids' => 9,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 38
        ]);
        Combination::create([
            'name' => 'Color > Azul',
            'list_ids' => 8,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 38
        ]);
        Combination::create([
            'name' => 'Color > Blanco',
            'list_ids' => 5,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 38
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 38
        ]);
        //Talla
        Combination::create([
            'name' => 'Talla > XS',
            'list_ids' => 37,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 38
        ]);
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
        //parent_combinations
        ParentComb::create([
            'parent_id' => 2,
            'parent_name' => 'Talla',
            'type_selection' => 2,
            'product_id' => 38
        ]);
        
    //product 39 //vestido berylove encaje floral
        //Color
        Combination::create([
            'name' => 'Color > Violeta',
            'list_ids' => 27,
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
            'name' => 'Color > Amarillo',
            'list_ids' => 11,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 39
        ]);
        Combination::create([
            'name' => 'Color > Azul',
            'list_ids' => 8,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 39
        ]);
        Combination::create([
            'name' => 'Color > Azul claro',
            'list_ids' => 26,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 39
        ]);
        Combination::create([
            'name' => 'Color > Blanco',            
            'list_ids' => 5,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 39
        ]);
        
        Combination::create([
            'name' => 'Color > Azul marino',
            'list_ids' => 17,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 39
        ]);
        Combination::create([
            'name' => 'Color > Gris',
            'list_ids' => 7,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 39
        ]);
        Combination::create([
            'name' => 'Color > Rojo',
            'list_ids' => 10,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 39
        ]);
        Combination::create([
            'name' => 'Color > Rosa',
            'list_ids' => 29,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 39
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 39
        ]);
        
    //product 40 //vestido grace karin lapiz
        //Color
        Combination::create([
            'name' => 'Color > Blanco',
            'list_ids' => 5,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 40
        ]);
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 40
        ]);        
        Combination::create([
            'name' => 'Color > Azul',
            'list_ids' => 8,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 40
        ]);
        
        Combination::create([
            'name' => 'Color > Rojo',
            'list_ids' => 10,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 40
        ]);
        Combination::create([
            'name' => 'Color > Rosa',
            'list_ids' => 29,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 40
        ]);               
        Combination::create([
            'name' => 'Color > Verde',
            'list_ids' => 19,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 40
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 40
        ]);
        //Talla
        Combination::create([
            'name' => 'Talla > XS',
            'list_ids' => 37,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 40
        ]);
        Combination::create([
            'name' => 'Talla > S',
            'list_ids' => 38,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 40
        ]);
        Combination::create([
            'name' => 'Talla > M',
            'list_ids' => 39,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 40
        ]);
        Combination::create([
            'name' => 'Talla > L',
            'list_ids' => 40,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 40
        ]);
        Combination::create([
            'name' => 'Talla > XL',
            'list_ids' => 41,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 40
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 2,
            'parent_name' => 'Talla',
            'type_selection' => 2,
            'product_id' => 40
        ]);

    //product 41 //vestido grace karin vintage

        Combination::create([
            'name' => 'Color > Rojo',
            'list_ids' => 10,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 41
        ]);
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 41
        ]);        
        Combination::create([
            'name' => 'Color > Blanco',
            'list_ids' => 5,
            'parent_attr' => 1,
            'amount' => 0,
            'added_price' => 2,
            'product_id' => 41
        ]);
        
        Combination::create([
            'name' => 'Color > Rosa',
            'list_ids' => 29,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 41
        ]);
        Combination::create([
            'name' => 'Color > Rojo vino',
            'list_ids' => 30,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 41
        ]);
        Combination::create([
            'name' => 'Color > Azul marino',
            'list_ids' => 17,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 41
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 41
        ]);
        //Talla
        Combination::create([
            'name' => 'Talla > XS',
            'list_ids' => 37,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 41
        ]);
        Combination::create([
            'name' => 'Talla > S',
            'list_ids' => 38,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 41
        ]);
        Combination::create([
            'name' => 'Talla > M',
            'list_ids' => 39,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 41
        ]);
        Combination::create([
            'name' => 'Talla > L',
            'list_ids' => 40,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 41
        ]);
        Combination::create([
            'name' => 'Talla > XL',
            'list_ids' => 41,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 41
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 2,
            'parent_name' => 'Talla',
            'type_selection' => 2,
            'product_id' => 36
        ]);

    //product 42 //vestido lacoste
        //Color
        Combination::create([
            'name' => 'Color > Azul',
            'list_ids' => 8,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 42
        ]);
        
        Combination::create([
            'name' => 'Color > Rojo',
            'list_ids' => 10,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 42
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 42
        ]);
        //Talla
        Combination::create([
            'name' => 'Talla > S',
            'list_ids' => 38,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 42
        ]);
        Combination::create([
            'name' => 'Talla > M',
            'list_ids' => 39,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 42
        ]);
        Combination::create([
            'name' => 'Talla > L',
            'list_ids' => 40,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 42
        ]);
        Combination::create([
            'name' => 'Talla > XL',
            'list_ids' => 41,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 42
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 2,
            'parent_name' => 'Talla',
            'type_selection' => 2,
            'product_id' => 42
        ]);
        
    //product 43 //vestido ever-pretty
        //Color
        Combination::create([
            'name' => 'Color > Azul marino',
            'list_ids' => 17,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 43
        ]);
        Combination::create([
            'name' => 'Color > Burdeos',
            'list_ids' => 36,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 43
        ]);
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 43
        ]);
        Combination::create([
            'name' => 'Color > Violeta oscuro',
            'list_ids' => 28,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 43
        ]);
        Combination::create([
            'name' => 'Color > Verde oscuro',
            'list_ids' => 19,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 43
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 43
        ]);
    //product 44 //vestido murciélago
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 44
        ]);
        Combination::create([
            'name' => 'Color > Rojo',
            'list_ids' => 10,
            'parent_attr' => 1,
            'amount' => 0,
            'added_price' => 1,
            'product_id' => 44
        ]);
        Combination::create([
            'name' => 'Color > Rosa',
            'list_ids' => 29,
            'parent_attr' => 1,
            'amount' => 0,
            'added_price' => 1,
            'product_id' => 44
        ]);
        Combination::create([
            'name' => 'Color > Burdeos',
            'list_ids' => 36,
            'parent_attr' => 1,
            'amount' => 0,
            'added_price' => 1,
            'product_id' => 44
        ]);
        Combination::create([
            'name' => 'Color > Azul marino',
            'list_ids' => 17,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 44
        ]);
        Combination::create([
            'name' => 'Color > Verde oscuro',
            'list_ids' => 19,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 44
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 44
        ]);
    //product 91 //polo kappa
        Combination::create([
            'name' => 'Color > Verde',
            'list_ids' => 9,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 91
        ]);
        Combination::create([
            'name' => 'Color > Amarillo',
            'list_ids' => 11,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 91
        ]);
        Combination::create([
            'name' => 'Color > Azul marino',
            'list_ids' => 17,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 91
        ]);
        Combination::create([
            'name' => 'Color > Blanco',
            'list_ids' => 5,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 91
        ]);
        Combination::create([
            'name' => 'Color > Rojo',
            'list_ids' => 10,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 91
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 91
        ]);
    //product 93 //polo lacoste dh3201
        Combination::create([
            'name' => 'Color > Azul marino',
            'list_ids' => 17,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 93
        ]);
        Combination::create([
            'name' => 'Color > Blanco',
            'list_ids' => 5,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 93
        ]);
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 93
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 93
        ]);
    //product 94 //polo adidas tiro17
        Combination::create([
            'name' => 'Color > Azul marino',
            'list_ids' => 17,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 94
        ]);
        Combination::create([
            'name' => 'Color > Rojo',
            'list_ids' => 10,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 94
        ]);
        Combination::create([
            'name' => 'Color > Azul',
            'list_ids' => 8,
            'parent_attr' => 1,
            'amount' => 8,
            'product_id' => 94
        ]);
        Combination::create([
            'name' => 'Color > Blanco',
            'list_ids' => 5,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 94
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 94
        ]);

        //product 139 //leggings Puma ESS
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 139
        ]);
        Combination::create([
            'name' => 'Color > Gris',
            'list_ids' => 7,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 139
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 139
        ]);


        //product 142 //falda urban GoCo patinadora
        //Color
        Combination::create([
            'name' => 'Color > Fucsia',
            'list_ids' => 35,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 142
        ]);
        Combination::create([
            'name' => 'Color > Rojo',
            'list_ids' => 10,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 142
        ]);
        Combination::create([
            'name' => 'Color > Verde',
            'list_ids' => 9,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 142
        ]);
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 142
        ]);
        Combination::create([
            'name' => 'Color > Rojo vino',
            'list_ids' => 30,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 142
        ]);
        Combination::create([
            'name' => 'Color > Blanco',
            'list_ids' => 5,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 142
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 142
        ]);
        //Talla
        Combination::create([
            'name' => 'Talla > XS',
            'list_ids' => 37,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 142
        ]);
        Combination::create([
            'name' => 'Talla > S',
            'list_ids' => 38,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 142
        ]);
        Combination::create([
            'name' => 'Talla > M',
            'list_ids' => 39,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 142
        ]);
        Combination::create([
            'name' => 'Talla > L',
            'list_ids' => 40,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 142
        ]);
        
        Combination::create([
            'name' => 'Talla > XL',
            'list_ids' => 41,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 142
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 2,
            'parent_name' => 'Talla',
            'type_selection' => 2,
            'product_id' => 142
        ]);

        //product 144 //Falda vaquera
        //Color
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 144
        ]);
        Combination::create([
            'name' => 'Color > Azul',
            'list_ids' => 8,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 144
        ]);
        Combination::create([
            'name' => 'Color > Gris claro',
            'list_ids' => 24,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 144
        ]);
        Combination::create([
            'name' => 'Color > Gris oscuro',
            'list_ids' => 37,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 144
        ]);
        Combination::create([
            'name' => 'Color > Rojo',
            'list_ids' => 10,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 144
        ]);
        Combination::create([
            'name' => 'Color > Fucsia',
            'list_ids' => 35,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 144
        ]);
        Combination::create([
            'name' => 'Color > Verde',
            'list_ids' => 9,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 144
        ]);
        Combination::create([
            'name' => 'Color > Rojo vino',
            'list_ids' => 30,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 144
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 144
        ]);
        //Talla
        Combination::create([
            'name' => 'Talla > XS',
            'list_ids' => 37,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 144
        ]);
        Combination::create([
            'name' => 'Talla > S',
            'list_ids' => 38,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 144
        ]);
        Combination::create([
            'name' => 'Talla > M',
            'list_ids' => 39,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 144
        ]);
        Combination::create([
            'name' => 'Talla > L',
            'list_ids' => 40,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 144
        ]);
        
        Combination::create([
            'name' => 'Talla > XL',
            'list_ids' => 41,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 144
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 2,
            'parent_name' => 'Talla',
            'type_selection' => 2,
            'product_id' => 144
        ]);

        //product 145 //Falda Shein
        //Talla
        Combination::create([
            'name' => 'Talla > XS',
            'list_ids' => 37,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 145
        ]);
        Combination::create([
            'name' => 'Talla > S',
            'list_ids' => 38,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 145
        ]);
        Combination::create([
            'name' => 'Talla > M',
            'list_ids' => 39,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 145
        ]);
        Combination::create([
            'name' => 'Talla > L',
            'list_ids' => 40,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 145
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 2,
            'parent_name' => 'Talla',
            'type_selection' => 2,
            'product_id' => 145
        ]);

        //product 146 //Mueble TV Brimnes
        //Color
        Combination::create([
            'name' => 'Color > Blanco',
            'list_ids' => 5,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 146
        ]);
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 146
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 146
        ]);

        //product 157 //Jarrón Koomuao
        //Talla
        Combination::create([
            'name' => 'Talla > M',
            'list_ids' => 39,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 157
        ]);
        Combination::create([
            'name' => 'Talla > L',
            'list_ids' => 40,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 157
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 2,
            'parent_name' => 'Talla',
            'type_selection' => 2,
            'product_id' => 157
        ]);

        //product 160 //Anorak Columbia Powder Lite
        //Color

        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 160
        ]);
        Combination::create([
            'name' => 'Color > Azul oscuro',
            'list_ids' => 18,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 160
        ]);
        Combination::create([
            'name' => 'Color > Azul',
            'list_ids' => 8,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 160
        ]);
        Combination::create([
            'name' => 'Color > Gris',
            'list_ids' => 7,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 160
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 160
        ]);

        //Talla
        Combination::create([
            'name' => 'Talla > 2 años',
            'list_ids' => 45,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 160
        ]);
        Combination::create([
            'name' => 'Talla > 3 años',
            'list_ids' => 46,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 160
        ]);
        Combination::create([
            'name' => 'Talla > 4 años',
            'list_ids' => 47,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 160
        ]);
        Combination::create([
            'name' => 'Talla > XXS',
            'list_ids' => 48,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 160
        ]);
        Combination::create([
            'name' => 'Talla > XS',
            'list_ids' => 38,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 160
        ]);
        
        //parent_combinations
        ParentComb::create([
            'parent_id' => 2,
            'parent_name' => 'Talla',
            'type_selection' => 2,
            'product_id' => 160
        ]);

        //product 161 //Chaqueta Pepe Jeans Gilford
        //Talla
        Combination::create([
            'name' => 'Talla > 4 años',
            'list_ids' => 47,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 161
        ]);
        Combination::create([
            'name' => 'Talla > 6 años',
            'list_ids' => 50,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 161
        ]);
        Combination::create([
            'name' => 'Talla > 8 años',
            'list_ids' => 52,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 161
        ]);
        Combination::create([
            'name' => 'Talla > 10 años',
            'list_ids' => 54,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 161
        ]);
        Combination::create([
            'name' => 'Talla > 12 años',
            'list_ids' => 55,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 161
        ]);
        Combination::create([
            'name' => 'Talla > 14 años',
            'list_ids' => 56,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 161
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 2,
            'parent_name' => 'Talla',
            'type_selection' => 2,
            'product_id' => 161
        ]);

        //product 162 //Abrigo Mayoral niños
        //Color
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 162
        ]);
        //Color
        Combination::create([
            'name' => 'Color > Rojo',
            'list_ids' => 10,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 162
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 162
        ]);
        //Talla
        Combination::create([
            'name' => 'Talla > 10 años',
            'list_ids' => 54,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 162
        ]);
        Combination::create([
            'name' => 'Talla > 12 años',
            'list_ids' => 55,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 162
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 2,
            'parent_name' => 'Talla',
            'type_selection' => 2,
            'product_id' => 162
        ]);        

        //product 163 //Abrigo Chicco niños
        //Talla
        Combination::create([
            'name' => 'Talla > 18 meses',
            'list_ids' => 61,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 163
        ]);
        Combination::create([
            'name' => 'Talla > 2 años',
            'list_ids' => 45,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 163
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 2,
            'parent_name' => 'Talla',
            'type_selection' => 2,
            'product_id' => 163
        ]);

        //product 164 //Camiseta Pepe Jeans niños
        //Color
        Combination::create([
            'name' => 'Color > Azul',
            'list_ids' => 8,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 164
        ]);
        Combination::create([
            'name' => 'Color > Blanco',
            'list_ids' => 5,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 164
        ]);
        Combination::create([
            'name' => 'Color > Gris',
            'list_ids' => 7,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 164
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 164
        ]);
        //Talla
        Combination::create([
            'name' => 'Talla > 4 años',
            'list_ids' => 47,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 164
        ]);
        Combination::create([
            'name' => 'Talla > 6 años',
            'list_ids' => 50,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 164
        ]);
        Combination::create([
            'name' => 'Talla > 8 años',
            'list_ids' => 52,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 164
        ]);
        Combination::create([
            'name' => 'Talla > 10 años',
            'list_ids' => 54,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 164
        ]);
        Combination::create([
            'name' => 'Talla > 12 años',
            'list_ids' => 55,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 164
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 2,
            'parent_name' => 'Talla',
            'type_selection' => 2,
            'product_id' => 164
        ]);

        //product 165 //Camiseta Pepe Jeans niños
        //Color
        Combination::create([
            'name' => 'Color > Azul',
            'list_ids' => 8,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 165
        ]);
        Combination::create([
            'name' => 'Color > Blanco',
            'list_ids' => 5,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 165
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 165
        ]);
        //Talla
        Combination::create([
            'name' => 'Talla > 6 años',
            'list_ids' => 50,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 165
        ]);
        Combination::create([
            'name' => 'Talla > 8 años',
            'list_ids' => 52,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 165
        ]);
        Combination::create([
            'name' => 'Talla > 10 años',
            'list_ids' => 54,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 165
        ]);
        Combination::create([
            'name' => 'Talla > 12 años',
            'list_ids' => 55,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 165
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 2,
            'parent_name' => 'Talla',
            'type_selection' => 2,
            'product_id' => 165
        ]);

        //product 166 //Camiseta Adidas Ent22
        //Color
        Combination::create([
            'name' => 'Color > Azul',
            'list_ids' => 8,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 165
        ]);
        Combination::create([
            'name' => 'Color > Rojo',
            'list_ids' => 10,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 165
        ]);
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 165
        ]);
        Combination::create([
            'name' => 'Color > Blanco',
            'list_ids' => 5,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 165
        ]);
        Combination::create([
            'name' => 'Color > Gris',
            'list_ids' => 7,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 165
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 166
        ]);
        //Talla
        Combination::create([
            'name' => 'Talla > 6 años',
            'list_ids' => 50,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 166
        ]);
        Combination::create([
            'name' => 'Talla > 8 años',
            'list_ids' => 52,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 166
        ]);
        Combination::create([
            'name' => 'Talla > 10 años',
            'list_ids' => 54,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 166
        ]);
        Combination::create([
            'name' => 'Talla > 12 años',
            'list_ids' => 55,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 166
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 2,
            'parent_name' => 'Talla',
            'type_selection' => 2,
            'product_id' => 166
        ]);


        //product 167 //Pijama TEDD Dinosaurios
        //Color
        Combination::create([
            'name' => 'Color > Verde',
            'list_ids' => 9,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 167
        ]);
        Combination::create([
            'name' => 'Color > Gris',
            'list_ids' => 7,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 167
        ]);
        Combination::create([
            'name' => 'Color > Azul oscuro',
            'list_ids' => 18,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 167
        ]);
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 167
        ]);        
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 167
        ]);
        //Talla
        Combination::create([
            'name' => 'Talla > 2 años',
            'list_ids' => 45,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 167
        ]);
        Combination::create([
            'name' => 'Talla > 3 años',
            'list_ids' => 46,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 167
        ]);
        Combination::create([
            'name' => 'Talla > 4 años',
            'list_ids' => 47,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 167
        ]);
        Combination::create([
            'name' => 'Talla > 5 años',
            'list_ids' => 49,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 167
        ]);
        Combination::create([
            'name' => 'Talla > 6 años',
            'list_ids' => 50,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 167
        ]);
        Combination::create([
            'name' => 'Talla > 7 años',
            'list_ids' => 51,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 167
        ]);
        Combination::create([
            'name' => 'Talla > 8 años',
            'list_ids' => 52,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 167
        ]);
        Combination::create([
            'name' => 'Talla > 10 años',
            'list_ids' => 54,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 167
        ]);
        Combination::create([
            'name' => 'Talla > 12 años',
            'list_ids' => 55,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 167
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 2,
            'parent_name' => 'Talla',
            'type_selection' => 2,
            'product_id' => 167
        ]);

        //product 168 //Pijama Disney Cars 
        //Talla
        Combination::create([
            'name' => 'Talla > 2 años',
            'list_ids' => 45,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 168
        ]);
        Combination::create([
            'name' => 'Talla > 3 años',
            'list_ids' => 46,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 168
        ]);
        Combination::create([
            'name' => 'Talla > 4 años',
            'list_ids' => 47,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 168
        ]);
        Combination::create([
            'name' => 'Talla > 5 años',
            'list_ids' => 49,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 168
        ]);
        Combination::create([
            'name' => 'Talla > 6 años',
            'list_ids' => 50,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 168
        ]);
        Combination::create([
            'name' => 'Talla > 7 años',
            'list_ids' => 51,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 168
        ]);
        Combination::create([
            'name' => 'Talla > 8 años',
            'list_ids' => 52,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 168
        ]);
        
        //parent_combinations
        ParentComb::create([
            'parent_id' => 2,
            'parent_name' => 'Talla',
            'type_selection' => 2,
            'product_id' => 168
        ]);

        //product 169 //Pijama Patrulla Canina
        //Talla
        Combination::create([
            'name' => 'Talla > 2 años',
            'list_ids' => 45,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 169
        ]);
        Combination::create([
            'name' => 'Talla > 3 años',
            'list_ids' => 46,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 169
        ]);
        Combination::create([
            'name' => 'Talla > 4 años',
            'list_ids' => 47,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 169
        ]);
        Combination::create([
            'name' => 'Talla > 5 años',
            'list_ids' => 49,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 169
        ]);
        Combination::create([
            'name' => 'Talla > 6 años',
            'list_ids' => 50,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 169
        ]);
        Combination::create([
            'name' => 'Talla > 7 años',
            'list_ids' => 51,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 169
        ]);
        Combination::create([
            'name' => 'Talla > 8 años',
            'list_ids' => 52,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 169
        ]);
        
        //parent_combinations
        ParentComb::create([
            'parent_id' => 2,
            'parent_name' => 'Talla',
            'type_selection' => 2,
            'product_id' => 169
        ]);

        //product 170 //Pijama Marvel Spiderman
        //Talla
        Combination::create([
            'name' => 'Talla > 2 años',
            'list_ids' => 45,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 170
        ]);
        Combination::create([
            'name' => 'Talla > 3 años',
            'list_ids' => 46,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 170
        ]);
        Combination::create([
            'name' => 'Talla > 4 años',
            'list_ids' => 47,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 170
        ]);
        Combination::create([
            'name' => 'Talla > 5 años',
            'list_ids' => 49,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 170
        ]);
        Combination::create([
            'name' => 'Talla > 6 años',
            'list_ids' => 50,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 170
        ]);
        Combination::create([
            'name' => 'Talla > 7 años',
            'list_ids' => 51,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 170
        ]);
        Combination::create([
            'name' => 'Talla > 8 años',
            'list_ids' => 52,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 170
        ]);
        
        //parent_combinations
        ParentComb::create([
            'parent_id' => 2,
            'parent_name' => 'Talla',
            'type_selection' => 2,
            'product_id' => 170
        ]);

        //product 171 //Bufanda Benetton para niños
        //Color
        Combination::create([
            'name' => 'Color > Blanco',
            'list_ids' => 5,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 171
        ]);
        Combination::create([
            'name' => 'Color > Azul',
            'list_ids' => 8,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 171
        ]);
        Combination::create([
            'name' => 'Color > Fucsia',
            'list_ids' => 35,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 171
        ]);
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 171
        ]);        
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 171
        ]);

        //product 176 //Gorro Danish Endurance
        //Color
        Combination::create([
            'name' => 'Color > Gris',
            'list_ids' => 7,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 176
        ]);
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 176
        ]);
        Combination::create([
            'name' => 'Color > Rojo',
            'list_ids' => 10,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 176
        ]);
        Combination::create([
            'name' => 'Color > Rosa',
            'list_ids' => 29,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 176
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 176
        ]);

        //product 179 //Camiseta Joma Academi IV
        //Color
        Combination::create([
            'name' => 'Color > Rojo',
            'list_ids' => 10,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 179
        ]);
        Combination::create([
            'name' => 'Color > Azul',
            'list_ids' => 8,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 179
        ]);
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 179
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 179
        ]);
        //Talla
        Combination::create([
            'name' => 'Talla > XS',
            'list_ids' => 38,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 179
        ]);
        Combination::create([
            'name' => 'Talla > S',
            'list_ids' => 39,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 179
        ]);
        Combination::create([
            'name' => 'Talla > M',
            'list_ids' => 40,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 179
        ]);
        Combination::create([
            'name' => 'Talla > L',
            'list_ids' => 41,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 179
        ]);
        Combination::create([
            'name' => 'Talla > XL',
            'list_ids' => 42,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 179
        ]);
        Combination::create([
            'name' => 'Talla > XXL',
            'list_ids' => 43,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 179
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 2,
            'parent_name' => 'Talla',
            'type_selection' => 2,
            'product_id' => 179
        ]);

        //product 180 //Camiseta Nike Tank Pure
        //Color
        Combination::create([
            'name' => 'Color > Naranja',
            'list_ids' => 12,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 180
        ]);
        Combination::create([
            'name' => 'Color > Violeta',
            'list_ids' => 27,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 180
        ]);        
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 180
        ]);
        //Talla
        Combination::create([
            'name' => 'Talla > XS',
            'list_ids' => 38,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 180
        ]);
        Combination::create([
            'name' => 'Talla > S',
            'list_ids' => 39,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 180
        ]);
        Combination::create([
            'name' => 'Talla > M',
            'list_ids' => 40,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 180
        ]);
        Combination::create([
            'name' => 'Talla > L',
            'list_ids' => 41,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 180
        ]);
        Combination::create([
            'name' => 'Talla > XL',
            'list_ids' => 42,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 180
        ]);
        Combination::create([
            'name' => 'Talla > XXL',
            'list_ids' => 43,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 180
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 2,
            'parent_name' => 'Talla',
            'type_selection' => 2,
            'product_id' => 180
        ]);


        //product 187 //Bolsa de deporte Tokeya
        //Color
        Combination::create([
            'name' => 'Color > Azul claro',
            'list_ids' => 26,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 187
        ]);
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 187
        ]);
        Combination::create([
            'name' => 'Color > Violeta',
            'list_ids' => 27,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 187
        ]);        
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 187
        ]);

        //product 188 //Esterilla TRESKO
        //Color        
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 188
        ]);
        Combination::create([
            'name' => 'Color > Naranja',
            'list_ids' => 12,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 188
        ]);
        Combination::create([
            'name' => 'Color > Azul',
            'list_ids' => 8,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 188
        ]);
        Combination::create([
            'name' => 'Color > Rosa',
            'list_ids' => 29,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 188
        ]);
        Combination::create([
            'name' => 'Color > Violeta',
            'list_ids' => 27,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 188
        ]);
        Combination::create([
            'name' => 'Color > Verde',
            'list_ids' => 9,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 188
        ]);        
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 188
        ]);

        //product 189 //Esterilla CAMBIVO
        //Color        
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 189
        ]);
        Combination::create([
            'name' => 'Color > Azul',
            'list_ids' => 8,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 189
        ]);
        Combination::create([
            'name' => 'Color > Verde claro',
            'list_ids' => 20,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 189
        ]);
        Combination::create([
            'name' => 'Color > Violeta oscuro',
            'list_ids' => 28,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 189
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 189
        ]);

        //Product 190 //Guantes fitness AQF
        //Color        
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 190
        ]);
        Combination::create([
            'name' => 'Color > Rojo',
            'list_ids' => 10,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 190
        ]);
        Combination::create([
            'name' => 'Color > Verde',
            'list_ids' => 9,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 190
        ]); 
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 190
        ]);

        //Product 191 //Guantes fitness RDX
        //Color
        Combination::create([
            'name' => 'Color > Rojo',
            'list_ids' => 10,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 191
        ]);
        Combination::create([
            'name' => 'Color > Azul',
            'list_ids' => 8,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 191
        ]);
        Combination::create([
            'name' => 'Color > Gris',
            'list_ids' => 7,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 191
        ]);
        Combination::create([
            'name' => 'Color > Violeta',
            'list_ids' => 27,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 191
        ]);
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 191
        ]);
        Combination::create([
            'name' => 'Color > Fucsia',
            'list_ids' => 35,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 191
        ]);
        Combination::create([
            'name' => 'Color > Verde',
            'list_ids' => 9,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 191
        ]); 
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 191
        ]);
        //Talla        
        Combination::create([
            'name' => 'Talla > S',
            'list_ids' => 39,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 191
        ]);
        Combination::create([
            'name' => 'Talla > M',
            'list_ids' => 40,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 191
        ]);
        Combination::create([
            'name' => 'Talla > L',
            'list_ids' => 41,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 191
        ]);
        Combination::create([
            'name' => 'Talla > XL',
            'list_ids' => 42,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 191
        ]);        
        //parent_combinations
        ParentComb::create([
            'parent_id' => 2,
            'parent_name' => 'Talla',
            'type_selection' => 2,
            'product_id' => 191
        ]);

        //Product 192 //Pelota fitness CORE BALANCE
        //Color
        Combination::create([
            'name' => 'Color > Turquesa',
            'list_ids' => 31,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 192
        ]);
        Combination::create([
            'name' => 'Color > Gris',
            'list_ids' => 7,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 192
        ]);
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 192
        ]);
        Combination::create([
            'name' => 'Color > Rosa',
            'list_ids' => 29,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 192
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 192
        ]);
        //Product 193 //Faja reductora Mezzuno
        //Color
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 193
        ]);
        Combination::create([
            'name' => 'Color > Fucsia',
            'list_ids' => 35,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 193
        ]);
        Combination::create([
            'name' => 'Color > Verde',
            'list_ids' => 9,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 193
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 193
        ]);
        //Product 194 //Faja Reductora InnoTi
        //Color
        
        Combination::create([
            'name' => 'Color > Fucsia',
            'list_ids' => 35,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 194
        ]);
        Combination::create([
            'name' => 'Color > Azul',
            'list_ids' => 8,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 194
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 194
        ]);

        //Product 196 //Sudadera Puma Teamgoal 23
        //Color
        
        Combination::create([
            'name' => 'Color > Gris',
            'list_ids' => 7,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 196
        ]);
        Combination::create([
            'name' => 'Color > Azul',
            'list_ids' => 8,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 196
        ]);
        Combination::create([
            'name' => 'Color > Azul oscuro',
            'list_ids' => 18,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 196
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 196
        ]);

        //Talla
        Combination::create([
            'name' => 'Talla > XS',
            'list_ids' => 38,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 196
        ]);
        Combination::create([
            'name' => 'Talla > S',
            'list_ids' => 39,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 196
        ]);
        Combination::create([
            'name' => 'Talla > M',
            'list_ids' => 40,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 196
        ]);
        Combination::create([
            'name' => 'Talla > L',
            'list_ids' => 41,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 196
        ]);
        Combination::create([
            'name' => 'Talla > XL',
            'list_ids' => 42,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 196
        ]);
        Combination::create([
            'name' => 'Talla > XXL',
            'list_ids' => 43,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 196
        ]);        
        //parent_combinations
        ParentComb::create([
            'parent_id' => 2,
            'parent_name' => 'Talla',
            'type_selection' => 2,
            'product_id' => 196
        ]);

        //Product 197 //Sudadera Helly Hansen HH
        //Color
        
        Combination::create([
            'name' => 'Color > Gris',
            'list_ids' => 7,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 197
        ]);
        Combination::create([
            'name' => 'Color > Blanco',
            'list_ids' => 5,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 197
        ]);
        Combination::create([
            'name' => 'Color > Rojo',
            'list_ids' => 10,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 197
        ]);
        Combination::create([
            'name' => 'Color > Naranja',
            'list_ids' => 12,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 197
        ]);        
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 197
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 197
        ]);

        //Talla        
        Combination::create([
            'name' => 'Talla > S',
            'list_ids' => 39,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 197
        ]);
        Combination::create([
            'name' => 'Talla > M',
            'list_ids' => 40,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 197
        ]);
        Combination::create([
            'name' => 'Talla > L',
            'list_ids' => 41,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 197
        ]);
        Combination::create([
            'name' => 'Talla > XL',
            'list_ids' => 42,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 197
        ]);
        Combination::create([
            'name' => 'Talla > XXL',
            'list_ids' => 43,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 197
        ]);        
        //parent_combinations
        ParentComb::create([
            'parent_id' => 2,
            'parent_name' => 'Talla',
            'type_selection' => 2,
            'product_id' => 197
        ]);

        //Product 198 //Sudadera NIke Park20 Pro
        //Color
        
        Combination::create([
            'name' => 'Color > Azul',
            'list_ids' => 8,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 198
        ]);
        Combination::create([
            'name' => 'Color > Amarillo',
            'list_ids' => 11,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 198
        ]);        
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 198
        ]);
        //Talla        
        Combination::create([
            'name' => 'Talla > S',
            'list_ids' => 39,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 198
        ]);
        Combination::create([
            'name' => 'Talla > M',
            'list_ids' => 40,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 198
        ]);
        Combination::create([
            'name' => 'Talla > L',
            'list_ids' => 41,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 198
        ]);
        Combination::create([
            'name' => 'Talla > XL',
            'list_ids' => 42,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 198
        ]);
        Combination::create([
            'name' => 'Talla > XXL',
            'list_ids' => 43,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 198
        ]);        
        //parent_combinations
        ParentComb::create([
            'parent_id' => 2,
            'parent_name' => 'Talla',
            'type_selection' => 2,
            'product_id' => 198
        ]);

        //Product 199 //Sudadera Joma Cairo
        //Color
        Combination::create([
            'name' => 'Color > Rojo',
            'list_ids' => 10,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 199
        ]);
        Combination::create([
            'name' => 'Color > Azul',
            'list_ids' => 8,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 199
        ]);
        Combination::create([
            'name' => 'Color > Blanco',
            'list_ids' => 5,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 199
        ]);
        Combination::create([
            'name' => 'Color > Azul oscuro',
            'list_ids' => 18,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 199
        ]);
        Combination::create([
            'name' => 'Color > Amarillo',
            'list_ids' => 11,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 199
        ]);
        Combination::create([
            'name' => 'Color > Negro',
            'list_ids' => 6,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 199
        ]);
        Combination::create([
            'name' => 'Color > Verde',
            'list_ids' => 9,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 199
        ]);
        Combination::create([
            'name' => 'Color > Gris',
            'list_ids' => 7,
            'parent_attr' => 1,
            'amount' => 0,
            'product_id' => 199
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 1,
            'parent_name' => 'Color',
            'type_selection' => 3,
            'product_id' => 199
        ]);
        //Talla        
        Combination::create([
            'name' => 'Talla > S',
            'list_ids' => 39,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 199
        ]);
        Combination::create([
            'name' => 'Talla > M',
            'list_ids' => 40,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 199
        ]);
        Combination::create([
            'name' => 'Talla > L',
            'list_ids' => 41,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 199
        ]);
        Combination::create([
            'name' => 'Talla > XL',
            'list_ids' => 42,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 199
        ]);
        Combination::create([
            'name' => 'Talla > XXL',
            'list_ids' => 43,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 199
        ]);        
        //parent_combinations
        ParentComb::create([
            'parent_id' => 2,
            'parent_name' => 'Talla',
            'type_selection' => 2,
            'product_id' => 199
        ]);


        //FC Barcelona camiseta

        Combination::create([
            'name' => 'Talla > XS',
            'list_ids' => 37,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 131
        ]);
        Combination::create([
            'name' => 'Talla > S',
            'list_ids' => 38,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 131
        ]);
        Combination::create([
            'name' => 'Talla > M',
            'list_ids' => 39,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 131
        ]);
        Combination::create([
            'name' => 'Talla > L',
            'list_ids' => 40,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 131
        ]);
        Combination::create([
            'name' => 'Talla > XL',
            'list_ids' => 41,
            'parent_attr' => 2,
            'amount' => 0,
            'product_id' => 131
        ]);
        //parent_combinations
        ParentComb::create([
            'parent_id' => 2,
            'parent_name' => 'Talla',
            'type_selection' => 2,
            'product_id' => 131
        ]);
    }

}
