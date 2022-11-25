<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('/login', 'AuthController@login');
});

Route::prefix('auth')->group(function () {
    Route::get('/check', 'AuthController@userCheck');
});

Route::group([
    //'namespace' => 'API',
   // 'middleware' => ['auth'] //, 'cors','api',
    ], function($router) {

    Route::prefix('home')->group(function () {
        Route::get('/index', 'HomeController@index');
    });

    Route::prefix('home')->group(function () {
        Route::get('/cadastrar', 'HomeController@cadastrar');
    });

    
});