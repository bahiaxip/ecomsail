<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;
use App\Functions\Paises;
class LocationSeeder extends Seeder
{

    //Para ejecutar este seeder individualmente:
    //sail artisan db:seed --class=LocationSeeder

    public function run()
    {
        
        $Paises = new Paises();
        $countries = $Paises->all_list;

        foreach($countries as $c){
            Location::create([
                'name' => $c['nombre'],
                'status' => 0,
                'zone' => $c['zone'],
                'path_tag'=>'icons/flags_icons/',
                'icon' => $c['icon'],
                'icon_code' => $c['icon_code'],
                'isocode_alfa2' => $c['isocode_alfa2']
            ]);
        }
        
        /*
        Location::create([
            'name' => 'nombre',
            'status' => 0,
            'zone' => 'zone',
            'path_tag'=>'icons/flag_icons/',
            'icon' => 'icon',
            'icon_code' => 'icon_code',
            'isocode_alfa2' => 'isocode_alfa2'
        ]);
        */
    }
}
