<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

       //Falta probar db:seed de LocationSeeder desde aquí, probado individualmente
       User::create([
            "nick" =>'xip',
            "name"=>"Fernando",
            'lastname' => 'Gomez',
            "email"=>"bahiaxip@hotmail.com",
            "password"=>bcrypt("calibra55"),
            'role' => 1,
            'permissions' => '{"admin_panel":"true","list_users":"true","edit_users":"true","admin_permissions":"true"}',
            'status' => 1           
        ]);
        
        
        
        $this->call([
            LocationSeeder::class,
            ZoneSeeder::class,
            ProvinceSeeder::class,
            //CitySeeder::class,
            CategorySeeder::class,
            AttributeSeeder::class,
            ProductSeeder::class,
            CombinationSeeder::class,
            ProductsGallerySeeder::class,
            MetaTagSeeder::class
        ]);
        
    }
}
