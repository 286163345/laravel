<?php

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

//Route::get('/', function () {
//    return view('blade.welcome');
//});
Route::prefix('show')->group(function () {
    Route::resource('/company','CompanyController');
    Route::get('company/{id}/delete', [
//        'as' => 'users.delete',
        'company' => 'CompanyController@destroy',
    ]);
    Route::resource('/','MenuController');
});