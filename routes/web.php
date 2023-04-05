<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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


Route::get('/test', function () {
//    \session()->put('printouts', [3 => 65,4 => 69]);
//    \session()->put('printouts', []);

    dump(\session('printouts'));
    return view('test');
});

// Route::post('/crop-image', '\App\Traits\Editor\Cropper@cropImage')->name('crop.image');
Route::post('/crop-image', '\App\Http\Livewire\Editors\Editor@cropImage')->name('crop.image');


Route::get('/lk', '\App\Http\Controllers\Pages\DashboardController@index')->middleware(['auth'])->name('dashboard');

Route::get('/', '\App\Http\Controllers\Pages\IndexController@index')->name('index');
Route::get('/{slug}', '\App\Http\Controllers\Pages\PageRouteController@index')->name('page');

Route::get('/{slug}/editors/{id}', '\App\Http\Controllers\Pages\PageRouteController@editorInertia')->name('editorInertia');


Route::get('/{slug}/editor', '\App\Http\Controllers\Pages\PageRouteController@format')->name('format');
Route::get('/{slug}/editor/{id}', '\App\Http\Controllers\Pages\PageRouteController@editor')->name('editor');




require __DIR__ . '/auth.php';



