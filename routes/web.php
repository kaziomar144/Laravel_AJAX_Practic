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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students','StudentController@index');
Route::post('/add-students','StudentController@addStudent')->name('student.add');
Route::delete('/delete-students/{id}','StudentController@deleteStudent');
Route::get('/student/{id}','StudentController@getStudentById');
Route::put('/student','StudentController@updateStudent')->name('update.student');
Route::delete('/delete-selected','StudentController@deleteCheckedStudent')->name('student.deleteSelected');

Route::get('posts','PostController@index');
Route::get('chart','ChartController@index');
Route::get('bar-chart','ChartController@barChart');

Route::get('/form','FormController@index');
Route::post('/form','FormController@formSubmit')->name('submit.form');