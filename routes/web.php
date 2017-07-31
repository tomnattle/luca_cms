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

Route::get('/','Cms\HomeController@index');
Route::get('/company/home','Cms\HomeController@company')->name('/company/home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home/companies/edit','Cms\CompanyController@_edit')->name('articles._edit');
    Route::resource('/home/groups', 'Cms\GroupController');
    Route::resource('/home/articles', 'Cms\ArticleController');
    Route::resource('/home/article-cats', 'Cms\ArticleCatController');
    Route::resource('/home/companies', 'Cms\CompanyController');
    Route::resource('/home/albums', 'Cms\AlbumController');
    Route::resource('/home/photos', 'Cms\PhotoController');
    Route::put('/home/albums/setCover/{photoId}', 'Cms\AlbumController@setCover')->where('photoId', '[0-9]+');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
