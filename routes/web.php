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

// Redirect root URL to /student
Route::get('/', function(){
    return redirect('student');
});

/********************
 *
 * Grouping for all /student/* routes
 *
 ********************/
Route::prefix('student')->group(function () {
    Route::get('/', 'StudentController@index');
    Route::post('/', 'StudentController@storeLogin');

    Route::get('/register', 'StudentController@createRegister');
    Route::post('/register', 'StudentController@storeRegister');

    Route::get('/confirmation', 'StudentController@createConfirmation');

    Route::get('/verify/{token}', 'StudentController@verifyEntry');

    Route::get('/home', 'StudentController@createHome');
});


/********************
 *
 * Grouping for all /adviser/* routes
 *
 ********************/
Route::prefix('adviser')->group(function () {
    Route::get('/', 'AdviserController@index');
    Route::post('/', 'AdviserController@storeLogin');

    Route::get('/register', 'AdviserController@createRegister');
    Route::post('/register', 'AdviserController@storeRegister');

    Route::get('/confirmation', 'AdviserController@createConfirmation');

    Route::get('/verify/{token}', 'AdviserController@verifyEntry');

    Route::get('/home', 'AdviserController@createHome');
});
