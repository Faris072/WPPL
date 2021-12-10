<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembukuanController;
use App\Http\Controllers\loginController;

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
    return view('welcome' , [
        'title' => 'Homepage | Selamat datang!',
        'css' => 'css/homepage.css'
    ]);
})->middleware('guest');

Route::resource('/register', 'App\Http\Controllers\userController')->middleware('guest');
Route::get('/login', 'App\Http\Controllers\loginController@index')->name('login')->middleware('guest');
Route::post('/login/authenticate','App\Http\Controllers\loginController@authenticate')->middleware('guest');
//ketika user yang belum login masuk ke halaman yang harus login dulu maka akan diredirect di route yang telah disediakan
//di App/Http/Middleware/Authenticate.php
Route::post('/logout',[loginController::class,'logout'])->middleware('auth');

Route::resource('/dashboard','App\Http\Controllers\repoController')->middleware('auth');

Route::get('/dashboard/pembukuan/{idRepo}', 'App\Http\Controllers\PembukuanController@index')->middleware('auth');
Route::get('/pembukuan/create', 'App\Http\Controllers\PembukuanController@create')->middleware('auth');
Route::post('/dashboard/pembukuan', 'App\Http\Controllers\PembukuanController@store')->middleware('auth');
Route::get('/dashboard/pembukuan/{idBuku}/edit', 'App\Http\Controllers\PembukuanController@edit')->middleware('auth');
Route::put('/pembukuan/{idBuku}', 'App\Http\Controllers\PembukuanController@update')->middleware('auth');
Route::delete('/pembukuan/{idBuku}/destroy', 'App\Http\Controllers\PembukuanController@destroy')->middleware('auth');
// Route::resource('/pembukuan', 'App\Http\Controllers\PembukuanController')->middleware('auth');

Route::get('/test', function () {
    return view('test');
});

Route::resource('/admin', 'App\Http\Controllers\adminController')->middleware('auth');
Route::resource('/profil', 'App\Http\Controllers\settingController')->middleware('auth');


