<?php
use App\Local;
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




Route::get('/', 'LocalController@index');


Route::resource('locals', 'LocalController');

/*
Route::get('/local/create', 'LocalController@create');

Route::post('local/create', function(){

	Local::create(Input::all());

	var_dump('Local adicionado');

});
*/
