<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});

Route::get('admin', 'AdminController@adminIndex');

//************** QUIZZ **************//
Route::get('admin/quizz', 'QuizzController@quizzIndex');
Route::get('admin/quizz/new', 'QuizzController@quizzNew');
Route::post('admin/quizz/create', 'QuizzController@quizzCreate');

//************** Question **************//
Route::get('admin/question/new', 'QuestionController@questionNew');
Route::post('admin/question/create', 'QuestionController@questionCreate');
Route::get('admin/question/show/{id}', 'QuestionController@questionShow');
Route::get('admin/question/edit/{id}', 'QuestionController@questionEdit');


//************** REPONSE **************//
Route::get('admin/reponse/new', 'ReponseController@reponseNew');
Route::post('admin/reponse/create', 'ReponseController@reponseCreate');

//************** USER **************//
Route::get('admin/profil/show/{id}', [
	'as' => 'userShow', 'uses' => 'UserController@userShow']);
Route::get('admin/profil/edit/{id}', [
	'as' => 'userEdit', 'uses' => 'UserController@userEdit']);
Route::post('admin/profil/update', 'UserController@userUpdate');
Route::get('admin/profil/destroy/{id}', 'UserController@userDestroy');

//************** MOOC **************//
Route::get('mooc', 'MoocController@moocIndex');

//************** REFUGEE **************//
Route::get('refugee', 'RefugeeController@refugeeIndex');
Route::get('parrain', 'ParrainController@parrainIndex');
Route::get('forum', 'ChatController@forumIndex');

Route::get('youtube', 'VideoController@youtubeIndex');

Route::get('entreprise', 'Entre_priseController@entrepriseIndex');

