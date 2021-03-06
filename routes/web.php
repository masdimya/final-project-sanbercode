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

Route::post('/question/{question_id}/{vote_type}','VoteController@voteQuestion')->name('question.vote');
Route::post('/question/{question_id}/answer/{answer_id}/{vote_type}','VoteController@voteAnswer')->name('answer.vote');

Route::post('/question/addComment', 'QuestionsController@addComment');

Route::post('/answer/addComment', 'AnswerController@addComment');
Route::post('/answer/{answer_id}/approve', 'AnswerController@approveAnswer')->name('answer.approve');


Route::get('/question/{question_id}/{vote_type}','VoteController@voteQuestion');

Route::resource('answer', 'AnswerController',['only' => ['store','update','destroy','edit']])
        ->names([
            'store'    => 'answer.add',
            'edit'     => 'answer.edit',
            'update'   => 'answer.update',
            'destroy'  => 'answer.delete'
        ]);
