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

Route::get('/', 'HomeController'); //nao tem @alguma_action porque o __invoke() está setado
Route::view('/teste', 'teste');

Route::prefix('/tarefas')->group(function(){
    Route::get('/', 'TarefasController@list'); //listagem de tarefas
    
    Route::get('add', 'TarefasController@add'); // tela para adiconar nova tarefa (somente view)
    Route::post('add', 'TarefasController@addAction'); //ação de adição de add (por isso é POST)

    Route::get('edit/{id}', 'TarefasController@edit'); //tela de edição
    Route::post('edit/{id}', 'TarefasController@editAction'); //ação de adição

    Route::get('delete/{id}', 'TarefasController@del'); //ação de deletar 

    Route::get('marcar/{id}','TarefasController@done'); //marcar resilvido ou não resolvido

});



Route::prefix('/config')->group(function(){

    Route::get('/', 'Admin\ConfigController@index'); 
    Route::post('/', 'Admin\ConfigController@index'); 

    Route::get('info', 'Admin\ConfigController@info');
    
    Route::get('permissoes', 'Admin\ConfigController@permissoes');

});


//Irá rodar o fallback quando nao encontrar nenhuma rota definida pelo programador
Route::fallback(function(){
    return view('404');
});