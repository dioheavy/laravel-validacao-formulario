<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    return view('welcome');
});

Route::get('produtos', function () {
    return view('outras.produtos');
})->name('produtos');

Route::get('departamentos', function () {
    return view('outras.departamentos');
})->name('departamentos');

/*Route::get('produtos', function(){
    echo "<h1>Produtos</h1>";
        echo "<ol>";
        echo "<li>Notebook</li>";
        echo "<li>Impressora</li>";
        echo "<li>Mouse</li>";
        echo "</ol>";
});*/

//Obs. no laravel 8 é preciso colocar o caminho absoluto do controllador
//Fonte:https://mazer.dev/como-corrigir-o-erro-target-class-does-not-exist-no-laravel-8/

//Route::get('produtos', 'App\Http\Controllers\MeuControlador@produtos');
Route::get('santosoft', 'App\Http\Controllers\MeuControlador@santosoft');
Route::get('multiplicar/{n1}/{n2}','App\Http\Controllers\MeuControlador@multiplicar'); // Passando 2 parametros

Route::resource('clientes', 'App\Http\Controllers\ClienteControlador');

//Rota texto ou com View 
//Route::get('/santosoft', function(){
    //echo 'Bem Vindo a SantoSoft!';
    //return view('santoSoft');
//});

//Rota com Parametro
//Route::get('/rota/{nome}', function($nome){
    //echo 'Bem Vindo a '.$nome.'!';
    //echo "Bem Vindo $nome!";
    
//});

// Trabalhando com controlador
/*
** Primerio parametro é a rota, e o segundo parametro é o nome do controlador, e o método que será chamado por esta rota
*/

/*
** Cria um rota onde o parametro opção é opicional, por isso o '?', dentro da function inicia o valor com null
** Retorna a view passando o array opcao e define um apelido para chamar a rota em name
*/
Route::get('opcoes/{opcao?}',function($opcao=null){
    return view('outras.opcoes', compact(['opcao']));
})->name('opcoes');

Route::get('bootstrap', function(){
    return view('outras.exemplo');
});
