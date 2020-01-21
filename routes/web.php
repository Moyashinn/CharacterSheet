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
Route::get('/list', function(){
	return view('coc_new/list');
});
Route::post('/test','Test@test');
Route::match(['get', 'post'],'/home2','CocNew\Create@create');

Auth::routes();
#ホーム画面
#Route::get('/home', 'HomeController@index')->name('home');

#キャラクター関係(coc)
#Route::post('/coc_list', 'CocCharactorMain@list')->name('list');

Route::post('/save', 'CocCharacterController@save');
//ajaxルート
Route::post('/job', 'coc\CreateLimit@job');
Route::post('/parameter_math', 'coc\CreateLimit@parameter');
