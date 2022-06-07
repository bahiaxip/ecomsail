<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //categories
        Category::create([
            'status' => 1,
            'type' => 0,
            'name' =>'Ropa',
            'file_name' => 'Ropa.png',
            'image' => 'clothes.png',
            'path_tag' => '/icons/cat_icons/',
        ]);
        Category::create([
            'status' => 1,
            'type' => 0,
            'name' =>'Herramientas',
            'file_name' => 'Herramientas.png',
            'image' => 'tools.png',
            'path_tag' => '/icons/cat_icons/',
        ]);
        Category::create([
            'status' => 1,
            'type' => 0,
            'name' =>'Calzado',
            'file_name' => 'calzado.png',
            'image' => 'footwear.png',
            'path_tag' => '/icons/cat_icons/',
        ]);

        Category::create([
            'status' => 1,
            'type' => 0,
            'name' =>'Electrodomésticos',
            'file_name' => 'electrodómesticos.png',
            'image' => 'appliance.png',
            'path_tag' => '/icons/cat_icons/',
        ]);

        Category::create([
            'status' => 1,
            'type' => 0,
            'name' =>'Alimentación',
            'file_name' => 'Alimentación.png',
            'image' => 'food.png',
            'path_tag' => '/icons/cat_icons/',
        ]);

        //subcategories

            Category::create([
                'status' => 1,
                'type' => 1,
                'name' =>'Camisetas',
                'file_name' => 'Camiseta.png',
                'image' => 't_shirt.png',
                'path_tag' => '/icons/cat_icons/clothes/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 1,
                'name' =>'Vaqueros',
                'file_name' => 'Vaqueros.png',
                'image' => 'jeans.png',
                'path_tag' => '/icons/cat_icons/clothes/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 1,
                'name' =>'Vestidos',
                'file_name' => 'Vestidos.png',
                'image' => 'dress.png',
                'path_tag' => '/icons/cat_icons/clothes/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 1,
                'name' =>'Anoraks',
                'file_name' => 'Anorak.png',
                'image' => 'anorak.png',
                'path_tag' => '/icons/cat_icons/clothes/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 1,
                'name' =>'Polos',
                'file_name' => 'polo_shirt.png',
                'image' => 'polo-shirt.png',
                'path_tag' => '/icons/cat_icons/clothes/',
            ]);

        
            Category::create([
                'status' => 1,
                'type' => 2,
                'name' =>'Atornilladoras',
                'file_name' => 'atornilladora.png',
                'image' => 'drill.png',
                'path_tag' => '/icons/cat_icons/tools/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 2,
                'name' =>'Flexómetros',
                'file_name' => 'metro.png',
                'image' => 'tape_mesure.png',
                'path_tag' => '/icons/cat_icons/tools/',
            ]);
            


        
            Category::create([
                'status' => 1,
                'type' => 3,
                'name' =>'Zapatillas deportivas',
                'file_name' => 'deportiva.png',
                'image' => 'sneakers.png',
                'path_tag' => '/icons/cat_icons/shoes/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 3,
                'name' =>'Sportwear',
                'file_name' => 'sportwear.png',
                'image' => 'sportwear.png',
                'path_tag' => '/icons/cat_icons/shoes/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 3,
                'name' =>'Sandalias',
                'file_name' => 'Sandalia.png',
                'image' => 'sandals.png',
                'path_tag' => '/icons/cat_icons/shoes/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 3,
                'name' =>'Botas de agua',
                'file_name' => 'Bota_agua.png',
                'image' => 'water_boots.png',
                'path_tag' => '/icons/cat_icons/shoes/',
            ]);


        
            Category::create([
                'status' => 1,
                'type' => 4,
                'name' =>'Lavadoras',
                'file_name' => 'Lavadora.png',
                'image' => 'washer.png',
                'path_tag' => '/icons/cat_icons/appliance/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 4,
                'name' =>'Televisores',
                'file_name' => 'Televisor.png',
                'image' => 'tv.png',
                'path_tag' => '/icons/cat_icons/appliance/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 4,
                'name' =>'Aspiradoras',
                'file_name' => 'Aspiradora.png',
                'image' => 'vacuum-cleaner.png',
                'path_tag' => '/icons/cat_icons/appliance/',
                
            ]);
            Category::create([
                'status' => 1,
                'type' => 4,
                'name' =>'Frigoríficos',
                'file_name' => 'Frigorífico.png',
                'image' => 'fridge.png',
                'path_tag' => '/icons/cat_icons/appliance/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 4,
                'name' =>'Secadores',
                'file_name' => 'secador.png',
                'image' => 'hair_dryer.png',
                'path_tag' => '/icons/cat_icons/appliance/',
            ]);

        
            Category::create([
                'status' => 1,
                'type' => 5,
                'name' =>'Fruta',
                'file_name' => 'Fruta.png',
                'image' => 'fruit.png',
                'path_tag' => '/icons/cat_icons/food/',
            ]);

            Category::create([
                'status' => 1,
                'type' => 5,
                'name' =>'Pan',
                'file_name' => 'Pan.png',
                'image' => 'bread.png',
                'path_tag' => '/icons/cat_icons/food/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 5,
                'name' =>'Lácteos',
                'file_name' => 'Leche.png',
                'image' => 'milk.png',
                'path_tag' => '/icons/cat_icons/food/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 5,
                'name' =>'Refrescos',
                'file_name' => 'Refresco.png',
                'image' => 'soda.png',
                'path_tag' => '/icons/cat_icons/food/',
            ]);

        



    }
}
