<?php
function get_actionslist($filter_type){
	$list;
	if($filter_type == 2){
		$list = [0 => 'Seleccione',2 => 'Restaurar'];
	}else{
		$list = [0 => 'Seleccione',1 => 'Eliminar'];
	}
	return $list;
}
function get_availability(){
	return [
		1 => 'Online y tienda',
		2 => 'Sólo Online',
		3 => 'Sólo tienda'
	];
}
function get_product_state(){
	return [
		1 => 'Nuevo',
		2 => 'Usado',
		3 => 'Reacondicionado'
	];
}
?>