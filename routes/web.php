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


Auth::routes();

Route::get('/admin/home', 'HomeController@index')->middleware('admin');
Route::get('/admin/info', 'HomeController@info')->middleware('admin');
Route::post('/admin/upload', 'HomeController@upload')->middleware('admin');

Route::get('/admin/home-normal', 'HomeController@normal')->middleware('auth');
