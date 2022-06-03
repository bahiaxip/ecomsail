<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Province;
use App\Functions\Prov;
class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prov = new Prov();
        $provinces = $prov->prov;
        foreach($provinces as $prov){
            Province::create([
                'name' => $prov['nombre'],
                'status' => 1,
                'location_id' =>58,
                'province_id' => $prov['provincia_id']
            ]);
        }
    }
}
