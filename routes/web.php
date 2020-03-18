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
    return view('frontend.test.firstpage');
});

Route::get('/admin/login', function () {
    return view('login');
    })->name('admin.login');

Route::get('/user/login','Frontend\RegisterController@create')->name('login');

Route::get('/admin/register','Auth\RegisterController@showRegistrationForm')->name('admin.register');



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
Route::post('/question-update/{id}','Backend\QuestionController@update')->name('question-update');

Route::delete('/question-delete/{id}','Backend\QuestionController@destroy')->name('question-delete');

Route::get('/question-index','Backend\QuestionController@index')->name('question-index');

//Options 

Route::get('/answer-index','Backend\AnswerController@index')->name('answer-index');

Route::get('/answer-show/{id}','Backend\AnswerController@show')->name('answer-show');

Route::get('/answer-edit/{id}','Backend\AnswerController@edit')->name('answer-edit');
Route::post('/answer-update/{id}','Backend\AnswerController@update')->name('answer-update');
Route::delete('/answer-delete/{id}','Backend\QuestionOptionController@destroy')->name('answer-delete');

//Group of question

Route::get('/group-index','Backend\GroupController@index')->name('group-index');
Route::get('/group-create','Backend\GroupController@create')->name('group-create');
Route::post('/group-store','Backend\GroupController@store')->name('group-store
');
Route::get('/group-edit/{id}','Backend\GroupController@edit')->name('group-edit');

Route::get('/group-show/{id}','Backend\GroupController@show')->name('group-show');
Route::post('/group-update/{id}','Backend\GroupController@update')->name('group-update');
Route::delete('/group-delete/{id}','Backend\GroupController@destroy')->name('group-delete');

//Level of question

Route::get('/level-index','Backend\LevelController@index')->name('level-index');
Route::get('/level-create','Backend\LevelController@create')->name('level-create');
Route::post('/level-store','Backend\LevelController@store')->name('level-store
');
Route::get('/level-show/{id}','Backend\LevelController@show')->name('level-show');
Route::get('/level-edit/{id}','Backend\LevelController@edit')->name('level-edit');
Route::post('/level-update/{id}','Backend\LevelController@update')->name('level-update');
Route::delete('/level-delete/{id}','Backend\LevelController@destroy')->name('level-delete');

//Test

Route::get('/online-quiz-view','Frontend\TestController@getQuizview')->name('online-quiz-view');
Route::get('/quiz','Frontend\TestController@getQuiz')->name('quiz-view');
// Route::get('/online-quiz','Frontend\TestController@createQuiz')->name('online-quiz-create');
Route::get('/test','Frontend\TestController@create')->name('test-create');
Route::post('/test-store','Frontend\TestController@store')->name('test-store');

//Result of specific test

Route::get('/result-show/{id}','Frontend\ResultController@show')->name('result-show');

//Show user result list

Route::get('/user-result-list','Backend\ManageUserResultController@index')->name('user-result-index');
Route::get('/user-result-show/{id}','Backend\ManageUserResultController@show')->name('user-result-show');
Route::delete('/user-result-delete/{id}','Backend\ManageUserResultController@destroy')->name('user-result-delete');

//User 

Route::get('/user-index','Backend\UserController@index')->name('user-index');

Route::get('/user-show/{id}','Backend\UserController@show')->name('user-show');

Route::delete('/user-delete/{id}','Backend\UserController@destroy')->name('user-delete');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

