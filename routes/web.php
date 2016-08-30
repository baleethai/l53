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
    return view('emails.auth.register');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('mail', function() {

	\Illuminate\Support\Facades\Mail::to('thinnakor.pattha@itorama.com')->send(new App\Mail\Register());

});