<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('testDB', function () {
    if(DB::connection()->getDatabaseName())
    {
        return "Yes! successfully connected to the DB: " . DB::connection()->getDatabaseName();
    }
});


Auth::routes();

Route::get('/home', 'HomeController@index');
