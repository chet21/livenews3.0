<?php

use Illuminate\Support\Facades\Route;

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
Route::get('test','TestController@test')->name('test');


Route::middleware(['lang', 'visitor'])->group(function () {
    Route::get('/', 'IndexController@index');

    Route::group(['prefix' => 'news'], function () {
        Route::get('/{ident}', 'NewsController@oneArticle')->name('one_article');
        Route::post('/comment', 'NewsController@setComment')->name('set_comment')->middleware('auth');
    });

    Route::group(['prefix' => 'category'], function () {
        Route::get('/{category}', 'CategoryController@getAllByCategory')->name('by_category_news');
    });

//Route::middleware('auth:admin')->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('dashboard','Admin\DashboardController@index')->name('dashboard');
        Route::get('categories/relation','Admin\CategoryController@newsTagRelation')->name('news-category-relation');
        Route::post('categories/relation','Admin\CategoryController@saveNewsTagRelation')->name('save-tag-category-relation');
        Route::post('categories/tag/unuse','Admin\CategoryController@setUnuseTag')->name('save-tag-unuse');
        Route::get('categories/list','Admin\CategoryController@categoryList')->name('categories-list');
        Route::post('categories/create','Admin\CategoryController@createCategory')->name('categories-create');
        Route::put('categories/change-position','Admin\CategoryController@changeCategoryPosition')->name('change-position');

    });
//});

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
