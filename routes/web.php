<?php
;
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
	// $admin = App\User::find(1);
	// $user = App\User::find(2);

	// $admin->notify(new App\Notifications\PaymentReceived($user));
    #return view('welcome');
});

// Auth::routes();

// Route::get('/home', 'HomeController@index');

Route::get('/mail', function() {

    Mail::send('emails.test', [], function($message) {
        $message->to('baleethai@gmail.com');
        $message->subject('E-Mail Example');
    });
    dd('Mail Send Successfully');

});