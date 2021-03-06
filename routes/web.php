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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'App\Http\Controllers\DashboardController@index')->name('dashboard');

// Main routes
Route::get('/subject', 'App\Http\Controllers\SubjectController@index')->name('subject');
Route::get('/subject/create', 'App\Http\Controllers\SubjectController@create')->name('subject.create');
Route::get('/subject/{id}/edit', 'App\Http\Controllers\SubjectController@edit')->name('subject.edit')->where('id', '[0-9]+');

Route::get('/grade', 'App\Http\Controllers\GradeController@index')->name('grade');
Route::get('/grade/create', 'App\Http\Controllers\GradeController@create')->name('grade.create');
Route::get('/grade/{id}/edit', 'App\Http\Controllers\GradeController@edit')->name('grade.edit')->where('id', '[0-9]+');

Route::get('/students/{gradeId?}', 'App\Http\Controllers\StudentController@index')->name('students');
Route::get('/student/create', 'App\Http\Controllers\StudentController@create')->name('student.create');
Route::get('/student/{id}/edit', 'App\Http\Controllers\StudentController@edit')->name('student.edit')->where('id', '[0-9]+');
Route::get('/student/{id}/profile', 'App\Http\Controllers\StudentController@profile')->name('student.profile')->where('id', '[0-9]+');

Route::get('/marks', 'App\Http\Controllers\MarkController@index')->name('marks');
Route::get('/marks/create', 'App\Http\Controllers\MarkController@create')->name('marks.create');
Route::get('/marks/{id}/edit', 'App\Http\Controllers\MarkController@edit')->name('marks.edit')->where('id', '[0-9]+');
// Livewire
// Route::livewire('/subject/create', 'add-subject');