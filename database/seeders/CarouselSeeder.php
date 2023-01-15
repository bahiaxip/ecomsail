<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Carousel;
class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Carousel::create([
            'status' => 0,
            'title' => 'Tendencias para estas vacaciones',
            'text' => 'Descuentos en ropa de baño hasta un 40%',            
            'path_tag' => 'images/carousel/',
            'file_name' => 'fashion_bikini.jpg',
            'file_ext' => 'jpg',
            'image' => 'fashion_bikini.jpg',
            'thumb' => 'fashion_bikini.jpg',
            'position' => 0,
            'user_id' => 1,
        ]);
        Carousel::create([
            'status' => 1,
            'title' => 'Novedades para toda la familia',
            'text' => 'Descubre la tendencia en ropa infantil',            
            'path_tag' => 'images/carousel/',
            'file_name' => 'kids.jpg',
            'file_ext' => 'jpg',
            'image' => 'carousel_6.jpg',
            'thumb' => 'kids.jpg',
            'aux_path_tag' => 'images/carousel/',
            'aux_file_name' => 'tv_home_aux',
            'aux_file_ext' => 'jpg',
            'aux_image' => 'kids.jpg',
            'position' => 1,
            'user_id' => 1,
        ]);
        Carousel::create([
            'status' => 1,
            'title' => 'Electrohogar',
            'text' => 'Tus electrodómesticos ahora con envío gratis',
            'path_tag' => 'images/carousel/',
            'file_name' => 'appliance_2.jpg',
            'file_ext' => 'jpg',
            'image' => 'carousel_3.jpg',
            'thumb' => 'appliance_2.jpg',
            'aux_path_tag' => 'images/carousel/',
            'aux_file_name' => 'tv_home_aux',
            'aux_file_ext' => 'jpg',
            'aux_image' => 'appliance_2.jpg',
            'position' => 2,
            'user_id' => 1,
        ]);
        Carousel::create([
            'status' => 1,
            'title' => 'Decora tu estancia',
            'text' => 'Aprovecha nuestros descuentos en decoración',
            'path_tag' => 'images/carousel/',
            'file_name' => 'furniture.jpg',
            'file_ext' => 'jpg',
            'image' => 'carousel_5.jpg',
            'thumb' => 'furniture.jpg',
            'aux_path_tag' => 'images/carousel/',
            'aux_file_name' => 'tv_home_aux',
            'aux_file_ext' => 'jpg',
            'aux_image' => 'furniture.jpg',
            'position' => 3,
            'user_id' => 1,
        ]);
        Carousel::create([
            'status' => 1,
            'title' => 'Disfruta del cine en casa',
            'text' => '-10% en televisores Sony',
            'path_tag' => 'images/carousel/',
            'file_name' => 'carouse home.jpg',
            'file_ext' => 'jpg',
            'image' => 'carousel_1.jpg',
            'thumb' => 'carousel_1.jpg',
            'aux_path_tag' => 'images/carousel/',
            'aux_file_name' => 'tv_home_aux',
            'aux_file_ext' => 'jpg',
            'aux_image' => 'carousel_1_aux.jpg',
            'position' => 0,
            'user_id' => 1,
        ]);
    }
}
