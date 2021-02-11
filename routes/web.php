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


Route::resource('todo', 'TodoController');
/*
GET    - /todo            - index   - todo.index   - LISTA OS ITENS
GET    - /todo/create     - create  - todo.create  - FORM DE CRIAÇÃO
POST   - /todo            - store   - todo.store   - RECEBER OS DADOS E ADD ITEM
GET    - /todo/{id}       - show    - todo.show    - ITEM INDIVIDUAL
GET    - /todo/{id}/edit  - edit    - todo.edit    - FORM DE EDIÇÃO
PUT    - /todo/{id}       - update  - todo.update  - RECEBER OS DADOS E UPDATE ITEM
DELETE - /todo/{id}       - destroy - todo.destroy - DELETAR O ITEM
*/



Route::get('/', 'HomeController'); //nao tem @alguma_action porque o __invoke() está setado
Route::view('/teste', 'teste');

Route::prefix('/tarefas')->group(function(){
    Route::get('/', 'TarefasController@list')->name('tarefas.list'); //listagem de tarefas
    
    Route::get('add', 'TarefasController@add')->name('tarefas.add'); // tela para adiconar nova tarefa (somente view)
    Route::post('add', 'TarefasController@addAction'); //ação de adição de add (por isso é POST)

    Route::get('edit/{id}', 'TarefasController@edit')->name('tarefas.edit'); //tela de edição
    Route::post('edit/{id}', 'TarefasController@editAction'); //ação de adição

    Route::get('delete/{id}', 'TarefasController@del')->name('tarefas.del'); //ação de deletar 

    Route::get('marcar/{id}','TarefasController@done')->name('tarefas.done'); //marcar resilvido ou não resolvido

});



Route::prefix('/config')->group(function(){

    Route::get('/', 'Admin\ConfigController@index')->middleware('auth'); 
    Route::post('/', 'Admin\ConfigController@index'); 

    Route::get('info', 'Admin\ConfigController@info');
    
    Route::get('permissoes', 'Admin\ConfigController@permissoes');

});

Route::get('/login', function(){
    echo 'Pagina de login';
})->name('login');
 

//Irá rodar o fallback quando nao encontrar nenhuma rota definida pelo programador
Route::fallback(function(){
    return view('404');
});