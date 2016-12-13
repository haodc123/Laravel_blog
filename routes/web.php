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
Route::singularResourceParameters();
Route::get('/', function () {
    return view('welcome');
});
Route::resource('articles', 'ArticlesController');
Route::resource('authors', 'AuthorsController');
Route::resource('articles.recommendations', 'RecommendationController', ['only' => ['create', 'store']]);
Route::get('articles/page-aj/{page}', 'ArticlesController@paging_aj')->name('paging_aj_articles');
Route::get('articles/page/{page}', 'ArticlesController@paging')->name('paging_articles');

Route::get('admin', function() {
    return redirect('admin/post');
});

Route::group(['namespace' => 'Admin', 'middleware'=>['admin']], function() {
    Route::resource('admin/post', 'PostController'); // App/Http/Controller/Admin/PostController
    Route::resource('admin/tag', 'TagController');
    Route::get('admin/upload', 'UploadController@index');
});

Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');
