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

Auth::routes();
#ホーム画面
#Route::get('/home', 'HomeController@index')->name('home');

#キャラクター関係(coc)
#Route::post('/coc_list', 'CocCharactorMain@list')->name('list');
Route::match(['get', 'post'],'/home','CocCharacterController@create');
//ajaxルート
Route::post('/job', 'CocCharacterController@job');
Route::post('/parameter_math', 'CocCharacterController@parameter');
