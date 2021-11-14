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
    return view('welcome' , [
        'title' => 'Homepage | Selamat datang!',
        'css' => 'css/homepage.css'
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'title' => 'dashboard',
        'css' => 'css/body.css',
        'js' => 'js/body.js'
    ]);
});


Route::resource('/register', 'App\Http\Controllers\userController');
