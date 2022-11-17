<?php
//necesario añadir middleware desde aquí, ya que livewire asigna otra ruta
//desde el controlador
/*
Route::prefix('admin')->middleware('admin')->group(function(){
	//categories
	Route::get('/categories',\App\Http\Livewire\Admin\Category::class)->name('categories');
	//Route::get('/admin',Admin\Category::class)->name('categories');

	//users
	Route::get('/users',\App\Http\Livewire\Admin\Users::class)->name('users');	
})
*/

Route::group([

	//middleware admin (administrador en forma genérica a un conjunto de rutas)
	'middleware' => ['auth','admin'],
	'prefix'=>'/admin'
	],function(){
		Route::get('/home',\App\Http\Livewire\Admin\Home::class)->name('show_analysis')
			->middleware('role_permissions');

		//categories
		Route::get('/categories/{filter_type}/{subcat?}',\App\Http\Livewire\Admin\Category::class)
			->name('list_categories')->middleware('role_permissions');
		//Route::get('/admin',Admin\Category::class)->name('categories');

		//users
		Route::get('/users/{filter_type}',\App\Http\Livewire\Admin\Users::class)->name('list_users')
			->middleware('role_permissions')
			;


		//Products
		Route::get('/products/{filter_type}',\App\Http\Livewire\Admin\Product::class)->name('list_products')
			->middleware('role_permissions');

		//Attributes
		Route::get('/attributes/{filter_type}/{attr?}',\App\Http\Livewire\Admin\Attribute::class)->name('list_attributes')->middleware('role_permissions');
		

		//Locations
		Route::get('/locations/{filter_type}',\App\Http\Livewire\Admin\Location::class)->name('list_locations')
			->middleware('role_permissions');

		//Ciudades
		Route::get('/cities/{country}/{filter_type}',\App\Http\Livewire\Admin\City::class)->name('list_cities')
			->middleware('role_permissions');

		//Pedidos
		Route::get('/orders/{filter_type}', \App\Http\Livewire\Admin\Order::class)->name('list_orders')->middleware('role_permissions');

		//Facturas
		Route::get('/invoices/{filter_type}/{order_id?}', \App\Http\Livewire\Admin\Invoice::class)->name('list_invoices')->middleware('role_permissions');

		//Carousel
		Route::get('/carousel/{filter_type}',\App\Http\Livewire\Admin\Carousel::class)->name('list_carousel')->middleware('role_permissions');

		
		
		//Roles
		Route::get('/roles/{filter_type}',\App\Http\Livewire\Admin\Roles::class)->name('list_roles')->middleware('role_permissions');

		//Permisos
		Route::get('/permissions/{filter_type}',\App\Http\Livewire\Admin\Permission::class)->name('list_permissions')->middleware('role_permissions');

		//Notificaciones
		Route::get('/notifications/{filter_type}',\App\Http\Livewire\Admin\Notification::class)->name('list_notifications')
			//->middleware('role_permissions')
		;
		
		//Ajustes
		Route::get('/settings/{message?}',\App\Http\Livewire\Admin\Settings::class)->name('list_settings')->middleware('role_permissions');
	}


);


?>