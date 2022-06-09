<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Combination;
class CombinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Combination::create([
            'name' => 'Color > Blanco',            
            'list_ids' => 3,
            'amount' => 0,
            'product_id' => 1
        ]);
        Combination::create([
            'name' => 'Color > Gris',
            'list_ids' => 4,
            'amount' => 0,
            'product_id' => 1
        ]);        
    }
}
