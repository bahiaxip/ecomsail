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
?>