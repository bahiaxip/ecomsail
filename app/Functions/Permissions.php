<?php

namespace App\Functions;
use App\Models\PermissionRole, App\Models\Permission;
class Permissions {

	public function testPermission($json,$key){
		if($json == null){
			return null;
		}else{
			$json = json_decode($json,true);
			if(array_key_exists($key,$json)){
				return $json[$key];
			}else{
				return null;
			}
		}
	}

    public function testRole($role,$permission_slug){
        $permission = Permission::where('slug',$permission_slug)->first();
        if($permission){
            $permission_id = $permission->id;
            $query = PermissionRole::where('role_id',$role)->where('permission_id',$permission_id)->first();
            
            if($query && $query->count() > 0)
                return true;
            else
                return false;
        }
        
        
        
    }

	public $permissions_list = [
        /*
        'home' =>[
            'list_home' => null,
        ],
        */
        'users' => [
            'list_users' => null,
            'add_users' => null,
            'edit_users' => null,
            'delete_users' => null,
        ],
        'categories' =>[
            'list_categories' => null,
            'add_categories' => null,
            'edit_categories' => null,
            'delete_categories' => null
        ],
        'products' =>[
            'list_products' => null,
            'add_products' => null,
            'edit_products' => null,
            'delete_products' => null
        ],
        'locations' =>[
            'list_locations' => null,
            'add_locations' => null,
            'edit_locations' => null,
            'delete_locations' => null,
        ],
        'orders' =>[
            'list_orders' => null,            
            'delete_locations' => null,
            'restore_orders' => null
        ],
        
    ];
}

?>