<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
use App\Functions\Municipalities;
class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $municipalities = new Municipalities();
        $cities = $municipalities->cities;
        foreach($cities as $city){
            City::create([
                'name' => $city['nombre'],
                'status' => 1,
                'location_id' =>58,
                'province_id' => $city['provincia_id'],
                'municipality_id' => $city['municipio_id']
            ]);
        }
    }
}
