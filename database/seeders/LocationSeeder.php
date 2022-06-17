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
                'isocode_alpha2' => $c['isocode_alfa2']
            ]);
        }
        //actualizamos el status (filtrado en modo público) de todos los de Europa
        $locations = Location::where('zone',1)->get();
        foreach($locations as $loc){
            $loc->update([
                'status' => 1
            ]);    
        }
        //actualizamos datos de España 
        $location_spain = Location::find(58);
        $location_spain->update([            
            'prefix_phone' => 34,
            'coin' => '€',
            'vat' => 21
        ]);
    }
}
