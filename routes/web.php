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
    Route::get('/', 'StudentController@index')->name('studentLogin');
    Route::post('/', 'StudentController@storeLogin')->name('studentLogin');

    Route::get('/register', 'StudentController@createRegister');
    Route::post('/register', 'StudentController@storeRegister');

    Route::get('/confirmation', 'StudentController@createConfirmation');

    Route::get('/verify/{token}', 'StudentController@verifyEntry');

    Route::get('/home', 'StudentController@createHome')->middleware(['auth:student']);
    Route::post('/home', 'StudentController@storeHome')->middleware(['auth:student']);

    Route::get('/logout', 'StudentController@logout');
});


/********************
 *
 * Grouping for all /adviser/* routes
 *
 ********************/
Route::prefix('adviser')->group(function () {
    Route::get('/', 'AdviserController@index')->name('adviserLogin');
    Route::post('/', 'AdviserController@storeLogin')->name('adviserLogin');

    Route::get('/register', 'AdviserController@createRegister');
    Route::post('/register', 'AdviserController@storeRegister');

    Route::get('/confirmation', 'AdviserController@createConfirmation');

    Route::get('/verify/{token}', 'AdviserController@verifyEntry');

    Route::get('/home', 'AdviserController@createHome')->middleware(['auth:adviser']);
    Route::post('/home', 'AdviserController@storeHome')->middleware(['auth:adviser']);

    Route::get('/viewStudent', 'AdviserController@createViewStudent')->middleware(['auth:adviser']);

    Route::get('/logout', 'AdviserController@logout');
});
