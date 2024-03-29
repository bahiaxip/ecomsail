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
        //Product ID: 1
        $product[] = Product::create([
            'name' => 'Frigorífico BOSCH KGN39VIEA',            
            'slug' => Str::slug('Frigorífico BOSCH KGN39VIEA'),
            'status' => 1,
            'category_id' => 5,
            'subcategory_id' => 54,            
            'price' => 699,
            'stock' => 5,
            'short_detail' => 'Frigorífico Bosch Combi, Serie 4, Inox',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Bosch</li>                
                <li><strong>Color:&nbsp;</strong>Acero inoxidable</li>
                <li><strong>Capacidad:&nbsp;</strong>366l.</li>
                <li><strong>Iluminación:&nbsp;</strong>Led</li>
                <li><strong>Clase energética:</strong> F</li>
                <li><strong>Dimensiones:&nbsp;</strong>66 x 60 x 203 (cm)</li>
                <li><strong>Peso:</strong> 74Kg.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'appliance/fridges/bosch_KGN39VIEA/bosch_KGN39VIEA.jpg',
        ]);
        //Product ID: 2
        $product[] = Product::create([
            'name' => 'Frigorífico Candy CMDDS',            
            'slug' => Str::slug('Frigorífico Candy CMDDS'),
            'status' => 1,
            'category_id' => 5,
            'subcategory_id' => 54,
            'price' => 375,
            'stock' => 3,
            'short_detail' => 'Frigorífico Candy 2 puertas, Clase F, Blanco',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Candy</li>                
                <li><strong>Color:&nbsp;</strong>Blanco</li>
                <li><strong>Capacidad:&nbsp;</strong>204l.</li>
                <li><strong>Iluminación:&nbsp;</strong>Led</li>
                <li><strong>Clase energética:</strong> F</li>
                <li><strong>Dimensiones:&nbsp;</strong>55 x 55 x 143 (cm)</li>
                <li><strong>Peso:</strong> 40Kg.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'appliance/fridges/candy_CMDDS/candy_CMDDS.jpg',
        ]);
        //Product ID: 3
        $product[] = Product::create([
            'name' => 'Frigorífico Corberó CCH18021X',            
            'slug' => Str::slug('Frigorífico Corberó CCH18021X'),
            'status' => 1,
            'category_id' => 5,
            'subcategory_id' => 54,
            'price' => 500,
            'stock' => 7,
            'short_detail' => 'Frigorífico Corberó Combi, No Frost, Inox',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Corberó</li>                
                <li><strong>Color:&nbsp;</strong>Acero inoxidable</li>
                <li><strong>Capacidad:&nbsp;</strong>253l.</li>
                <li><strong>Iluminación:&nbsp;</strong>Led</li>
                <li><strong>Clase energética:</strong> F</li>
                <li><strong>Dimensiones:&nbsp;</strong>60 x 55 x 253 (cm)</li>
                <li><strong>Peso:</strong> 40Kg.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'appliance/fridges/corbero_CCH18021X/corbero_CCH18021X.jpg',
        ]);
        //Product ID: 4
        $product[] = Product::create([
            'name' => 'Frigorífico Hisense RQ515N4AC2',            
            'slug' => Str::slug('Frigorífico Hisense RQ515N4AC2'),
            'status' => 1,
            'category_id' => 5,
            'subcategory_id' => 54,
            'price' => 750,
            'stock' => 8,
            'short_detail' => 'Frigorífico Hisense, No Frost, Inox, Silencioso',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Hisense</li>                
                <li><strong>Color:&nbsp;</strong>Acero inoxidable</li>
                <li><strong>Capacidad:&nbsp;</strong>427l.</li>
                <li><strong>Iluminación:&nbsp;</strong>Led</li>
                <li><strong>Clase energética:</strong> E</li>
                <li><strong>Dimensiones:&nbsp;</strong>65 x 80 x 182 (cm)</li>
                <li><strong>Peso:</strong> 89Kg.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'appliance/fridges/hisense_RQ515N4AC2/hisense_RQ515N4AC2.jpg',
        ]);
        //Product ID: 5
        $product[] = Product::create([
            'name' => 'Frigorífico LG GTB362PZCZD',            
            'slug' => Str::slug('Frigorífico LG GTB362PZCZD'),
            'status' => 1,
            'category_id' => 5,
            'subcategory_id' => 54,
            'price' => 589,
            'stock' => 6,
            'short_detail' => 'Frigorífico LG, Clase F, Inox',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>LG</li>                
                <li><strong>Color:&nbsp;</strong>Acero inoxidable</li>
                <li><strong>Capacidad:&nbsp;</strong>272l.</li>                
                <li><strong>Clase energética:</strong> F</li>
                <li><strong>Dimensiones:&nbsp;</strong>55 x 62 x 166 (cm)</li>
                <li><strong>Peso:</strong> 52Kg.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'appliance/fridges/lg_GTB362PZCZD/lg_GTB362PZCZD.jpg',
        ]);
        //Product ID: 6
        $product[] = Product::create([
            'name' => 'Frigorífico Samsung RB34T602EWW',
            'slug' => Str::slug('Frigorífico Samsung RB34T602EWW'),
            'status' => 1,
            'category_id' => 5,
            'subcategory_id' => 54,
            'price' => 723,
            'stock' => 6,
            'short_detail' => 'Frigorífico Samsung Combi, Blanco',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Samsung</li>                
                <li><strong>Color:&nbsp;</strong>Blanco</li>
                <li><strong>Capacidad:&nbsp;</strong>344l.</li>                
                <li><strong>Clase energética:</strong> E</li>
                <li><strong>Dimensiones:&nbsp;</strong>60 x 66 x 185 (cm)</li>
                <li><strong>Peso:</strong> 66Kg.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'appliance/fridges/samsung_RB34T602EWW/samsung_RB34T602EWW.jpg',
        ]);
        //Product ID: 7
        $product[] = Product::create([
            'name' => 'Frigorífico Teka NFL320',
            'slug' => Str::slug('Frigorífico Teka NFL320'),
            'status' => 1,
            'category_id' => 5,
            'subcategory_id' => 54,
            'price' => 485,
            'stock' => 3,
            'short_detail' => 'Frigorífico Teka Combi, Clase F, Blanco',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Teka</li>                
                <li><strong>Color:&nbsp;</strong>Blanco</li>
                <li><strong>Capacidad:&nbsp;</strong>323l.</li>                
                <li><strong>Clase energética:</strong> F</li>
                <li><strong>Dimensiones:&nbsp;</strong>60 x 64 x 188 (cm)</li>
                <li><strong>Peso:</strong> 68Kg.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'appliance/fridges/teka_NFL320/teka_NFL320.jpg',
        ]);
        //Secadores
        //Product ID: 8
        $product[] = Product::create([
            'name' => 'Secador Babyliss 6613DE',
            'slug' => Str::slug('Secador Babyliss 6613DE'),
            'status' => 1,
            'category_id' => 5,
            'subcategory_id' => 55,
            'price' => 77,
            'stock' => 10,
            'short_detail' => 'Secador de pelo Profesional Babyliss , Iónico, 2200W',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>BaByliss</li>                
                <li><strong>Color:&nbsp;</strong>Negro</li>
                <li><strong>Potencia:&nbsp;</strong>2200W</li>
                <li><strong>Velocidades:&nbsp;</strong>2</li>
                <li><strong>Dimensiones:&nbsp;</strong>23.5 x 9 x 31.5 (cm)</li>
                <li><strong>Peso:</strong> 620g.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'appliance/hair_dryer/babyliss_6613DE/babyliss_6613DE.jpg',
        ]);
        //Product ID: 9
        $product[] = Product::create([
            'name' => 'Secador Babyliss 6615E',
            'slug' => Str::slug('Secador Babyliss 6615E'),
            'status' => 1,
            'category_id' => 5,
            'subcategory_id' => 55,
            'price' => 76,
            'stock' => 3,
            'short_detail' => 'Secador de pelo Profesional Babyliss, Iónico, 2400W',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>BaByliss</li>                
                <li><strong>Color:&nbsp;</strong>Rojo</li>
                <li><strong>Potencia:&nbsp;</strong>2400W</li>
                <li><strong>Velocidades:&nbsp;</strong>2</li>
                <li><strong>Dimensiones:&nbsp;</strong>22 x 9 x 28 (cm)</li>
                <li><strong>Peso:</strong> 532g.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'appliance/hair_dryer/babyliss_6615E/babyliss_6615E.jpg',
        ]);
        //Product ID: 10
        $product[] = Product::create([
            'name' => 'Secador Braun Satin Hair 7',
            'slug' => Str::slug('Secador Braun Satin Hair 7'),
            'status' => 1,
            'category_id' => 5,
            'subcategory_id' => 55,
            'price' => 58,
            'stock' => 5,
            'short_detail' => 'Secador de pelo Profesional Braun,Iónico, 2200W',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Braun</li>                
                <li><strong>Color:&nbsp;</strong>Negro</li>
                <li><strong>Potencia:&nbsp;</strong>2200W</li>
                <li><strong>Velocidades:&nbsp;</strong>2</li>
                <li><strong>Dimensiones:&nbsp;</strong>27 x 11.7 x 28.5 (cm)</li>
                <li><strong>Peso:</strong> 700g.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'appliance/hair_dryer/braun_satin_hair7/braun_satin_hair7.jpg',
        ]);
        //Product ID: 11
        $product[] = Product::create([
            'name' => 'Secador Cecotec Bamba',
            'slug' => Str::slug('Secador Cecotec Bamba'),
            'status' => 1,
            'category_id' => 5,
            'subcategory_id' => 55,
            'price' => 31.52,
            'stock' => 5,
            'short_detail' => 'Secador de pelo Profesional Cecotec, Iónico, 2400W',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Cecotec</li>                
                <li><strong>Color:&nbsp;</strong>Blanco</li>
                <li><strong>Potencia:&nbsp;</strong>2400W</li>
                <li><strong>Velocidades:&nbsp;</strong>2</li>
                <li><strong>Dimensiones:&nbsp;</strong>15.5 x 8 x 26.5 (cm)</li>
                <li><strong>Peso:</strong> 400g.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'appliance/hair_dryer/cecotec_power_go/cecotec_power_go.jpg',
        ]);
        //Product ID: 12
        $product[] = Product::create([
            'name' => 'Secador Happygoo',
            'slug' => Str::slug('Secador Happygoo'),
            'status' => 1,
            'category_id' => 5,
            'subcategory_id' => 55,
            'price' => 45,
            'stock' => 8,
            'short_detail' => 'Secador de pelo Profesional Happygoo, Iónico, 2400W',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Happygoo</li>                
                <li><strong>Color:&nbsp;</strong>Negro</li>
                <li><strong>Potencia:&nbsp;</strong>2400W</li>
                <li><strong>Velocidades:&nbsp;</strong>3</li>
                <li><strong>Dimensiones:&nbsp;</strong>28 x 25 x 10 (cm)</li>
                <li><strong>Peso:</strong> 576g.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'appliance/hair_dryer/happygoo/happygoo.jpg',
        ]);
        //Product ID: 13
        $product[] = Product::create([
            'name' => 'Secador Remington Compact',
            'slug' => Str::slug('Secador Remington Compact'),
            'status' => 1,
            'category_id' => 5,
            'subcategory_id' => 55,
            'price' => 25,
            'stock' => 8,
            'short_detail' => 'Secador de pelo Plegable Remington',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Remington</li>                
                <li><strong>Color:&nbsp;</strong>Negro</li>
                <li><strong>Potencia:&nbsp;</strong>2000W</li>
                <li><strong>Velocidades:&nbsp;</strong>2</li>
                <li><strong>Dimensiones:&nbsp;</strong>30 x 24 x 12 (cm)</li>
                <li><strong>Peso:</strong> 430g.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'appliance/hair_dryer/remington_compact/remington_compact.jpg',
        ]);
        //Product ID: 14
        $product[] = Product::create([
            'name' => 'Secador Remington Silk',
            'slug' => Str::slug('Secador Remington Silk'),
            'status' => 1,
            'category_id' => 5,
            'subcategory_id' => 55,
            'price' => 55,
            'stock' => 15,
            'short_detail' => 'Secador de pelo Profesional Remington Silk, Iónico, 2400W',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Remington</li>                
                <li><strong>Color:&nbsp;</strong>Rojo</li>
                <li><strong>Potencia:&nbsp;</strong>2400W</li>
                <li><strong>Velocidades:&nbsp;</strong>2</li>
                <li><strong>Dimensiones:&nbsp;</strong>30 x 24 x 12 (cm)</li>
                <li><strong>Peso:</strong> 1Kg.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'appliance/hair_dryer/remington_silk/remington_silk.jpg',
        ]);
        //Product ID: 15
        $product[] = Product::create([
            'name' => 'Secador Solac Hair & Go',
            'slug' => Str::slug('Solac Hair & Go'),
            'status' => 1,
            'category_id' => 5,
            'subcategory_id' => 55,
            'price' => 46,
            'stock' => 12,
            'short_detail' => 'Secador de pelo Plegable Solac, 2000W',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Solac</li>                
                <li><strong>Color:&nbsp;</strong>Gris</li>
                <li><strong>Potencia:&nbsp;</strong>2000W</li>
                <li><strong>Velocidades:&nbsp;</strong>2</li>
                <li><strong>Dimensiones:&nbsp;</strong>22.5 x 10 x 23.5 (cm)</li>
                <li><strong>Peso:</strong> 600g.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'appliance/hair_dryer/solar_hair_go/solar_hair_go.jpg',
        ]);
        //atornilladoras
        //Product ID: 16
        $product[] = Product::create([
            'name' => 'Atornillador BlackAndDecker BCF611CK',
            'slug' => Str::slug('Atornillador BlackAndDecker BCF611CK'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 48,
            'price' => 38,
            'stock' => 12,
            'short_detail' => 'Atornillador BlackAndDecker, Carga rápida, Naranja',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>BlackAndDecker</li>
                <li><strong>Bater&iacute;a:&nbsp;</strong>Litio 3.6v</li>
                <li><strong>Color:&nbsp;</strong>Naranja y negro</li>
                <li><strong>Cargador:&nbsp;</strong>2A</li>
                <li><strong>Velocidad:&nbsp;</strong>180rpm</li>
                <li><strong>Dimensiones:&nbsp;</strong>20.6 x 19 x 6.5 (cm)</li>
                <li><strong>Peso:</strong> 680g.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'tools/screwdriver/blackdecker_BCF611CK/blackdecker_BCF611CK.jpg',
        ]);
        //Product ID: 17
        $product[] = Product::create([
            'name' => 'Atornillador Bosch IXO',
            'slug' => Str::slug('Atornillador Bosch IXO'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 48,
            'price' => 52,
            'stock' => 12,
            'short_detail' => 'Atornillador Bosch Home and Garden, Classic Green',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Bosch</li>
                <li><strong>Bater&iacute;a:&nbsp;</strong>Litio 3.6v</li>
                <li><strong>Color:&nbsp;</strong>Verde y negro</li>
                <li><strong>Cargador:&nbsp;</strong>MicroUSB</li>
                <li><strong>Velocidad:&nbsp;</strong>215rpm</li>
                <li><strong>Dimensiones:&nbsp;</strong>23.6 x 16 x 6 (cm)</li>
                <li><strong>Peso:</strong> 340g.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'tools/screwdriver/bosch_IXO/bosch_IXO.jpg',
        ]);
        //Product ID: 18
        $product[] = Product::create([
            'name' => 'Atornillador Bosch GSR 12V-15',
            'slug' => Str::slug('Atornillador Bosch GSR 12V-15'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 48,
            'price' => 133,
            'stock' => 10,
            'short_detail' => 'Atornillador Bosch Profesional, Azul',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Bosch</li>
                <li><strong>Bater&iacute;a:&nbsp;</strong>Litio 12v</li>
                <li><strong>Color:&nbsp;</strong>Azul y negro</li>
                <li><strong>Cargador:&nbsp;</strong>2A</li>
                <li><strong>Velocidad:&nbsp;</strong>1300rpm</li>
                <li><strong>Dimensiones:&nbsp;</strong>24 x 11.5 x 31.7 (cm)</li>
                <li><strong>Peso:</strong> 2.5Kg.</li>
                <li><strong>Pack:</strong> Maletín + 39 piezas</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'tools/screwdriver/bosch_GSR12-15/bosch_GSR12-15.jpg',
        ]);
        //Product ID: 19
        $product[] = Product::create([
            'name' => 'Atornillador Deko DKCD20XL01',
            'slug' => Str::slug('Atornillador Deko DKCD20XL01'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 48,
            'price' => 45,
            'stock' => 20,
            'short_detail' => 'Atornillador Deko, Inhalámbrico, 20V',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Deko</li>
                <li><strong>Bater&iacute;a:&nbsp;</strong>Litio 20v</li>
                <li><strong>Color:&nbsp;</strong>Amarillo y negro</li>
                <li><strong>Cargador:&nbsp;</strong>1.5A</li>
                <li><strong>Velocidad:&nbsp;</strong>1350rpm</li>
                <li><strong>Dimensiones:&nbsp;</strong>20 x 8.5 x 20.5 (cm)</li>
                <li><strong>Peso:</strong> 1.2Kg.</li>
                <li><strong>Pack:</strong> 13 piezas</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'tools/screwdriver/deko_DKCD20XL01/deko_DKCD20XL01.jpg',
        ]);
        //Metros
        //Product ID: 20
        $product[] = Product::create([
            'name' => 'Flexómetro Bellota 50011',
            'slug' => Str::slug('Flexómetro Bellota 50011'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 49,
            'price' => 12,
            'stock' => 20,
            'short_detail' => 'Flexómetro Bellota Standard 5M',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Bellota</li>
                <li><strong>Cinta met&aacute;lica:&nbsp;</strong>25mm</li>
                <li><strong>Dimensiones:&nbsp;</strong>7 x 7 x 3.5 (cm)</li>
                <li><strong>Peso:</strong> 190g.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'tools/flexometer/bellota_50011/bellota_50011.jpg',
        ]);
        //Product ID: 21
        $product[] = Product::create([
            'name' => 'Flexómetro Fisco TK',
            'slug' => Str::slug('Flexómetro Fisco TK'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 49,
            'price' => 32,
            'stock' => 31,
            'short_detail' => 'Flexómetro Fisco 3M/5M/8M',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Fisco</li>
                <li><strong>Cinta met&aacute;lica:&nbsp;</strong>25mm</li>
                <li><strong>Dimensiones:&nbsp;</strong>5 x 5 x 3 (cm)</li>
                <li><strong>Peso:</strong> 280g.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'tools/flexometer/fisco_TK/fisco_TK.jpg',
        ]);
        //Product ID: 22
        $product[] = Product::create([
            'name' => 'Flexómetro Milwaukee',
            'slug' => Str::slug('Flexómetro Milwaukee'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 49,
            'price' => 20,
            'stock' => 20,
            'short_detail' => 'Flexómetro Milwaukee 5M/8M',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Milwaukee</li>
                <li><strong>Cinta met&aacute;lica:&nbsp;</strong>25mm</li>
                <li><strong>Dimensiones:&nbsp;</strong>5 x 5 x 3 (cm)</li>
                <li><strong>Peso:</strong> 400g.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'tools/flexometer/milwaukee/milwaukee.jpg',
        ]);
        //Product ID: 23
        $product[] = Product::create([
            'name' => 'Flexómetro Stanley DualLock 3M',
            'slug' => Str::slug('Flexómetro Stanley DualLock 3M'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 49,
            'price' => 8,
            'stock' => 25,
            'short_detail' => 'Flexómetro Stanley DualLock 3M',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Stanley</li>
                <li><strong>Longitud de medición:&nbsp;</strong>3m.</li>
                <li><strong>Cinta met&aacute;lica:&nbsp;</strong>12mm, revestida con Tylon</li>
                <li><strong>Dimensiones:&nbsp;</strong>14.5 x 9 x 3.5 (cm)</li>
                <li><strong>Peso:</strong> 100g.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'tools/flexometer/stanley_duallock/stanley_duallock_3M.jpg',
        ]);
        //Product ID: 24
        $product[] = Product::create([
            'name' => 'Flexómetro Stanley DualLock 5M',
            'slug' => Str::slug('Flexómetro Stanley DualLock 5M'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 49,
            'price' => 9,
            'stock' => 25,
            'short_detail' => 'Flexómetro Stanley DualLock 5M',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Stanley</li>
                <li><strong>Longitud de medición:&nbsp;</strong>5m.</li>
                <li><strong>Cinta met&aacute;lica:&nbsp;</strong>19mm, revestida con Tylon</li>
                <li><strong>Dimensiones:&nbsp;</strong>14.5 x 9 x 4.3 (cm)</li>
                <li><strong>Peso:</strong> 209g.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'tools/flexometer/stanley_duallock/stanley_duallock_5M.jpg',
        ]);
        //Product ID: 25
        $product[] = Product::create([
            'name' => 'Flexómetro Stanley DualLock 8M',
            'slug' => Str::slug('Flexómetro Stanley DualLock 8M'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' =>49,
            'price' => 15,
            'stock' => 25,
            'short_detail' => 'Flexómetro Stanley DualLock 8M',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Stanley</li>
                <li><strong>Longitud de medición:&nbsp;</strong>8m.</li>
                <li><strong>Cinta met&aacute;lica:&nbsp;</strong>25mm, revestida con Tylon</li>
                <li><strong>Dimensiones:&nbsp;</strong>14.5 x 9 x 5 (cm)</li>
                <li><strong>Peso:</strong> 400g.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'tools/flexometer/stanley_duallock/stanley_duallock_8M.jpg',
        ]);
        //Product ID: 26
        $product[] = Product::create([
            'name' => 'Flexómetro Stanley PowerLock Classic 3M',
            'slug' => Str::slug('Flexómetro Stanley Classic PowerLock Classic 3M'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 49,
            'price' => 12,
            'stock' => 30,
            'short_detail' => 'Flexómetro Stanley PowerLock Classic 3M',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Stanley</li>
                <li><strong>Longitud de medición:&nbsp;</strong>3m.</li>
                <li><strong>Cinta met&aacute;lica:&nbsp;</strong>12,7mm</li>
                <li><strong>Revestimiento:&nbsp;</strong>Acero</li>
                <li><strong>Dimensiones:&nbsp;</strong>14.5 x 9 x 3 (cm)</li>
                <li><strong>Peso:</strong> 155g.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'tools/flexometer/stanley_powerlock_classic/stanley_powerlock_classic_3M.jpg',
        ]);
        //Product ID: 27
        $product[] = Product::create([
            'name' => 'Flexómetro Stanley PowerLock Classic 5M',
            'slug' => Str::slug('Flexómetro Stanley PowerLock Classic 5M'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 49,
            'price' => 25,
            'stock' => 30,
            'short_detail' => 'Flexómetro Stanley PowerLock Classic 5M',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Stanley</li>
                <li><strong>Longitud de medición:&nbsp;</strong>5m.</li>
                <li><strong>Cinta met&aacute;lica:&nbsp;</strong>25mm</li>
                <li><strong>Revestimiento:&nbsp;</strong>Acero</li>
                <li><strong>Dimensiones:&nbsp;</strong>18 x 12 x 5 (cm)</li>
                <li><strong>Peso:</strong> 280g.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'tools/flexometer/stanley_powerlock_classic/stanley_powerlock_classic_5M.jpg',
        ]);
        //Product ID: 28
        $product[] = Product::create([
            'name' => 'Flexómetro Stanley PowerLock Classic 10M',
            'slug' => Str::slug('Flexómetro Stanley PowerLock Classic 10M'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 49,
            'price' => 30,
            'stock' => 30,
            'short_detail' => 'Flexómetro Stanley PowerLock Classic 10M',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Stanley</li>
                <li><strong>Longitud de medición:&nbsp;</strong>10m.</li>
                <li><strong>Cinta met&aacute;lica:&nbsp;</strong>25mm</li>
                <li><strong>Revestimiento:&nbsp;</strong>Acero</li>
                <li><strong>Dimensiones:&nbsp;</strong>9 x 9 x 5 (cm)</li>
                <li><strong>Peso:</strong> 480g.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'tools/flexometer/stanley_powerlock_classic/stanley_powerlock_classic_10M.jpg',
        ]);
        //Product ID: 29
        $product[] = Product::create([
            'name' => 'Flexómetro Stanley Tylon 5M',
            'slug' => Str::slug('Flexómetro Stanley Tylon 5M'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 49,
            'price' => 9,
            'stock' => 30,
            'short_detail' => 'Flexómetro Stanley Tylon 5M',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Stanley</li>
                <li><strong>Longitud de medición:&nbsp;</strong>5m.</li>
                <li><strong>Cinta met&aacute;lica:&nbsp;</strong>25mm, revestida con Tylon</li>
                <li><strong>Revestimiento:&nbsp;</strong>Goma</li>                
                <li><strong>Dimensiones:&nbsp;</strong>7.5 x 7 x 3.7 (cm)</li>
                <li><strong>Peso:</strong> 180g.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'tools/flexometer/stanley_tylon/stanley_tylon_5M.jpg',
        ]);
        //Product ID: 30
        $product[] = Product::create([
            'name' => 'Flexómetro Stanley Tylon 8M',
            'slug' => Str::slug('Flexómetro Stanley Tylon 8M'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 49,
            'price' => 14.56,
            'stock' => 30,
            'short_detail' => 'Flexómetro Stanley Tylon 8M',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Stanley</li>
                <li><strong>Longitud de medición:&nbsp;</strong>8m.</li>
                <li><strong>Cinta met&aacute;lica:&nbsp;</strong>25mm, revestida con Tylon</li>
                <li><strong>Revestimiento:&nbsp;</strong>Goma</li>                
                <li><strong>Dimensiones:&nbsp;</strong>5 x 5 x 3 (cm)</li>
                <li><strong>Peso:</strong> 360g.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'tools/flexometer/stanley_tylon/stanley_tylon_8M.jpg',
        ]);
        //Product ID: 31
        $product[] = Product::create([
            'name' => "Taladro percutor Einhell",
            'slug' => Str::slug("Taladro percutor Einhell"),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 50,
            'price' => 77.07,
            'stock' => 50,
            'short_detail' => "Taladro percutor Einhell, batería",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Einhell</li>
                <li><strong>Alimentación:&nbsp;</strong>Batería Li-Ion,18V</li>
                <li><strong>Velocidad:&nbsp;</strong>260RPM</li>
                <li><strong>Color:&nbsp;</strong>Rojo y negro</li>
                <li><strong>Material:&nbsp;</strong>Metal</li>
                <li><strong>Dimensiones:&nbsp;</strong>28.3L X 6.7W X20H cm.</li>
                <li><strong>Peso:&nbsp;</strong>1.6Kg.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'tools/drill/hammer_drill_einhell_4513960/hammer_drill_einhell.jpg',
        ]);
        //Product ID: 32
        $product[] = Product::create([
            'name' => "Martillo perforador Bosch Professional",
            'slug' => Str::slug("Martillo perforador Bosch Professional"),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 50,
            'price' => 299,
            'stock' => 40,
            'short_detail' => "Martillo perforador Bosch Professional GBH 2-28F",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Bosch</li>
                <li><strong>Alimentación:&nbsp;</strong>AC cable</li>
                <li><strong>Velocidad:&nbsp;</strong>900RPM</li>
                <li><strong>Color:&nbsp;</strong>Azul y negro</li>
                <li><strong>Material:&nbsp;</strong>Metal, plástico</li>
                <li><strong>Potencia:&nbsp;</strong>880W</li>
                <li><strong>Dimensiones:&nbsp;</strong>44 X 40 X 20H cm.</li>
                <li><strong>Peso:&nbsp;</strong>3.1Kg.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'tools/drill/bosch_gbh_2_28F/bosch_gbh_2_28F.jpg',
        ]);
        //Product ID: 33
        $product[] = Product::create([
            'name' => "Martillo perforador BlackAndDecker BEHS03K-QS",
            'slug' => Str::slug("Martillo perforador BlackAndDecker BEHS03K-QS"),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 50,
            'price' => 166,
            'stock' => 30,
            'short_detail' => "Martillo perforador BlackAndDecker BEHS03K-QS, SDS-PLUS, Percutor y cincelador",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>BlackAndDecker</li>
                <li><strong>Alimentación:&nbsp;</strong>AC con cable</li>
                <li><strong>Velocidad:&nbsp;</strong>900RPM</li>
                <li><strong>Color:&nbsp;</strong>Naranja y negro</li>
                <li><strong>Material:&nbsp;</strong>Acero, plástico</li>
                <li><strong>Potencia:&nbsp;</strong>1250W</li>
                <li><strong>Dimensiones:&nbsp;</strong>41.5L X 13.5W X 33.3H cm.</li>
                <li><strong>Peso:&nbsp;</strong>7.5Kg.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'tools/drill/hammer_drill_blackanddecker_BEHS03K/hammer_drill_blackanddecker_BEHS03K.jpg',
        ]);
        //Product ID: 34
        $product[] = Product::create([
            'name' => "Taladro percutor Casals ID500REA",
            'slug' => Str::slug("Taladro percutor Casals ID500REA"),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 50,
            'price' => 58.39,
            'stock' => 30,
            'short_detail' => "Taladro percutor Casals ID500REA, agarre Soft-touch",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Casals</li>
                <li><strong>Alimentación:&nbsp;</strong>AC con cable</li>
                <li><strong>Velocidad:&nbsp;</strong>3000RPM</li>
                <li><strong>Color:&nbsp;</strong>Rojo y negro</li>
                <li><strong>Material:&nbsp;</strong>Metal, plástico</li>
                <li><strong>Potencia:&nbsp;</strong>500W</li>
                <li><strong>Dimensiones:&nbsp;</strong>28L X 7W X 24H cm.</li>
                <li><strong>Peso:&nbsp;</strong>2.2Kg.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'tools/drill/hammer_drill_casals_ID500REA/hammer_drill_casals_ID500REA.jpg',
        ]);
        //Product ID: 35
        $product[] = Product::create([
            'name' => "Taladro percutor DeWalt DWD024KS",
            'slug' => Str::slug("Taladro percutor DeWalt DWD024KS"),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 50,
            'price' => 105,
            'stock' => 25,
            'short_detail' => "Taladro percutor DeWalt DWD024KS-QS",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>DeWalt</li>
                <li><strong>Alimentación:&nbsp;</strong>AC con cable</li>                
                <li><strong>Color:&nbsp;</strong>Amarillo y negro</li>
                <li><strong>Material:&nbsp;</strong>Metal, plástico</li>
                <li><strong>Potencia:&nbsp;</strong>701W</li>
                <li><strong>Dimensiones:&nbsp;</strong>25L X 7.5W X 18H cm.</li>
                <li><strong>Peso:&nbsp;</strong>1.8Kg.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'tools/drill/hammer_drill_dewalt_DWD024KS/hammer_drill_dewalt_DWD024KS.jpg',
        ]);
        //Product ID: 36
        $product[] = Product::create([
            'name' => 'Camiseta Icon Futura',
            'slug' => Str::slug('Camiseta Icon Futura'),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 40,
            'price' => 14,
            'stock' => 30,
            'short_detail' => 'Camiseta para hombre',
            'detail' =>'Camiseta para hombre Icon Futura',
            'path_tag' => '/images/products/',
            'image' => 'clothes_men/t-shirt/nike_iconfutura/nike_iconfutura_black.jpg',
        ]);
        //Product ID: 37
        $product[] = Product::create([
            'name' => 'Camiseta SWSH',
            'slug' => Str::slug('Camiseta SWSH'),
            'status' => 1,
            'category_id' => 1,
            'subcategory_id' => 34,
            'price' => 14,
            'stock' => 30,
            'short_detail' => 'Camiseta de manga corta para mujer SwooShwear',
            'detail' =>'Camiseta de manga corta para mujer SwooShwear',
            'path_tag' => '/images/products/',
            'image' => 'clothes_women/t-shirt/nike_swsh/nike_swsh.jpg',
        ]);
        //Product ID: 38
        $product[] = Product::create([
            'name' => 'Camiseta Dri-fit Strike',
            'slug' => Str::slug('Camiseta Dri-fit Strike'),
            'status' => 1,
            'category_id' => 1,
            'subcategory_id' => 34,
            'price' => 35,
            'stock' => 30,
            'short_detail' => 'Camiseta deportiva para mujer',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Nike</li>
                <li><strong>Material:&nbsp;</strong>100% Poliéster</li>
                <li><strong>Tecnolog&iacute;a:&nbsp;</strong>Dri-fit</li>                
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_women/t-shirt/nike_dri-fit_strike/nike_dri-fit_strike_black.jpg',
        ]);
        //Product ID: 39        
        $product[] = Product::create([
            'name' => 'Vestido de mujer Berylove',
            'slug' => Str::slug('Vestido de mujer Berylove'),
            'status' => 1,
            'category_id' => 1,
            'subcategory_id' => 33,
            'price' => 55,
            'stock' => 10,
            'short_detail' => 'Vestido Berylove para eventos:fiestas, bodas...',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Berylove</li>
                <li><strong>Material:&nbsp;</strong>94% Nylon, 6% Licra</li>                
                <li><strong>Diseño:&nbsp;</strong>Moderno con transparencias</li>
                <li><strong>Parte superior:&nbsp;</strong>Encaje floral</li>
                <li><strong>Falda:&nbsp;</strong>De gasa, acampanado</li>
                <li><strong>Cierre:&nbsp;</strong>Cinturón</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_women/dress/berylove/berylove_violeta.jpg',
        ]);
        //Product ID: 40
        $product[] = Product::create([
            'name' => 'Vestido Lápiz Grace Karin',
            'slug' => Str::slug('Vestido Lápiz Grace Karin'),
            'status' => 1,
            'category_id' => 1,
            'subcategory_id' => 33,
            'price' => 66,
            'stock' => 60,
            'short_detail' => 'Vestido Lápiz Grace Karin para eventos:fiestas, bodas...',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Grace Karin</li>
                <li><strong>Material:&nbsp;</strong>95% Poliéster, 5% Elastano</li>                
                <li><strong>Diseño:&nbsp;</strong>Moderno</li>                
                <li><strong>Cierre:&nbsp;</strong>Cremallera</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_women/dress/grace_karin_lapiz/grace_karin_lapiz_blanco.jpg',
        ]);
        //Product ID: 41
        $product[] = Product::create([
            'name' => 'Vestido Vintage Grace Karin',
            'slug' => Str::slug('Vestido Vintage Grace Karin'),
            'status' => 1,
            'category_id' => 1,
            'subcategory_id' => 33,
            'price' => 66,
            'stock' => 62,
            'short_detail' => 'Vestido plisado Grace Karin para eventos:fiestas, bodas...',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Grace Karin</li>
                <li><strong>Material:&nbsp;</strong>Sintético</li>                
                <li><strong>Diseño:&nbsp;</strong>Moderno, plisado, escote en V</li>                
                <li><strong>Cierre:&nbsp;</strong>Cruzado</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_women/dress/grace_karin_vintage/grace_karin_vintage_rojo.jpg',
        ]);
        //Product ID: 42
        $product[] = Product::create([
            'name' => 'Vestido de mujer Lacoste',
            'slug' => Str::slug('Vestido de mujer Lacoste'),
            'status' => 1,
            'category_id' => 1,
            'subcategory_id' => 33,
            'price' => 66,
            'stock' => 28,
            'short_detail' => 'Vestido polo de mujer Lacoste',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Lacoste</li>
                <li><strong>Material:&nbsp;</strong>100% algodón</li>                
                <li><strong>Diseño:&nbsp;</strong>Elegante, acampanado</li>                
                <li><strong>Cierre:&nbsp;</strong>Botones y cinturón</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_women/dress/vestido_lacoste_polo/vestido_lacoste_polo_azul_marino.jpg',
        ]);
        //Product ID: 43
        $product[] = Product::create([
            'name' => 'Vestido de mujer Ever-Pretty',
            'slug' => Str::slug('Vestido de mujer Ever-Pretty'),
            'status' => 1,
            'category_id' => 1,
            'subcategory_id' => 33,
            'price' => 57.5,
            'stock' => 15,
            'short_detail' => 'Vestido de Fiesta Ever-Pretty',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Ever-Pretty</li>
                <li><strong>Material:&nbsp;</strong>95% Poliéster, 5% elastano</li>                
                <li><strong>Diseño:&nbsp;</strong>Elegante, abertura lateral</li>                
                <li><strong>Cierre:&nbsp;</strong>Cremallera</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_women/dress/ever-pretty_fiesta_largo/ever-pretty_fiesta_largo_azul_marino.jpg',
        ]);
        //Product ID: 44
        $product[] = Product::create([
            'name' => 'Vestido murciélago Grace Karin',
            'slug' => Str::slug('Vestido murciélago Grace Karin'),
            'status' => 1,
            'category_id' => 1,
            'subcategory_id' => 33,
            'price' => 42,
            'stock' => 48,
            'short_detail' => 'Vestido murciélago de mujer',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Grace Karin</li>
                <li><strong>Material:&nbsp;</strong>95% Poliéster, 5% elastano</li>                
                <li><strong>Diseño:&nbsp;</strong>Manga de murciélago</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_women/dress/grace_karin_murcielago/grace_karin_murcielago_negro.jpg',
        ]);
        //Product ID: 45
        $product[] = Product::create([
            'name' => "Vaqueros Levi's 501 Ironwood Overt",
            'slug' => Str::slug("Vaqueros Levi's 501 Ironwood Overt"),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 42,
            'price' => 65,
            'stock' => 25,
            'short_detail' => "Vaqueros Levi's 501 Ironwood Overt",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Levi's</li>
                <li><strong>Material:&nbsp;</strong>98% Algodón, 2% Elastano</li>                
                <li><strong>Cierre:&nbsp;</strong>Botones</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'clothes_men/jeans/levis_501_ironwood_overt/ironwood_overt.jpg',
        ]);
        //Product ID: 46
        $product[] = Product::create([
            'name' => "Vaqueros Levi's 501 Black 80701",
            'slug' => Str::slug("Vaqueros Levi's 501 Black 80701"),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 42,
            'price' => 66,
            'stock' => 25,
            'short_detail' => "Vaqueros Levi's 501 Black 80701",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Levi's</li>
                <li><strong>Material:&nbsp;</strong>94% Algodón, 5% Poliéster, 1% Elastano</li>                
                <li><strong>Cierre:&nbsp;</strong>Cremallera</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'clothes_men/jeans/levis_501_black_80701/black_80701.jpg',
        ]);
        //Product ID: 47
        $product[] = Product::create([
            'name' => "Vaqueros Levi's 501 Canyon Kings",
            'slug' => Str::slug("Vaqueros Levi's 501 Canyon Kings"),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 42,
            'price' => 66,
            'stock' => 25,
            'short_detail' => "Vaqueros Levi's 501 Canyon Kings",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Levi's</li>
                <li><strong>Material:&nbsp;</strong>94% Algodón, 5% Poliéster, 1% Elastano</li>                
                <li><strong>Cierre:&nbsp;</strong>Cremallera</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'clothes_men/jeans/levis_501_canyon_kings/canyon_kings.jpg',
        ]);
        //Product ID: 48
        $product[] = Product::create([
            'name' => "Vaqueros Levi's 501 Levis Marlon",
            'slug' => Str::slug("Vaqueros Levi's 501 Levis Marlon"),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 42,
            'price' => 66,
            'stock' => 25,
            'short_detail' => "Vaqueros Levi's 501 Levis Marlon",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Levi's</li>
                <li><strong>Material:&nbsp;</strong>94% Algodón, 5% Poliéster, 1% Elastano</li>                
                <li><strong>Cierre:&nbsp;</strong>Cremallera</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'clothes_men/jeans/levis_501_levis_marlon/levis_marlon.jpg',
        ]);
        //Product ID: 49
        $product[] = Product::create([
            'name' => "Vaqueros Pepe Jeans Stanley Jeans",
            'slug' => Str::slug("Vaqueros Pepe Jeans Stanley Jeans"),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 42,
            'price' => 66,
            'stock' => 25,
            'short_detail' => "Vaqueros Pepe Jeans Stanley Jeans Denim",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Pepe Jeans</li>
                <li><strong>Material:&nbsp;</strong>92% Algodón, 6% Poliéster, 2% Elastano</li>                
                <li><strong>Cierre:&nbsp;</strong>Botones</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'clothes_men/jeans/pepe_jeans_stanley_jeans_denim/stanley_jeans_denim.jpg',
        ]);
        //Product ID: 50
        $product[] = Product::create([
            'name' => "Vaqueros Pepe Jeans Kingston Zip",
            'slug' => Str::slug("Vaqueros Pepe Jeans Kingston Zip"),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 42,
            'price' => 62,
            'stock' => 25,
            'short_detail' => "Vaqueros Pepe Jeans Kingston Zip 000 Denim",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Pepe Jeans</li>
                <li><strong>Material:&nbsp;</strong>81% Algodón, 17% Poliéster, 2% Elastano</li>                
                <li><strong>Cierre:&nbsp;</strong>Cremallera</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'clothes_men/jeans/pepe_jeans_kingston_zip_000_denim/kingston_zip_000_denim.jpg',
        ]);
        //Product ID: 51
        $product[] = Product::create([
            'name' => "Vaqueros Pepe Jeans Finsbuty Jeans",
            'slug' => Str::slug("Vaqueros Pepe Jeans Finsbury Jeans"),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 42,
            'price' => 42,
            'stock' => 25,
            'short_detail' => "Vaqueros Pepe Jeans Finsbury Jeans 000 Denim",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Pepe Jeans</li>
                <li><strong>Material:&nbsp;</strong>81% Algodón, 17% Poliéster, 2% Elastano</li>                
                <li><strong>Cierre:&nbsp;</strong>Botones</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'clothes_men/jeans/pepe_jeans_finsbury_jeans_000_denim/finsbury_jeans_000_denim.jpg',
        ]);
        //Product ID: 52
        $product[] = Product::create([
            'name' => "Vaqueros Lee Straight Fit Xm Jeans",
            'slug' => Str::slug("Vaqueros Lee Straight Fit Xm Jeans"),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 42,
            'price' => 45,
            'stock' => 25,
            'short_detail' => "Vaqueros Lee Straight Fit Xm Jeans Maddox",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Lee</li>
                <li><strong>Material:&nbsp;</strong>97% Algodón, 3% Elastano</li>                
                <li><strong>Cierre:&nbsp;</strong>Botones</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'clothes_men/jeans/lee_straight_fit_xm_jeans_maddox/straight_fit_xm_jeans_maddox.jpg',
        ]);
        //Product ID: 53
        $product[] = Product::create([
            'name' => "Vaqueros Lee Elly Jeans Dark Daisy",
            'slug' => Str::slug("Vaqueros Lee Elly Jeans Dark Daisy"),
            'status' => 1,
            'category_id' => 1,
            'subcategory_id' => 38,
            'price' => 45,
            'stock' => 25,
            'short_detail' => "Vaqueros Lee Elly Jeans Dark Daisy",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Lee</li>
                <li><strong>Material:&nbsp;</strong>84% Algodón, 14% Poliéster, 2% Elastano</li>                
                <li><strong>Cierre:&nbsp;</strong>Cremallera</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'clothes_women/jeans/lee_elly_jeans_dark_daisy/elly_jeans_dark_daisy.jpg',
        ]);
        //Product ID: 54
        $product[] = Product::create([
            'name' => "Vaqueros Pepe Jeans Regent Jeans Denim",
            'slug' => Str::slug("Vaqueros Pepe Jeans Regent Jeans Denim"),
            'status' => 1,
            'category_id' => 1,
            'subcategory_id' => 38,
            'price' => 45,
            'stock' => 25,
            'short_detail' => "Vaqueros Pepe Jeans Regent Jeans Denim",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Lee</li>
                <li><strong>Material:&nbsp;</strong>98% Algodón, 2% Elastano</li>                
                <li><strong>Cierre:&nbsp;</strong>Botones</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'clothes_women/jeans/pepe_jeans_regent_jeans_denim/regent_jeans_denim.jpg',
        ]);
        //Product ID: 55
        $product[] = Product::create([
            'name' => "Vaqueros Pepe Jeans Mary Jeans Denim",
            'slug' => Str::slug("Vaqueros Pepe Mary Regent Jeans Denim"),
            'status' => 1,
            'category_id' => 1,
            'subcategory_id' => 38,
            'price' => 45,
            'stock' => 25,
            'short_detail' => "Vaqueros Pepe Jeans Mary Jeans Denim",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Lee</li>
                <li><strong>Material:&nbsp;</strong>99% Algodón, 1% Elastano</li>                
                <li><strong>Cierre:&nbsp;</strong>Botones</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'clothes_women/jeans/pepe_jeans_mary_jeans_denim/mary_jeans_denim.jpg',
        ]);
        //Product ID: 56
        $product[] = Product::create([
            'name' => 'Lavadora Balay 3TS885BE',            
            'slug' => Str::slug('Lavadora Balay 3TS885BE'),
            'status' => 1,
            'category_id' => 5,
            'subcategory_id' => 51,
            'price' => 480,
            'stock' => 7,
            'short_detail' => 'Lavadora Balay 3TS885BE, Carga frontal, Blanco',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Balay</li>                
                <li><strong>Color:&nbsp;</strong>Blanco</li>
                <li><strong>Capacidad:&nbsp;</strong>8Kg.</li>
                <li><strong>Velocidad:&nbsp;</strong>1400 RPM</li>
                <li><strong>Clase energética:</strong> C</li>
                <li><strong>Dimensiones:&nbsp;</strong>59 x 59.8 x 85 (cm)</li>
                <li><strong>Peso:</strong> 69Kg.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'appliance/washers/balay_3TS885BE/balay_3TS885BE.jpg',
        ]);
        //Product ID: 57
        $product[] = Product::create([
            'name' => 'Lavadora Indesit EWC61251WSPTN',            
            'slug' => Str::slug('Lavadora Indesit EWC61251WSPTN'),
            'status' => 1,
            'category_id' => 5,
            'subcategory_id' => 51,
            'price' => 278,
            'stock' => 7,
            'short_detail' => 'Lavadora Indesit EWC61251WSPTN, Carga frontal, Blanco',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Indesit</li>                
                <li><strong>Color:&nbsp;</strong>Blanco</li>
                <li><strong>Capacidad:&nbsp;</strong>6Kg.</li>
                <li><strong>Velocidad:&nbsp;</strong>1200 RPM</li>
                <li><strong>Clase energética:</strong> F</li>
                <li><strong>Dimensiones:&nbsp;</strong>60 x 59.5 x 84 (cm)</li>
                <li><strong>Peso:</strong> 50Kg.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'appliance/washers/indesit_EWC61251WSPTN/indesit_EWC61251WSPTN.jpg',
        ]);
        //Product ID: 58
        $product[] = Product::create([
            'name' => 'Lavadora Whirpool FFB8458WV',            
            'slug' => Str::slug('Lavadora Whirpool FFB8458WV'),
            'status' => 1,
            'category_id' => 5,
            'subcategory_id' => 51,
            'price' => 525,
            'stock' => 7,
            'short_detail' => 'Lavadora Whirpool FFB8458WV, Carga frontal, Blanco',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Whirpool</li>                
                <li><strong>Color:&nbsp;</strong>Blanco</li>
                <li><strong>Capacidad:&nbsp;</strong>8Kg.</li>
                <li><strong>Velocidad:&nbsp;</strong>1400 RPM</li>
                <li><strong>Clase energética:</strong> B</li>
                <li><strong>Dimensiones:&nbsp;</strong>63 x 59.5 x 84.5 (cm)</li>
                <li><strong>Peso:</strong> 67Kg.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'appliance/washers/whirpool_FFB8458WV/whirpool_FFB8458WV.jpg',
        ]);
        //Product ID: 59
        $product[] = Product::create([
            'name' => 'Placa de inducción Balay 3EB865FR',            
            'slug' => Str::slug('Placa de inducción Balay 3EB865FR'),
            'status' => 1,
            'category_id' => 5,
            'subcategory_id' => 52,
            'price' => 350,
            'stock' => 7,
            'short_detail' => 'Placa de inducción Balay 3EB865FR, 3 zonas, negro',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Balay</li>                
                <li><strong>Color:&nbsp;</strong>Negro</li>
                <li><strong>Tipo:&nbsp;</strong>Eléctrico, Inducción</li>
                <li><strong>Potencia:&nbsp;</strong>4600 vatios</li>
                <li><strong>Panel:&nbsp;</strong>táctil</li>
                <li><strong>Clase energética:</strong> C</li>
                <li><strong>Dimensiones:&nbsp;</strong>5 x 59.2 x 52 (cm)</li>
                <li><strong>Peso:</strong> 11Kg.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'appliance/cooking/balay_3EB865FR/balay_3EB865FR.jpg',
        ]);
        //Product ID: 60
        $product[] = Product::create([
            'name' => 'Placa de fogones Beko HIGG64103SX',            
            'slug' => Str::slug('Placa de fogones Beko HIGG64103SX'),
            'status' => 1,
            'category_id' => 5,
            'subcategory_id' => 52,
            'price' => 85,
            'stock' => 7,
            'short_detail' => 'Placa de fogones Beko HIGG64103SX, 4 fuegos, Gas, Inox',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Beko</li>
                <li><strong>Color:&nbsp;</strong>Acero inoxidable</li>
                <li><strong>Tipo:&nbsp;</strong>Gas</li>                
                <li><strong>Panel:&nbsp;</strong>Analógico</li>                
                <li><strong>Dimensiones:&nbsp;</strong>8 x 60 x 52 (cm)</li>
                <li><strong>Peso:</strong> 10Kg.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'appliance/cooking/beko_HIGG64103SX/beko_HIGG64103SX.jpg',
        ]);
        //Product ID: 61
        $product[] = Product::create([
            'name' => 'Placa vitrocerámica Teka TZ6415',            
            'slug' => Str::slug('Placa vitrocerámica Teka TZ6415'),
            'status' => 1,
            'category_id' => 5,
            'subcategory_id' => 52,
            'price' => 198,
            'stock' => 15,
            'short_detail' => 'Placa vitrocerámica Teka TZ6415, 4 zonas, negro',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Teka</li>
                <li><strong>Color:&nbsp;</strong>Negro</li>
                <li><strong>Tipo:&nbsp;</strong>Eléctrico</li>
                <li><strong>Potencia:&nbsp;</strong>5000 vatios</li>
                <li><strong>Panel:&nbsp;</strong>táctil</li>
                <li><strong>Clase energética:</strong> C</li>
                <li><strong>Dimensiones:&nbsp;</strong>6.3 x 60 x 51 (cm)</li>
                <li><strong>Peso:</strong> 9Kg.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'appliance/cooking/balay_3EB865FR/balay_3EB865FR.jpg',
        ]);
        //Product ID: 62
        $product[] = Product::create([
            'name' => 'Placa vitrocerámica Candy CH63CC',            
            'slug' => Str::slug('Placa vitrocerámica Candy CH63CC'),
            'status' => 1,
            'category_id' => 5,
            'subcategory_id' => 52,
            'price' => 176,
            'stock' => 30,
            'short_detail' => 'Placa vitrocerámica Candy CH63CC, 3 zonas, negro',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Candy</li>
                <li><strong>Color:&nbsp;</strong>Negro</li>
                <li><strong>Tipo:&nbsp;</strong>Eléctrico</li>
                <li><strong>Potencia:&nbsp;</strong>5500 vatios</li>
                <li><strong>Panel:&nbsp;</strong>táctil</li>                
                <li><strong>Dimensiones:&nbsp;</strong>4 x 59 x 52 (cm)</li>
                <li><strong>Peso:</strong> 7.3Kg.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'appliance/cooking/candy_CH63CC/candy_CH63CC.jpg',
        ]);
        //Product ID: 63
        $product[] = Product::create([
            'name' => 'Aspiradora Rowenta Swift Power RO2981',            
            'slug' => Str::slug('Aspiradora Rowenta Swift Power RO2981'),
            'status' => 1,
            'category_id' => 5,
            'subcategory_id' => 53,
            'price' => 115,
            'stock' => 10,
            'short_detail' => 'Aspiradora Rowenta Swift Power Total Care, 1.5L, Multicolor',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Rowenta</li>
                <li><strong>Color:&nbsp;</strong>Multicolor</li>
                <li><strong>Ruido:&nbsp;</strong>77dB</li>
                <li><strong>Potencia:&nbsp;</strong>750 vatios</li>                
                <li><strong>Dimensiones:&nbsp;</strong>45 x 28.4 x 33.8 (cm)</li>
                <li><strong>Peso:</strong> 5Kg.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'appliance/vacuum_cleaner/rowenta_swift_power_total_care/rowenta_R02981.jpg',
        ]);
        //Product ID: 64
        $product[] = Product::create([
            'name' => 'Aspiradora Cecotec Vertical Conga Popstar',            
            'slug' => Str::slug('Aspiradora Cecotec Vertical Conga Popstar'),
            'status' => 1,
            'category_id' => 5,
            'subcategory_id' => 53,
            'price' => 115,
            'stock' => 10,
            'short_detail' => 'Aspiradora Cecotec Vertical, 800ML, Multicolor',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Cecotec</li>
                <li><strong>Color:&nbsp;</strong>Multicolor</li>
                <li><strong>Tipo:&nbsp;</strong>Ciclónico, sin bolsa</li>
                <li><strong>Ruido:&nbsp;</strong>77dB</li>
                <li><strong>Potencia:&nbsp;</strong>800 vatios</li>                
                <li><strong>Dimensiones:&nbsp;</strong>15 x 23.7 x 110 (cm)</li>
                <li><strong>Peso:</strong> 2Kg.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'appliance/vacuum_cleaner/cecotec_conga_popstar/cecotec_conga_popstar.jpg',
        ]);
        //Product ID: 65
        $product[] = Product::create([
            'name' => 'Aspiradora Orbegozo Ap 8030',
            'slug' => Str::slug('Aspiradora Orbegozo Ap 8030'),
            'status' => 1,
            'category_id' => 5,
            'subcategory_id' => 53,
            'price' => 115,
            'stock' => 10,
            'short_detail' => 'Aspiradora Orbegozo Ap 8030, 2L, Negro y azul',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Orbegozo</li>
                <li><strong>Color:&nbsp;</strong>Negro y azul</li>
                <li><strong>Tipo:&nbsp;</strong>Ciclónico, sin bolsa</li>
                <li><strong>Ruido:&nbsp;</strong>78dB</li>
                <li><strong>Potencia:&nbsp;</strong>800 vatios</li>                
                <li><strong>Dimensiones:&nbsp;</strong>27 x 40 x 30 (cm)</li>
                <li><strong>Peso:</strong> 4.84Kg.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'appliance/vacuum_cleaner/orbegozo_ap_8030/orbegozo_ap_8030.jpg',
        ]);
        //Product ID: 66
        $product[] = Product::create([
            'name' => 'Aspiradora Karcher 1000W',
            'slug' => Str::slug('Aspiradora Karcher 1000W'),
            'status' => 1,
            'category_id' => 5,
            'subcategory_id' => 53,
            'price' => 85,
            'stock' => 10,
            'short_detail' => 'Aspiradora Karcher 1000W, Seco y húmedo, 17L, Amarillo, con ruedas',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Karcher</li>
                <li><strong>Color:&nbsp;</strong>Amarillo y negro</li>
                <li><strong>Tipo:&nbsp;</strong>Seco y húmedo</li>                
                <li><strong>Dimensiones:&nbsp;</strong>34.9 x 32.8 x 49 (cm)</li>
                <li><strong>Peso:</strong> 6Kg.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'appliance/vacuum_cleaner/karcher_1000w/karcher_1000w.jpg',
        ]);
        //Product ID: 67
        $product[] = Product::create([
            'name' => 'Aspiradora Xiaomi Robot Vacuum',
            'slug' => Str::slug('Aspiradora Xiaomi Robot Vacuum'),
            'status' => 1,
            'category_id' => 5,
            'subcategory_id' => 53,
            'price' => 200,
            'stock' => 10,
            'short_detail' => 'Aspiradora Xiaomi Robot Vacuum, Fregasuelos, Blanco, navegación inteligente',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Xiaomi</li>
                <li><strong>Color:&nbsp;</strong>Blanco</li>
                <li><strong>Batería:&nbsp;</strong>2600mAh Litio</li>
                <li><strong>Tipo:&nbsp;</strong>Seco</li>
                <li><strong>Ruido:&nbsp;</strong>10dB</li>
                <li><strong>Potencia:&nbsp;</strong>1000 vatios</li>
                <li><strong>Dimensiones:&nbsp;</strong>35 x 35 x 9.4 (cm)</li>
                <li><strong>Peso:</strong> 3.6Kg.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'appliance/vacuum_cleaner/xiaomi_robot_vacuum/xiaomi_robot_vacuum.jpg',
        ]);
        //Product ID: 68
        $product[] = Product::create([
            'name' => 'Ordenador sobremesa HP Victus 15L',
            'slug' => Str::slug('Ordenador sobremesa HP Victus 15L'),
            'status' => 1,
            'category_id' => 7,
            'subcategory_id' => 60,
            'price' => 1100,
            'stock' => 10,
            'short_detail' => 'Ordenador sobremesa HP Victus 15L, 5700G, 16GB, 1TB + 512SSD',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>HP</li>
                <li><strong>Color:&nbsp;</strong>Negro</li>
                <li><strong>Procesador:&nbsp;</strong>AMD 5700G</li>
                <li><strong>Memoria:&nbsp;</strong>16GB DDR4</li>
                <li><strong>Almacenamiento HDD SATA:&nbsp;</strong>1000GB</li>
                <li><strong>Almacenamiento SSD:&nbsp;</strong>512GB</li>
                <li><strong>Tarjeta gráfica:&nbsp;</strong>NVIDIA GeForce RTX 3060 12GB GDDR6</li>
                <li><strong>Tarjeta de red:&nbsp;</strong>Ethernet, wifi</li>
                <li><strong>Puertos:&nbsp;</strong>4 USB 2.0, 3 USB 3.2</li>
                <li><strong>Altura:&nbsp;</strong>337 (mm)</li>
                <li><strong>Anchura:&nbsp;</strong>155 (mm)</li>
                <li><strong>Profundidad:&nbsp;</strong>297.3 (mm)</li>
                <li><strong>Peso:</strong> 6.3Kg.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'computers/desktop/hp_victus_15L/hp_victus_15L.webp',
        ]);
        //Product ID: 69
        $product[] = Product::create([
            'name' => 'Ordenador sobremesa IdeaCentre AIO 3',
            'slug' => Str::slug('Ordenador sobremesa IdeaCentre AIO 3'),
            'status' => 1,
            'category_id' => 7,
            'subcategory_id' => 60,
            'price' => 650,
            'stock' => 10,
            'short_detail' => 'Ordenador sobremesa IdeaCentre AIO 3, 4500U, 8GB, 512 SSD, Windows 10 Home',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Lenovo</li>
                <li><strong>Color:&nbsp;</strong>Negro</li>
                <li><strong>Procesador:&nbsp;</strong>AMD Ryzen 5 4500U</li>
                <li><strong>Memoria:&nbsp;</strong>2 X 4GB SO-DIMM DDR4</li>
                <li><strong>Almacenamiento:&nbsp;</strong>512GB SSD</li>                
                <li><strong>Tarjeta gráfica:&nbsp;</strong>Integrada AMD Radeon Graphics</li>
                <li><strong>Pantalla:&nbsp;</strong>23.8" FullHD 1920 X 1080</li>
                <li><strong>Accesorios:&nbsp;</strong>Teclador y ratón</li>
                <li><strong>Sistema operativo:&nbsp;</strong>Windows 10</li>
                <li><strong>Altura:&nbsp;</strong>700 (mm)</li>
                <li><strong>Anchura:&nbsp;</strong>55 (mm)</li>
                <li><strong>Profundidad:&nbsp;</strong>25 (mm)</li>
                <li><strong>Peso:</strong> 6Kg.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'computers/desktop/lenovo_ideacentre_aio3/lenovo_ideacentre_aio3.jpg',
        ]);
        //Product ID: 70
        $product[] = Product::create([
            'name' => 'Ordenador sobremesa MSI mag Infinite',
            'slug' => Str::slug('Ordenador sobremesa MSI mag Infinite'),
            'status' => 1,
            'category_id' => 7,
            'subcategory_id' => 60,
            'price' => 1439,
            'stock' => 10,
            'short_detail' => 'Ordenador sobremesa MSI mag Infinite, i7 10700, 16GB, 1TB SSD, GeForce RTX 3060, Windows 10 Home',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>MSI</li>
                <li><strong>Color:&nbsp;</strong>Negro</li>
                <li><strong>Procesador:&nbsp;</strong>Intel Core 7 10700</li>
                <li><strong>Memoria:&nbsp;</strong>2 X 12GB</li>
                <li><strong>Almacenamiento:&nbsp;</strong>1TB SSD</li>                
                <li><strong>Tarjeta gráfica:&nbsp;</strong>NVIDIA GeForce RTX 3060</li>
                <li><strong>Puertos:&nbsp;</strong>4 USB 2.0, 2 USB 3.0</li>
                <li><strong>Sistema operativo:&nbsp;</strong>Windows 10 Home</li>
                <li><strong>Altura:&nbsp;</strong>450 (mm)</li>
                <li><strong>Anchura:&nbsp;</strong>407 (mm)</li>
                <li><strong>Profundidad:&nbsp;</strong>17.4 (mm)</li>
                <li><strong>Peso:</strong> 10Kg.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'computers/desktop/msi_mag_infinite/msi_mag_infinite.jpg',
        ]);
        //Product ID: 71
        $product[] = Product::create([
            'name' => 'Ordenador portátil HP Victus 16-e0090ns',
            'slug' => Str::slug('Ordenador portátil HP Victus 16-e0090ns'),
            'status' => 1,
            'category_id' => 7,
            'subcategory_id' => 61,
            'price' => 999,
            'stock' => 10,
            'short_detail' => 'Ordenador portátil HP Victus 16-e0090ns, 5800H, 16GB, 512GB SSD, RTX 3050Ti',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>HP</li>
                <li><strong>Color:&nbsp;</strong>Negro</li>
                <li><strong>Procesador:&nbsp;</strong>AMD Ryzen 7 5800H</li>
                <li><strong>Memoria:&nbsp;</strong>2 X 8GB DDR4</li>
                <li><strong>Almacenamiento:&nbsp;</strong>512GB SSD</li>                
                <li><strong>Tarjeta gráfica:&nbsp;</strong>NVIDIA GeForce RTX 3050Ti</li>
                <li><strong>Cámara:&nbsp;</strong>Cámara HP Wide Vision 720p HD</li>
                <li><strong>Batería:&nbsp;</strong>Litio 4 celdas, 70Wh</li>
                <li><strong>Puertos:&nbsp;</strong>2 USB 2.0, 1 USB 3.0, 1 HDMI, 1 RJ45</li>
                <li><strong>Pantalla:&nbsp;</strong>16.1" FullHD 1920 X 1080 144Hz</li>
                <li><strong>Sistema operativo:&nbsp;</strong>Windows</li>
                <li><strong>Altura:&nbsp;</strong>23.5 (mm)</li>
                <li><strong>Anchura:&nbsp;</strong>370 (mm)</li>
                <li><strong>Profundidad:&nbsp;</strong>260 (mm)</li>
                <li><strong>Peso:</strong> 2.5Kg.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'computers/portable/hp_victus_16-e0090ns/hp_victus_16-e0090ns.jpg',
        ]);
        //Product ID: 72
        $product[] = Product::create([
            'name' => 'Ordenador portátil MSI Katana GF66 12UD-081XES',
            'slug' => Str::slug('Ordenador portátil MSI Katana GF66 12UD-081XES'),
            'status' => 1,
            'category_id' => 7,
            'subcategory_id' => 61,
            'price' => 999,
            'stock' => 10,
            'short_detail' => 'Ordenador portátil MSI Katana GF66 12UD-081XES, i7 12700H, 16GB, 512GB SSD, RTX 3050Ti',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>MSI</li>
                <li><strong>Color:&nbsp;</strong>Negro</li>
                <li><strong>Procesador:&nbsp;</strong>Intel Core 7 12700H</li>
                <li><strong>Memoria:&nbsp;</strong>2 X 8GB DDR4</li>
                <li><strong>Almacenamiento:&nbsp;</strong>512GB SSD</li>                
                <li><strong>Tarjeta gráfica:&nbsp;</strong>NVIDIA GeForce RTX 3050Ti</li>
                <li><strong>Cámara:&nbsp;</strong>HD type 30fps 720p HD</li>
                <li><strong>Batería:&nbsp;</strong>Litio 3 celdas, 53Wh</li>
                <li><strong>Puertos:&nbsp;</strong>2 USB 3.0 type-A, 1 USB 3.0 type-C, 1 HDMI</li>
                <li><strong>Pantalla:&nbsp;</strong>15.6" FullHD 1920 X 1080</li>
                <li><strong>Sistema operativo:&nbsp;</strong>Windows</li>
                <li><strong>Altura:&nbsp;</strong>24.9 (mm)</li>
                <li><strong>Anchura:&nbsp;</strong>359 (mm)</li>
                <li><strong>Profundidad:&nbsp;</strong>259 (mm)</li>
                <li><strong>Peso:</strong> 2.25Kg.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'computers/portable/msi_katana_gf66_12ud_081xes/msi_katana_gf66_12ud_081xes.jpg',
        ]);
        //Product ID: 73
        $product[] = Product::create([
            'name' => 'Ordenador portátil Acer Nitro AN515-57-75M9',
            'slug' => Str::slug('Ordenador portátil Acer Nitro AN515-57-75M9'),
            'status' => 1,
            'category_id' => 7,
            'subcategory_id' => 4,
            'price' => 1001,
            'stock' => 10,
            'short_detail' => 'Ordenador portátil Acer Nitro AN515-57-75M9, i7 11800H, 16GB, 512GB SSD, RTX 3050Ti',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Acer</li>
                <li><strong>Color:&nbsp;</strong>Negro</li>
                <li><strong>Procesador:&nbsp;</strong>Intel Core 7 11800H</li>
                <li><strong>Memoria:&nbsp;</strong>1 X 16GB DDR4</li>
                <li><strong>Almacenamiento:&nbsp;</strong>512GB SSD</li>                
                <li><strong>Tarjeta gráfica:&nbsp;</strong>NVIDIA GeForce RTX 3050Ti</li>
                <li><strong>Cámara:&nbsp;</strong>HD Camera</li>
                <li><strong>Batería:&nbsp;</strong>Litio 4 celdas, 57Wh</li>
                <li><strong>Puertos:&nbsp;</strong>2 USB 3.0 type-A, 1 USB 2.0 type-C, 1 HDMI, 1 RJ45</li>
                <li><strong>Pantalla:&nbsp;</strong>15.6" FullHD 1920 X 1080 144Hz</li>
                <li><strong>Sistema operativo:&nbsp;</strong>Sin sistema operativo</li>
                <li><strong>Altura:&nbsp;</strong>23.9 (mm)</li>
                <li><strong>Anchura:&nbsp;</strong>363 (mm)</li>
                <li><strong>Profundidad:&nbsp;</strong>255 (mm)</li>
                <li><strong>Peso:</strong> 2.4Kg.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'computers/portable/acer_nitro_an515_57_75m9/acer_nitro_an515_57_75m9.jpg',
        ]);
        //Product ID: 74
        $product[] = Product::create([
            'name' => 'Disco duro Seagate Barracuda 3.5"',
            'slug' => Str::slug('Disco duro Seagate Barracuda 3.5"'),
            'status' => 1,
            'category_id' => 7,
            'subcategory_id' => 62,
            'price' => 45,
            'stock' => 10,
            'short_detail' => 'Disco duro Seagate Barracuda 3.5", 1TB SATA3',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Seagate</li>
                <li><strong>Tipo:&nbsp;</strong>HHD</li>
                <li><strong>Color:&nbsp;</strong>Verde</li>
                <li><strong>Capacidad:&nbsp;</strong>1000GB</li>
                <li><strong>Velocidad:&nbsp;</strong>7200 RPM</li>
                <li><strong>Interfaz:&nbsp;</strong>Serial ATA III</li>
                <li><strong>Consumo:&nbsp;</strong>5.3W</li>
                <li><strong>Altura:&nbsp;</strong>20.17 (mm)</li>
                <li><strong>Anchura:&nbsp;</strong>101.6 (mm)</li>
                <li><strong>Profundidad:&nbsp;</strong>147 (mm)</li>
                <li><strong>Peso:</strong> 400g.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'computers/storage/seagate_barracuda/seagate_barracuda.jpg',
        ]);
        //Product ID: 75
        $product[] = Product::create([
            'name' => 'Disco duro Samsung 870 EVO',
            'slug' => Str::slug('Disco duro Samsung 870 EVO'),
            'status' => 1,
            'category_id' => 7,
            'subcategory_id' => 62,
            'price' => 110,
            'stock' => 10,
            'short_detail' => 'Disco duro Samsung 870 EVO SSD 2.5", 1TB SATA3, Negro',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Samsung</li>
                <li><strong>Tipo:&nbsp;</strong>SSD</li>
                <li><strong>Color:&nbsp;</strong>Negro</li>
                <li><strong>Capacidad:&nbsp;</strong>1000GB</li>
                <li><strong>Velocidad lectura:&nbsp;</strong>560 MB/s</li>
                <li><strong>Velocidad escritura:&nbsp;</strong>530 MB/s</li>
                <li><strong>Interfaz:&nbsp;</strong>Serial ATA III</li>                
                <li><strong>Altura:&nbsp;</strong>7 (mm)</li>
                <li><strong>Anchura:&nbsp;</strong>100 (mm)</li>
                <li><strong>Profundidad:&nbsp;</strong>70 (mm)</li>
                <li><strong>Peso:</strong> 86g.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'computers/storage/samsung_870_evo/samsung_870_evo.jpg',
        ]);
        //Product ID: 76
        $product[] = Product::create([
            'name' => 'Disco duro Kioxia Exceria 480GB',
            'slug' => Str::slug('Disco duro Kioxia Exceria 480GB'),
            'status' => 1,
            'category_id' => 7,
            'subcategory_id' => 62,
            'price' => 110,
            'stock' => 10,
            'short_detail' => 'Disco duro Kioxia Exceria 2.5", 480GB SATA3, Negro',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Kioxia</li>
                <li><strong>Tipo:&nbsp;</strong>SSD</li>
                <li><strong>Color:&nbsp;</strong>Negro</li>
                <li><strong>Capacidad:&nbsp;</strong>1000GB</li>
                <li><strong>Velocidad lectura:&nbsp;</strong>555 MB/s</li>
                <li><strong>Velocidad escritura:&nbsp;</strong>540 MB/s</li>
                <li><strong>Interfaz:&nbsp;</strong>Serial ATA III</li>                
                <li><strong>Altura:&nbsp;</strong>7 (mm)</li>
                <li><strong>Anchura:&nbsp;</strong>100 (mm)</li>
                <li><strong>Profundidad:&nbsp;</strong>70 (mm)</li>
                <li><strong>Peso:</strong> 46g.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'computers/storage/kioxia_exceria_480GB/kioxia_exceria_480GB.jpg',
        ]);
        //Product ID: 77
        $product[] = Product::create([
            'name' => 'Manguera de jardín Cellfast Economic',
            'slug' => Str::slug('Manguera de jardín Cellfast Economic'),
            'status' => 1,
            'category_id' => 9,
            'subcategory_id' => 69,
            'price' => 25,
            'stock' => 10,
            'short_detail' => 'Manguera de jardín Cellfast Economic, 1/2" 20M',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Cellfast</li>
                <li><strong>Material:&nbsp;</strong>Plástico</li>
                <li><strong>Color:&nbsp;</strong>Verde</li>
                <li><strong>Longitud:&nbsp;</strong>20 m.</li>
                <li><strong>Presión de trabajo:&nbsp;</strong>8 bar</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'garden/hose/hose_cellfast_20m/hose_cellfast_20m.jpg',
        ]);
        //Product ID: 78
        $product[] = Product::create([
            'name' => 'Manguera de jardín Natrain',
            'slug' => Str::slug('Manguera de jardín Natrain'),
            'status' => 1,
            'category_id' => 9,
            'subcategory_id' => 69,
            'price' => 22,
            'stock' => 10,
            'short_detail' => 'Manguera de jardín Natrain, 15M',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Natrain</li>
                <li><strong>Material:&nbsp;</strong>Plástico</li>
                <li><strong>Color:&nbsp;</strong>Verde</li>
                <li><strong>Longitud:&nbsp;</strong>15 m.</li>                
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'garden/hose/hose_natrain_15m/hose_natrain_15m.jpg',
        ]);
        //Product ID: 79
        $product[] = Product::create([
            'name' => 'Manguera de jardín Gardena Comfort FLEX',
            'slug' => Str::slug('Manguera de jardín Gardena Comfort FLEX'),
            'status' => 1,
            'category_id' => 9,
            'subcategory_id' => 69,
            'price' => 38,
            'stock' => 10,
            'short_detail' => 'Manguera de jardín Gardena Comfort FLEX, 15M',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Gardena</li>
                <li><strong>Material:&nbsp;</strong>PVC</li>
                <li><strong>Color:&nbsp;</strong>Gris y naranja</li>
                <li><strong>Longitud:&nbsp;</strong>15 m.</li>
                <li><strong>Presión de trabajo:&nbsp;</strong>25 bar</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'garden/hose/hose_gardena_flex_15m/hose_gardena_flex_15m.jpg',
        ]);
        //Product ID: 80
        $product[] = Product::create([
            'name' => 'Piscina hinchable INTEX Easy Set 366 X 76',
            'slug' => Str::slug('Piscina hinchable INTEX Easy Set 366 X 76'),
            'status' => 1,
            'category_id' => 9,
            'subcategory_id' => 70,
            'price' => 76,
            'stock' => 10,
            'short_detail' => 'Piscina hinchable INTEX Easy Set 366 X 76, circular',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Intex</li>
                <li><strong>Material:&nbsp;</strong>PVC</li>
                <li><strong>Color:&nbsp;</strong>Multicolor</li>
                <li><strong>Ancho:&nbsp;</strong>366 cm.</li>
                <li><strong>Altura:&nbsp;</strong>76 cm.</li>
                <li><strong>Capacidad:&nbsp;</strong>5621 L.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'garden/swim/swim_intex_366x76/swim_intex_366x76.jpg',
        ]);
        //Product ID: 81
        $product[] = Product::create([
            'name' => 'Piscina hinchable Bestrip 300 X 170',
            'slug' => Str::slug('Piscina hinchable Bestrip 300 X 170'),
            'status' => 1,
            'category_id' => 9,
            'subcategory_id' => 70,
            'price' => 89,
            'stock' => 10,
            'short_detail' => 'Piscina hinchable Bestrip 300 X 170, rectangular',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Bestrip</li>
                <li><strong>Material:&nbsp;</strong>PVC</li>
                <li><strong>Color:&nbsp;</strong>Multicolor</li>
                <li><strong>Ancho:&nbsp;</strong>300 cm.</li>                
                <li><strong>Altura:&nbsp;</strong>76 cm.</li>
                <li><strong>Profundidad:&nbsp;</strong>170 cm.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'garden/swim/swim_bestrip_300x170/swim_bestrip_300x170.jpg',
        ]);
        //Product ID: 82
        $product[] = Product::create([
            'name' => 'Piscina desmontable INTEX 457X122',
            'slug' => Str::slug('Piscina desmontable INTEX 457X122'),
            'status' => 1,
            'category_id' => 9,
            'subcategory_id' => 70,
            'price' => 89,
            'stock' => 10,
            'short_detail' => 'Piscina desmontable INTEX 457X122, circular',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>INTEX</li>
                <li><strong>Material lona:&nbsp;</strong>PVC</li>
                <li><strong>Material estructura:&nbsp;</strong>Acero</li>
                <li><strong>Color:&nbsp;</strong>Azul y blanco</li>
                <li><strong>Ancho:&nbsp;</strong>457 cm.</li>                
                <li><strong>Altura:&nbsp;</strong>122 cm.</li>                
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'garden/swim/swim_intex_457x122/swim_intex_457x122.jpg',
        ]);
        //Product ID: 83
        $product[] = Product::create([
            'name' => 'Cortacésped Bosch Home and Garden ARM 3200',
            'slug' => Str::slug('Cortacésped Bosch Home and Garden ARM 3200'),
            'status' => 1,
            'category_id' => 9,
            'subcategory_id' => 71,
            'price' => 135,
            'stock' => 10,
            'short_detail' => 'Cortacésped Bosch Home and Garden ARM 3200, Eléctrico, Verde',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Bosch</li>
                <li><strong>Tipo:&nbsp;</strong>Eléctrico</li>
                <li><strong>Capacidad:&nbsp;</strong>31 L.</li>
                <li><strong>Potencia:&nbsp;</strong>1200W</li>
                <li><strong>Ajustable:&nbsp;</strong>3 ajustes de corte (20-40-60mm.)</li>
                <li><strong>Ancho de corte:&nbsp;</strong>32cm.</li>
                <li><strong>Color:&nbsp;</strong>Verde</li>
                <li><strong>Anchura:&nbsp;</strong>60 cm.</li>
                <li><strong>Altura:&nbsp;</strong>39 cm.</li>
                <li><strong>Longitud:&nbsp;</strong>27 cm.</li>
                <li><strong>Peso:&nbsp;</strong>8.5 Kg.</li>
                <li><strong>Incluye:&nbsp;</strong>Cuchilla adicional.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'garden/mower/bosch_arm_3200/bosch_arm_3200.jpg',
        ]);
        //Product ID: 84
        $product[] = Product::create([
            'name' => 'Cortacésped Einhell GC EM 1536',
            'slug' => Str::slug('Cortacésped Einhell GC EM 1536'),
            'status' => 1,
            'category_id' => 9,
            'subcategory_id' => 71,
            'price' => 89,
            'stock' => 10,
            'short_detail' => 'Cortacésped Einhell GC EM 1536, Eléctrico, Rojo y negro',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Einhell</li>
                <li><strong>Tipo:&nbsp;</strong>Eléctrico</li>
                <li><strong>Capacidad:&nbsp;</strong>38 L.</li>
                <li><strong>Potencia:&nbsp;</strong>1500W</li>
                <li><strong>Ajustable:&nbsp;</strong>5 ajustes de corte (25-65mm.)</li>
                <li><strong>Ancho de corte:&nbsp;</strong>36cm.</li>
                <li><strong>Color:&nbsp;</strong>Verde</li>
                <li><strong>Anchura:&nbsp;</strong>72 cm.</li>
                <li><strong>Altura:&nbsp;</strong>45 cm.</li>
                <li><strong>Longitud:&nbsp;</strong>32.5 cm.</li>
                <li><strong>Peso:&nbsp;</strong>10 Kg.</li>                
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'garden/mower/einhell_gc_em_1536/einhell_gc_em_1536.jpg',
        ]);
        //Product ID: 85
        $product[] = Product::create([
            'name' => 'Cortacésped BlackAndDecker BEMW351',
            'slug' => Str::slug('Cortacésped BlackAndDecker BEMW351'),
            'status' => 1,
            'category_id' => 9,
            'subcategory_id' => 71,
            'price' => 78,
            'stock' => 10,
            'short_detail' => 'Cortacésped BlackAndDecker BEMW351, Eléctrico, Negro y naranja',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>BlackAndDecker</li>
                <li><strong>Tipo:&nbsp;</strong>Eléctrico</li>
                <li><strong>Capacidad:&nbsp;</strong>30 L.</li>
                <li><strong>Potencia:&nbsp;</strong>1000W</li>
                <li><strong>Ajustable:&nbsp;</strong>5 ajustes de corte (25-65mm.)</li>
                <li><strong>Ancho de corte:&nbsp;</strong>32cm.</li>
                <li><strong>Color:&nbsp;</strong>Negro y naranja</li>
                <li><strong>Anchura:&nbsp;</strong>63.7 cm.</li>
                <li><strong>Altura:&nbsp;</strong>33.5 cm.</li>
                <li><strong>Longitud:&nbsp;</strong>35.6 cm.</li>
                <li><strong>Peso:&nbsp;</strong>3.63 Kg.</li>                
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'garden/mower/blackanddecker_bemw351/blackanddecker_bemw351.jpg',
        ]);
        //Product ID: 86
        $product[] = Product::create([
            'name' => 'Cortacésped Greenworks G40LM35K',
            'slug' => Str::slug('Cortacésped Greenworks G40LM35K'),
            'status' => 1,
            'category_id' => 9,
            'subcategory_id' => 71,
            'price' => 78,
            'stock' => 10,
            'short_detail' => 'Cortacésped Greenworks G40LM35K, Eléctrico, Verde y negro',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Greenworks</li>
                <li><strong>Tipo:&nbsp;</strong>Eléctrico</li>
                <li><strong>Capacidad:&nbsp;</strong>30 L.</li>
                <li><strong>Potencia:&nbsp;</strong>1000W</li>                
                <li><strong>Ancho de corte:&nbsp;</strong>35cm.</li>
                <li><strong>Color:&nbsp;</strong>Negro y naranja</li>
                <li><strong>Anchura:&nbsp;</strong>40.2 cm.</li>
                <li><strong>Altura:&nbsp;</strong>101 cm.</li>
                <li><strong>Longitud:&nbsp;</strong>121.7.6 cm.</li>
                <li><strong>Peso:&nbsp;</strong>16.6 Kg.</li>
                <li><strong>Incluye:&nbsp;</strong>Batería de repuesto 2.5Ah</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'garden/mower/greenworks_G40LM35K/greenworks_G40LM35K.jpg',
        ]);
        //Product ID: 87
        $product[] = Product::create([
            'name' => 'Cepillo de dientes Oral-B Pro 3500',
            'slug' => Str::slug('Cepillo de dientes Oral-B Pro 3500'),
            'status' => 1,
            'category_id' => 10,
            'subcategory_id' => 73,
            'price' => 55,
            'stock' => 10,
            'short_detail' => 'Cepillo de dientes Oral-B Pro 3500, eléctrico, negro',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Braun Oral-B</li>
                <li><strong>Tipo:&nbsp;</strong>Eléctrico</li>
                <li><strong>Color:&nbsp;</strong>Negro</li>
                <li><strong>Nº de modos de cepillado:&nbsp;</strong>3</li>
                <li><strong>Temporizador:&nbsp;</strong>Temporizador de 2 minutos</li>
                <li><strong>Dimensiones del paquete:&nbsp;</strong>17 x 9.4 x 24 cm</li>
                <li><strong>Peso:&nbsp;</strong>333g.</li>
                <li><strong>Incluye:&nbsp;</strong>Funda de viaje</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'personal_care/toothbrushes/oral_b_pro_3500/oral_b_pro_3500.jpg',
        ]);
        //Product ID: 88
        $product[] = Product::create([
            'name' => 'Cepillo de dientes Xiaomi MI SMART T500',
            'slug' => Str::slug('Cepillo de dientes Xiaomi MI SMART T500'),
            'status' => 1,
            'category_id' => 10,
            'subcategory_id' => 73,
            'price' => 45,
            'stock' => 10,
            'short_detail' => 'Cepillo de dientes Xiaomi MI SMART T500, eléctrico, blanco',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Xiaomi</li>
                <li><strong>Tipo:&nbsp;</strong>Eléctrico</li>
                <li><strong>Color:&nbsp;</strong>Blanco</li>
                <li><strong>Nº de modos de cepillado:&nbsp;</strong>3</li>
                <li><strong>Temporizador de cepillado:&nbsp;</strong>Sí</li>
                <li><strong>Conexión:&nbsp;</strong>Bluetooth</li>
                <li><strong>Sensor:&nbsp;</strong>Sensor de presión</li>
                <li><strong>Dimensiones del paquete:&nbsp;</strong>13 x 4.1 x 21 cm</li>
                <li><strong>Peso:&nbsp;</strong>200g.</li>                
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'personal_care/toothbrushes/xiaomi_mi_smart_t500/xiaomi_mi_smart_t500.jpg',
        ]);
        //Product ID: 89
        $product[] = Product::create([
            'name' => 'Cepillo de dientes Philips Sonicare 2',
            'slug' => Str::slug('Cepillo de dientes Philips Sonicare 2'),
            'status' => 1,
            'category_id' => 10,
            'subcategory_id' => 73,
            'price' => 59,
            'stock' => 10,
            'short_detail' => 'Cepillo de dientes Philips Sonicare 2, eléctrico, blanco',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Philips</li>
                <li><strong>Tipo:&nbsp;</strong>Eléctrico</li>
                <li><strong>Color:&nbsp;</strong>Blanco</li>
                <li><strong>Nº de modos de cepillado:&nbsp;</strong>1</li>
                <li><strong>Temporizador de cepillado:&nbsp;</strong>Temporizador de 2 minutos</li>
                <li><strong>Sensor:&nbsp;</strong>Sensor de presión</li>
                <li><strong>Dimensiones del paquete:&nbsp;</strong>22 x 6.4 x 17 cm</li>
                <li><strong>Peso:&nbsp;</strong>471g.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'personal_care/toothbrushes/philips_sonicare2/philips_sonicare2.jpg',
        ]);
        //Product ID: 90
        $product[] = Product::create([
            'name' => 'Pintalabios OULAC Metálico',
            'slug' => Str::slug('Pintalabios OULAC Metálico'),
            'status' => 1,
            'category_id' => 10,
            'subcategory_id' => 74,
            'price' => 12,
            'stock' => 10,
            'short_detail' => 'Pintalabios OULAC Metálico, impermeable, larga duración',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>OULAC</li>

                <li><strong>Dimensiones del paquete:&nbsp;</strong>7.7 x 2.4 x 2.4 cm</li>
                <li><strong>Peso:&nbsp;</strong>40g.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'personal_care/makeup/lipstick_OULAC_metal/lipstick_OULAC_metal.jpg',
        ]);
        //Product ID: 91
        $product[] = Product::create([
            'name' => "Polo Kappa Uomo Peleot",
            'slug' => Str::slug("Polo Kappa Uomo Peleot"),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 43,
            'price' => 35,
            'stock' => 20,
            'short_detail' => "Polo Kappa Uomo Peleot, Manga corta",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Kappa</li>
                <li><strong>Material:&nbsp;</strong>100% Algodón</li>                
                <li><strong>Cierre:&nbsp;</strong>Botones</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'clothes_men/polo_shirt/polo_kappa_uomo_peleot/polo_kappa_verde.jpg',
        ]);
        //Product ID: 92
        $product[] = Product::create([
            'name' => "Polo Levi's Mineral Black",
            'slug' => Str::slug("Polo Levi's Mineral Black"),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 43,
            'price' => 38,
            'stock' => 20,
            'short_detail' => "Polo Levi's Mineral Black, Manga corta",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Levi's</li>
                <li><strong>Material:&nbsp;</strong>100% Algodón</li>                
                <li><strong>Cierre:&nbsp;</strong>Botones</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'clothes_men/polo_shirt/polo_levis_mineral_black/polo_levis_mineral_black.jpg',
        ]);
        //Product ID: 93
        $product[] = Product::create([
            'name' => "Polo Lacoste DH3201",
            'slug' => Str::slug("Polo Lacoste DH3201"),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 43,
            'price' => 92,
            'stock' => 60,
            'short_detail' => "Polo Lacoste, Manga corta, Hombre",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Lacoste</li>
                <li><strong>Material:&nbsp;</strong>98% Poliéster, 2% Elastano</li>                
                <li><strong>Cierre:&nbsp;</strong>Botones</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'clothes_men/polo_shirt/polo_lacoste_dh3201/polo_lacoste_azul_marino.jpg',
        ]);
        //Product ID: 94
        $product[] = Product::create([
            'name' => "Polo Adidas Tiro17",
            'slug' => Str::slug("Polo Adidas Tiro17"),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 43,
            'price' => 32,
            'stock' => 80,
            'short_detail' => "Polo Adidas Tiro17, Manga corta, Hombre",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Adidas</li>
                <li><strong>Material:&nbsp;</strong>58% Algodón, 42% Poliéster</li>                
                <li><strong>Cierre:&nbsp;</strong>Botones</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'clothes_men/polo_shirt/polo_adidas_tiro17/polo_adidas_tiro17_azul_marino.jpg',
        ]);
        //Product ID: 95
        $product[] = Product::create([
            'name' => "Adidas Get Ready",
            'slug' => Str::slug("Adidas Get Ready"),
            'status' => 1,
            'category_id' => 10,
            'subcategory_id' => 75,
            'price' => 14.99,
            'stock' => 20,
            'short_detail' => "Adidas Get Ready Eau de Toilette, Mujer",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Adidas</li>
                <li><strong>Fragancia:&nbsp;</strong>Floral</li>                
                <li><strong>Tipo:&nbsp;</strong>Mujer</li>
                <li><strong>Volumen:&nbsp;</strong>50ml</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'personal_care/fragances/adidas_getready/adidas_getready.jpg',
        ]);
        //Product ID: 96
        $product[] = Product::create([
            'name' => "BLACK OPIUM NEON",
            'slug' => Str::slug("BLACK OPIUM NEON"),
            'status' => 1,
            'category_id' => 10,
            'subcategory_id' => 75,
            'price' => 54.50,
            'stock' => 20,
            'short_detail' => "BLACK OPIUM NEON WATER, Mujer",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Yves Saint Laurent</li>
                <li><strong>Fragancia:&nbsp;</strong>Lavanda</li>                
                <li><strong>Tipo:&nbsp;</strong>Mujer</li>
                <li><strong>Volumen:&nbsp;</strong>75ml</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'personal_care/fragances/black_opium_neon/black_opium_neon.jpg',
        ]);
        //Product ID: 97
        $product[] = Product::create([
            'name' => "HUGO BOSS",
            'slug' => Str::slug("HUGO BOSS"),
            'status' => 1,
            'category_id' => 10,
            'subcategory_id' => 75,
            'price' => 83.39,
            'stock' => 20,
            'short_detail' => "HUGO BOSS,vaporizador de Hombre",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>BOSS</li>
                <li><strong>Fragancia:&nbsp;</strong>Dulce</li>                
                <li><strong>Tipo:&nbsp;</strong>Hombre</li>
                <li><strong>Volumen:&nbsp;</strong>100ml</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'personal_care/fragances/adidas_getready/adidas_getready.jpg',
        ]);
        //Product ID: 98
        $product[] = Product::create([
            'name' => "Victoria Secret PURE SEDUCTION",
            'slug' => Str::slug("Victoria Secret PURE SEDUCTION"),
            'status' => 1,
            'category_id' => 10,
            'subcategory_id' => 75,
            'price' => 32.49,
            'stock' => 20,
            'short_detail' => "Victoria Secret NEW PURE SEDUCTION FRAGRANCE MIST",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Victoria Secret</li>
                <li><strong>Tipo:&nbsp;</strong>Mujer</li>
                <li><strong>Volumen:&nbsp;</strong>250ml</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'personal_care/fragances/victoria_secret_pure_seduction/victoria_secret_pure_seduction.jpg',
        ]);
        //Product ID: 99
        $product[] = Product::create([
            'name' => "Calvin Klein CK IN2U",
            'slug' => Str::slug("Calvin Klein CK IN2U"),
            'status' => 1,
            'category_id' => 10,
            'subcategory_id' => 75,
            'price' => 26.16,
            'stock' => 20,
            'short_detail' => "Calvin Klein CK IN2U Eau de Toilette",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Calvin Klein</li>
                <li><strong>Fragancia:&nbsp;</strong>Cítrico</li>
                <li><strong>Tipo:&nbsp;</strong>Mujer</li>
                <li><strong>Volumen:&nbsp;</strong>50ml</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'personal_care/fragances/calvin_klein_ck_in2u/calvin_klein_ck_in2u.jpg',
        ]);
        //Product ID: 100
        $product[] = Product::create([
            'name' => "Auriculares inhalámbricos Sony WH-CH510",
            'slug' => Str::slug("Auriculares inhalámbricos Sony WH-CH510"),
            'status' => 1,
            'category_id' => 11,
            'subcategory_id' => 78,
            'price' => 48.99,
            'stock' => 25,
            'short_detail' => "Auriculares inhalámbricos Sony WH-CH510, Negros",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Sony</li>                
                
                <li><strong>Conexión:&nbsp;</strong>Bluetooth</li>
                <li><strong>Alimentación:&nbsp;</strong>Batería litio</li>
                <li><strong>Tipo:&nbsp;</strong>Circumaurales</li>
                <li><strong>Color:&nbsp;</strong>Negro</li>
                <li><strong>Material:&nbsp;</strong>Plástico</li>
                <li><strong>Dimensiones:&nbsp;</strong>7 X 17.2 X 16 cm.</li>
                <li><strong>Peso:&nbsp;</strong>132g.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'video/earphones/earphones_sony_wh_ch510/earphones_sony_wh_ch510.jpg',
        ]);
        //Product ID: 101
        $product[] = Product::create([
            'name' => "Auriculares inhalámbricos JBL TUNE 510BT",
            'slug' => Str::slug("Auriculares inhalámbricos JBL TUNE 510BT"),
            'status' => 1,
            'category_id' => 11,
            'subcategory_id' => 78,
            'price' => 45,
            'stock' => 25,
            'short_detail' => "Auriculares inhalámbricos JBL TUNE 510BT, plegables",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>JBL</li>                
                
                <li><strong>Conexión:&nbsp;</strong>Bluetooth</li>
                <li><strong>Alimentación:&nbsp;</strong>Batería litio</li>
                <li><strong>Tipo:&nbsp;</strong>Supraaurales</li>
                <li><strong>Color:&nbsp;</strong>Negro</li>
                <li><strong>Material:&nbsp;</strong>Aluminio</li>
                <li><strong>Dimensiones:&nbsp;</strong>27 X 23 X 26 cm.</li>
                <li><strong>Peso:&nbsp;</strong>159g.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'video/earphones/earphones_jbl_tune_510bt/earphones_jbl_tune_510bt.jpg',
        ]);
        //Product ID: 102
        $product[] = Product::create([
            'name' => "Auriculares inhalámbricos TOZO A2",
            'slug' => Str::slug("Auriculares inhalámbricos TOZO A2"),
            'status' => 1,
            'category_id' => 11,
            'subcategory_id' => 78,
            'price' => 22.80,
            'stock' => 58,
            'short_detail' => "Auriculares inhalámbricos TOZO A2, IPX5, Negro",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>TOZO</li>                
                
                <li><strong>Conexión:&nbsp;</strong>Bluetooth</li>
                <li><strong>Alimentación:&nbsp;</strong>Batería litio</li>
                <li><strong>Tipo:&nbsp;</strong>Intraaurales</li>
                <li><strong>Color:&nbsp;</strong>Negro</li>
                <li><strong>Material:&nbsp;</strong>Plástico</li>
                <li><strong>Dimensiones:&nbsp;</strong>8.31 X 8.1 X 4.19 cm.</li>
                <li><strong>Peso:&nbsp;</strong>91g.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'video/earphones/earphones_tozo_a2/earphones_tozo_a2.jpg',
        ]);
        //Product ID: 103
        $product[] = Product::create([
            'name' => "Auriculares inhalámbricos Xiaomi Redmi Buds 3",
            'slug' => Str::slug("Auriculares inhalámbricos Xiaomi Redmi Buds 3"),
            'status' => 1,
            'category_id' => 11,
            'subcategory_id' => 78,
            'price' => 25,
            'stock' => 50,
            'short_detail' => "Auriculares inhalámbricos Xiaomi Redmi Buds 3 Lite, Negro",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Xiaomi</li>
                <li><strong>Conexión:&nbsp;</strong>Bluetooth</li>
                <li><strong>Alimentación:&nbsp;</strong>Batería litio</li>
                <li><strong>Tipo:&nbsp;</strong>Intraaurales</li>
                <li><strong>Color:&nbsp;</strong>Negro</li>
                <li><strong>Material:&nbsp;</strong>Silicona</li>
                <li><strong>Dimensiones:&nbsp;</strong>2.45 X 1.67 X 2.46 cm.</li>
                <li><strong>Peso:&nbsp;</strong>90g.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'video/earphones/earphones_xiaomi_redmi_buds3_lite/earphones_xiaomi_redmi_buds3_lite.jpg',
        ]);
        //Product ID: 104
        $product[] = Product::create([
            'name' => "Auriculares inhalámbricos AirPods Pro",
            'slug' => Str::slug("Auriculares inhalámbricos AirPods Pro"),
            'status' => 1,
            'category_id' => 11,
            'subcategory_id' => 78,
            'price' => 299,
            'stock' => 20,
            'short_detail' => "Auriculares inhalámbricos AirPods Pro, 2ª generación",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Apple</li>
                <li><strong>Conexión:&nbsp;</strong>Bluetooth</li>
                <li><strong>Alimentación:&nbsp;</strong>Batería litio</li>
                <li><strong>Tipo:&nbsp;</strong>Intraaurales</li>
                <li><strong>Color:&nbsp;</strong>Blanco</li>
                <li><strong>Material:&nbsp;</strong>Plástico</li>
                <li><strong>Dimensiones:&nbsp;</strong>24 X 21 X 30.9 cm.</li>
                <li><strong>Peso:&nbsp;</strong>240g.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'video/earphones/earphones_airpods_pro2/earphones_airpods_pro2.jpg',
        ]);
        //Product ID: 105
        $product[] = Product::create([
            'name' => "Auriculares inhalámbricos Sony MDR-RF811RK",
            'slug' => Str::slug("Auriculares inhalámbricos Sony MDR-RF811RK"),
            'status' => 1,
            'category_id' => 11,
            'subcategory_id' => 78,
            'price' => 65,
            'stock' => 20,
            'short_detail' => "Auriculares inhalámbricos Sony MDR-RF811RK, RadioFrecuencia (RF)",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Sony</li>
                <li><strong>Conexión:&nbsp;</strong>Bluetooth</li>
                <li><strong>Alimentación:&nbsp;</strong>Batería litio</li>
                <li><strong>Tipo:&nbsp;</strong>Circumaurales</li>
                <li><strong>Color:&nbsp;</strong>Negro</li>
                <li><strong>Material:&nbsp;</strong>Plástico</li>                
                <li><strong>Peso:&nbsp;</strong>272g.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'video/earphones/earphones_sony_mdr_rf811rk/earphones_sony_mdr_rf811rk.jpg',
        ]);
        //Product ID: 106
        $product[] = Product::create([
            'name' => "Xiaomi Smart TV P1 32",
            'slug' => Str::slug("Xiaomi Smart TV P1 32"),
            'status' => 1,
            'category_id' => 11,
            'subcategory_id' => 76,
            'price' => 224,
            'stock' => 20,
            'short_detail' => "Xiaomi Smart TV P1 32,HD Led 32 pulgadas",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Xiaomi</li>
                
                <li><strong>Resolución:&nbsp;</strong>1366 X 768 (HD Ready/720p)</li>
                <li><strong>Tipo:&nbsp;</strong>LCD</li>
                <li><strong>Conectividad:&nbsp;</strong>Bluetooth, Wifi, USB, Ethernet, HDMI</li>
                <li><strong>Conexiones:&nbsp;</strong>3xHDMI,2xUSB2.0,AV,Ethernet Lan (RJ45), WLan, salida auriculares</li>
                <li><strong>Controles:&nbsp;</strong>Mando a distancia Bluetooth con 2 micrófonos</li>
                <li><strong>Potencia:&nbsp;</strong>45W</li>
                <li><strong>Frecuencia:&nbsp;</strong>60Hz</li>
                <li><strong>Color:&nbsp;</strong>Negro</li>
                <li><strong>Material:&nbsp;</strong>Plástico</li>
                <li><strong>Tamaño:&nbsp;</strong>32\", 81cm.</li>
                <li><strong>Dimensiones:&nbsp;</strong>733 X 48 X 180 mm.</li>
                <li><strong>Peso:&nbsp;</strong>4Kg.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'video/tv/xiaomi_smarttv_p1_32/xiaomi_smarttv_p1_32.jpg',
        ]);
        //Product ID: 107
        $product[] = Product::create([
            'name' => "Samsung TV Crystal 43BU8000",
            'slug' => Str::slug("Samsung TV Crystal 43BU8000"),
            'status' => 1,
            'category_id' => 11,
            'subcategory_id' => 76,
            'price' => 224,
            'stock' => 20,
            'short_detail' => "Samsung TV Crystal 2022 43BU8000,4K 43\", Alexa integrada",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Samsung</li>                
                <li><strong>Resolución:&nbsp;</strong>4K</li>
                <li><strong>Tipo:&nbsp;</strong>UHD</li>
                <li><strong>Conectividad:&nbsp;</strong>Bluetooth, Wifi, Ethernet, HDMI</li>                
                <li><strong>Controles:&nbsp;</strong>Mando a distancia con carga solar</li>                
                <li><strong>Frecuencia:&nbsp;</strong>60Hz</li>
                <li><strong>Color:&nbsp;</strong>Negro</li>                
                <li><strong>Tamaño:&nbsp;</strong>43\"</li>
                <li><strong>Dimensiones:&nbsp;</strong>19.69 X 10.8 X 1.91 cm.</li>
                <li><strong>Peso:&nbsp;</strong>9Kg.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'video/tv/samsung_crystal_2022_32BU8000/samsung_crystal_2022_32BU8000.jpg',
        ]);
        //Product ID: 108
        $product[] = Product::create([
            'name' => "LG TV 55UQ70006LB",
            'slug' => Str::slug("LG TV 55UQ70006LB"),
            'status' => 1,
            'category_id' => 11,
            'subcategory_id' => 76,
            'price' => 459,
            'stock' => 20,
            'short_detail' => "LG TV 55UQ70006LB,4K 55\",Gen5.",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>LG</li>                
                <li><strong>Resolución:&nbsp;</strong>4K</li>
                <li><strong>Tipo:&nbsp;</strong>LCD</li>
                <li><strong>Conectividad:&nbsp;</strong>Bluetooth, Wifi, Ethernet, HDMI</li>                
                <li><strong>Controles:&nbsp;</strong>Mando a distancia con accesos directos a Netflix, Prime Video</li>
                <li><strong>Potencia:&nbsp;</strong>102W</li>
                <li><strong>Frecuencia:&nbsp;</strong>60Hz</li>
                <li><strong>Color:&nbsp;</strong>Negro</li>                
                <li><strong>Tamaño:&nbsp;</strong>43\"</li>
                <li><strong>Dimensiones:&nbsp;</strong>8.99 X 123.6 X 71.8 cm.</li>
                <li><strong>Peso:&nbsp;</strong>11.2Kg.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'video/tv/LG_TV_55UQ70006LB/LG_TV_55UQ70006LB.jpg',
        ]);
        //Product ID: 109
        $product[] = Product::create([
            'name' => "Cecotec TV A1 Series ALU10043",
            'slug' => Str::slug("Cecotec TV A1 Series ALU10043"),
            'status' => 1,
            'category_id' => 11,
            'subcategory_id' => 76,
            'price' => 333,
            'stock' => 20,
            'short_detail' => "Cecotec TV A1 Series ALU10043,4K 43\" UHD",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Cecotec</li>
                <li><strong>Resolución:&nbsp;</strong>4K</li>
                <li><strong>Tipo:&nbsp;</strong>LCD</li>
                <li><strong>Conectividad:&nbsp;</strong>Wifi, Ethernet, HDMI</li>                
                <li><strong>Controles:&nbsp;</strong>Mando a distancia con accesos directos a Netflix, Prime Video, Youtube</li>
                <li><strong>Potencia:&nbsp;</strong>92W</li>
                <li><strong>Frecuencia:&nbsp;</strong>60Hz</li>
                <li><strong>Color:&nbsp;</strong>Negro</li>                
                <li><strong>Tamaño:&nbsp;</strong>43\"</li>
                <li><strong>Dimensiones:&nbsp;</strong>8.2 X 96.5 X 56 cm.</li>
                <li><strong>Peso:&nbsp;</strong>7.5Kg.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'video/tv/cecotec_tv_a1_series_alu10043/cecotec_tv_a1_series_alu10043.jpg',
        ]);
        //Product ID: 110
        $product[] = Product::create([
            'name' => "Asus TUF Gaming VG27AQ1A",
            'slug' => Str::slug("Asus TUF Gaming VG27AQ1A"),
            'status' => 1,
            'category_id' => 11,
            'subcategory_id' => 77,
            'price' => 357.55,
            'stock' => 15,
            'short_detail' => "Asus TUF Gaming VG27AQ1A, 27\" LED IPS",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Asus</li>
                <li><strong>Resolución:&nbsp;</strong>2560 x 1440</li>
                <li><strong>Tipo:&nbsp;</strong>IPS</li>
                <li><strong>Conexiones:&nbsp;</strong>2xHDMI, 2xUSB3.0,</li>
                <li><strong>Potencia:&nbsp;</strong>35W</li>
                <li><strong>Frecuencia:&nbsp;</strong>170Hz</li>
                <li><strong>Color:&nbsp;</strong>Negro</li>                
                <li><strong>Tamaño:&nbsp;</strong>27\"</li>
                <li><strong>Dimensiones:&nbsp;</strong>615 X 455 X 514 mm.</li>
                <li><strong>Peso:&nbsp;</strong>5.4Kg.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'video/monitor/asus_tuf_gaming_vg27aq1a/asus_tuf_gaming_vg27aq1a.jpg',
        ]);
        //Product ID: 111
        $product[] = Product::create([
            'name' => "Lenovo L27q-35",
            'slug' => Str::slug("Lenovo L27q-35"),
            'status' => 1,
            'category_id' => 11,
            'subcategory_id' => 77,
            'price' => 223,
            'stock' => 25,
            'short_detail' => "Lenovo L27q-35, 27\"",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Lenovo</li>
                <li><strong>Resolución:&nbsp;</strong>2560 x 1440</li>
                <li><strong>Tipo:&nbsp;</strong>VA</li>
                <li><strong>Conexiones:&nbsp;</strong>2xHDMI, 2xUSB3.0,</li>
                <li><strong>Potencia:&nbsp;</strong>22W</li>
                <li><strong>Frecuencia:&nbsp;</strong>75Hz</li>
                <li><strong>Color:&nbsp;</strong>Negro</li>                
                <li><strong>Tamaño:&nbsp;</strong>27\"</li>
                <li><strong>Dimensiones:&nbsp;</strong>6.89 X 24.19 X 18.76 cm.</li>
                <li><strong>Peso:&nbsp;</strong>4.6Kg.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'video/monitor/lenovo_l27q_35/lenovo_l27q_35.jpg',
        ]);
        //Product ID: 112
        $product[] = Product::create([
            'name' => "Philips Gaming 27M1N3200VS",
            'slug' => Str::slug("Philips Gaming 27M1N3200VS"),
            'status' => 1,
            'category_id' => 11,
            'subcategory_id' => 77,
            'price' => 258,
            'stock' => 25,
            'short_detail' => "Philips Gaming 27M1N3200VS, 27\"",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Philips</li>
                <li><strong>Resolución:&nbsp;</strong>1920 x 1080</li>
                <li><strong>Tipo:&nbsp;</strong>VA</li>
                <li><strong>Potencia:&nbsp;</strong>22W</li>
                <li><strong>Frecuencia:&nbsp;</strong>165Hz</li>
                <li><strong>Color:&nbsp;</strong>Negro</li>                
                <li><strong>Tamaño:&nbsp;</strong>27\"</li>
                <li><strong>Dimensiones:&nbsp;</strong>614 X 193 X 447 mm.</li>
                <li><strong>Peso:&nbsp;</strong>5.52Kg.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'video/monitor/philips_gaming_27m1n3200vs/philips_gaming_27m1n3200vs.jpg',
        ]);
        //Product ID: 113
        $product[] = Product::create([
            'name' => "Love Urban Beauty",
            'slug' => Str::slug("Love Urban Beauty"),
            'status' => 1,
            'category_id' => 10,
            'subcategory_id' => 74,
            'price' => 35,
            'stock' => 50,
            'short_detail' => "Love Urban Beauty, 82 piezas",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Love Urban Beauty</li>
                <li><strong>Color:&nbsp;</strong>Multicolor</li>
                <li><strong>Dimensiones:&nbsp;</strong>25 X 17 X 9 cm.</li>
                <li><strong>Peso:&nbsp;</strong>350g.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'personal_care/makeup/love_urban_beauty/love_urban_beauty.jpg',
        ]);
        //Product ID: 114
        $product[] = Product::create([
            'name' => "ZMILE Cosmetics",
            'slug' => Str::slug("ZMILE Cosmetics"),
            'status' => 1,
            'category_id' => 10,
            'subcategory_id' => 74,
            'price' => 19.20,
            'stock' => 22,
            'short_detail' => "ZMILE Cosmetics",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>ZMILE Cosmetics</li>
                <li><strong>Color:&nbsp;</strong>Multicolor</li>
                <li><strong>Dimensiones:&nbsp;</strong>9.2 X 12.1 X 2.8 cm.</li>
                <li><strong>Peso:&nbsp;</strong>190g.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'personal_care/makeup/zmile_cosmetics/zmile_cosmetics.jpg',
        ]);
        //Product ID: 115
        //Subcategoriás de Tecnología
        $product[] = Product::create([
            'name' => "Amazfit Bip U Pro",
            'slug' => Str::slug("Amazfit Bip U Pro"),
            'status' => 1,
            'category_id' => 6,
            'subcategory_id' => 59,
            'price' => 45.99,
            'stock' => 52,
            'short_detail' => "Amazfit Bip U Pro, Verde",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Amazfit</li>
                <li><strong>Tamaño pantalla:&nbsp;</strong>1.43\"</li>
                <li><strong>Color:&nbsp;</strong>Verde</li>
                <li><strong>Conexión:&nbsp;</strong>USB</li>
                <li><strong>Conectividad:&nbsp;</strong>Bluetooth</li>
                <li><strong>GPS:&nbsp;</strong>Sí</li>
                <li><strong>Batería:&nbsp;</strong>Litio</li>
                <li><strong>Dimensiones:&nbsp;</strong>4.09 X 3.55 X 1.14 cm.</li>
                <li><strong>Peso:&nbsp;</strong>32g.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'tecnology/smartwatches/amazfit_bip_u_pro/amazfit_bip_u_pro_green.jpg',
        ]);
        //Product ID: 116
        $product[] = Product::create([
            'name' => "Samsung Galaxy Watch 4",
            'slug' => Str::slug("Samsung Galaxy Watch 4"),
            'status' => 1,
            'category_id' => 6,
            'subcategory_id' => 59,
            'price' => 186,
            'stock' => 25,
            'short_detail' => "Samsung Galaxy Watch 4, versión ES",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Samsung</li>
                <li><strong>Tamaño pantalla:&nbsp;</strong>1.35\", Super AMOLED</li>
                <li><strong>Color:&nbsp;</strong>Negro</li>
                <li><strong>Conexión:&nbsp;</strong>USB</li>
                <li><strong>Conectividad:&nbsp;</strong>Bluetooth</li>
                <li><strong>GPS:&nbsp;</strong>Sí</li>
                <li><strong>Batería:&nbsp;</strong>Litio</li>
                <li><strong>Dimensiones:&nbsp;</strong>4.44 X 4.33 X 0.98 cm.</li>
                <li><strong>Peso:&nbsp;</strong>30.3g.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'tecnology/smartwatches/samsung_galaxy_watch4/samsung_galaxy_watch4.jpg',
        ]);
        //Product ID: 117
        $product[] = Product::create([
            'name' => "Xiaomi Mi Smart Band 7",
            'slug' => Str::slug("Xiaomi Mi Smart Band 7"),
            'status' => 1,
            'category_id' => 6,
            'subcategory_id' => 59,
            'price' => 65,
            'stock' => 25,
            'short_detail' => "Xiaomi Mi Smart Band 7,Negro",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Xiaomi</li>
                <li><strong>Tamaño pantalla:&nbsp;</strong>1.62\", Super AMOLED</li>
                <li><strong>Color:&nbsp;</strong>Negro</li>
                <li><strong>Conexión:&nbsp;</strong>USB, Magnética</li>
                <li><strong>Conectividad:&nbsp;</strong>Bluetooth</li>
                <li><strong>GPS:&nbsp;</strong>No</li>
                <li><strong>Batería:&nbsp;</strong>Litio</li>
                <li><strong>Dimensiones:&nbsp;</strong>10 X 2 X 0.5 cm.</li>
                <li><strong>Peso:&nbsp;</strong>110g.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'tecnology/smartwatches/xiaomi_smart_band7/xiaomi_smart_band7.jpg',
        ]);
        //Product ID: 118
        $product[] = Product::create([
            'name' => "XINGHESF CS3",
            'slug' => Str::slug("XINGHESF CS3"),
            'status' => 1,
            'category_id' => 6,
            'subcategory_id' => 59,
            'price' => 57.99,
            'stock' => 25,
            'short_detail' => "XINGHESF CS3,Rosa",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>XINGHESF</li>
                <li><strong>Tamaño pantalla:&nbsp;</strong>1.7\"</li>
                <li><strong>Color:&nbsp;</strong>Rosa</li>
                <li><strong>Conexión:&nbsp;</strong>USB, Magnética</li>
                <li><strong>Conectividad:&nbsp;</strong>Bluetooth</li>
                <li><strong>GPS:&nbsp;</strong>Sí</li>
                <li><strong>Batería:&nbsp;</strong>Litio</li>
                <li><strong>Dimensiones:&nbsp;</strong>3 X 2 X 1 cm.</li>
                <li><strong>Peso:&nbsp;</strong>160g.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'tecnology/smartwatches/xinghesf_cs3/xinghesf_cs3.jpg',
        ]);
        //Product ID: 119
        $product[] = Product::create([
            'name' => "Kindle 2022",
            'slug' => Str::slug("Kindle 2022"),
            'status' => 1,
            'category_id' => 6,
            'subcategory_id' => 58,
            'price' => 120,
            'stock' => 20,
            'short_detail' => "Nuevo Kindle modelo 2022",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Kindle</li>
                <li><strong>Tamaño pantalla:&nbsp;</strong>6\"</li>
                <li><strong>Resolución:&nbsp;</strong>300ppp</li>
                <li><strong>Color:&nbsp;</strong>Negro</li>
                <li><strong>Conexión:&nbsp;</strong>USB-C</li>
                <li><strong>Conectividad:&nbsp;</strong>Wifi</li>
                <li><strong>Almacenamiento:&nbsp;</strong>16GB</li>
                <li><strong>Batería:&nbsp;</strong>Litio</li>
                <li><strong>Dimensiones:&nbsp;</strong>157.8 X 108.6 X 8 mm.</li>
                <li><strong>Peso:&nbsp;</strong>158g.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'tecnology/ebooks/kindle_2022/kindle_2022.jpg',
        ]);
        //Product ID: 120
        $product[] = Product::create([
            'name' => "Basic Lux 3",
            'slug' => Str::slug("Basic Lux 3"),
            'status' => 1,
            'category_id' => 6,
            'subcategory_id' => 58,
            'price' => 120,
            'stock' => 20,
            'short_detail' => "Basic Lux 3 Ink Black POCKETBOOK",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>PocketBook</li>
                <li><strong>Tamaño pantalla:&nbsp;</strong>6\"</li>
                <li><strong>Resolución:&nbsp;</strong>758 x 1024</li>
                <li><strong>Color:&nbsp;</strong>Negro</li>
                <li><strong>Conexión:&nbsp;</strong>micro USB-C</li>
                <li><strong>Conectividad:&nbsp;</strong>Bluetooth, Wifi</li>
                <li><strong>Almacenamiento:&nbsp;</strong>8GB</li>
                <li><strong>Batería:&nbsp;</strong>Litio</li>
                <li><strong>Dimensiones:&nbsp;</strong>8 X 161 X 108 mm.</li>
                <li><strong>Peso:&nbsp;</strong>155g.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'tecnology/ebooks/basic_lux3/basic_lux3.jpg',
        ]);
        //Product ID: 121
        $product[] = Product::create([
            'name' => "Kobo Nia",
            'slug' => Str::slug("Kobo Nia"),
            'status' => 1,
            'category_id' => 6,
            'subcategory_id' => 58,
            'price' => 110,
            'stock' => 20,
            'short_detail' => "Kobo Nia eReader",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Kobo</li>
                <li><strong>Tamaño pantalla:&nbsp;</strong>6\"</li>
                <li><strong>Resolución:&nbsp;</strong>1024 x 758</li>
                <li><strong>Color:&nbsp;</strong>Negro</li>
                <li><strong>Conexión:&nbsp;</strong>micro USB-C</li>
                <li><strong>Conectividad:&nbsp;</strong>Wifi</li>
                <li><strong>Almacenamiento:&nbsp;</strong>8GB</li>
                <li><strong>Batería:&nbsp;</strong>Litio 1000mAh</li>
                <li><strong>Dimensiones:&nbsp;</strong>9.2 X 159.3 X 112.4 mm.</li>
                <li><strong>Peso:&nbsp;</strong>172g.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'tecnology/ebooks/kobo_nia/kobo_nia.jpg',
        ]);
        //Product ID: 122
        $product[] = Product::create([
            'name' => "Xiaomi L83",
            'slug' => Str::slug("Xiaomi L83"),
            'status' => 1,
            'category_id' => 6,
            'subcategory_id' => 57,
            'price' => 247.80,
            'stock' => 20,
            'short_detail' => "Xiaomi L83 Redmi Pad Tablet, Carga rápida",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Xiaomi</li>
                <li><strong>Tamaño pantalla:&nbsp;</strong>10.61\"</li>
                <li><strong>Tipo de panel:&nbsp;</strong>LCD</li>

                <li><strong>Resolución:&nbsp;</strong>1200 x 2000</li>
                <li><strong>Color:&nbsp;</strong>Gris</li>
                <li><strong>Conexión:&nbsp;</strong>micro USB-C</li>
                <li><strong>Conectividad:&nbsp;</strong>Wifi, Bluetooth</li>
                <li><strong>Procesador:&nbsp;</strong>Mediatek Helio G99</li>
                <li><strong>Memoria RAM:&nbsp;</strong>4GB</li>
                <li><strong>Almacenamiento:&nbsp;</strong>128GB</li>
                <li><strong>Cámara frontal:&nbsp;</strong>8MP</li>
                <li><strong>Cámara trasera:&nbsp;</strong>8MP</li>
                <li><strong>Batería:&nbsp;</strong>Litio 8000mAh</li>
                <li><strong>Dimensiones:&nbsp;</strong>25 X 7.37 X 0.7 cm.</li>
                <li><strong>Peso:&nbsp;</strong>445g.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'tecnology/tablets/xiaomi_L83/xiaomi_L83.jpg',
        ]);
        //Product ID: 123
        $product[] = Product::create([
            'name' => "Lenovo Tab M10",
            'slug' => Str::slug("Lenovo Tab M10"),
            'status' => 1,
            'category_id' => 6,
            'subcategory_id' => 57,
            'price' => 247.80,
            'stock' => 20,
            'short_detail' => "Lenovo Tab M10 Plus Gen3",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Lenovo</li>
                <li><strong>Tamaño pantalla:&nbsp;</strong>10.6\"</li>
                <li><strong>Tipo de panel:&nbsp;</strong>LCD</li>

                <li><strong>Resolución:&nbsp;</strong>2000 x 1200</li>
                <li><strong>Color:&nbsp;</strong>Gris</li>
                <li><strong>Conexión:&nbsp;</strong>micro USB-C</li>
                <li><strong>Conectividad:&nbsp;</strong>Wifi, Bluetooth</li>
                <li><strong>Procesador:&nbsp;</strong>Mediatek Helio G80</li>
                <li><strong>Memoria RAM:&nbsp;</strong>4GB</li>
                <li><strong>Almacenamiento:&nbsp;</strong>128GB</li>
                <li><strong>Cámara frontal:&nbsp;</strong>8MP</li>
                <li><strong>Cámara trasera:&nbsp;</strong>8MP</li>
                <li><strong>Batería:&nbsp;</strong>Litio 7500mAh</li>
                <li><strong>Dimensiones:&nbsp;</strong>251 X 158.8 X 7.45 mm.</li>
                <li><strong>Peso:&nbsp;</strong>465g.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'tecnology/tablets/lenovo_tab_m10/lenovo_tab_m10.webp',
        ]);
        //Product ID: 124
        $product[] = Product::create([
            'name' => "Samsung Galaxy Tab S6",
            'slug' => Str::slug("Samsung Galaxy Tab S6"),
            'status' => 1,
            'category_id' => 6,
            'subcategory_id' => 57,
            'price' => 247.80,
            'stock' => 20,
            'short_detail' => "Samsung Galaxy Tab S6 Lite",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Samsung</li>
                <li><strong>Tamaño pantalla:&nbsp;</strong>10.4\"</li>
                <li><strong>Tipo de panel:&nbsp;</strong>LCD</li>

                <li><strong>Resolución:&nbsp;</strong>2000 x 1200</li>
                <li><strong>Color:&nbsp;</strong>Azul</li>
                <li><strong>Conexión:&nbsp;</strong>micro USB-C</li>
                <li><strong>Conectividad:&nbsp;</strong>Wifi, Bluetooth</li>
                <li><strong>Procesador:&nbsp;</strong>Qualcomm Snapdragon 720G</li>
                <li><strong>Memoria RAM:&nbsp;</strong>4GB</li>
                <li><strong>Almacenamiento:&nbsp;</strong>64GB</li>
                <li><strong>Cámara frontal:&nbsp;</strong>5MP</li>
                <li><strong>Cámara trasera:&nbsp;</strong>8MP</li>
                <li><strong>Batería:&nbsp;</strong>Litio 7500mAh</li>
                <li><strong>Dimensiones:&nbsp;</strong>253 X 162 X 0.9 cm.</li>
                <li><strong>Peso:&nbsp;</strong>467g.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'tecnology/tablets/samsung_galaxy_tab_s6/samsung_galaxy_tab_s6.jpg',
        ]);
        //Product ID: 125
        $product[] = Product::create([
            'name' => "Alcatel 1T 7",
            'slug' => Str::slug("Alcatel 1T 7"),
            'status' => 1,
            'category_id' => 6,
            'subcategory_id' => 57,
            'price' => 247.80,
            'stock' => 20,
            'short_detail' => "Alcatel 1T 7",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Alcatel</li>
                <li><strong>Tamaño pantalla:&nbsp;</strong>7\"</li>
                <li><strong>Tipo de panel:&nbsp;</strong>LCD</li>

                <li><strong>Resolución:&nbsp;</strong>1024 x 600</li>
                <li><strong>Color:&nbsp;</strong>Verde</li>
                <li><strong>Conexión:&nbsp;</strong>micro USB</li>
                <li><strong>Conectividad:&nbsp;</strong>Wifi, Bluetooth</li>
                <li><strong>Procesador:&nbsp;</strong>Qualcomm MT8167</li>
                <li><strong>Memoria RAM:&nbsp;</strong>1GB</li>
                <li><strong>Almacenamiento:&nbsp;</strong>16GB</li>
                <li><strong>Cámara frontal:&nbsp;</strong>2MP</li>
                <li><strong>Cámara trasera:&nbsp;</strong>2MP</li>
                <li><strong>Batería:&nbsp;</strong>Litio 2580mAh</li>
                <li><strong>Dimensiones:&nbsp;</strong>18.9 X 11.1 X 0.91 cm.</li>
                <li><strong>Peso:&nbsp;</strong>250g.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'tecnology/tablets/alcatel_1t/alcatel_1t.jpg',
        ]);
        //Product ID: 126
        $product[] = Product::create([
            'name' => "Xiaomi Redmi Note 11",
            'slug' => Str::slug("Xiaomi Redmi Note 11"),
            'status' => 1,
            'category_id' => 6,
            'subcategory_id' => 56,
            'price' => 201,
            'stock' => 20,
            'short_detail' => "Xiaomi Redmi Note 11, Gris",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Xiaomi</li>
                <li><strong>Tamaño pantalla:&nbsp;</strong>6.43\"</li>
                <li><strong>Tipo de panel:&nbsp;</strong>AMOLED</li>

                <li><strong>Resolución:&nbsp;</strong>2400 x 1080</li>
                <li><strong>Color:&nbsp;</strong>Gris</li>
                <li><strong>Conexión:&nbsp;</strong>micro USB-C</li>
                <li><strong>Conectividad:&nbsp;</strong>Wifi, Bluetooth, NFC, Infrarrojo</li>
                <li><strong>Sistema operativo:&nbsp;</strong>MIUI 13</li>
                <li><strong>Procesador:&nbsp;</strong>Mediatek Helio G96</li>
                <li><strong>Gráfica:&nbsp;</strong>ARM Mali-G57 MC2</li>
                <li><strong>Memoria RAM:&nbsp;</strong>6GB</li>
                <li><strong>Almacenamiento:&nbsp;</strong>128GB</li>
                <li><strong>Cámara frontal:&nbsp;</strong>16MP</li>
                <li><strong>Cámara trasera:&nbsp;</strong>50MP</li>
                <li><strong>Batería:&nbsp;</strong>Litio 5000mAh</li>
                <li><strong>Dimensiones:&nbsp;</strong>15.98 X 7.38 X 0.81 cm.</li>
                <li><strong>Peso:&nbsp;</strong>179g.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'tecnology/smartphones/xiaomi_redmi_note_11/xiaomi_redmi_note_11.jpg',
        ]);
        //Product ID: 127
        $product[] = Product::create([
            'name' => "Apple iPhone 13",
            'slug' => Str::slug("Apple iPhone 13"),
            'status' => 1,
            'category_id' => 6,
            'subcategory_id' => 56,
            'price' => 929,
            'stock' => 10,
            'short_detail' => "Apple iPhone 13, Azul, 5G",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Apple</li>
                <li><strong>Tamaño pantalla:&nbsp;</strong>6.1\"</li>
                <li><strong>Tipo de panel:&nbsp;</strong>OLED</li>

                <li><strong>Resolución:&nbsp;</strong>2532 x 1170</li>
                <li><strong>Color:&nbsp;</strong>Azul</li>
                <li><strong>Conexión:&nbsp;</strong>micro USB-C</li>
                <li><strong>Conectividad:&nbsp;</strong>Wifi, Bluetooth, NFC, Infrarrojo</li>
                <li><strong>Sistema operativo:&nbsp;</strong>iOS 15</li>
                <li><strong>Procesador:&nbsp;</strong>Chip A15 Bionic</li>
                <li><strong>Gráfica:&nbsp;</strong>GPU 4 núcleos</li>
                <li><strong>Memoria RAM:&nbsp;</strong>4GB</li>
                <li><strong>Almacenamiento:&nbsp;</strong>128GB</li>
                <li><strong>Cámara frontal:&nbsp;</strong>12MP</li>
                <li><strong>Cámara trasera:&nbsp;</strong>12MP</li>
                <li><strong>Batería:&nbsp;</strong>Litio 3227mAh</li>
                <li><strong>Otras características:&nbsp;</strong>IP68 Resistente al agua</li>
                <li><strong>Dimensiones:&nbsp;</strong>146 X 71.5 X 7.6 mm.</li>
                <li><strong>Peso:&nbsp;</strong>173g.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'tecnology/smartphones/iphone13/iphone13.jpg',
        ]);
        //Product ID: 128
        $product[] = Product::create([
            'name' => "Samsung Galaxy A13",
            'slug' => Str::slug("Samsung Galaxy A13"),
            'status' => 1,
            'category_id' => 6,
            'subcategory_id' => 56,
            'price' => 224,
            'stock' => 10,
            'short_detail' => "Samsung Galaxy A13, Azul claro",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Samsung</li>
                <li><strong>Tamaño pantalla:&nbsp;</strong>6.6\"</li>
                <li><strong>Tipo de panel:&nbsp;</strong>LCD</li>

                <li><strong>Resolución:&nbsp;</strong>2240 x 1080</li>
                <li><strong>Color:&nbsp;</strong>Azul claro</li>
                <li><strong>Conexión:&nbsp;</strong>micro USB-C</li>
                <li><strong>Conectividad:&nbsp;</strong>Wifi, Bluetooth, NFC, Infrarrojo</li>
                <li><strong>Sistema operativo:&nbsp;</strong>Android 12</li>
                <li><strong>Procesador:&nbsp;</strong>Exynos 850</li>
                <li><strong>Gráfica:&nbsp;</strong>ARM Mali-G52</li>
                <li><strong>Memoria RAM:&nbsp;</strong>4GB</li>
                <li><strong>Almacenamiento:&nbsp;</strong>128GB</li>
                <li><strong>Cámara frontal:&nbsp;</strong>8MP</li>
                <li><strong>Cámara trasera:&nbsp;</strong>50MP</li>
                <li><strong>Batería:&nbsp;</strong>Litio 5000mAh</li>
                
                <li><strong>Dimensiones:&nbsp;</strong>165 X 764 X 88 mm.</li>
                <li><strong>Peso:&nbsp;</strong>195g.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'tecnology/smartphones/samsung_galaxy_a13/samsung_galaxy_a13.jpg',
        ]);
        //Product ID: 129
        $product[] = Product::create([
            'name' => "Oppo A17",
            'slug' => Str::slug("Oppo A17"),
            'status' => 1,
            'category_id' => 6,
            'subcategory_id' => 56,
            'price' => 203,
            'stock' => 10,
            'short_detail' => "Oppo A17, Negro",
            'detail' =>"<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Oppo</li>
                <li><strong>Tamaño pantalla:&nbsp;</strong>6.52\"</li>
                <li><strong>Tipo de panel:&nbsp;</strong>LCD</li>

                <li><strong>Resolución:&nbsp;</strong>1612 x 720</li>
                <li><strong>Color:&nbsp;</strong>Negro</li>
                <li><strong>Conexión:&nbsp;</strong>micro USB-C</li>
                <li><strong>Conectividad:&nbsp;</strong>Wifi, Bluetooth, NFC, Infrarrojo</li>
                <li><strong>Sistema operativo:&nbsp;</strong>Android 12</li>
                <li><strong>Procesador:&nbsp;</strong>Mediatek MT6765 Helio G35</li>
                <li><strong>Gráfica:&nbsp;</strong>PowerVR GE8320</li>
                <li><strong>Memoria RAM:&nbsp;</strong>4GB</li>
                <li><strong>Almacenamiento:&nbsp;</strong>64GB</li>
                <li><strong>Cámara frontal:&nbsp;</strong>8MP</li>
                <li><strong>Cámara trasera:&nbsp;</strong>50MP</li>
                <li><strong>Batería:&nbsp;</strong>Litio 5000mAh</li>
                <li><strong>Dimensiones:&nbsp;</strong>164 X 756 X 83 mm.</li>
                <li><strong>Peso:&nbsp;</strong>189g.</li>
            </ul>",
            'path_tag' => '/images/products/',
            'image' => 'tecnology/smartphones/oppo_a17/oppo_a17.jpg',
        ]);
        //Product ID: 130
        $product[] = Product::create([
            'name' => 'Blusa original tee',
            'slug' => Str::slug('Blusa original tee'),
            'status' => 1,
            'category_id' => 1,
            'subcategory_id' => 35,
            'price' => 17.98,
            'stock' => 30,
            'short_detail' => 'Blusa manga larga',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>NUSGEAR</li>                                
                <li><strong>Diseño:&nbsp;</strong>Fiesta, elástico</li>
                <li><strong>Cierre:&nbsp;</strong>Pull-on</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_women/blouse/blouse_original_tee/blouse_original_tee.jpg',
        ]);
        //Product ID: 131
        $product[] = Product::create([
            'name' => 'Blusa JDY Mio',
            'slug' => Str::slug('Blusa JDY Mio'),
            'status' => 1,
            'category_id' => 1,
            'subcategory_id' => 35,
            'price' => 24.33,
            'stock' => 30,
            'short_detail' => 'Blusa JDY Mio para mujer',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>JDY</li> 

                <li><strong>Diseño:&nbsp;</strong>Elegante, elástico</li>
                <li><strong>Cierre:&nbsp;</strong>Botón</li>
                <li><strong>Material:&nbsp;</strong>72% Algodón, 24% Poliéster, 4% Elastano</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_women/blouse/blouse_JDY_Mio/blouse_JDY_Mio.jpg',
        ]);
        //Product ID: 132
        $product[] = Product::create([
            'name' => 'Blusa Grebrafan Steampunk',
            'slug' => Str::slug('Blusa Grebrafan Steampunk'),
            'status' => 1,
            'category_id' => 1,
            'subcategory_id' => 35,
            'price' => 18.99,
            'stock' => 30,
            'short_detail' => 'Blusa Grebrafan Steampunk',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Grebrafan</li> 

                <li><strong>Diseño:&nbsp;</strong>Blusa top, hombros descubiertos</li>
                <li><strong>Cierre:&nbsp;</strong>Pull-on</li>
                <li><strong>Material:&nbsp;</strong>90% Algodón, 10% Elastano</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_women/blouse/blouse_grebrafan_steampunk/blouse_grebrafan_steampunk.jpg',
        ]);
        //Product ID: 133
        $product[] = Product::create([
            'name' => 'Blusa Grace Karin',
            'slug' => Str::slug('Blusa Grace Karin'),
            'status' => 1,
            'category_id' => 1,
            'subcategory_id' => 35,
            'price' => 22.99,
            'stock' => 30,
            'short_detail' => 'Blusa Grace Karin, sin mangas',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Grace Karin</li> 

                <li><strong>Diseño:&nbsp;</strong>Blusa sin mangas, cuello de solapa</li>
                <li><strong>Cierre:&nbsp;</strong>Pull-on</li>
                <li><strong>Material:&nbsp;</strong>98% Algodón, 2% Viscosa</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_women/blouse/blouse_grace_karin/blouse_grace_karin.jpg',
        ]);
        //Product ID: 134
        $product[] = Product::create([
            'name' => 'Leggings Puma Individualliga',
            'slug' => Str::slug('Leggings Puma Individualliga'),
            'status' => 1,
            'category_id' => 1,
            'subcategory_id' => 36,
            'price' => 37,
            'stock' => 10,
            'short_detail' => 'Leggings elásticos para mujer',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Puma</li>
                <li><strong>Material:&nbsp;</strong>70% Poliéster, 30% Elastano</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_women/leggings/puma_individualliga/puma_individualliga.jpg',
        ]);
        //Product ID: 135
        $product[] = Product::create([
            'name' => 'Leggings Urban Classic Dark Camo',
            'slug' => Str::slug('Leggings Urban Classic Dark Camo'),
            'status' => 1,
            'category_id' => 1,
            'subcategory_id' => 36,
            'price' => 22,
            'stock' => 10,
            'short_detail' => 'Leggings Camo',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Urban Classic</li>
                <li><strong>Material:&nbsp;</strong>91% Algodón, 9% Elastano</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_women/leggings/urban_classic_dark_camo/urban_classic_dark_camo.jpg',
        ]);
        //Product ID: 136
        $product[] = Product::create([
            'name' => 'Leggings Urban Classic Snow Camo',
            'slug' => Str::slug('Leggings Urban Classic Snow Camo'),
            'status' => 1,
            'category_id' => 1,
            'subcategory_id' => 36,
            'price' => 22,
            'stock' => 10,
            'short_detail' => 'Leggings Camo',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Urban Classic</li>
                <li><strong>Material:&nbsp;</strong>91% Algodón, 9% Elastano</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_women/leggings/urban_classic_snow_camo/urban_classic_snow_camo.jpg',
        ]);
        //Product ID: 137
        $product[] = Product::create([
            'name' => 'Leggings Urban Classic Red Camo',
            'slug' => Str::slug('Leggings Urban Classic Red Camo'),
            'status' => 1,
            'category_id' => 1,
            'subcategory_id' => 36,
            'price' => 22,
            'stock' => 10,
            'short_detail' => 'Leggings Camo',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Urban Classic</li>
                <li><strong>Material:&nbsp;</strong>91% Algodón, 9% Elastano</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_women/leggings/urban_classic_red_camo/urban_classic_red_camo.jpg',
        ]);
        //Product ID: 138
        $product[] = Product::create([
            'name' => 'Leggings Urban Classic Wood Camo',
            'slug' => Str::slug('Leggings Urban Classic Wood Camo'),
            'status' => 1,
            'category_id' => 1,
            'subcategory_id' => 36,
            'price' => 22,
            'stock' => 10,
            'short_detail' => 'Leggings Camo',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Urban Classic</li>
                <li><strong>Material:&nbsp;</strong>91% Algodón, 9% Elastano</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_women/leggings/urban_classic_wood_camo/urban_classic_wood_camo.jpg',
        ]);
        //Product ID: 139
        $product[] = Product::create([
            'name' => 'Leggings Puma ESS',
            'slug' => Str::slug('Leggings Puma ESS'),
            'status' => 1,
            'category_id' => 1,
            'subcategory_id' => 36,
            'price' => 25,
            'stock' => 18,
            'short_detail' => 'Mallas deportivas',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Puma</li>
                <li><strong>Material:&nbsp;</strong>95% Algodón, 5% Elastano</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_women/leggings/puma_ess/puma_ess.jpg',
        ]);
        //Product ID: 140
        $product[] = Product::create([
            'name' => 'Leggings Everbellus',
            'slug' => Str::slug('Leggings Everbellus'),
            'status' => 1,
            'category_id' => 1,
            'subcategory_id' => 36,
            'price' => 37,
            'stock' => 10,
            'short_detail' => 'Leggings imitación cuero, con bolsillo',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Everbellus</li>
                <li><strong>Material:&nbsp;</strong>85% Poliéster, 10% Pu, 5% Elastano</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_women/leggings/everbellus_cuero/everbellus_cuero.jpg',
        ]);
        //Product ID: 141
        $product[] = Product::create([
            'name' => 'Leggings Reebook Identity',
            'slug' => Str::slug('Leggings Reebook Identity'),
            'status' => 1,
            'category_id' => 1,
            'subcategory_id' => 36,
            'price' => 37,
            'stock' => 10,
            'short_detail' => 'Mallas de mujer',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Reebook</li>
                <li><strong>Material:&nbsp;</strong>93% Poliéster, 7% Elastano</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_women/leggings/reebook_identity/reebook_identity.jpg',
        ]);
        //Product ID: 142
        $product[] = Product::create([
            'name' => 'Falda GoCo Patinadora',
            'slug' => Str::slug('Falda GoCo Patinadora'),
            'status' => 1,
            'category_id' => 1,
            'subcategory_id' => 37,
            'price' => 27.99,
            'stock' => 120,
            'short_detail' => 'Falda corta, elástica',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Urban GoCo</li>
                <li><strong>Material:&nbsp;</strong>95% Poliéster, 5% Spandex</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_women/skirt/urban_goco_patinadora/urban_goco_patinadora.jpg',
        ]);
        //Product ID: 143
        $product[] = Product::create([
            'name' => 'Falda Pepe Jeans Nikita',
            'slug' => Str::slug('Falda Pepe Jeans Nikita'),
            'status' => 1,
            'category_id' => 1,
            'subcategory_id' => 37,
            'price' => 49.26,
            'stock' => 10,
            'short_detail' => 'Falda vaquera',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Pepe Jeans</li>                
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_women/skirt/pepe_jeans_nikita/pepe_jeans_nikita.jpg',
        ]);
        //Product ID: 144
        $product[] = Product::create([
            'name' => 'Falda Urban GoCo Midi Bodycon',
            'slug' => Str::slug('Falda Urban GoCo Midi Bodycon'),
            'status' => 1,
            'category_id' => 1,
            'subcategory_id' => 37,
            'price' => 36,
            'stock' => 64,
            'short_detail' => 'Falda recta, cintura alta',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Urban GoCo</li>
                <li><strong>Material:&nbsp;</strong>70% Viscosa, 25% Poliamida, 5% Elastano</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_women/skirt/urban_goco_midi_bodycon/urban_goco_midi_bodycon.jpg',
        ]);
        //Product ID: 145
        $product[] = Product::create([
            'name' => 'Falda Shein',
            'slug' => Str::slug('Falda Shein'),
            'status' => 1,
            'category_id' => 1,
            'subcategory_id' => 37,
            'price' => 38.99,
            'stock' => 20,
            'short_detail' => 'Falda ajustada, con volantes',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Shein</li>
                <li><strong>Material:&nbsp;</strong>93% Poliéster, 7% Elastano</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_women/skirt/shein_skirt/shein_skirt.jpg',
        ]);
        //Product ID: 146
        $product[] = Product::create([
            'name' => 'Mueble TV BRIMNES',
            'slug' => Str::slug('Mueble TV BRIMNES'),
            'status' => 1,
            'category_id' => 3,
            'subcategory_id' => 44,
            'price' => 159.99,
            'stock' => 30,
            'short_detail' => 'Mueble TV',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Brimnes</li>
                <li><strong>Material:&nbsp;</strong>Tablero de partículas, lámina de papel</li>
                <li><strong>Dimensiones:&nbsp;</strong>120 X 41 X 53 cm.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'home/furniture/brimnes_mueble_tv/brimnes_mueble_tv.avif',
        ]);
        //Product ID: 147
        $product[] = Product::create([
            'name' => 'Mueble TV MALM',
            'slug' => Str::slug('Mueble TV MALM'),
            'status' => 1,
            'category_id' => 3,
            'subcategory_id' => 44,
            'price' => 258,
            'stock' => 10,
            'short_detail' => 'Mueble TV',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Brimnes</li>
                <li><strong>Material:&nbsp;</strong>Tablero de partículas, lámina de papel</li>
                <li><strong>Dimensiones:&nbsp;</strong>160 X 48 cm.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'home/furniture/malm_mueble_tv/malm_mueble_tv.avif',
        ]);
        //Product ID: 148
        $product[] = Product::create([
            'name' => 'Mueble TV Habitdesign',
            'slug' => Str::slug('Mueble TV Habitdesign'),
            'status' => 1,
            'category_id' => 3,
            'subcategory_id' => 44,
            'price' => 258,
            'stock' => 10,
            'short_detail' => 'Mueble TV Salón Moderno',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Habitdesign</li>
                <li><strong>Material:&nbsp;</strong>Madera</li>
                <li><strong>Color:&nbsp;</strong>Blanco brillo y Roble Canadian</li>
                <li><strong>Dimensiones:&nbsp;</strong>200 X 41 X 46 cm.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'home/furniture/mueble_tv_habitdesign/mueble_tv_habitdesign.jpg',
        ]);
        //Product ID: 149
        $product[] = Product::create([
            'name' => 'Armario Habitdesign MAX020BO',
            'slug' => Str::slug('Armario Habitdesign MAX020BO'),
            'status' => 1,
            'category_id' => 3,
            'subcategory_id' => 44,
            'price' => 232,
            'stock' => 10,
            'short_detail' => 'Armario Habitdesign, 2 puertas correderas',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Habitdesign</li>
                <li><strong>Material:&nbsp;</strong>Madera</li>
                <li><strong>Color:&nbsp;</strong>Blanco</li>
                <li><strong>Dimensiones:&nbsp;</strong>120 X 50 X 200 cm.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'home/furniture/armario_habitdesign_max020BO/armario_habitdesign_max020BO.jpg',
        ]);
        //Product ID: 150
        $product[] = Product::create([
            'name' => 'Escritorio Comifort Montgo Stone',
            'slug' => Str::slug('Escritorio Comifort Montgo Stone'),
            'status' => 1,
            'category_id' => 3,
            'subcategory_id' => 44,
            'price' => 190.90,
            'stock' => 10,
            'short_detail' => 'Escritorio juvenil, 2 cajones, 5 estantes y bandeja teclado',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Comifort</li>
                <li><strong>Material:&nbsp;</strong>Madera</li>
                <li><strong>Color:&nbsp;</strong>Gris</li>
                <li><strong>Dimensiones:&nbsp;</strong>115 X 55 X 76 cm.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'home/furniture/escritorio_comifort_montgo_stone/escritorio_comifort_montgo_stone.jpg',
        ]);
        //Product ID: 151
        $product[] = Product::create([
            'name' => 'Escritorio Comifort Montgo Wengue',
            'slug' => Str::slug('Escritorio Comifort Montgo Wengue'),
            'status' => 1,
            'category_id' => 3,
            'subcategory_id' => 44,
            'price' => 141.90,
            'stock' => 10,
            'short_detail' => 'Escritorio juvenil, 2 cajones, 5 estantes y bandeja teclado',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Comifort</li>
                <li><strong>Material:&nbsp;</strong>Madera</li>
                <li><strong>Color:&nbsp;</strong>Wengue</li>
                <li><strong>Dimensiones:&nbsp;</strong>115 X 55 X 76 cm.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'home/furniture/escritorio_comifort_montgo_wengue/escritorio_comifort_montgo_wengue.jpg',
        ]);
        //Product ID: 152
        $product[] = Product::create([
            'name' => 'Cafetera Cecotec Espresso 20',
            'slug' => Str::slug('Cafetera Cecotec Espresso 20'),
            'status' => 1,
            'category_id' => 3,
            'subcategory_id' => 45,
            'price' => 82,
            'stock' => 10,
            'short_detail' => 'Cafetera Cecotec Express Manual',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Cecotec</li>
                
                <li><strong>Color:&nbsp;</strong>Negro y Acero inoxidable</li>
                <li><strong>Potencia:&nbsp;</strong>850W, presión 20 Bares</li>
                <li><strong>Deposito:&nbsp;</strong>1,5L</li>
                <li><strong>Dimensiones:&nbsp;</strong>26 X 32 X 32 cm.</li>
                <li><strong>Peso:&nbsp;</strong>3.58 Kg.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'home/small_appliance/cecotec_espresso20/cecotec_espresso20.jpg',
        ]);
        //Product ID: 153
        $product[] = Product::create([
            'name' => 'Cafetera Swan Retro One Touch SK22150GN',
            'slug' => Str::slug('Cafetera Swan Retro One Touch SK22150GN'),
            'status' => 1,
            'category_id' => 3,
            'subcategory_id' => 45,
            'price' => 175,
            'stock' => 10,
            'short_detail' => 'Cafetera Retro Semiautomática',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Swan</li>
                <li><strong>Color:&nbsp;</strong>Verde</li>
                <li><strong>Potencia:&nbsp;</strong>1200W, presión 15 Bares</li>
                <li><strong>Deposito:&nbsp;</strong>1,7L</li>
                <li><strong>Dimensiones:&nbsp;</strong>30 X 22.5 X 35 cm.</li>
                <li><strong>Peso:&nbsp;</strong>7.36 Kg.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'home/small_appliance/cecotec_espresso20/cecotec_espresso20.jpg',
        ]);
        //Product ID: 154
        $product[] = Product::create([
            'name' => 'Cafetera Nescafe Dolce Gusto KP123B',
            'slug' => Str::slug('Cafetera Nescafe Dolce Gusto KP123B'),
            'status' => 1,
            'category_id' => 3,
            'subcategory_id' => 45,
            'price' => 77.90,
            'stock' => 10,
            'short_detail' => 'Cafetera Expresso de cápsulas',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Krups</li>
                <li><strong>Color:&nbsp;</strong>Acero</li>
                <li><strong>Potencia:&nbsp;</strong>1500W, presión 15 Bares</li>
                <li><strong>Deposito:&nbsp;</strong>0,8L</li>
                <li><strong>Dimensiones:&nbsp;</strong>7.6 X 11.3 X 14.3 cm.</li>
                <li><strong>Peso:&nbsp;</strong>2.40 Kg.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'home/small_appliance/nescafe_dolcegusto_kp123b/nescafe_dolcegusto_kp123b.jpg',
        ]);
        //Product ID: 155
        $product[] = Product::create([
            'name' => 'Cafetera Solac Espresso CE4497',
            'slug' => Str::slug('Cafetera Solac Espresso CE4497'),
            'status' => 1,
            'category_id' => 3,
            'subcategory_id' => 45,
            'price' => 135,
            'stock' => 10,
            'short_detail' => 'Cafetera Expresso Multi',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Solac</li>
                <li><strong>Color:&nbsp;</strong>Blanco</li>
                <li><strong>Potencia:&nbsp;</strong>850W, presión 20 Bares</li>
                <li><strong>Deposito:&nbsp;</strong>1,2L</li>
                <li><strong>Dimensiones:&nbsp;</strong>36.6 X 33.8 X 31.4 cm.</li>
                <li><strong>Peso:&nbsp;</strong>4.60 Kg.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'home/small_appliance/solac_espresso_ce4497/solac_espresso_ce4497.jpg',
        ]);
        //Product ID: 156
        $product[] = Product::create([
            'name' => 'Estor Blindecor Ara',
            'slug' => Str::slug('Estor Blindecor Ara'),
            'status' => 1,
            'category_id' => 3,
            'subcategory_id' => 46,
            'price' => 135,
            'stock' => 10,
            'short_detail' => 'Estor Enrollable translúcido',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Blindecor</li>
                <li><strong>Color:&nbsp;</strong>Blanco</li>                
                <li><strong>Dimensiones:&nbsp;</strong>160 X 175 cm.</li>                
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'home/decor/blindecor_ara/blindecor_ara.jpg',
        ]);
        //Product ID: 157
        $product[] = Product::create([
            'name' => 'Jarrón Koomuao',
            'slug' => Str::slug('Jarrón Koomuao'),
            'status' => 1,
            'category_id' => 3,
            'subcategory_id' => 46,
            'price' => 22,
            'stock' => 40,
            'short_detail' => 'Jarrón florero',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Koomuao</li>
                <li><strong>Color:&nbsp;</strong>Beige</li>
                <li><strong>Material:&nbsp;</strong>Cerámica</li>
                <li><strong>Dimensiones:&nbsp;</strong>145 X 4 X 21.5 cm.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'home/decor/koomuao/koomuao.jpg',
        ]);
        //Product ID: 158
        $product[] = Product::create([
            'name' => 'Paragüero Baroni Home',
            'slug' => Str::slug('Paragüero Baroni Home'),
            'status' => 1,
            'category_id' => 3,
            'subcategory_id' => 46,
            'price' => 37,
            'stock' => 10,
            'short_detail' => 'Paragüero rectangular de mariposas',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Baroni Home</li>
                <li><strong>Color:&nbsp;</strong>Negro</li>
                <li><strong>Material:&nbsp;</strong>Metal</li>
                <li><strong>Dimensiones:&nbsp;</strong>15 X 15 X 49 cm.</li>
                <li><strong>Peso:&nbsp;</strong>2.2 Kg.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'home/decor/baroni_home/baroni_home.jpg',
        ]);
        //Product ID: 159
        $product[] = Product::create([
            'name' => 'Cuadro Picanova Montañas',
            'slug' => Str::slug('Cuadro Picanova Montañas'),
            'status' => 1,
            'category_id' => 3,
            'subcategory_id' => 46,
            'price' => 65,
            'stock' => 10,
            'short_detail' => 'Cuadro sobre lienzo, lago y montañas sobre marco de madera',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Picanova</li>
                <li><strong>Estilo:&nbsp;</strong>Moderno</li>
                <li><strong>Material:&nbsp;</strong>Lino y madera</li>
                <li><strong>Dimensiones:&nbsp;</strong>120 X 80 X 2 cm.</li>
                <li><strong>Peso:&nbsp;</strong>300 g.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'home/decor/picanova_cuadro_montanas/picanova_cuadro_montanas.jpg',
        ]);
        //Product ID: 160
        $product[] = Product::create([
            'name' => 'Anorak Columbia Powder Lite',
            'slug' => Str::slug('Anorak Columbia Powder Lite'),
            'status' => 1,
            'category_id' => 8,
            'subcategory_id' => 64,
            'price' => 65,
            'stock' => 100,
            'short_detail' => 'Anorak con capucha para niños, resistente al agua',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Columbia</li>
                <li><strong>Estilo:&nbsp;</strong>Moderno, reflectante</li>
                <li><strong>Material:&nbsp;</strong>100% Poliéster</li>                
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_children/anorak/columbia_powder_lite/columbia_powder_lite.jpg',
        ]);
        //Product ID: 161
        $product[] = Product::create([
            'name' => 'Chaqueta Pepe Jeans Gilford',
            'slug' => Str::slug('Chaqueta Pepe Jeans Gilford'),
            'status' => 1,
            'category_id' => 8,
            'subcategory_id' => 64,
            'price' => 54,
            'stock' => 30,
            'short_detail' => 'Chaqueta para niños',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Pepe Jeans</li>
                <li><strong>Estilo:&nbsp;</strong>Polar, Beige</li>
                <li><strong>Material:&nbsp;</strong>100% Poliéster</li>                
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_children/anorak/pepejeans_gilford/pepejeans_gilford.jpg',
        ]);
        //Product ID: 162
        $product[] = Product::create([
            'name' => 'Abrigo Mayoral Niños',
            'slug' => Str::slug('Abrigo Mayoral Niños'),
            'status' => 1,
            'category_id' => 8,
            'subcategory_id' => 64,
            'price' => 85.70,
            'stock' => 40,
            'short_detail' => 'Abrigo Mayoral Niños',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Mayoral</li>
                <li><strong>Estilo:&nbsp;</strong>Acolchado</li>
                <li><strong>Material:&nbsp;</strong>100% Poliamida</li>                
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_children/anorak/mayoral_children/mayoral_children.jpg',
        ]);
        //Product ID: 163
        $product[] = Product::create([
            'name' => 'Abrigo Chicco',
            'slug' => Str::slug('Abrigo Chicco'),
            'status' => 1,
            'category_id' => 8,
            'subcategory_id' => 64,
            'price' => 80.99,
            'stock' => 10,
            'short_detail' => 'Abrigo Chicco con capucha para niños',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Chicco</li>
                <li><strong>Color:&nbsp;</strong>Negro</li>
                <li><strong>Material:&nbsp;</strong>100% Poliéster</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_children/anorak/chicco_children/chicco_children.jpg',
        ]);
        //Product ID: 164
        $product[] = Product::create([
            'name' => 'Camiseta Pepe Jeans New Herman',
            'slug' => Str::slug('Camiseta Pepe Jeans New Herman'),
            'status' => 1,
            'category_id' => 8,
            'subcategory_id' => 65,
            'price' => 18,
            'stock' => 150,
            'short_detail' => 'Camiseta Pepe Jeans para niños',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Pepe Jeans</li>                
                <li><strong>Material:&nbsp;</strong>100% Algodón</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_children/t_shirt/pepejeans_new_herman/pepejeans_new_herman.jpg',
        ]);
        //Product ID: 165
        $product[] = Product::create([
            'name' => 'Camiseta Marvel',
            'slug' => Str::slug('Camiseta Marvel'),
            'status' => 1,
            'category_id' => 8,
            'subcategory_id' => 65,
            'price' => 17.20,
            'stock' => 80,
            'short_detail' => 'Camiseta Marvel para niños',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Marvel</li>                
                <li><strong>Material:&nbsp;</strong>100% Algodón</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_children/t_shirt/marvel_children/marvel_children.jpg',
        ]);
        //Product ID: 166
        $product[] = Product::create([
            'name' => 'Camiseta Adidas Ent22',
            'slug' => Str::slug('Camiseta Adidas Ent22'),
            'status' => 1,
            'category_id' => 8,
            'subcategory_id' => 65,
            'price' => 17.80,
            'stock' => 200,
            'short_detail' => 'Camiseta Adidas manga corta, unisex para niños',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Adidas</li>                
                <li><strong>Material:&nbsp;</strong>100% Algodón</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_children/t_shirt/marvel_children/marvel_children.jpg',
        ]);
        //Product ID: 167
        $product[] = Product::create([
            'name' => 'Pijama TEDD Dinosaurios',
            'slug' => Str::slug('Pijama TEDD Dinosaurios'),
            'status' => 1,
            'category_id' => 8,
            'subcategory_id' => 66,
            'price' => 18.99,
            'stock' => 160,
            'short_detail' => 'Pijama para niños de dinosaurio',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>TEDD</li>                
                <li><strong>Material:&nbsp;</strong>100% Algodón</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_children/pijama/tedd_children_dinosaurio/tedd_children_dinosaurio.jpg',
        ]);
        //Product ID: 168
        $product[] = Product::create([
            'name' => 'Pijama Disney Cars',
            'slug' => Str::slug('Pijama Disney Cars'),
            'status' => 1,
            'category_id' => 8,
            'subcategory_id' => 66,
            'price' => 25.95,
            'stock' => 35,
            'short_detail' => 'Pijama para niños de Disney',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Disney</li>                
                <li><strong>Material:&nbsp;</strong>100% Algodón</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_children/pijama/disney_cars/disney_cars.jpg',
        ]);
        //Product ID: 169
        $product[] = Product::create([
            'name' => 'Pijama Paw Patrol',
            'slug' => Str::slug('Pijama Paw Patrol'),
            'status' => 1,
            'category_id' => 8,
            'subcategory_id' => 66,
            'price' => 25.95,
            'stock' => 35,
            'short_detail' => 'Pijama para niños de Patrulla Canina',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Paw Patrol</li>                
                <li><strong>Material:&nbsp;</strong>100% Algodón</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_children/pijama/paw_patrol/paw_patrol.jpg',
        ]);
        //Product ID: 170
        $product[] = Product::create([
            'name' => 'Pijama Marvel Spiderman',
            'slug' => Str::slug('Pijama Marvel Spiderman'),
            'status' => 1,
            'category_id' => 8,
            'subcategory_id' => 66,
            'price' => 26,
            'stock' => 35,
            'short_detail' => 'Pijama para niños de Spiderman',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Marvel</li>                
                <li><strong>Material:&nbsp;</strong>100% Algodón</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_children/pijama/marvel_spiderman/marvel_spiderman.jpg',
        ]);
        //Product ID: 171
        $product[] = Product::create([
            'name' => 'Bufanda United Colors of Benetton',
            'slug' => Str::slug('Bufanda United Colors of Benetton'),
            'status' => 1,
            'category_id' => 8,
            'subcategory_id' => 67,
            'price' => 27,
            'stock' => 40,
            'short_detail' => 'Bufanda United Colors of Benetton para niños',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Benetton Group</li>
                <li><strong>Material:&nbsp;</strong>100% Algodón</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_children/scarf/benetton_children/benetton_children.jpg',
        ]);
        //Product ID: 172
        $product[] = Product::create([
            'name' => 'Bufanda Pepe Jeans Huxley',
            'slug' => Str::slug('Bufanda Pepe Jeans Huxley'),
            'status' => 1,
            'category_id' => 8,
            'subcategory_id' => 67,
            'price' => 19.75,
            'stock' => 10,
            'short_detail' => 'Bufanda Pepe Jeans para niños',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Pepe Jeans</li>
                <li><strong>Material:&nbsp;</strong>100% Algodón</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_children/scarf/pepejeans_huxley/pepejeans_huxley.jpg',
        ]);
        //Product ID: 173
        $product[] = Product::create([
            'name' => 'Set Bufanda, Gorro y Guantes de Spiderman',
            'slug' => Str::slug('Set Bufanda, Gorro y Guantes de Spiderman'),
            'status' => 1,
            'category_id' => 8,
            'subcategory_id' => 67,
            'price' => 27.75,
            'stock' => 10,
            'short_detail' => 'Set Bufanda, Gorro y Guantes de Spiderman para niños',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Marvel</li>
                <li><strong>Material:&nbsp;</strong>100% Poliéster</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_children/scarf/set_marvel_spiderman/set_marvel_spiderman.jpg',
        ]);
        //Product ID: 174
        $product[] = Product::create([
            'name' => 'Set Bufanda, Gorro y Guantes de Patrulla Canina',
            'slug' => Str::slug('Set Bufanda, Gorro y Guantes de Patrulla Canina'),
            'status' => 1,
            'category_id' => 8,
            'subcategory_id' => 67,
            'price' => 27.75,
            'stock' => 10,
            'short_detail' => 'Set Bufanda, Gorro y Guantes de Patrulla Canina para niños',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Paw Patrol</li>
                <li><strong>Material:&nbsp;</strong>100% Acrílico</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_children/scarf/set_paw_patrol/set_paw_patrol.jpg',
        ]);
        //Product ID: 175
        $product[] = Product::create([
            'name' => 'Gorro CERDÁ Batman',
            'slug' => Str::slug('Gorro CERDÁ Batman'),
            'status' => 1,
            'category_id' => 8,
            'subcategory_id' => 68,
            'price' => 10,
            'stock' => 10,
            'short_detail' => 'Gorro Batman para niños',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>CERDÁ LIFE\'S</li>
                <li><strong>Material:&nbsp;</strong>100% Acrílico</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_children/hat/cerda_batman/cerda_batman.jpg',
        ]);
        //Product ID: 176
        $product[] = Product::create([
            'name' => 'Gorro DANISH ENDURANCE',
            'slug' => Str::slug('Gorro DANISH ENDURANCE'),
            'status' => 1,
            'category_id' => 8,
            'subcategory_id' => 68,
            'price' => 19.99,
            'stock' => 40,
            'short_detail' => 'Gorro DANISH ENDURANCE de lana',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>DANISH ENDURANCE</li>
                <li><strong>Material:&nbsp;</strong>50% Lana, 50% Poliéster</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_children/hat/danish_endurance_beanie/danish_endurance_beanie.jpg',
        ]);
        //Product ID: 177
        $product[] = Product::create([
            'name' => 'Gorra NIKE H86',
            'slug' => Str::slug('Gorra NIKE H86'),
            'status' => 1,
            'category_id' => 8,
            'subcategory_id' => 68,
            'price' => 19.99,
            'stock' => 10,
            'short_detail' => 'Gorra NIKE H86 Futura Unisex niños',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>NIKE</li>
                <li><strong>Material:&nbsp;</strong>100% Poliéster</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_children/hat/nike_h86/nike_h86.jpg',
        ]);
        //Product ID: 178
        $product[] = Product::create([
            'name' => 'Gorra Marvel Spiderman',
            'slug' => Str::slug('Gorra Marvel Spiderman'),
            'status' => 1,
            'category_id' => 8,
            'subcategory_id' => 68,
            'price' => 15,
            'stock' => 10,
            'short_detail' => 'Gorra Marvel Spiderman ajustable para niños',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Marvel</li>
                <li><strong>Material:&nbsp;</strong>100% Poliéster</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_children/hat/marvel_spiderman_cap/marvel_spiderman_cap.jpg',
        ]);
        //Product ID: 179
        $product[] = Product::create([
            'name' => 'Camiseta Joma Academy IV',
            'slug' => Str::slug('Camiseta Joma Academy IV'),
            'status' => 1,
            'category_id' => 12,
            'subcategory_id' => 79,
            'price' => 16.99,
            'stock' => 180,
            'short_detail' => 'Camiseta Joma Academy IV para mujer',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Joma</li>
                <li><strong>Material:&nbsp;</strong>100% Poliéster</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'sport/sport_clothes/joma_academiIV/joma_academiIV.jpg',
        ]);
        //Product ID: 180
        $product[] = Product::create([
            'name' => 'Camiseta Nike Tank Pure',
            'slug' => Str::slug('Camiseta Nike Tank Pure'),
            'status' => 1,
            'category_id' => 12,
            'subcategory_id' => 79,
            'price' => 42.60,
            'stock' => 120,
            'short_detail' => 'Camiseta Nike Tank Pure para mujer',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>NIKE</li>
                <li><strong>Material:&nbsp;</strong>100% Poliéster</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'sport/sport_clothes/nike_tank_pure/nike_tank_pure.jpg',
        ]);
        //Product ID: 181
        $product[] = Product::create([
            'name' => 'Bolsa de deporte Puma Challenger',
            'slug' => Str::slug('Bolsa de deporte Puma Challenger'),
            'status' => 1,
            'category_id' => 12,
            'subcategory_id' => 80,
            'price' => 26.40,
            'stock' => 10,
            'short_detail' => 'Bolsa de deporte Puma Challenger',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>PUMA</li>
                <li><strong>Material:&nbsp;</strong>100% Poliéster</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'sport/duffel_bag/puma_challenger/puma_challenger.jpg',
        ]);
        //Product ID: 182
        $product[] = Product::create([
            'name' => 'Bolsa de deporte Adidas Tiro Du S',
            'slug' => Str::slug('Bolsa de deporte Adidas Tiro Du S'),
            'status' => 1,
            'category_id' => 12,
            'subcategory_id' => 80,
            'price' => 36.40,
            'stock' => 10,
            'short_detail' => 'Bolsa de deporte Adidas, unisex',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Adidas</li>
                <li><strong>Color:&nbsp;</strong>Negro</li>
                <li><strong>Material:&nbsp;</strong>100% Poliéster</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'sport/duffel_bag/adidas_tiro_du_s/adidas_tiro_du_s.jpg',
        ]);
        //Product ID: 183
        $product[] = Product::create([
            'name' => 'Bolsa de deporte Nike Academy Team M sp21',
            'slug' => Str::slug('Bolsa de deporte Nike Academy Team M sp21'),
            'status' => 1,
            'category_id' => 12,
            'subcategory_id' => 80,
            'price' => 48.49,
            'stock' => 10,
            'short_detail' => 'Bolsa de deporte Nike, unisex',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>NIKE</li>
                <li><strong>Color:&nbsp;</strong>Azul</li>
                <li><strong>Material:&nbsp;</strong>100% Poliéster</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'sport/duffel_bag/nike_academyteam_sp21/nike_academyteam_sp21.jpg',
        ]);
        //Product ID: 184
        $product[] = Product::create([
            'name' => 'Bolsa de deporte Minecraft',
            'slug' => Str::slug('Bolsa de deporte Minecraft'),
            'status' => 1,
            'category_id' => 12,
            'subcategory_id' => 80,
            'price' => 28.49,
            'stock' => 10,
            'short_detail' => 'Bolsa de deporte Minecraft para niño',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Minecraft</li>
                <li><strong>Color:&nbsp;</strong>Verde</li>
                <li><strong>Material:&nbsp;</strong>100% Poliéster</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'sport/duffel_bag/minecraft/minecraft.jpg',
        ]);
        //Product ID: 185
        $product[] = Product::create([
            'name' => 'Bolsa de deporte Safta Super Mario',
            'slug' => Str::slug('Bolsa de deporte Safta Super Mario'),
            'status' => 1,
            'category_id' => 12,
            'subcategory_id' => 80,
            'price' => 44.79,
            'stock' => 10,
            'short_detail' => 'Bolsa de deporte Super Mario, multicolor para niños',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Safta</li>
                <li><strong>Color:&nbsp;</strong>Multicolor</li>
                <li><strong>Material:&nbsp;</strong>100% Poliéster</li>
                <li><strong>Dimensiones:&nbsp;</strong>400 X 230 X 240 mm.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'sport/duffel_bag/safta_super_mario/safta_super_mario.jpg',
        ]);
        //Product ID: 186
        $product[] = Product::create([
            'name' => 'Mochila deportiva Czemo',
            'slug' => Str::slug('Mochila deportiva Czemo'),
            'status' => 1,
            'category_id' => 12,
            'subcategory_id' => 80,
            'price' => 18.99,
            'stock' => 10,
            'short_detail' => 'Mochila deportiva Czemo de cuerdas',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Czemo</li>
                <li><strong>Color:&nbsp;</strong>Negro</li>
                <li><strong>Material:&nbsp;</strong>100% Poliéster</li>
                <li><strong>Dimensiones:&nbsp;</strong>500 X 400 X 180 mm.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'sport/duffel_bag/czemo_mochila_cuerdas/czemo_mochila_cuerdas.jpg',
        ]);
        //Product ID: 187
        $product[] = Product::create([
            'name' => 'Bolsa de deporte Tokeya',
            'slug' => Str::slug('Bolsa de deporte Tokeya'),
            'status' => 1,
            'category_id' => 12,
            'subcategory_id' => 80,
            'price' => 36.99,
            'stock' => 30,
            'short_detail' => 'Bolsa de deporte Tokeya, plegable, impermeable',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Tokeya</li>
                <li><strong>Color:&nbsp;</strong>Azul, Negro, Violeta</li>
                <li><strong>Material:&nbsp;</strong>100% Poliéster, impermeable</li>
                <li><strong>Dimensiones:&nbsp;</strong>500 X 280 X 250 mm.</li>
                <li><strong>Dimensiones plegada:&nbsp;</strong>245 X 200 X 80 mm.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'sport/duffel_bag/tokeya_folding/tokeya_folding.jpg',
        ]);
        //Product ID: 188
        $product[] = Product::create([
            'name' => 'Esterilla de Fitness Tresko',
            'slug' => Str::slug('Esterilla de Fitness Tresko'),
            'status' => 1,
            'category_id' => 12,
            'subcategory_id' => 81,
            'price' => 40.55,
            'stock' => 120,
            'short_detail' => 'Esterilla de Fitness Tresko de espuma',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>TRESKO</li>                
                <li><strong>Material:&nbsp;</strong>Espuma de caucho de nitrilo butadieno</li>
                <li><strong>Dimensiones:&nbsp;</strong>185 X 60 X 1 cm.</li>                
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'sport/fitness/tresko_fitness/tresko_fitness.jpg',
        ]);
        //Product ID: 189
        $product[] = Product::create([
            'name' => 'Esterilla de Fitness Cambivo',
            'slug' => Str::slug('Esterilla de Fitness Cambivo'),
            'status' => 1,
            'category_id' => 12,
            'subcategory_id' => 81,
            'price' => 85.99,
            'stock' => 80,
            'short_detail' => 'Esterilla de Fitness Cambivo grande',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>CAMBIVO</li>                
                <li><strong>Material:&nbsp;</strong>Elastómeros termoplásticos</li>
                <li><strong>Dimensiones:&nbsp;</strong>183 X 122 X 0.6 cm.</li>
                <li><strong>Peso:&nbsp;</strong>1.7 Kg.</li>                
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'sport/fitness/cambivo_fitness/cambivo_fitness.jpg',
        ]);
        //Product ID: 190
        $product[] = Product::create([
            'name' => 'Guantes de Fitness AQF',
            'slug' => Str::slug('Guantes de Fitness AQF'),
            'status' => 1,
            'category_id' => 12,
            'subcategory_id' => 81,
            'price' => 19.90,
            'stock' => 60,
            'short_detail' => 'Guantes de Fitness AQF, transpirables, unisex',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>AQF</li>
                <li><strong>Material:&nbsp;</strong>Cuero sintético</li>
                <li><strong>Dimensiones:&nbsp;</strong>30 X 18 X 5 cm.</li>
                <li><strong>Peso:&nbsp;</strong>100 g.</li>                
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'sport/fitness/aqf_guantes_fitness/aqf_guantes_fitness.jpg',
        ]);
        //Product ID: 191
        $product[] = Product::create([
            'name' => 'Guantes de Fitness RDX',
            'slug' => Str::slug('Guantes de Fitness RDX'),
            'status' => 1,
            'category_id' => 12,
            'subcategory_id' => 81,
            'price' => 19.90,
            'stock' => 280,
            'short_detail' => 'Guantes de Fitness RDX, dedo completo',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>AQF</li>
                <li><strong>Material:&nbsp;</strong>Algodón, nylon, silicona</li>
                <li><strong>Dimensiones:&nbsp;</strong>31.9 X 14.1 X 4.1 cm.</li>
                <li><strong>Peso:&nbsp;</strong>138 g.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'sport/fitness/rdx_guantes_fitness/rdx_guantes_fitness.jpg',
        ]);
        //Product ID: 192
        $product[] = Product::create([
            'name' => 'Pelota de Fitness Core Balance',
            'slug' => Str::slug('Pelota de Fitness Core Balance'),
            'status' => 1,
            'category_id' => 12,
            'subcategory_id' => 81,
            'price' => 28.90,
            'stock' => 40,
            'short_detail' => 'Pelota de Fitness Core Balance para ejercicios',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>CORE BALANCE</li>
                <li><strong>Material:&nbsp;</strong>Antiexplosión</li>
                <li><strong>Dimensiones:&nbsp;</strong>75 cm.</li>
                <li><strong>Peso:&nbsp;</strong>1.2 Kg.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'sport/fitness/core_balance_ball/core_balance_ball.jpg',
        ]);
        //Product ID: 193
        $product[] = Product::create([
            'name' => 'Faja reductora Mezzuno',
            'slug' => Str::slug('Faja reductora Mezzuno'),
            'status' => 1,
            'category_id' => 12,
            'subcategory_id' => 81,
            'price' => 23.50,
            'stock' => 30,
            'short_detail' => 'Faja reductora Mezzuno, unisex, ajuste ergonómico',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Mezzuno</li>
                <li><strong>Material:&nbsp;</strong>Neopreno</li>
                <li><strong>Dimensiones:&nbsp;</strong>98 X 20 X 0.5 cm.</li>
                <li><strong>Peso:&nbsp;</strong>200 g.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'sport/fitness/mezzuno_faja_reductora/mezzuno_faja_reductora.jpg',
        ]);
        //Product ID: 194
        $product[] = Product::create([
            'name' => 'Faja reductora InnoTi',
            'slug' => Str::slug('Faja reductora InnoTi'),
            'status' => 1,
            'category_id' => 12,
            'subcategory_id' => 81,
            'price' => 23.50,
            'stock' => 20,
            'short_detail' => 'Faja reductora InnoTi',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>InnoTi</li>
                <li><strong>Material:&nbsp;</strong>Neopreno</li>
                <li><strong>Dimensiones:&nbsp;</strong>70-90 cm. de diámetro</li>
                <li><strong>Peso:&nbsp;</strong>280 g.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'sport/fitness/innoti_faja_reductora/innoti_faja_reductora.jpg',
        ]);
        //Product ID: 195
        $product[] = Product::create([
            'name' => 'Banco de abdominales Gorilla Sports',
            'slug' => Str::slug('Banco de abdominales Gorilla Sports'),
            'status' => 1,
            'category_id' => 12,
            'subcategory_id' => 81,
            'price' => 68.99,
            'stock' => 10,
            'short_detail' => 'Banco de abdominales, ajustable',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Gorilla Sports</li>                
                <li><strong>Dimensiones:&nbsp;</strong>120 X 32 X 60 cm.</li>
                <li><strong>Peso:&nbsp;</strong>8 Kg.</li>
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'sport/fitness/abdominal_bench_gorillasports/abdominal_bench_gorillasports.jpg',
        ]);
        //Product ID: 196
        $product[] = Product::create([
            'name' => 'Sudadera Puma Teamgoal 23',
            'slug' => Str::slug('Sudadera Puma Teamgoal 23'),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 41,
            'price' => 44.30,
            'stock' => 144,
            'short_detail' => 'Sudadera con capucha y bolsillo delantero',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Puma</li>
                <li><strong>Material:&nbsp;</strong>68% Algodón, 32% Poliéster</li>                
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_men/hoodie/puma_teamgoal23/puma_teamgoal23.jpg',
        ]);
        //Product ID: 197
        $product[] = Product::create([
            'name' => 'Sudadera Helly Hansen HH',
            'slug' => Str::slug('Sudadera Helly Hansen HH'),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 41,
            'price' => 44.30,
            'stock' => 200,
            'short_detail' => 'Sudadera con capucha con bolsillo tipo canguro',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Helly Hansen</li>
                <li><strong>Material:&nbsp;</strong>70% Algodón, 30% Poliéster</li>                
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_men/hoodie/helly_hansen_hh/helly_hansen_hh.jpg',
        ]);
        //Product ID: 198
        $product[] = Product::create([
            'name' => 'Sudadera Nike Park20 Po',
            'slug' => Str::slug('Sudadera Nike Park20 Po'),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 41,
            'price' => 45.90,
            'stock' => 80,
            'short_detail' => 'Sudadera con capucha con bolsillo tipo canguro',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>NIKE</li>
                <li><strong>Material:&nbsp;</strong>82% Algodón, 18% Poliéster</li>                
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_men/hoodie/nike_park20pro/nike_park20pro.jpg',
        ]);
        //Product ID: 199
        $product[] = Product::create([
            'name' => 'Sudadera Joma Cairo',
            'slug' => Str::slug('Sudadera Joma Cairo'),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 41,
            'price' => 28,
            'stock' => 320,
            'short_detail' => 'Sudadera con cuello redondo',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Joma</li>
                <li><strong>Material:&nbsp;</strong>100% Poliéster</li>                
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes_men/hoodie/joma_cairo/joma_cairo.jpg',
        ]);

        //Product ID: 200 //FC Barcelona
        $product[] = Product::create([
            'name' => 'Camiseta FC Barcelona',
            'slug' => Str::slug('Camiseta FC Barcelona'),
            'status' => 1,
            'category_id' => 12,
            'subcategory_id' => 79,
            'price' => 50,
            'stock' => 30,
            'short_detail' => 'Camiseta para mujer, equipación oficial FC Barcelona 2021/2022',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>NIKE</li>
                <li><strong>Material:&nbsp;</strong>100% Poliéster, transpirable</li>                
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'sport/sport_clothes/FC_Barcelona/FC_Barcelona.jpg',
        ]);
        $count_product = count($product);
        /*
        for($i=0;$i<$count_product;$i++){
            if()
            $settings_prod = SettingsProducts::create([
                'product_id' => $product[$i]->id
            ]);
            $infoprice_prod = InfopriceProducts::create([
                
                'product_id' => $product[$i]->id
            ]);
        }
        */
        foreach($product as $pro){

            $settings_prod = SettingsProducts::create([
                'product_id' => $pro->id
            ]);
            
            $discount_type = 0;
            $discount = 15;
            $init_discount = NULL;
            $end_discount = NULL;
            switch($pro->id){
                case '1':
                    $discount_type = 1;
                    $discount = 15;
                    $init_discount = '2022-08-01';
                    $end_discount = '2023-08-01';            
                    break;
                case '3':
                    $discount_type = 1;
                    $discount = 22;
                    $init_discount = '2022-08-01';
                    $end_discount = '2022-08-10';
                    break;
                case '9':
                    $discount_type = 1;
                    $discount = 20;
                    $init_discount = '2022-08-01';
                    $end_discount = '2023-08-01';
                    break;
                case '11':
                    $discount_type = 1;
                    $discount = 12;
                    $init_discount = '2022-08-01';
                    $end_discount = '2023-08-01';
                    break;
                case '18':
                    $discount_type = 1;
                    $discount = 12;
                    $init_discount = '2022-08-01';
                    $end_discount = '2022-11-01';
                    break;
                case '19':
                    $discount_type = 1;
                    $discount = 10;
                    $init_discount = '2022-08-01';
                    $end_discount = '2022-11-01';
                    break;
                case '34':
                    $discount_type = 1;
                    $discount = 25;
                    $init_discount = '2022-08-01';
                    $end_discount = '2023-02-01';
                    break;
                case '37':
                    $discount_type = 1;
                    $discount = 15;
                    $init_discount = '2022-08-01';
                    $end_discount = '2023-02-01';
                    break;
                case '54':
                    $discount_type = 1;
                    $discount = 12;
                    $init_discount = '2022-08-01';
                    $end_discount = '2023-02-01';
                    break;
                case '63':
                    $discount_type = 1;
                    $discount = 5;
                    $init_discount = '2022-08-01';
                    $end_discount = '2023-02-01';
                    break;
                case '66':
                    $discount_type = 1;
                    $discount = 15;
                    $init_discount = '2022-08-01';
                    $end_discount = '2023-02-01';
                    break;
                case '76':
                    $discount_type = 1;
                    $discount = 5;
                    $init_discount = '2022-08-01';
                    $end_discount = '2023-02-01';
                    break;
            }
            $infoprice_prod = InfopriceProducts::create([
                'discount_type' => $discount_type,
                'discount' => $discount,
                'init_discount' => $init_discount,
                'end_discount' => $end_discount,
                'product_id' => $pro->id                    
            ]);
        }

    }
}
