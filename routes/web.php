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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'Home'
]);
/*
|--------------------------------------------------------------------------
| Админка
|--------------------------------------------------------------------------
|
| Функции админа
|
*/

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.',
    'middleware' => ['auth', 'is_admin']
], function () {

    Route::get('/parser', 'ParserController@index')->name('parser');

    Route::get('/users', 'UserController@index')->name('updateUser');
    Route::get('/users/toggleAdmin/{user}', 'UserController@toggleAdmin')->name('toggleAdmin');

    Route::resource('/news', 'NewsController')->except('show');
    Route::get('/news/{some}', function () {
        abort(404);
    });
});

Route::match(['get', 'post'], '/profile', 'ProfileController@update')->name('updateProfile');

Route::group([
    'prefix' => 'news',
    'as' => 'news.'
], function () {
    Route::get('/', 'NewsController@index')->name('index');
    Route::get('/one/{news}', 'NewsController@show')->name('show');
    Route::group([
        'as' => 'category.'
    ], function () {
        Route::get('/categories', 'CategoryController@index')->name('index');
        Route::get('/category/{name}', 'CategoryController@show')->name('show');
    });
});


Route::get('/auth/vk', 'LoginController@loginVK')->name('vkLogin');
Route::get('/auth/vk/response', 'LoginController@responseVK')->name('vkResponse');


Route::view('/vue', 'vue')->name('vue');

Auth::routes();


