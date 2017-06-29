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
    return view('goalsforlife');
});

Auth::routes();
Route::post('goal','GoalController@post')->name('goal');
Route::post('task','TaskController@post')->name('task');
Route::post('dashboard','HomeController@post');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/goal/{goalname}','GoalController@view');


Route::get('/prof', function () {
    return view('catogorizedView');
});
