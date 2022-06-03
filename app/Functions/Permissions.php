<?php

namespace App\Functions;

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

	public $permissions_list = [
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
        
    ];
}

?>