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
}

?>