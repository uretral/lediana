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



Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/lk', '\App\Http\Controllers\Pages\DashboardController@index')->middleware(['auth'])->name('dashboard');

Route::get('/', '\App\Http\Controllers\Pages\IndexController@index')->name('index');
Route::get('/{slug}', '\App\Http\Controllers\Pages\PageRouteController@index')->name('page');

require __DIR__.'/auth.php';

