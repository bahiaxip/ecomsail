<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        //Análisis
        Permission::create([
            'status' => 1,
            'name' => 'Mostrar análisis',
            'slug' => 'show_analysis',
            'description' => 'Mostrar Análisis de ventas',
            'box_permission_id' => 1
        ]);
        //Productos
        Permission::create([
            'status' => 1,
            'name' => 'Mostrar productos',
            'slug' => 'list_products',
            'description' => 'Mostrar todos los productos',
            'box_permission_id' =>2
        ]);
        Permission::create([
            'status' => 1,
            'name' => 'Crear productos',
            'slug' => 'create_products',
            'description' => 'Crear un producto nuevo',
            'box_permission_id' =>2
        ]);
        Permission::create([
            'status' => 1,
            'name' => 'Editar productos',
            'slug' => 'edit_products',
            'description' => 'Editar cualquier producto',
            'box_permission_id' =>2
        ]);
        Permission::create([
            'status' => 1,
            'name' => 'Eliminar productos',
            'slug' => 'delete_products',
            'description' => 'Eliminar cualquier producto',
            'box_permission_id' =>2
        ]);
        Permission::create([
            'status' => 1,
            'name' => 'Restaurar productos',
            'slug' => 'restore_products',
            'description' => 'Restaurar cualquier producto',
            'box_permission_id' =>2
        ]);
        //Pedidos
        Permission::create([
            'status' => 1,
            'name' => 'Mostrar pedidos',
            'slug' => 'list_orders',
            'description' => 'Mostrar todos los pedidos',
            'box_permission_id' =>3
        ]);
         Permission::create([
            'status' => 1,
            'name' => 'Eliminar pedidos',
            'slug' => 'delete_orders',
            'description' => 'Eliminar cualquier pedido',
            'box_permission_id' =>3
        ]);
        Permission::create([
            'status' => 1,
            'name' => 'Restaurar pedidos',
            'slug' => 'restore_orders',
            'description' => 'Restaurar cualquier pedido',
            'box_permission_id' =>3
        ]);
        //Facturas
        Permission::create([
            'status' => 1,
            'name' => 'Mostrar facturas',
            'slug' => 'list_invoices',
            'description' => 'Mostrar todas las facturas',
            'box_permission_id' =>4
        ]);
         Permission::create([
            'status' => 1,
            'name' => 'Eliminar facturas',
            'slug' => 'delete_invoices',
            'description' => 'Eliminar cualquier factura',
            'box_permission_id' =>4
        ]);
        Permission::create([
            'status' => 1,
            'name' => 'Restaurar facturas',
            'slug' => 'restore_invoices',
            'description' => 'Restaurar cualquier factura',
            'box_permission_id' =>4
        ]);
        //Categorías
        Permission::create([
            'status' => 1,
            'name' => 'Mostrar categorías',
            'slug' => 'list_categories',
            'description' => 'Mostrar todas las categorías',
            'box_permission_id' =>5
        ]);
        Permission::create([
            'status' => 1,
            'name' => 'Crear categorías',
            'slug' => 'create_categories',
            'description' => 'Crear una categoría nueva',
            'box_permission_id' =>5
        ]);
        Permission::create([
            'status' => 1,
            'name' => 'Editar categorías',
            'slug' => 'edit_categories',
            'description' => 'Editar cualquier categoría',
            'box_permission_id' =>5
        ]);
        Permission::create([
            'status' => 1,
            'name' => 'Eliminar categorías',
            'slug' => 'delete_categories',
            'description' => 'Eliminar cualquier categoría',
            'box_permission_id' =>5
        ]);
        Permission::create([
            'status' => 1,
            'name' => 'Restaurar categorías',
            'slug' => 'restore_categories',
            'description' => 'Restaurar cualquier categoría',
            'box_permission_id' =>5
        ]);
        //Atributos
        Permission::create([
            'status' => 1,
            'name' => 'Mostrar atributos',
            'slug' => 'list_categories',
            'description' => 'Mostrar todos los atributos',
            'box_permission_id' =>6
        ]);
        Permission::create([
            'status' => 1,
            'name' => 'Crear atributos',
            'slug' => 'create_attributes',
            'description' => 'Crear un atributo nuevo',
            'box_permission_id' =>6
        ]);
        Permission::create([
            'status' => 1,
            'name' => 'Editar atributos',
            'slug' => 'edit_attributes',
            'description' => 'Editar cualquier atributo',
            'box_permission_id' =>6
        ]);
        Permission::create([
            'status' => 1,
            'name' => 'Eliminar atributos',
            'slug' => 'delete_attributes',
            'description' => 'Eliminar cualquier atributo',
            'box_permission_id' =>6
        ]);
        Permission::create([
            'status' => 1,
            'name' => 'Restaurar atributos',
            'slug' => 'restore_attributes',
            'description' => 'Restaurar cualquier atributo',
            'box_permission_id' =>6
        ]);
        //Usuarios
        Permission::create([
            'status' => 1,
            'name' => 'Mostrar usuarios',
            'slug' => 'list_users',
            'description' => 'Mostrar todos las usuarios',
            'box_permission_id' =>7
        ]);
        Permission::create([
            'status' => 1,
            'name' => 'Editar usuarios',
            'slug' => 'edit_users',
            'description' => 'Editar cualquier usuario',
            'box_permission_id' =>7
        ]);
        //Ubicaciones
        Permission::create([
            'status' => 1,
            'name' => 'Mostrar ubicaciones',
            'slug' => 'list_locations',
            'description' => 'Mostrar todos las ubicaciones',
            'box_permission_id' =>8
        ]);
        Permission::create([
            'status' => 1,
            'name' => 'Crear ubicaciones',
            'slug' => 'create_locations',
            'description' => 'Crear una ubicación nueva',
            'box_permission_id' =>8
        ]);
        Permission::create([
            'status' => 1,
            'name' => 'Editar ubicaciones',
            'slug' => 'edit_locations',
            'description' => 'Editar cualquier ubicación',
            'box_permission_id' =>8
        ]);
        Permission::create([
            'status' => 1,
            'name' => 'Eliminar ubicaciones',
            'slug' => 'delete_locations',
            'description' => 'Eliminar cualquier ubicación',
            'box_permission_id' =>8
        ]);
        Permission::create([
            'status' => 1,
            'name' => 'Restaurar ubicaciones',
            'slug' => 'restore_locations',
            'description' => 'Restaurar cualquier ubicación',
            'box_permission_id' =>8
        ]);
    }
}
