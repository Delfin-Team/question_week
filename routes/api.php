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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::put('addVote/{id}','Api\QuestionsController@addVote');
Route::put('voteforanswer/{id}','Api\AnswersController@addVote');
Route::get('questionweek','Api\QuestionsController@questionWeek');

Route::resource('questions','Api\QuestionsController');
Route::resource('answers','Api\AnswersController');

Route::resource('groups','Api\GroupsController');
Route::resource('users','Api\UsersController');


//Logging
Route::post('authenticate','Api\UsersController@authenticate');
//register
Route::post('register','Api\UsersController@register');

Route::middleware(['jwt.auth'])->group(function () {
  Route::resource('groups','Api\GroupsController');

});
