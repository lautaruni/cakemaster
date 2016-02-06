<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/* API */
Route::get('api/save','ApiController@store');
Route::get('api/getbest/','ApiController@getBestsCakes');
Route::resource('api','ApiController');
//Route::post('/api/savecake','ApiController@saveCake');

/* ADMIN ROUTES */
Route::resource('cakes','CakeController');
Route::resource('ingredients','IngredientController');
Route::resource('types','TypeController');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
