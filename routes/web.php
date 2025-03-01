<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use App\Controllers\HomeController;//applique pour tout controlleur que je vais creer et pour tout models, ex use App\Model
use App\Routes\Route;
use App\Controllers\ComponentController;



Route::get('/component', 'ComponentController@index');
Route::get('/component/create', 'ComponentController@create');
Route::get('/component/show', 'ComponentController@show');
Route::post('/component/store', 'ComponentController@store');
Route::get('/component/edit', 'ComponentController@edit');
Route::post('/component/edit', 'ComponentController@update');
Route::post('/component/delete', 'ComponentController@delete');


Route::get('/manufacturer', 'manufacturerController@index');





Route::get('/user/create', 'UserController@create');
Route::post('/user/store', 'UserController@store');

Route::dispatch();