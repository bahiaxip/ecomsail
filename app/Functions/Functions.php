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
//llamada desde el nav_user (icono de cesta dentro de barra de navegación)
//para mostrar la cantidad de productos en el carrito temporal
function getCountOrders(){
	$id = Auth::id();
	$count = 0;
	if($id){
		$order = new \App\Models\Order;
		$order_tmp = $order->where('user_id',$id)->where('status',0)->first();
		$order_item = new \App\Models\Order_Item;
		if($order_item->count() > 0 && $order_tmp && $order_tmp->count() > 0){
			$count = $order_item->where('user_id',$id)->where('order_id',$order_tmp->id)->count();
		}	
		return $count;
	}
}
/* anulado 
function get_type_selection_combination(){
	return [
		1 => 'Desplegable',
		2 => 'Botones',
		3 => 'Colores'
	];
}
*/

function get_taxes(){
	return [
		1 => config('ecomsail.standard_tax'),
		2 => config('ecomsail.standard_tax'),
		3 => config('ecomsail.standard_tax'),
	];
}

?>