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

        $product[] = Product::create([
            'name' => 'Frigorífico Candy CMDDS',            
            'slug' => Str::slug('Frigorífico Candy CMDDS'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 23,
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
        $product[] = Product::create([
            'name' => 'Frigorífico Corberó CCH18021X',            
            'slug' => Str::slug('Frigorífico Corberó CCH18021X'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 23,
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
        $product[] = Product::create([
            'name' => 'Frigorífico Hisense RQ515N4AC2',            
            'slug' => Str::slug('Frigorífico Hisense RQ515N4AC2'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 23,
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
        $product[] = Product::create([
            'name' => 'Frigorífico LG GTB362PZCZD',            
            'slug' => Str::slug('Frigorífico LG GTB362PZCZD'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 23,
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
        $product[] = Product::create([
            'name' => 'Frigorífico Samsung RB34T602EWW',
            'slug' => Str::slug('Frigorífico Samsung RB34T602EWW'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 23,
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
        $product[] = Product::create([
            'name' => 'Frigorífico Teka NFL320',
            'slug' => Str::slug('Frigorífico Teka NFL320'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 23,
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
        $product[] = Product::create([
            'name' => 'Secador Babyliss 6613DE',
            'slug' => Str::slug('Secador Babyliss 6613DE'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 24,
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
        $product[] = Product::create([
            'name' => 'Secador Babyliss 6615E',
            'slug' => Str::slug('Secador Babyliss 6615E'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 24,
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
        $product[] = Product::create([
            'name' => 'Secador Braun Satin Hair 7',
            'slug' => Str::slug('Secador Braun Satin Hair 7'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 24,
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
        $product[] = Product::create([
            'name' => 'Secador Cecotec Bamba',
            'slug' => Str::slug('Secador Cecotec Bamba'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 24,
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
        $product[] = Product::create([
            'name' => 'Secador Happygoo',
            'slug' => Str::slug('Secador Happygoo'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 24,
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
        $product[] = Product::create([
            'name' => 'Secador Remington Compact',
            'slug' => Str::slug('Secador Remington Compact'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 24,
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
        $product[] = Product::create([
            'name' => 'Secador Remington Silk',
            'slug' => Str::slug('Secador Remington Silk'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 24,
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
        $product[] = Product::create([
            'name' => 'Secador Solac Hair & Go',
            'slug' => Str::slug('Solac Hair & Go'),
            'status' => 1,
            'category_id' => 4,
            'subcategory_id' => 24,
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
        $product[] = Product::create([
            'name' => 'Atornillador BlackAndDecker BCF611CK',
            'slug' => Str::slug('Atornillador BlackAndDecker BCF611CK'),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 14,
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
            'image' => 'tools/drill/blackdecker_BCF611CK/blackdecker_BCF611CK.jpg',
        ]);
        $product[] = Product::create([
            'name' => 'Atornillador Bosch IXO',
            'slug' => Str::slug('Atornillador Bosch IXO'),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 14,
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
        $product[] = Product::create([
            'name' => 'Flexómetro Fisco TK',
            'slug' => Str::slug('Flexómetro Fisco TK'),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 15,
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
        $product[] = Product::create([
            'name' => 'Flexómetro Milwaukee',
            'slug' => Str::slug('Flexómetro Milwaukee'),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 15,
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
        $product[] = Product::create([
            'name' => 'Flexómetro Stanley DualLock 3M',
            'slug' => Str::slug('Flexómetro Stanley DualLock 3M'),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 15,
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
        $product[] = Product::create([
            'name' => 'Flexómetro Stanley DualLock 5M',
            'slug' => Str::slug('Flexómetro Stanley DualLock 5M'),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 15,
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
        $product[] = Product::create([
            'name' => 'Flexómetro Stanley DualLock 8M',
            'slug' => Str::slug('Flexómetro Stanley DualLock 8M'),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 15,
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
        
        $product[] = Product::create([
            'name' => 'Flexómetro Stanley PowerLock Classic 3M',
            'slug' => Str::slug('Flexómetro Stanley Classic PowerLock Classic 3M'),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 15,
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
        $product[] = Product::create([
            'name' => 'Flexómetro Stanley PowerLock Classic 5M',
            'slug' => Str::slug('Flexómetro Stanley PowerLock Classic 5M'),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 15,
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
        $product[] = Product::create([
            'name' => 'Flexómetro Stanley PowerLock Classic 10M',
            'slug' => Str::slug('Flexómetro Stanley PowerLock Classic 10M'),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 15,
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
        $product[] = Product::create([
            'name' => 'Flexómetro Stanley Tylon 5M',
            'slug' => Str::slug('Flexómetro Stanley Tylon 5M'),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 15,
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
        $product[] = Product::create([
            'name' => 'Flexómetro Stanley Tylon 8M',
            'slug' => Str::slug('Flexómetro Stanley Tylon 8M'),
            'status' => 1,
            'category_id' => 2,
            'subcategory_id' => 15,
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
        $product[] = Product::create([
            'name' => 'Camiseta Dri-fit Strike',
            'slug' => Str::slug('Camiseta Dri-fit Strike'),
            'status' => 1,
            'category_id' => 1,
            'subcategory_id' => 9,
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
            'image' => 'clothes/t-shirt/nike_dri-fit_strike/nike_dri-fit_strike_black.jpg',
        ]);
        $product[] = Product::create([
            'name' => 'Camiseta FC Barcelona',
            'slug' => Str::slug('Camiseta FC Barcelona'),
            'status' => 1,
            'category_id' => 1,
            'subcategory_id' => 9,
            'price' => 101,
            'stock' => 30,
            'short_detail' => 'Camiseta para mujer, equipación oficial FC Barcelona 2021/2022',
            'detail' =>'<p>
                <strong>Caracter&iacute;sticas</strong>
            </p>
            <ul>
                <li><strong>Marca:&nbsp;</strong>Nike</li>
                <li><strong>Material:&nbsp;</strong>100% Poliéster, transpirable</li>                
            </ul>',
            'path_tag' => '/images/products/',
            'image' => 'clothes/t-shirt/FC_Barcelona/FC_Barcelona.jpg',
        ]);

        $count_product = count($product);
        for($i=0;$i<$count_product;$i++){
            $settings_prod = SettingsProducts::create([
                'product_id' => $product[$i]->id
            ]);
            $infoprice_prod = InfopriceProducts::create([
                
                'product_id' => $product[$i]->id
            ]);
        }

    }
}
