<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index(){
        return view('productos.index');
    }

    public function create(){
        return 'aqui mostraremos el formulario para crear los productos';
    }

    public function store(){

    }

    public function show(){
        return 'Aqui mostraremos el producto con el id seleccionado {$product}';
    }

    public function edit(){
        return 'Aqui mostraremos el formulario para editar el producto con el id seleccionado {$product}';
    }

    public function update(){

    }

    public function destroy(){

    }

}
