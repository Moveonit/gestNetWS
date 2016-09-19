<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
$api = app('Dingo\Api\Routing\Router');

$api->version('v1',function($api){
    $api->get('/prova', function (Request $request) {
        return "Prova";
    });

    $api->post('/authenticate','App\Http\Controllers\Auth\JwtAuthenticateController@authenticate');

});

$api->version('v1', ['middleware' => 'jwt.auth'], function($api){

    $api->get('/me', 'App\Http\Controllers\Auth\JwtAuthenticateController@me');

    $api->get('/utente', 'App\Http\Controllers\Auth\JwtAuthenticateController@index');

    $api->get('/pratiche', 'App\Http\Controllers\Auth\JwtAuthenticateController@pratiche');

    $api->get('/utente/{id}', 'App\Http\Controllers\Auth\JwtAuthenticateController@show');
});

