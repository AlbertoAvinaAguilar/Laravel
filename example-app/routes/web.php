<?php

use App\Http\Controllers\ProductosController;
use Illuminate\Support\Facades\Route;
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

//Retorna un html que se encuentra en resources, views, welcome.blade.php
Route::get('/', function () {
    return view('welcome');
});

//Ruta con parametro obligatorio y opcional
Route::get('saludo/{nombre}/{apellido_materno?}', function ($nombre, $apellido_materno = "") {
    return "Saludo " . $nombre . " " . $apellido_materno;
});

//Named Routes
Route::get('usuario', function () {
    return "Usuarios";
})->name('users');

Route::get('detalle', function () {
    echo "<a href='" . route('users') . "'> Ir a usuarios </a><br>";
});

//Best practice (Siempre que sea una ruta con nombre)
Route::get('inicio', function () {
    $nombre = "Mayte";
    return view('inicio')->with('nombre', $nombre);
})->name('inicio');

//Best Practice  //Tomar en cuenta el orden al momento de mostrar el formulario y al momentos de buscar por id
Route::get('productos', 'ProductosController@index')->name('productos.index');

Route::get('productos/create', 'ProductosController@create')->name('productos.create');

Route::post('productos', 'ProductosController@store')->name('productos.store'); //creamos en producto

Route::get('productos/{product}', 'ProductosController@show')->name('productos.show');

Route::get('productos/{product}/edit', 'ProductosController@edit')->name('productos.edit');

Route::match(['put','patch'],'productos/{product}', 'ProductosController@update')->name('productos.update');

Route::delete('productos/{product}', 'ProductosController@destroy')->name('productos.destroy');

//Ruta con multiples parametros y parametro opcional
Route::get('productos/{id}/{nombre}/{idPerfil?}',function($id,$nombre,$idPerfil = null){
    if($idPerfil){
        return "Bienvenido $nombre $id  numero $idPerfil";
    }else{
        return "Bienvenido $nombre $id";
    }
});

//Rutas en diferentes versiones de laravel
//Laravel 7 y anteriores
Route::get('mensaje','ProductosController@mensaje')->name('productos.mensaje');
//Laravel 8 y 9
Route::get('mensaje',[ProductosController::class,'mensaje'])->name('productos.mensaje');

//Rutas en un grupo compartiendo el mismo controlador
Route::controller(ProductosController::class)->group(function(){
    Route::get('productos', 'index')->name('productos.index');
    Route::get('productos/create', 'create')->name('productos.create');
    Route::post('productos', 'store')->name('productos.store'); //creamos en producto
    Route::get('productos/{product}', 'show')->name('productos.show');
    Route::get('productos/{product}/edit', 'edit')->name('productos.edit');
    Route::match(['put','patch'],'productos/{product}', 'update')->name('productos.update');
    Route::delete('productos/{product}', 'destroy')->name('productos.destroy');
});




