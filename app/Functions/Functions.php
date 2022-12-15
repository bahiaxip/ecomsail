<?php

use App\Models\Notification as Not, App\Models\User;
use Illuminate\Support\Facades\Auth;

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

function get_current_status_select(){
	return [
		0 => 'Borrador',
		1 => 'Público',		
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

//mostrar notificaciones en nav_blade (icono de notificaciones)
//función llamada desde AuthServiceProvider.php
function update_notifications($data = null){
	//comprobamos si el user es admin
	if(Auth::user()){
		$auth_user = Auth::user();
    	$user = User::find($auth_user->id);            
	    //comprobamos si es admin o tiene acceso total
	    //if($user->role == 1 || $user->roles()->special == 'all'){
    	
    	if($user->role == 1 ){
	        //obtenemos la última notificación vista por el usuario
	        $last_user_not = $user->last_seen_notification;
	        
	        //obtenemos la última notificación global
	        $last_global_not = Not::orderBy('id','desc')->first();

	        //si es mayor el id de la notificación global que la vista por el user
	        //contamos el total de notificaciones que el user no ha visto y las almacenamos
	        if($last_global_not && $last_global_not->id > $last_user_not){
	            $unseen_nots = Not::where('id','>',$last_user_not)->count();                    
	            $user->update(['unseen_notifications' => $unseen_nots]);
	            if($data){
	            	return $unseen_nots;
	            }
	        }
	    }
	    
	}
}

function get_coin(){
	return config('ecomsail.coin');
}

function get_position_coin(){
	return config('ecomsail.position_coin');
}
//get_notifications();
//dd("anda");

?>