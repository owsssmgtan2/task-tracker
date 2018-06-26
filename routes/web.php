<?php

date_default_timezone_set("Australia/Melbourne");
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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout' , 'Auth\LoginController@logout');


Route::get('/', function () {
        if (Auth::check()) {
    		return redirect("/home");
    	}else{
    		return redirect("/login");
    	}
});

Route::get('/users', 'UserController@index');
Route::post('/users/create', 'UserController@create');
Route::patch('/users/update/{user}', 'UserController@update');
Route::patch('/users/delete/{user}', 'UserController@delete');


Route::get('/transactions', 'TaskController@index');
Route::post('/tasks/create', 'TaskController@create');
Route::patch('/tasks/update/{task}', 'TaskController@update');
Route::patch('/tasks/delete/{task}', 'TaskController@delete');
Route::post('/tasks/qasummary', 'TaskController@qa_summary');
Route::post('/tasks/mitsummary', 'TaskController@mit_summary');

Route::post('/subtasks/load', 'SubTaskController@load');
Route::post('/subtasks/create', 'SubTaskController@create');
Route::patch('/subtasks/update/{subtask}', 'SubTaskController@update');
Route::patch('/subtasks/delete/{subtask}', 'SubTaskController@delete');

Route::post('/images/create', 'ImageController@create');
Route::patch('/images/update/{image}', 'ImageController@update');
Route::patch('/images/delete/{image}', 'ImageController@delete');

Route::post('/difficulties/create', 'DifficultyController@create');
Route::patch('/difficulties/update/{difficulty}', 'DifficultyController@update');
Route::patch('/difficulties/delete/{difficulty}', 'DifficultyController@delete');

Route::post('/outcomes/load', 'OutcomeController@load');
Route::post('/outcomes/create', 'OutcomeController@create');
Route::patch('/outcomes/update/{outcome}', 'OutcomeController@update');
Route::patch('/outcomes/delete/{outcome}', 'OutcomeController@delete');
Route::post('/outcomes/show', 'OutcomeController@show');
Route::post('/outcomes/paste', 'OutcomeController@paste');

Route::post('/saletypes/load', 'SaleTypeController@load');
Route::post('/saletypes/create', 'SaleTypeController@create');
Route::patch('/saletypes/update/{saletype}', 'SaleTypeController@update');
Route::patch('/saletypes/delete/{saletype}', 'SaleTypeController@delete');
Route::post('/saletypes/show', 'SaleTypeController@show');
Route::post('/saletypes/paste', 'SaleTypeController@paste');

Route::get('/logs', 'LogController@index');

Route::post('/tracks/subtaskchange', 'TrackerController@subtaskchange');
Route::post('/tracks/saveqatransaction', 'TrackerController@saveqatransaction');
Route::post('/tracks/changedate', 'TrackerController@changedate');
Route::patch('/tracks/editqatransaction/{track}', 'TrackerController@editqatransaction');

Route::post('/tracks/savegdtransaction', 'TrackerController@savegdtransaction');
Route::patch('/tracks/editgdtransaction/{track}', 'TrackerController@editgdtransaction');


