<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController, App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Laravel
/*
Route::get('/', function () {
    return view('welcome');
});
*/

//Route::get('/',[HomeController::class,'home'])->name('home');
//Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/',Home::class)->name('home');

//cart
Route::get('/cart',Cart::class)->name('cart');

//product
Route::get('/product/{id}',Product::class)->name('product');

//addresses
Route::get('/address/{id}',Address::class)->name('address');
//para evitar pasar array en cada ruta podemos añadir la ruta 'App\Http\Controllers'
//en el archivo de configuración de rutas RouteServiceProvider.php en el namespace del 
//middleware web, en el método boot()
//Route::get('/home','HomeController@home')->name('home');

//login (blade)
Route::middleware('auth')->group(function(){
    //LiveWire
    Route::get('/home2',Home::class)->name('home2');
    //Route::get('/login',Login::class)->name('login');
});
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/login',[LoginController::class,'loginIn'])->name('login');
//register (blade)
Route::get('/register',[LoginController::class,'register'])->name('register');
Route::post('/register',[LoginController::class,'registerAdd'])->name('register');
//logout (blade)
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::post('/images2',[HomeController::class,'images'])->name('images');