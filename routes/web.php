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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Main routes
Route::get('/subject', 'App\Http\Controllers\SubjectController@index')->name('subject');
Route::post('/subject/store', 'App\Http\Controllers\SubjectController@store')->name('subject.store');
Route::get('/subject/create', 'App\Http\Controllers\SubjectController@create')->name('subject.create');

Route::get('/grade', 'App\Http\Controllers\GradeController@index')->name('grade');
// Livewire
// Route::livewire('/subject/create', 'add-subject');