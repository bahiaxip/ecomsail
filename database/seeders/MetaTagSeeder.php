<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MetaTag;
class MetaTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Estados del pedido
        MetaTag::create([
            'name' => 'Pendiente de pago',
            'background'=> '#FFFFFF',
            'tag_id' => 1
        ]);
        MetaTag::create([
            'name' => 'Pago aceptado',
            'background'=> '#FFFFFF',
            'tag_id' => 1
        ]);
        MetaTag::create([
            'name' => 'Cancelado',
            'background'=> '#FFFFFF',
            'tag_id' => 1
        ]);
        MetaTag::create([
            'name' => 'Error en pago',
            'background'=> '#FFFFFF',
            'tag_id' => 1
        ]);
        
        MetaTag::create([
            'name' => 'Preparación en curso',
            'background'=> '#FFFFFF',
            'tag_id' => 1
        ]);
        MetaTag::create([
            'name' => 'Enviado',
            'background'=> '#FFFFFF',
            'tag_id' => 1
        ]);
        MetaTag::create([
            'name' => 'Entregado',
            'background'=> '#FFFFFF',
            'tag_id' => 1
        ]);
        MetaTag::create([
            'name' => 'Reembolsado',
            'background'=> '#FFFFFF',
            'tag_id' => 1
        ]);
        //métodos de pago
        MetaTag::create([
            'name' => 'Tarjeta',
            'background'=> '#FFFFFF',
            'tag_id' => 2
        ]);
        MetaTag::create([
            'name' => 'Transferencia',
            'background'=> '#FFFFFF',
            'tag_id' => 2
        ]);
        MetaTag::create([
            'name' => 'Paypal',
            'background'=> '#FFFFFF',
            'tag_id' => 2
        ]);

    }
}
