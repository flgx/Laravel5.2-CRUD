<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['prefix' => 'api', 'middleware' => ['cors']], function(){
    Route::resource('courses', 'CourseController', ['except' => [
        'create', 'edit'
    ]]);
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('asd', function () {
    return view('welcome');
});
