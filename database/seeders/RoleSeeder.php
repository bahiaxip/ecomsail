<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Role, App\Models\PermissionRole;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin
        Role::create([
            'status' => 1,
            'name' => 'Administrador',
            'slug' => 'admin',
            'description' => 'Acceso total a panel de administración',
            'special' => 'all'
        ]);

        //editor
        $role = Role::create([
            'status' => 1,
            'name' => 'Editor',
            'slug' => 'editor',
            'description' => 'Navegar, crear y editar en panel de administración'
        ]);
        $permissions_editor = [1,2,3,4,7,10,13,14,15,18,19,20,23,24,25,26,27];
        foreach($permissions_editor as $pe){
            PermissionRole::create([
                'permission_id' => $pe,
                'role_id' => $role->id
            ]);
        }
        //suscriptor
        $role = Role::create([
            'status' => 1,
            'name' => 'Suscriptor',
            'slug' => 'suscriptor',
            'description' => 'Navegar en panel de administración'
        ]);
        $permissions_suscriptor = [1,2,7,10,13,18,23,25];
        foreach($permissions_suscriptor as $ps){
            PermissionRole::create([
                'permission_id' => $ps,
                'role_id' => $role->id
            ]);
        }

    }
}
