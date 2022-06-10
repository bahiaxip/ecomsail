<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ImagesProducts;
class ProductsGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ImagesProducts::create([
            'path_tag' => 'images/products/',
            'file_name' =>'bosch_KGN39VIEA',
            'image' => 'appliance/fridges/bosch_KGN39VIEA/bosch_KGN39VIEA_2.jpg',
            'file_ext' => 'jpg',
            'product_id' => 1
        ]);
        ImagesProducts::create([
            'path_tag' => 'images/products/',
            'file_name' =>'bosch_KGN39VIEA',
            'image' => 'appliance/fridges/bosch_KGN39VIEA/bosch_KGN39VIEA_3.jpg',
            'file_ext' => 'jpg',
            'product_id' => 1
        ]);
        ImagesProducts::create([
            'path_tag' => 'images/products/',
            'file_name' =>'bosch_KGN39VIEA',
            'image' => 'appliance/fridges/bosch_KGN39VIEA/bosch_KGN39VIEA_4.jpg',
            'file_ext' => 'jpg',
            'product_id' => 1
        ]);
        ImagesProducts::create([
            'path_tag' => 'images/products/',
            'file_name' =>'bosch_KGN39VIEA',
            'image' => 'appliance/fridges/bosch_KGN39VIEA/bosch_KGN39VIEA_5.jpg',
            'file_ext' => 'jpg',
            'product_id' => 1
        ]);
    }
}
