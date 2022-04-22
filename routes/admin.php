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

	'middleware' => ['auth','admin'],
	'prefix'=>'/admin'
	],function(){
	//categories
	Route::get('/categories/{filter_type}',\App\Http\Livewire\Admin\Category::class)->name('categories');
	//Route::get('/admin',Admin\Category::class)->name('categories');

	//users
	Route::get('/users',\App\Http\Livewire\Admin\Users::class)->name('users');

	//Products
	Route::get('/products/{filter_type}',\App\Http\Livewire\Admin\Product::class)->name('products');
		
})


?>