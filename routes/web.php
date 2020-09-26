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

Route::get('/', 'PreController@index');
Route::post('/', 'PreController@storeLogin');

Route::get('/register', 'PreController@createRegister');
Route::post('/register', 'PreController@storeRegister');

Route::get('/confirmation', 'PreController@createConfirmation');




/********************
 *
 * Grouping for all /advisor/* routes
 *
 ********************/
Route::prefix('advisor')->group(function () {

});
