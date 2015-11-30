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

use App\Task;
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'tickets'], function() {

    Route::get('show/{id}', [
        'uses' => 'TicketsController@show',
        'as' => 'ticketsShow',
    ]);
});

Route::group(['prefix' => 'users'], function() {

    Route::get('show/{id}', [
        'uses' => 'UsersController@show',
        'as' => 'UsersShow',
    ]);
});

Route::group(['prefix' => 'reply'], function() {

    Route::get('show/{id}', [
        'uses' => 'ReplyController@show',
        'as' => 'ReplyShow',
    ]);
});
