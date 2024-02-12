<?php

use App\Http\Controllers\ExistenciasController;

use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/tienda', function (){
  return view('/tienda.index');
} );
 //acceso a la ruta mediante clases
 route::get('/tienda/create', [ExistenciasController::class,'create']);

 // automatizar todas las rutas para acceder a todas las vistas
 Route::resource('tienda', ExistenciasController::class)->middleware('auth');
 Auth::routes(['register'=>false, 'reset'=>'false']);

Route::get('/home', [ExistenciasController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function(){
  Route::get('/home', [ExistenciasController::class,'index'])->name('home');
});