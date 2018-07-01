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

Route::get('/', function () {
    return view('notifications',['PUSHER_APP_KEY'=> env('PUSHER_APP_KEY'), 'PUSHER_APP_CLUSTER' => env('PUSHER_APP_CLUSTER'), 'PUSHER_APP_SECRET' => env('PUSHER_APP_SECRET')]);
});
Route::get('test', function () {
    event(new notify\Events\StatusLiked('Here comes my message', 'You can put your name here'));
    return "Event has been sent!";
});
