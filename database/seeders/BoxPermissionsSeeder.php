<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BoxPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Análisis
        DB::table('box_permissions')->insert([
            'status' => '1',
            'name' => 'Análisis',
            'icon_awesome' => '<i class="fa-sharp fa-solid fa-chart-simple"></i>'
        ]);
        //Productos
        DB::table('box_permissions')->insert([
            'status' => '1',
            'name' => 'Productos',
            'icon_awesome' => '<i class="fas fa-box-open"></i>'
        ]);
        //Pedidos
        DB::table('box_permissions')->insert([
            'status' => '1',
            'name' => 'Pedidos',
            'icon_awesome' => '<i class="fas fa-bag-shopping"></i>'
        ]);
        //Facturas
        DB::table('box_permissions')->insert([
            'status' => '1',
            'name' => 'Facturas',
            'icon_awesome' => '<i class="fas fa-file-invoice"></i>'
        ]);
        //Categorías
        DB::table('box_permissions')->insert([
            'status' => '1',
            'name' => 'Categorías',
            'icon_awesome' => '<i class="fas fa-tags"></i>'
        ]);
        //Atributos
        DB::table('box_permissions')->insert([
            'status' => '1',
            'name' => 'Atributos',
            'icon_classlist' => 'icon icon_value'
        ]);
        //Usuarios
        DB::table('box_permissions')->insert([
            'status' => '1',
            'name' => 'Usuarios',
            'icon_awesome' => '<i class="fas fa-user-friends"></i>'
        ]);
        //Ubicaciones
        DB::table('box_permissions')->insert([
            'status' => '1',
            'name' => 'Ubicaciones',
            'icon_awesome' => '<i class="fas fa-location-dot"></i>'
        ]);
        //Carousel
        DB::table('box_permissions')->insert([
            'status' => '1',
            'name' => 'Carousel',
            'icon_awesome' => '<i class="fas fa-images"></i>'
        ]);
        //Permisos
        DB::table('box_permissions')->insert([
            'status' => '1',
            'name' => 'Permisos',
            'icon_awesome' => '<i class="fa-solid fa-shield"></i>'
        ]);
        //Roles
        DB::table('box_permissions')->insert([
            'status' => '1',
            'name' => 'Roles',
            'icon_awesome' => '<i class="fa-solid fa-shield-halved"></i>'
        ]);
        //Ajustes
        DB::table('box_permissions')->insert([
            'status' => '1',
            'name' => 'Ajustes',
            'icon_awesome' => '<i class="fa-solid fa-gear"></i>'
        ]);
        
    }
}
