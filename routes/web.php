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

Route::get('/admin/login', function () {
    return view('login');
    })->name('admin.login');

Route::get('/login','Frontend\RegistrationController@create')->name('login');

Route::get('/post', 'PostController@index')->name('post.index');
Route::get('/post/create', 'PostController@create')->name('post.create');
Route::post('/post/store', 'PostController@store')->name('post.store');
Route::get('/post/edit/{id}', 'PostController@edit')->name('post.edit');
Route::patch('/post/update/{id}', 'PostController@update')->name('post.update');

Route::get('/post/show/{id}', 'PostController@show')->name('post.show');
Route::delete('/post/delete/{id}', 'PostController@destroy')->name('post.delete');

Route::post('/user','userController@index');
Route::get('/subscribe','SubscriptionController@create');

// Questions
Route::get('/question-create','Backend\QuestionController@create')->name('question-create');

Route::post('/question-store','Backend\QuestionController@store')->name('question-store
');

Route::get('/question-show/{id}','Backend\QuestionController@show')->name('question-show');

Route::get('/question-edit/{id}','Backend\QuestionController@edit')->name('question-edit');

Route::delete('/question-delete/{id}','Backend\QuestionController@destroy')->name('question-delete');

Route::get('/question-index','Backend\QuestionController@index')->name('question-index');

Route::get('/answer-index','Backend\QuestionOptionController@index')->name('answer-index');

Route::get('/answer-show/{id}','Backend\QuestionOptionController@show')->name('answer-show');

Route::get('/answer-edit/{id}','Backend\QuestionOptionController@edit')->name('answer-edit');

Route::delete('/answer-delete/{id}','Backend\QuestionOptionController@destroy')->name('answer-delete');










Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/create-question', 'QuestionAnswerController@create')->name('create-question');

// Route::get('/index', 'QuestionAnswerController@index')->name('question-index');


