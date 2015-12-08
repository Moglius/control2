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

Route::resource('usersApi','UsersController');

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
    Route::get('indexSec', [
        'uses' => 'UsersController@indexSec',
        'as' => 'UsersIndexSec',
    ]);
});

Route::group(['prefix' => 'replys'], function() {

    Route::get('show/{id}', [
        'uses' => 'ReplyController@show',
        'as' => 'ReplyShow',
    ]);
});

Route::group(['prefix' => 'tags'], function() {

    Route::get('show/{id}', [
        'uses' => 'TagsController@show',
        'as' => 'TagsShow',
    ]);
});

Route::group(['prefix' => 'roles'], function() {

    Route::get('show/{id}', [
        'uses' => 'RoleController@show',
        'as' => 'RoleShow',
    ]);
});

Route::group(['prefix' => 'status'], function() {

    Route::get('show/{id}', [
        'uses' => 'StatusController@show',
        'as' => 'StatusShow',
    ]);
});

Route::group(['prefix' => 'priority'], function() {

    Route::get('show/{id}', [
        'uses' => 'PriorityController@show',
        'as' => 'PriorityShow',
    ]);
});
