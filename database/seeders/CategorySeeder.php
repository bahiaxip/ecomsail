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
        //category 1
        Category::create([
            'status' => 1,
            'type' => 0,
            'name' =>'Moda mujer',
            'file_name' => 'Moda mujer',
            'image' => 'woman.png',
            'path_tag' => '/ics/cat_icons/',
            'offer' => 1,
            'title_offer' =>'Moda mujer',
            'icon_awesome_offer' => '<i class="fa-solid fa-shirt"></i>',

        ]);
        //category 2
        Category::create([
            'status' => 1,
            'type' => 0,
            'name' =>'Moda hombre',
            'file_name' => 'Ropa.png',
            'image' => 'businessman.png',
            'path_tag' => '/ics/cat_icons/',
            'offer' => 1,
            'title_offer' =>'Moda hombre',
            'icon_awesome_offer' => '<i class="fa-solid fa-shirt"></i>',

        ]);
        //category 3
        Category::create([
            'status' => 1,
            'type' => 0,
            'name' =>'Hogar',
            'file_name' => 'Hogar',
            'image' => 'sofa.png',
            'path_tag' => '/ics/cat_icons/',
            'offer' => 1,
            'title_offer' =>'Hogar',
            'icon_awesome_offer' => '<i class="fa-solid fa-shirt"></i>',

        ]);

        /*Category::create([
            'status' => 1,
            'type' => 0,
            'name' =>'Ropa',
            'file_name' => 'Ropa.png',
            'image' => 'clothes.png',
            'path_tag' => '/ics/cat_icons/',
            'offer' => 1,
            'title_offer' =>'Ropa',
            'icon_awesome_offer' => '<i class="fa-solid fa-shirt"></i>',
        ]);*/
        //category 4
        Category::create([
            'status' => 1,
            'type' => 0,
            'name' =>'Herramientas',
            'file_name' => 'Herramientas.png',
            'image' => 'toolbox.png',
            'path_tag' => '/ics/cat_icons/',
            'offer' => 1,
            'title_offer' =>'Herramientas',
            'icon_awesome_offer' => '<i class="fa-solid fa-toolbox"></i>',
        ]);
        
        //category 5
        Category::create([
            'status' => 1,
            'type' => 0,
            'name' =>'Electrodomésticos',
            'file_name' => 'electrodómesticos.png',
            'image' => 'appliance.png',
            'path_tag' => '/ics/cat_icons/',
            'offer' => 1,
            'title_offer' =>'Electrohogar',            
            'icon_image_offer' => 'others/appliance_E3E3E3.svg',
            'icon_image_offer_hover' => 'others/appliance.svg',
        ]);

        /* categoría alimentación anulado */
        /*Category::create([
            'status' => 1,
            'type' => 0,
            'name' =>'Alimentación',
            'file_name' => 'Alimentación.png',
            'image' => 'food.png',
            'path_tag' => '/ics/cat_icons/',
            'offer' => 1,
            'title_offer' =>NULL,            
            'icon_awesome_offer' => NULL, 
        ]);*/
        //category 6
        Category::create([
            'status' => 1,
            'type' => 0,
            'name' =>'Tecnología',
            'file_name' => 'Tecnologia.png',
            'image' => 'smartphone.png',
            'path_tag' => '/ics/cat_icons/',
            'offer' => 0,
            'title_offer' =>NULL,            
            'icon_awesome_offer' => NULL, 
        ]);
        //category 7
        Category::create([
            'status' => 1,
            'type' => 0,
            'name' =>'Informática',
            'file_name' => 'Informatica.png',
            'image' => 'computing.png',
            'path_tag' => '/ics/cat_icons/',
            'offer' => 1,
            'title_offer' =>'Informática',
            'icon_awesome_offer' => '<i class="fa-solid fa-laptop"></i>',
        ]);
        //category 8
        Category::create([
            'status' => 1,
            'type' => 0,
            'name' =>'Moda infantil',
            'file_name' => 'Ropa.png',
            'image' => 'kids_clothes.png',
            'path_tag' => '/ics/cat_icons/',
            'offer' => 1,
            'title_offer' =>'Ropa',
            'icon_awesome_offer' => '<i class="fa-solid fa-shirt"></i>',

        ]);
        //category 9
        Category::create([
            'status' => 1,
            'type' => 0,
            'name' =>'Jardín',
            'file_name' => 'Jardin.png',
            'image' => 'garden.png',
            'path_tag' => '/ics/cat_icons/',
            'offer' => 1,
            'title_offer' =>'Jardín',
            'icon_awesome_offer' => '<i class="fa-solid fa-tree-city"></i>',
        ]);
        //category 10
        Category::create([
            'status' => 1,
            'type' => 0,
            'name' =>'Cuidado personal',
            'file_name' => 'Toothbrush.png',
            'image' => 'electric-toothbrush.png',
            'path_tag' => '/ics/cat_icons/',
            'offer' => 1,
            'title_offer' =>'Cuidado personal',
            'icon_awesome_offer' => '<i class="fa-solid fa-heart-pulse"></i>',
        ]);
        //Categoría Audio y vídeo
        //category 11
        Category::create([
            'status' => 1,
            'type' => 0,
            'name' =>'Audio y vídeo',
            'file_name' => 'audio_video.png',
            'image' => 'audio_video.png',
            'path_tag' => '/ics/cat_icons/',
            'offer' => 1,
            'title_offer' =>'Audio y vídeo',
            'icon_awesome_offer' => '<i class="fa-solid fa-tv"></i>',
        ]);
        Category::create([
            'status' => 1,
            'type' => 0,
            'name' =>'Deporte',
            'file_name' => 'Deporte',
            'image' => 'family.png',
            'path_tag' => '/ics/cat_icons/',
            'offer' => 1,
            'title_offer' =>'Deporte',
            'icon_awesome_offer' => '<i class="fa-solid fa-person-hiking"></i>',
        ]);
        /*Category::create([
            'status' => 1,
            'type' => 0,
            'name' =>'Calzado',
            'file_name' => 'calzado.png',
            'image' => 'footwear.png',
            'path_tag' => '/ics/cat_icons/',
            'offer' => 1,
            'title_offer' =>'Calzado',
            'icon_awesome_offer' => '<i class="fa-solid fa-shoe-prints"></i>',            
        ]);*/
        for($i=0;$i<20;$i++){
            Category::create([
                'status' => 0,
                'type' => 0,
                'name' =>"NULL",
                'file_name' => "NULL",
                'image' => "NULL",
                'path_tag' => '/ics/cat_icons/',
                'offer' => NULL,
                'title_offer' =>NULL,
                'icon_awesome_offer' => NULL,
            ]);
        }
        


    //subcategories
        //primeras subcategorías moda hombre y mujer
            //mujer
            Category::create([
                'status' => 1,
                'type' => 1,
                'name' =>'Vestidos',
                'file_name' => 'Vestidos',
                'image' => 'dress.png',
                'path_tag' => '/ics/cat_icons/clothes/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 1,
                'name' =>'Camisetas M',
                'file_name' => 'Camisetas M',
                'image' => 't_shirt.png',
                'path_tag' => '/ics/cat_icons/clothes_women/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 1,
                'name' =>'Blusas',
                'file_name' => 'Blusas',
                'image' => 'crop-top.png',
                'path_tag' => '/ics/cat_icons/clothes_women/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 1,
                'name' =>'Leggings',
                'file_name' => 'Leggings',
                'image' => 'leggings.png',
                'path_tag' => '/ics/cat_icons/clothes_women/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 1,
                'name' =>'Faldas',
                'file_name' => 'Faldas',
                'image' => 'skirt.png',
                'path_tag' => '/ics/cat_icons/clothes_women/',
            ]);
            //hombre
            Category::create([
                'status' => 1,
                'type' => 1,
                'name' =>'Vaqueros M',
                'file_name' => 'Vaqueros M',
                'image' => 'women_jeans.png',
                'path_tag' => '/ics/cat_icons/clothes_women/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 1,
                'name' =>'Bikinis',
                'file_name' => 'Bikinis',
                'image' => 'bikini.png',
                'path_tag' => '/ics/cat_icons/clothes_women/',
            ]);

            Category::create([
                'status' => 1,
                'type' => 2,
                'name' =>'Camisetas H',
                'file_name' => 'Camiseta H',
                'image' => 't_shirt.png',
                'path_tag' => '/ics/cat_icons/clothes_men/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 2,
                'name' =>'Sudaderas',
                'file_name' => 'Sudaderas',
                'image' => 'hoddie.png',
                'path_tag' => '/ics/cat_icons/clothes_men/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 2,
                'name' =>'Vaqueros H',
                'file_name' => 'Vaqueros H',
                'image' => 'jeans.png',
                'path_tag' => '/ics/cat_icons/clothes_men/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 2,
                'name' =>'Polos H',
                'file_name' => 'polo_shirt.png',
                'image' => 'polo-shirt.png',
                'path_tag' => '/ics/cat_icons/clothes_men/',
            ]);

            //primeras subcategorías Hogar
            //Hogar
            Category::create([
                'status' => 1,
                'type' => 3,
                'name' =>'Muebles',
                'file_name' => 'Muebles',
                'image' => 'furniture.png',
                'path_tag' => '/ics/cat_icons/home/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 3,
                'name' =>'Pequeño electrodoméstico',
                'file_name' => 'Pequeño electrodoméstico',
                'image' => 'coffee_maker.png',
                'path_tag' => '/ics/cat_icons/home/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 3,
                'name' =>'Decoración',
                'file_name' => 'Decoración',
                'image' => 'decorating.png',
                'path_tag' => '/ics/cat_icons/home/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 3,
                'name' =>'Almacenaje',
                'file_name' => 'Almacenaje',
                'image' => 'storage.png',
                'path_tag' => '/ics/cat_icons/home/',
            ]);
            //primeras subcategorías Herramientas
            //Herramientas
            Category::create([
                'status' => 1,
                'type' => 4,
                'name' =>'Atornilladoras',
                'file_name' => 'atornilladora.png',
                'image' => 'screwdriver.png',
                'path_tag' => '/ics/cat_icons/tools/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 4,
                'name' =>'Flexómetros',
                'file_name' => 'metro.png',
                'image' => 'tape_mesure.png',
                'path_tag' => '/ics/cat_icons/tools/',
            ]);

            Category::create([
                'status' => 1,
                'type' => 4,
                'name' =>'Taladros',
                'file_name' => 'taladro.png',
                'image' => 'drill.png',
                'path_tag' => '/ics/cat_icons/tools/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 5,
                'name' =>'Lavadoras',
                'file_name' => 'Lavadora.png',
                'image' => 'washer.png',
                'path_tag' => '/ics/cat_icons/appliance/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 5,
                'name' =>'Placas/Fogones',
                'file_name' => 'Televisor.png',
                'image' => 'cooking_food.svg',
                'path_tag' => '/ics/cat_icons/appliance/',
            ]);
            /*
            Category::create([
                'status' => 1,
                'type' => 3,
                'name' =>'Televisores',
                'file_name' => 'Televisor.png',
                'image' => 'tv.png',
                'path_tag' => '/ics/cat_icons/appliance/',
            ]);
            */
            Category::create([
                'status' => 1,
                'type' => 5,
                'name' =>'Aspiradoras',
                'file_name' => 'Aspiradora.png',
                'image' => 'vacuum-cleaner.png',
                'path_tag' => '/ics/cat_icons/appliance/',
                
            ]);
            Category::create([
                'status' => 1,
                'type' => 5,
                'name' =>'Frigoríficos',
                'file_name' => 'Frigorífico.png',
                'image' => 'fridge.png',
                'path_tag' => '/ics/cat_icons/appliance/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 5,
                'name' =>'Secadores',
                'file_name' => 'secador.png',
                'image' => 'hair_dryer.png',
                'path_tag' => '/ics/cat_icons/appliance/',
            ]);

            /* subcategorías de tecnología */
            Category::create([
                'status' => 1,
                'type' => 6,
                'name' =>'Smartphones',
                'file_name' => 'smartphone.png',
                'image' => 'smartphone.png',
                'path_tag' => '/ics/cat_icons/tecnology/',
            ]);

            Category::create([
                'status' => 1,
                'type' => 6,
                'name' =>'Tablets',
                'file_name' => 'tablet.png',
                'image' => 'tablet.png',
                'path_tag' => '/ics/cat_icons/tecnology/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 6,
                'name' =>'Ebooks',
                'file_name' => 'ebook.png',
                'image' => 'ebook.png',
                'path_tag' => '/ics/cat_icons/tecnology/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 6,
                'name' =>'Smartwatches',
                'file_name' => 'smartwatch.png',
                'image' => 'smartwatch.png',
                'path_tag' => '/ics/cat_icons/tecnology/',
            ]);

            //Informática
            Category::create([
                'status' => 1,
                'type' => 7,
                'name' =>'Ordenadores sobremesa',
                'file_name' => 'Ordenadores_sobremesa.png',
                'image' => 'pc.png',
                'path_tag' => '/ics/cat_icons/computing/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 7,
                'name' =>'Ordenadores portátiles',
                'file_name' => 'Ordenadores_portatiles.png',
                'image' => 'portable.png',
                'path_tag' => '/ics/cat_icons/computing/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 7,
                'name' =>'Almacenamiento',
                'file_name' => 'Almacenamiento.png',
                'image' => 'sd.png',
                'path_tag' => '/ics/cat_icons/computing/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 7,
                'name' =>'Aplicaciones',
                'file_name' => 'Aplicaciones.png',
                'image' => 'windows.png',
                'path_tag' => '/ics/cat_icons/computing/',
            ]);

            

            Category::create([
                'status' => 1,
                'type' => 8,
                'name' =>'Anoraks',
                'file_name' => 'Anorak.png',
                'image' => 'anorak.png',
                'path_tag' => '/ics/cat_icons/clothes_children/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 8,
                'name' =>'Camisetas N',
                'file_name' => 'Camisetas N',
                'image' => 'anorak.png',
                'path_tag' => '/ics/cat_icons/clothes_children/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 8,
                'name' =>'Pijamas',
                'file_name' => 'Pijamas',
                'image' => 'pijama.png',
                'path_tag' => '/ics/cat_icons/clothes_children/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 8,
                'name' =>'Bufandas',
                'file_name' => 'Bufandas',
                'image' => 'scarf.png',
                'path_tag' => '/ics/cat_icons/clothes_children/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 8,
                'name' =>'Gorros',
                'file_name' => 'Gorros',
                'image' => 'cap.png',
                'path_tag' => '/ics/cat_icons/clothes_children/',
            ]);

            /* subcategorías de alimentación anuladas*/        
            /*Category::create([
                'status' => 1,
                'type' => 5,
                'name' =>'Fruta',
                'file_name' => 'Fruta.png',
                'image' => 'fruit.png',
                'path_tag' => '/ics/cat_icons/food/',
            ]);

            Category::create([
                'status' => 1,
                'type' => 5,
                'name' =>'Pan',
                'file_name' => 'Pan.png',
                'image' => 'bread.png',
                'path_tag' => '/ics/cat_icons/food/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 5,
                'name' =>'Lácteos',
                'file_name' => 'Leche.png',
                'image' => 'milk.png',
                'path_tag' => '/ics/cat_icons/food/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 5,
                'name' =>'Refrescos',
                'file_name' => 'Refresco.png',
                'image' => 'soda.png',
                'path_tag' => '/ics/cat_icons/food/',
            ]);*/

            


            //Jardín
            Category::create([
                'status' => 1,
                'type' => 9,
                'name' =>'Riego',
                'file_name' => 'Mangueras.png',
                'image' => 'hose.png',
                'path_tag' => '/ics/cat_icons/garden/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 9,
                'name' =>'Piscinas',
                'file_name' => 'Piscinas.png',
                'image' => 'inflatable-pool.png',
                'path_tag' => '/ics/cat_icons/garden/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 9,
                'name' =>'Cortacésped',
                'file_name' => 'Cortacésped.png',
                'image' => 'mower.png',
                'path_tag' => '/ics/cat_icons/garden/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 9,
                'name' =>'Semillas',
                'file_name' => 'Semillas.png',
                'image' => 'seed.png',
                'path_tag' => '/ics/cat_icons/garden/',
            ]);

            //Cuidado personal
            Category::create([
                'status' => 1,
                'type' => 10,
                'name' =>'Cepillos de dientes',
                'file_name' => 'Cepillos de dientes.png',
                'image' => 'electric-toothbrush.png',
                'path_tag' => '/ics/cat_icons/personal_care/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 10,
                'name' =>'Maquillaje',
                'file_name' => 'Maquillaje.png',
                'image' => 'make-up.png',
                'path_tag' => '/ics/cat_icons/personal_care/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 10,
                'name' =>'Perfumes',
                'file_name' => 'Perfumes.png',
                'image' => 'fragance.png',
                'path_tag' => '/ics/cat_icons/personal_care/',
            ]);

    
            //Audio y vídeo
            Category::create([
                'status' => 1,
                'type' => 11,
                'name' =>'Televisores',
                'file_name' => 'tv.png',
                'image' => 'tv.png',
                'path_tag' => '/ics/cat_icons/audio_video/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 11,
                'name' =>'Monitores',
                'file_name' => 'monitor.png',
                'image' => 'monitor.png',
                'path_tag' => '/ics/cat_icons/audio_video/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 11,
                'name' =>'Auriculares',
                'file_name' => 'earphones.png',
                'image' => 'earphones.png',
                'path_tag' => '/ics/cat_icons/audio_video/',
            ]);

            //Ropa deportiva
            Category::create([
                'status' => 1,
                'type' => 12,
                'name' =>'Ropa deportiva',
                'file_name' => 'Ropa deportiva',
                'image' => 'sport_tshirt.png',
                'path_tag' => '/ics/cat_icons/sport_clothes/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 12,
                'name' =>'Bolsas de deporte',
                'file_name' => 'bolsa de deporte',
                'image' => 'sport_bag.png',
                'path_tag' => '/ics/cat_icons/sport_clothes/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 12,
                'name' =>'Fitness',
                'file_name' => 'Fitness',
                'image' => 'fitness.png',
                'path_tag' => '/ics/cat_icons/sport_clothes/',
            ]);
            //Calzado
            /*Category::create([
                'status' => 1,
                'type' => 9,
                'name' =>'Zapatillas deportivas',
                'file_name' => 'deportiva.png',
                'image' => 'sneakers.png',
                'path_tag' => '/ics/cat_icons/shoes/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 9,
                'name' =>'Sportwear',
                'file_name' => 'sportwear.png',
                'image' => 'sportwear.png',
                'path_tag' => '/ics/cat_icons/shoes/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 9,
                'name' =>'Sandalias',
                'file_name' => 'Sandalia.png',
                'image' => 'sandals.png',
                'path_tag' => '/ics/cat_icons/shoes/',
            ]);
            Category::create([
                'status' => 1,
                'type' => 9,
                'name' =>'Botas de agua',
                'file_name' => 'Bota_agua.png',
                'image' => 'water_boots.png',
                'path_tag' => '/ics/cat_icons/shoes/',
            ]);*/
        



    }
}
