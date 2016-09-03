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

Route::get('/getRequest', function() {
    if ( Request::ajax() ) {
        return ' getRequest ';
    }
});

Route::post('/register', function() {
    if ( Request::ajax() ) {
        $json = Response::json( Request::all() );
        
        dd($json);
        
        return '';
    }
});
