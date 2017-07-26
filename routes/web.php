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


Route::middleware(['auth'])->group(function(){
  Route::put('/addvote/{id}',[
      'uses'=> 'QuestionsController@addVote',
      'as' => 'addVote',
  ]);
  Route::post('/addVote/{id}',[
      'uses'=> 'AnswersController@addVote',
      'as' => 'answer.addVote',
  ]);

  Route::get('/questions/graphics',[
    'uses' => 'QuestionsController@graphics',
    'as' => 'showGraphs'
  ]);
  Route::get('/winners/{id}',[
    'uses' => 'QuestionsController@winners',
    'as' => 'winners'
  ]);
  Route::get('/votesQuestions',[
    'uses' => 'QuestionsController@totalVotes',
    'as' => 'votesQuestions',
  ]);

  Route::get('/votesanswers/{id}',[
    'uses' => 'QuestionsController@totalVotes',
    'as' => 'votesQuestions',
  ]);
  Route::get('/graphicsquestion/{id}',[
    'uses' => 'QuestionsController@showvotes',
    'as' => 'showGraphsVotes',
  ]);
  Route::post('adduser/{idUser}/{idGroup}',[
    'uses' => 'GroupsController@addUser',
    'as' => 'addUserToGroup',
  ]);
  Route::post('deleteuser/{idUser}/{idGroup}',[
    'uses' => 'GroupsController@deleteUser',
    'as' => 'deleteUserOfGroup',
  ]);
  Route::resource('questions','QuestionsController');
  Route::resource('answers','AnswersController');
  Route::resource('groups','GroupsController');
  Route::resource('users','UsersController');
});
