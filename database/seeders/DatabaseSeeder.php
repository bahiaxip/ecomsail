<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User, App\Models\Category;
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
        User::create([
            "nick" =>'xip',
            "name"=>"Fernando",
            'lastname' => 'Gomez',
            "email"=>"bahiaxip@hotmail.com",
            "password"=>bcrypt("calibra55"),
            'role' => 1            
        ]);
        Category::create([
            'status' => 1,
            'type' => 0,
            'name' =>'Ropa'
        ]);
        Category::create([
            'status' => 1,
            'type' => 0,
            'name' =>'Gafas'
        ]);
    }
}
