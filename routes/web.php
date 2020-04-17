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

Route::get('/', 'PagesController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/home', 'QuestionsController@add_question');\

Route::get('/play', 'PagesController@play');

Route::get('/contact', 'PagesController@contact');

Route::get('/play/{category}', 'QuestionsController@play');

Route::get('/play/{category}/next', 'QuestionsController@handle_ajax');

Route::get('/answer', 'QuestionsController@check_answer');

Route::post('/user-form-submit/{score}', 'UsersController@add_users');

Route::get('/leaderboard/{name}', 'PagesController@leaderboard');

Route::get('/leaderboard/all', 'PagesController@leaderboard');

Route::get('/privacy-policy', 'PagesController@privacy_policy');
