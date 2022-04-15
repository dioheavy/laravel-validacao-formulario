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

Route::get('/', function () {
    return view('index');
});

/*
** IMPORTANTE: No laravel 8 é preciso colocar o caminho absoluto do controllador no arquivo web.php
*/

Route::get('/produtos','App\Http\Controllers\ControladorProduto@index');

Route::get('/categorias','App\Http\Controllers\ControladorCategoria@index');
Route::get('/categorias/novo','App\Http\Controllers\ControladorCategoria@create');
Route::post('/categorias','App\Http\Controllers\ControladorCategoria@store');

// Rota utilizada para editar o registro, utilizando o metodo edit da controller  'ControladorCategoria'
Route::get('/categorias/editar/{id}','App\Http\Controllers\ControladorCategoria@edit');

// Rota utilizada para atualizar o registro, utilizando o metodo update da controller 'ControladorCategoria'
Route::post('/categorias/{id}','App\Http\Controllers\ControladorCategoria@update');

// Rota simples para apagar um registro utilizando o metodo destroy da controller 'ControladorCategoria'
Route::get('/categorias/apagar/{id}','App\Http\Controllers\ControladorCategoria@destroy');