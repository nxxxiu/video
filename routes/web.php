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

Route::get('/index','OssController@index');
Route::get('/videoindex','OssController@videoindex');

//转移本地文件
Route::get('/saveToOss','VideoController@saveToOss');

//视频详情页
Route::get('/detail','VideoController@detail');