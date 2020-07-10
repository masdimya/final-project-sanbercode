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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('questions', 'QuestionsController')->names([
            'show'  => 'question.show'
        ]);

Route::post('/question/addComment', 'QuestionsController@addComment');

Route::post('/answer/addComment', 'AnswerController@addComment');

Route::get('/question/{question_id}/{vote_type}','VoteController@voteQuestion');

Route::resource('answer', 'AnswerController',['only' => ['store','update','destroy']])
        ->names([
            'store'    => 'answer.add',
            'update'   => 'answer.update',
            'destroy'  => 'answer.delete'
        ]);
