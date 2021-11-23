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

Route::get('/dashboard', function () {
    return view('dashboard', [
        'title' => 'dashboard',
        'css' => 'css/body.css',
        'css2' => '',
        'js' => 'js/body.js',
        'ckeditor' => 'test'
    ]);
})->middleware('auth');

Route::resource('/dashboard/repo','repoController')->middleware('auth');
Route::resource('/dashboard/repo/pembukuan', PembukuanController::class)->middleware('auth');

Route::get('/test', function () {
    return view('test');
});



