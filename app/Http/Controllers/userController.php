<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register', [
            'title' => 'Register Page',
            'css' => '',
            'css2' => '',
            'js' => '',
            'ckeditor' => ''
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {

        $request['admin'] = false;
        $request['id'] = mt_rand(10000,99999);
        $request['foto'] = "default.jpg";
        $validatedData = $request->validate([
            'id' => 'required|max:10',
            'email' => 'required|email:dns|max:255|min:12',
            'username' => 'required|max:255|min:5',
            'foto' => '',
            'phone' => '',
            'password' => 'required_with:password2|same:password2|min:8|max:255',
            'admin' => 'required'
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);

        $cari = User::all()->where('email', $validatedData['email']);

        foreach($cari as $email){
            if($email->email == $validatedData['email']){
                return back()->with('pesan', 'Harap isikan email lagi');
            }
        }

        User::create($validatedData);

        return redirect('/login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        //
    }
}
