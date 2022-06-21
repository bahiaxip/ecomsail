<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product,App\Models\SettingsProducts, App\Models\InfopriceProducts;
use Str;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = [];
        //Frigoríficos
        $product[] = Product::create([
            'name' => 'Frigorífico BOSCH KGN39VIEA',            
            'slug' => Str::slug('Frigorífico BOSCH KGN39VIEA'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 23,            
            'price' => 650,
            'stock' => 5,
            'short_detail' => 'Bosch Combi, Serie 4, Inox',
            'detail' =>'Bosch Combi, Serie 4, Inox',
            'path_tag' => '/images/products/',
            'image' => 'appliance/fridges/bosch_KGN39VIEA/bosch_KGN39VIEA.jpg',
        ]);

        $product[] = Product::create([
            'name' => 'Frigorífico Candy CMDDS',            
            'slug' => Str::slug('Frigorífico Candy CMDDS'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 23,
            'price' => 375,
            'stock' => 3,
            'short_detail' => 'Candy 2 puertas, Clase F, Blanco',
            'detail' =>'Candy 2 puertas, Clase F, Blanco',
            'path_tag' => '/images/products/',
            'image' => 'appliance/fridges/candy_CMDDS/candy_CMDDS.jpg',
        ]);
        $product[] = Product::create([
            'name' => 'Frigorífico Corberó CCH18021X',            
            'slug' => Str::slug('Frigorífico Corberó CCH18021X'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 23,
            'price' => 500,
            'stock' => 7,
            'short_detail' => 'Corberó, No Frost, Inox',
            'detail' =>'Corberó, No Frost, Inox',
            'path_tag' => '/images/products/',
            'image' => 'appliance/fridges/corbero_CCH18021X/corbero_CCH18021X.jpg',
        ]);
        $product[] = Product::create([
            'name' => 'Frigorífico Hisense RQ515N4AC2',            
            'slug' => Str::slug('Frigorífico Hisense RQ515N4AC2'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 23,
            'price' => 750,
            'stock' => 8,
            'short_detail' => 'Hisense, No Frost, Inox, Silencioso',
            'detail' =>'Hisense, No Frost, Inox, Silencioso',
            'path_tag' => '/images/products/',
            'image' => 'appliance/fridges/hisense_RQ515N4AC2/hisense_RQ515N4AC2.jpg',
        ]);
        $product[] = Product::create([
            'name' => 'Frigorífico LG GTB362PZCZD',            
            'slug' => Str::slug('Frigorífico LG GTB362PZCZD'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 23,
            'price' => 723,
            'stock' => 6,
            'short_detail' => 'LG, Clase F, Inox',
            'detail' =>'LG, Clase F, Inox',
            'path_tag' => '/images/products/',
            'image' => 'appliance/fridges/lg_GTB362PZCZD/lg_GTB362PZCZD.jpg',
        ]);
        $product[] = Product::create([
            'name' => 'Frigorífico Samsung RB34T602EWW',
            'slug' => Str::slug('Frigorífico Samsung RB34T602EWW'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 23,
            'price' => 723,
            'stock' => 6,
            'short_detail' => 'Samsung Combi, Blanco',
            'detail' =>'Samsung Combi, Blanco',
            'path_tag' => '/images/products/',
            'image' => 'appliance/fridges/samsung_RB34T602EWW/samsung_RB34T602EWW.jpg',
        ]);
        $product[] = Product::create([
            'name' => 'Frigorífico Teka NFL320',
            'slug' => Str::slug('Frigorífico Teka NFL320'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 23,
            'price' => 485,
            'stock' => 3,
            'short_detail' => 'Teka Combi, Clase F, Blanco',
            'detail' =>'Teka Combi, Clase F, Blanco',
            'path_tag' => '/images/products/',
            'image' => 'appliance/fridges/teka_NFL320/teka_NFL320.jpg',
        ]);
        //Secadores
        $product[] = Product::create([
            'name' => 'Secador Babyliss 6613DE',
            'slug' => Str::slug('Secador Babyliss 6613DE'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 24,
            'price' => 77,
            'stock' => 10,
            'short_detail' => 'Babyliss Profesional, Iónico, 2200W',
            'detail' =>'Babyliss Profesional, Iónico, 2200W',
            'path_tag' => '/images/products/',
            'image' => 'appliance/hair_dryer/babyliss_6613DE/babyliss_6613DE.jpg',
        ]);
        $product[] = Product::create([
            'name' => 'Secador Babyliss 6615E',
            'slug' => Str::slug('Secador Babyliss 6615E'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 24,
            'price' => 76,
            'stock' => 3,
            'short_detail' => 'Babyliss Profesional, Iónico, 2400W',
            'detail' =>'Babyliss Profesional, Iónico, 2400W',
            'path_tag' => '/images/products/',
            'image' => 'appliance/hair_dryer/babyliss_6615E/babyliss_6615E.jpg',
        ]);
        $product[] = Product::create([
            'name' => 'Secador Braun Satin Hair 7',
            'slug' => Str::slug('Secador Braun Satin Hair 7'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 24,
            'price' => 58,
            'stock' => 5,
            'short_detail' => 'Braun Profesional,Iónico, 2200W',
            'detail' =>'Braun Profesional,Iónico, 2200W',
            'path_tag' => '/images/products/',
            'image' => 'appliance/hair_dryer/braun_satin_hair7/braun_satin_hair7.jpg',
        ]);
        $product[] = Product::create([
            'name' => 'Secador Cecotec Bamba',
            'slug' => Str::slug('Secador Cecotec Bamba'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 24,
            'price' => 45,
            'stock' => 5,
            'short_detail' => 'Cecotec Profesional, Iónico, 2400W',
            'detail' =>'Cecotec Profesional, Iónico, 2400W',
            'path_tag' => '/images/products/',
            'image' => 'appliance/hair_dryer/cecotec_power_go/cecotec_power_go.jpg',
        ]);
        $product[] = Product::create([
            'name' => 'Secador Happygoo',
            'slug' => Str::slug('Secador Happygoo'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 24,
            'price' => 45,
            'stock' => 8,
            'short_detail' => 'Happygoo Profesional, Iónico, 2400W',
            'detail' =>'Happygoo Profesional, Iónico, 2400W',
            'path_tag' => '/images/products/',
            'image' => 'appliance/hair_dryer/happygoo/happygoo.jpg',
        ]);
        $product[] = Product::create([
            'name' => 'Secador Remington Compact',
            'slug' => Str::slug('Secador Remington Compact'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 24,
            'price' => 25,
            'stock' => 8,
            'short_detail' => 'Remington Plegable, 2000W',
            'detail' =>'Remington Plegable, 2000W',
            'path_tag' => '/images/products/',
            'image' => 'appliance/hair_dryer/remington_compact/remington_compact.jpg',
        ]);
        $product[] = Product::create([
            'name' => 'Secador Remington Silk',
            'slug' => Str::slug('Secador Remington Silk'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 24,
            'price' => 55,
            'stock' => 15,
            'short_detail' => 'Remington Profesional, Iónico, 2400W',
            'detail' =>'Happygoo Profesional, Iónico, 2400W',
            'path_tag' => '/images/products/',
            'image' => 'appliance/hair_dryer/remington_silk/remington_silk.jpg',
        ]);
        $product[] = Product::create([
            'name' => 'Secador Solac Hair & Go',
            'slug' => Str::slug('Solac Hair & Go'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 24,
            'price' => 46,
            'stock' => 12,
            'short_detail' => 'Solac Plegable, 2000W',
            'detail' =>'Solac Plegable, 2000W',
            'path_tag' => '/images/products/',
            'image' => 'appliance/hair_dryer/solar_hair_go/solar_hair_go.jpg',
        ]);
        //atornilladoras
        $product[] = Product::create([
            'name' => 'Atornillador BlackAndDecker BCF611CK',
            'slug' => Str::slug('Atornillador BlackAndDecker BCF611CK'),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 14,
            'price' => 38,
            'stock' => 12,
            'short_detail' => 'BlackAndDecker, Carga rápida, Naranja',
            'detail' =>'BlackAndDecker, Carga rápida, Naranja',
            'path_tag' => '/images/products/',
            'image' => 'tools/drill/blackdecker_BCF611CK/blackdecker_BCF611CK.jpg',
        ]);
        $product[] = Product::create([
            'name' => 'Atornillador Bosch IXO',
            'slug' => Str::slug('Atornillador Bosch IXO'),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 14,
            'price' => 59,
            'stock' => 12,
            'short_detail' => 'Bosch Home and Garden, Classic Green',
            'detail' =>'Bosch Home and Garden, Classic Green',
            'path_tag' => '/images/products/',
            'image' => 'tools/drill/bosch_IXO/bosch_IXO.jpg',
        ]);
        $product[] = Product::create([
            'name' => 'Atornillador Bosch GSR 12V-15',
            'slug' => Str::slug('Atornillador Bosch GSR 12V-15'),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 14,
            'price' => 133,
            'stock' => 10,
            'short_detail' => 'Bosch Profesional, Azul',
            'detail' =>'Bosch Profesional, Azul',
            'path_tag' => '/images/products/',
            'image' => 'tools/drill/bosch_GSR12-15/bosch_GSR12-15.jpg',
        ]);
        $product[] = Product::create([
            'name' => 'Atornillador Deko DKCD20XL01',
            'slug' => Str::slug('Atornillador Deko DKCD20XL01'),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 14,
            'price' => 45,
            'stock' => 20,
            'short_detail' => 'Deko, Inhalámbrico, 20V',
            'detail' =>'Deko, Inhalámbrico, 20V',
            'path_tag' => '/images/products/',
            'image' => 'tools/drill/deko_DKCD20XL01/deko_DKCD20XL01.jpg',
        ]);
        //Metros
        $product[] = Product::create([
            'name' => 'Flexómetro Bellota 50011',
            'slug' => Str::slug('Flexómetro Bellota 50011'),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 15,
            'price' => 12,
            'stock' => 20,
            'short_detail' => 'Bellota Standard 5M',
            'detail' =>'Bellota Standard 5M',
            'path_tag' => '/images/products/',
            'image' => 'tools/flexometer/bellota_50011/bellota_50011.jpg',
        ]);
        $product[] = Product::create([
            'name' => 'Flexómetro Fisco TK',
            'slug' => Str::slug('Flexómetro Fisco TK'),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 15,
            'price' => 32,
            'stock' => 31,
            'short_detail' => 'Fisco 3M/5M/8M',
            'detail' =>'Fisco 3M/5M/8M',
            'path_tag' => '/images/products/',
            'image' => 'tools/flexometer/fisco_TK/fisco_TK.jpg',
        ]);
        $product[] = Product::create([
            'name' => 'Flexómetro Milwaukee',
            'slug' => Str::slug('Flexómetro Milwaukee'),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 15,
            'price' => 20,
            'stock' => 20,
            'short_detail' => 'Milwaukee 5M/8M',
            'detail' =>'Milwaukee 5M/8M',
            'path_tag' => '/images/products/',
            'image' => 'tools/flexometer/milwaukee/milwaukee.jpg',
        ]);
        $product[] = Product::create([
            'name' => 'Flexómetro Stanley Duallock',
            'slug' => Str::slug('Flexómetro Stanley Duallock'),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 15,
            'price' => 13,
            'stock' => 25,
            'short_detail' => 'Stanley 3M/5M',
            'detail' =>'Stanley 3M/5M',
            'path_tag' => '/images/products/',
            'image' => 'tools/flexometer/stanley_duallock/stanley_duallock.jpg',
        ]);
        $product[] = Product::create([
            'name' => 'Flexómetro Stanley Powerlock',
            'slug' => Str::slug('Flexómetro Stanley Powerlock'),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 15,
            'price' => 30,
            'stock' => 30,
            'short_detail' => 'Stanley 3M/5M',
            'detail' =>'Stanley 3M/5M',
            'path_tag' => '/images/products/',
            'image' => 'tools/flexometer/stanley_powerlock/stanley_powerlock.jpg',
        ]);
        $product[] = Product::create([
            'name' => 'Flexómetro Stanley Tylon',
            'slug' => Str::slug('Flexómetro Stanley Tylon'),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 15,
            'price' => 14,
            'stock' => 30,
            'short_detail' => 'Stanley 5M/8M',
            'detail' =>'Stanley 5M/8M',
            'path_tag' => '/images/products/',
            'image' => 'tools/flexometer/stanley_tylon/stanley_tylon.jpg',
        ]);
        $product[] = Product::create([
            'name' => 'Camiseta Icon Futura',
            'slug' => Str::slug('Camiseta Icon Futura'),
            'status' => 1,
            'category_id' => 1,
            'subcategory_id' => 9,
            'price' => 14,
            'stock' => 30,
            'short_detail' => 'Camiseta para hombre',
            'detail' =>'Camiseta para hombre Icon Futura',
            'path_tag' => '/images/products/',
            'image' => 'clothes/t-shirt/nike_iconfutura/nike_iconfutura_black.jpg',
        ]);
        $product[] = Product::create([
            'name' => 'Camiseta SWSH',
            'slug' => Str::slug('Camiseta SWSH'),
            'status' => 1,
            'category_id' => 1,
            'subcategory_id' => 9,
            'price' => 14,
            'stock' => 30,
            'short_detail' => 'Camiseta de manga corta para mujer SwooShwear',
            'detail' =>'Camiseta de manga corta para mujer SwooShwear',
            'path_tag' => '/images/products/',
            'image' => 'clothes/t-shirt/nike_swsh/nike_swsh.jpg',
        ]);

        for($i=0;$i<count($product);$i++){
            $settings_prod = SettingsProducts::create([
                'product_id' => $product[$i]->id
            ]);
            $infoprice_prod = InfopriceProducts::create([
                
                'product_id' => $product[$i]->id
            ]);
        }

    }
}
