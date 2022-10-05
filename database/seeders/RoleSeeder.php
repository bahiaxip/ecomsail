<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Administrador',
            'slug' => 'admin',
            'description' => 'Acceso total a panel de administración'
        ]);
        Role::create([
            'name' => 'Editor',
            'slug' => 'editor',
            'description' => 'Navegar, crear y editar en panel de administración'
        ]);
        Role::create([
            'name' => 'Suscriptor',
            'slug' => 'suscriptor',
            'description' => 'Navegar en panel de administración'
        ]);

    }
}
