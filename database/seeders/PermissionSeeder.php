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
        //Permiso genérico (distinto al resto), tan solo para acceder al 
        //panel de administración, necesario para el middleware admin.
        //status específico de 55 para diferenciar.
        Permission::create([
            'status' => 55,
            'name' => 'Panel de administración',
            'slug' => 'admin_panel',
            'description' => 'Acceder al panel de administración',
            'box_permission_id' => 0
        ]);
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
            'slug' => 'list_attributes',
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
            'description' => 'Mostrar todas las ubicaciones',
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
        //Carousel
        Permission::create([
            'status' => 1,
            'name' => 'Mostrar carousel',
            'slug' => 'list_carousel',
            'description' => 'Mostrar las imágenes del carousel principal',
            'box_permission_id' =>9
        ]);
        Permission::create([
            'status' => 1,
            'name' => 'Crear carousel',
            'slug' => 'create_carousel',
            'description' => 'Crear un carousel nueva',
            'box_permission_id' =>9
        ]);
        Permission::create([
            'status' => 1,
            'name' => 'Editar carousel',
            'slug' => 'edit_carousel',
            'description' => 'Editar cualquier carousel',
            'box_permission_id' =>9
        ]);
        Permission::create([
            'status' => 1,
            'name' => 'Eliminar carousel',
            'slug' => 'delete_carousel',
            'description' => 'Eliminar cualquier carousel',
            'box_permission_id' =>9
        ]);
        //Permisos
        Permission::create([
            'status' => 1,
            'name' => 'Mostrar permisos',
            'slug' => 'list_permissions',
            'description' => 'Mostrar todos los permisos',
            'box_permission_id' =>10
        ]);
        Permission::create([
            'status' => 1,
            'name' => 'Crear permisos',
            'slug' => 'create_permissions',
            'description' => 'Crear un permiso nuevo',
            'box_permission_id' =>10
        ]);
        Permission::create([
            'status' => 1,
            'name' => 'Editar permisos',
            'slug' => 'edit_permissions',
            'description' => 'Editar cualquier permiso',
            'box_permission_id' =>10
        ]);
        Permission::create([
            'status' => 1,
            'name' => 'Eliminar permisos',
            'slug' => 'delete_permissions',
            'description' => 'Eliminar cualquier permiso',
            'box_permission_id' =>10
        ]);
        Permission::create([
            'status' => 1,
            'name' => 'Restaurar permisos',
            'slug' => 'restore_permissions',
            'description' => 'Restaurar cualquier permiso',
            'box_permission_id' =>10
        ]);
        //Roles
        Permission::create([
            'status' => 1,
            'name' => 'Mostrar roles',
            'slug' => 'list_roles',
            'description' => 'Mostrar todos los roles',
            'box_permission_id' =>11
        ]);
        Permission::create([
            'status' => 1,
            'name' => 'Crear roles',
            'slug' => 'create_roles',
            'description' => 'Crear un rol nuevo',
            'box_permission_id' =>11
        ]);
        Permission::create([
            'status' => 1,
            'name' => 'Editar roles',
            'slug' => 'edit_roles',
            'description' => 'Editar cualquier rol',
            'box_permission_id' =>11
        ]);
        Permission::create([
            'status' => 1,
            'name' => 'Eliminar roles',
            'slug' => 'delete_roles',
            'description' => 'Eliminar cualquier rol',
            'box_permission_id' =>11
        ]);
        Permission::create([
            'status' => 1,
            'name' => 'Restaurar roles',
            'slug' => 'restore_roles',
            'description' => 'Restaurar cualquier rol',
            'box_permission_id' =>11
        ]);
        //Ajustes
        Permission::create([
            'status' => 1,
            'name' => 'Mostrar ajustes',
            'slug' => 'list_settings',
            'description' => 'Mostrar ajustes globales',
            'box_permission_id' =>12
        ]);        
    }
}
