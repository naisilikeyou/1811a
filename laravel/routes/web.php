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
Route::resource('index','StudentsController');

Route::any('login','StudentsController@login');
Route::any('reg','StudentsController@reg');

Route::group(['preifx'=>'Students','middleware'=>'jwt'],function(){
    Route::any('check','StudentsController@check');
});