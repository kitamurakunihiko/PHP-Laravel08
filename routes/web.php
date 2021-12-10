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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('news/create',
'Admin\NewsController@add');
    Route::post('news/create',
'Admin\NewsController@create');
    Route::get('news/create',
'Admin\NewsController@add');
    Route::get('news/update', 
'Admin\NewsController@update');
    Route::get('profile/create',
'Admin\ProfileController@add')->middleware('auth');
    Route::get('profile/edit',
'Admin\ProfileController@edit')->middleware('auth');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('news/create',
'Admin\NewsController@add');
    Route::get('news/create',
'Admin\NewsController@add');
    Route::get('news',
'Admin\NewsController@index');
    Route::post('profile,create',
'Admin\ProfileController@create');
    Route::post('profile/edit',
'Admin\ProfileController@update');
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
    Route::post('news/create', 'Admin\NewsController@create')->middleware('auth');
    Route::get('news', 'Admin\NewsController@index')->middleware('auth');
    Route::get('news/edit', 'Admin\NewsController@edit')->middleware('auth');
    Route::post('news/edit', 'Admin\NewsController@update')->middleware('auth');
    Route::get('news/delete', 'Admin\NewsController@delete')->middleware('auth');
});


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('profile/create',
'Admin\ProfileController@add');
    Route::post('profile,create',
'Admin\ProfileController@create');
    Route::post('profile/edit',
'Admin\ProfileController@update');
    Route::get('profile/edit',
'Admin\ProfileController@edit');
    Route::get('profile/edit',
'Admin\ProfileController@edit');
    Route::get('profile/delete', 
'Admin\ProfileController@delete');
    Route::get('profile',
'Admin\ProfileController@index');
//     プロフィール一覧が必要な場合
//     Route::get('news', 
// 'Admin\NewsController@index');
});
    



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
