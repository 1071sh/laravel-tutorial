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

// 一覧
Route::get('/', 'StudentsController@index');
// 入力
Route::get('/store', 'StudentsController@store');
// 確認
Route::patch('/store', 'StudentsController@confirm');
// 完了
Route::post('/store', 'StudentsController@finish');
 //削除
Route::post('delete/{id}/', 'StudentsController@delete');

//編集
Route::get('edit/{id}/', 'StudentsController@edit_index');
//編集確認
Route::patch('edit/{id}/', 'StudentsController@edit_confirm');
//編集完了
Route::post('edit/{id}/', 'StudentsController@edit_finish');
