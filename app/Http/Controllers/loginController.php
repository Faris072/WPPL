<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index()
    {
        return view('login', [
            'title' => 'login',
            'css' => 'css/body.css',
            'css2' => '',
            'js' => 'js/body.js',
            'ckeditor' => ''
        ]);
    }


    public function authenticate(Request $request){

        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            //regenerate untuk membuat session baru
            $request->session()->regenerate();
            //intended adalah mengalihkan halaman ketika sudah melewati middleware
            //middleware untuk mengechek user sudah login atau belum. jika sudah maka akan diarahkan di route yg kita inginkan
            //untuk mengatur route bisa di app/providers/RouteServiceProvider.php
            return redirect()->intended('/dashboard');
        }
        //back untuk mengembalikan ke halaman sebelumnya
        //with untuk memberi session dengan nama sessionnya pada parameter pertama dan parameter kedua untuk isi session
        return back()->with('errorLogin', 'email dan password tidak sesuai');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
