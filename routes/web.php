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