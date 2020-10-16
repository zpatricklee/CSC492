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
Route::get('/student', 'PreController@testStudentHome');



/********************
 *
 * Grouping for all /adviser/* routes
 *
 ********************/
Route::prefix('adviser')->group(function () {
    Route::get('/home', 'AdviserController@createHome');
});
