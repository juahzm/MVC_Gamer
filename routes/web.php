<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use App\Controllers\ClientController;
use App\Routes\Route;
use App\Controllers\ComponentController;
use App\Controllers\manufacturerController;

Route::get('/component/index', 'ComponentController@index');
Route::get('/component', 'ComponentController@index');
Route::get('/component/create', 'ComponentController@create');
Route::get('/component/show', 'ComponentController@show');
Route::post('/component/store', 'ComponentController@store');
Route::get('/component/edit', 'ComponentController@edit');
Route::post('/component/edit', 'ComponentController@update');
Route::post('/component/delete', 'ComponentController@delete');

Route::get('/manufacturer', 'manufacturerController@index');

Route::get('/client/create', 'ClientController@create');
Route::post('/client/create', 'ClientController@store');

Route::get('/login', 'AuthController@index'); //index c'est la page login
Route::post('/login', 'AuthController@store');
Route::get('/logout', 'AuthController@delete'); //efacer la session

Route::get('/journal', 'JournalController@index');

Route::get('/generate-pdf', 'PdfController@index');


Route::dispatch();