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
  // test
Route::get('test','TestController@test')->name('test');

  // services

Route::get('/getMenu', 'MenuController@getMenu')->name('get-menu');
Route::post('/set-lang', function (){
    \Illuminate\Support\Facades\Cookie::queue('lang', request()->post('lang'));
})->name('set-lang');

  // base

Auth::routes();

  // controllers

Route::middleware(['lang', 'visitor', \App\Http\Middleware\UserLocationFixator::class])->group(function () {
    Route::get('/', 'IndexController@index');
    Route::get('/ua', 'IndexController@index');
    Route::get('/ru', 'IndexController@index');

    Route::group(['prefix' => 'ua'], function () {
        Route::group(['prefix' => 'news'], function () {
            Route::get('/{ident}', 'NewsController@oneArticle')->name('one_article');
            Route::post('/comment', 'NewsController@setComment')->name('set_comment')->middleware('auth');
        });
    });

    Route::group(['prefix' => 'ru'], function () {
        Route::group(['prefix' => 'news'], function () {
            Route::get('/{ident}', 'NewsController@oneArticle')->name('one_article');
            Route::post('/comment', 'NewsController@setComment')->name('set_comment')->middleware('auth');
        });
    });

    Route::group(['prefix' => 'news'], function () {
        Route::get('/{ident}', 'NewsController@oneArticle')->name('one_article');
        Route::post('/comment', 'NewsController@setComment')->name('set_comment')->middleware('auth');
    });

    Route::group(['prefix' => 'category'], function () {
        Route::get('/{category}', 'CategoryController@getAllByCategory')->name('by_category_news');
    });

    Route::middleware(['auth', \App\Http\Middleware\AuthForAdmin::class])->group(function () {
        Route::group(['prefix' => 'admin'], function () {
            Route::get('dashboard','Admin\DashboardController@index')->name('dashboard');
            Route::get('categories/relation','Admin\CategoryController@newsTagRelation')->name('news-category-relation');
            Route::post('categories/relation','Admin\CategoryController@saveNewsTagRelation')->name('save-tag-category-relation');
            Route::post('categories/tag/unuse','Admin\CategoryController@setUnuseTag')->name('save-tag-unuse');
            Route::get('categories/list','Admin\CategoryController@categoryList')->name('categories-list');
            Route::post('categories/create','Admin\CategoryController@createCategory')->name('categories-create');
            Route::put('categories/change-position','Admin\CategoryController@changeCategoryPosition')->name('change-position');

        });

        Route::group(['prefix' => 'user'], function () {
            Route::get('dashboard','User\DashboardController')->name('user-dashboard');
        });

    });

});
//Route::middleware(['lang'])->group(function () {
//    Auth::routes();
//});
