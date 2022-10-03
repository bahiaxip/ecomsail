<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Zone;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Zone::create([
            'name' => 'Unión Europea',
            'path_tag' =>'ics/flags_icons/' ,
            'icon' => 'UnionEuropea',
        ]);
        Zone::create([
            'name' => 'Norte América'
        ]);
        Zone::create([
            'name' => 'Centro América'
        ]);
        Zone::create([
            'name' => 'Sudamérica'
        ]);
        Zone::create([
            'name' => 'África'
        ]);
        Zone::create([
            'name' => 'Asia'
        ]);
        Zone::create([
            'name' => 'Oceanía'
        ]);
        Zone::create([
            'name' => 'América insular'
        ]);

    }
}
