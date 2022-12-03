<?php

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
Route::get('productos', function () {
    return 'aqui iran los productos';
})->name('productos.index');

Route::get('productos/create', function () { //Mostrar el formulario para crear un producto (siempre primero obigatoriamente 1)
    return 'aqui mostraremos el formulario para crear los productos';
})->name('productos.create');

Route::post('productos', function () { //Crear el producto
})->name('productos.store');

Route::get('productos/{product}', function ($product) { //Obtener un producto por su id (segunda despues de create)
    return 'Aqui mostraremos el producto con el id seleccionado {$product}';
})->name('productos.show');

Route::get('productos/{product}/edit', function ($product) { //Obtener un producto por su id
    return 'Aqui mostraremos el formulario para editar el producto con el id seleccionado {$product}';
})->name('productos.edit');

Route::match(['put','patch'],'productos/{product}', function ($product) { //Obtener un producto por su id

})->name('productos.update');

Route::delete('productos/{product}', function ($product) { //Obtener un producto por su id

})->name('productos.delete');




