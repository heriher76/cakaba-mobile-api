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
  //MESSAGE
  Route::get('messages', 'ChatsController@fetchMessages');
  Route::post('messages/create', 'ChatsController@sendMessage');
  //Article
  Route::get('articles', 'ArticleController@index');
  Route::get('articles/{id}', 'ArticleController@show');
  //Calendar
  Route::get('calendars', 'CalendarController@index');
  Route::get('calendars/{id}', 'CalendarController@show');
  //Ebook
  Route::get('ebooks', 'EbookController@index');
  Route::get('ebooks/{id}', 'EbookController@show');
  //PROFILE CAKABA
  Route::get('cakaba-profile', 'CakabaProfileController@index');
  //StructureOrganization
  Route::get('structure-organization', 'StructureOrganizationController@index');
});
Route::post('register', 'AuthController@register'); // register kader
Route::post('login', 'AuthController@login'); // login all
