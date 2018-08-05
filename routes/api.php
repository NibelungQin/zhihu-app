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


Route::get('/topics','TopicsApiController@topicsApi')->middleware('api');

Route::post('/question/follower','QuestionFollowController@follower')->middleware('auth:api');

Route::post('/question/follow','QuestionFollowController@followThisQuestion')->middleware('auth:api');

Route::get('user/followers/{id}','FollowersController@index');
Route::post('user/follow','FollowersController@follow');

Route::post('answer/{id}/vote/user','VotesController@index');
Route::post('user/vote','VotesController@vote');

Route::post('message/store','MessagesController@store');

Route::get('question/{id}/comments','CommentsController@question');
Route::get('answer/{id}/comments','CommentsController@answer');
Route::post('comments','CommentsController@store');


//Route::middleware('api')->prefix('v1')->group(function (){
//   Route::get();
//   Route::prefix('add')->group(function (){
//      Route::post();
//   });
//   Route::prefix('edit')->group(function (){
//      Route::put();
//      Route::patch();
//   });
//   Route::prefix('del')->group(function (){
//      Route::delete();
//   });
//});