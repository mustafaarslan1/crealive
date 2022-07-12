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

Route::get('/', 'PagesController@index');

Route::group(['middleware' => ['auth']], function() {
    Route::namespace('Backend')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/', 'DashboardController@index')->name('admin-home');

            Route::namespace('Post')->group(function () {
                Route::prefix('posts')->group(function () {
                    Route::get('/', 'PostController@index')
                        ->name('post-index');
                    Route::get('/json', 'PostController@json')
                        ->name('post-json');
                    Route::get('/add', 'PostController@add')
                        ->name('post-add');
                    Route::get('/update/{id?}', 'PostController@update')
                        ->name('post-update')
                        ->middleware(['checkPost']);
                    Route::post('/save', 'PostController@save')
                        ->name('post-save');
                    Route::get('/delete/{id?}', 'PostController@delete')
                        ->name('post-delete')
                        ->middleware(['checkPost']);
                });
            });

            Route::namespace('Category')->group(function () {
                Route::prefix('categories')->group(function () {
                    Route::get('/', 'CategoryController@index')
                        ->name('category-index');
                    Route::get('/json', 'CategoryController@json')
                        ->name('category-json');
                    Route::get('/add', 'CategoryController@add')
                        ->name('category-add');
                    Route::get('/update/{id?}', 'CategoryController@update')
                        ->name('category-update');
                    Route::post('/save', 'CategoryController@save')
                        ->name('category-save');
                });
            });

            Route::namespace('User')->group(function () {
                Route::prefix('users')->group(function () {
                    Route::get('/', 'UserController@index')
                        ->name('user-index');
                    Route::get('/json', 'UserController@json')
                        ->name('user-json');
                    Route::get('/add', 'UserController@add')
                        ->name('user-add')
                        ->middleware(['checkPower:1']);
                    Route::get('/update/{id?}', 'UserController@update')
                        ->name('user-update')
                        ->middleware(['checkPower:1']);
                    Route::post('/save', 'UserController@save')
                        ->name('user-save')
                        ->middleware(['checkPower:1']);
                    Route::get('/delete/{id?}', 'UserController@delete')
                        ->name('user-delete')
                        ->middleware(['checkPower:1']);
                });
            });
        });
    });
});

Route::namespace('Frontend')->group(function () {
    Route::get('/', 'HomeController@index')->name('home-index');
    Route::get('/post-detail/{id?}', 'HomeController@detail')->name('home-detail');
});

Route::get('/admin/login', 'AuthController@index')->name('login');
Route::post('/admin/login', 'AuthController@save')->name('login-form');
Route::get('/logout', 'AuthController@logout')->name('logout');

