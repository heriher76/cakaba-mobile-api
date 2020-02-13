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

Route::group(['middleware' => 'auth'], function () use ($router) {
  //PROFILE
  Route::get('profile', 'UserController@profile');
  Route::put('profile/edit', 'UserController@editProfile');
  Route::put('profile/photo', 'UserController@editPhoto');
  Route::put('profile/password', 'UserController@editPassword');
  //GCM TOKEN
  Route::put('users/storegcmtoken', 'UserController@storeGCMToken');
  //GET USER
  Route::get('users', 'UserController@allUsers');
  Route::get('users/{id}', 'UserController@singleUser');
  Route::get('users/search/{name}', 'UserController@searchUser');
  //EVENT
  Route::get('events', 'EventController@index');
  Route::post('events/create', 'EventController@store');
  Route::put('events/update/{id}', 'EventController@update');
  Route::delete('events/delete/{id}', 'EventController@destroy');
  //MESSAGE
  Route::get('messages', 'ChatsController@fetchMessages');
  Route::post('messages/create', 'ChatsController@sendMessage');
});
Route::post('register', 'AuthController@register'); // register kader
Route::post('login', 'AuthController@login'); // login all
