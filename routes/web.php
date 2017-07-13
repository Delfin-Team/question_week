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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::put('/addVote/{id}',[
    'uses'=> 'QuestionsController@addVote',
    'as' => 'addVote',
]);
Route::post('/addVote/{id}',[
    'uses'=> 'AnswersController@addVote',
    'as' => 'answer.addVote',
]);
Route::post('/registerVote/{id}',[
    'uses'=> 'QuestionsController@registerVote',
    'as' => 'registerVote',
]);
Route::get('/questions/graphics',[
  'uses' => 'QuestionsController@graphics',
  'as' => 'showGraphs'
]);

Route::get('/votesQuestions',[
  'uses' => 'QuestionsController@totalVotes',
  'as' => 'votesQuestions',
]);


Route::resource('questions','QuestionsController');

Route::resource('answers','AnswersController');
