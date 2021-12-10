<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class settingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profil',[
            'title' => 'Profil',
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\controller  $controller
     * @return \Illuminate\Http\Response
     */
    public function show(controller $controller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\controller  $controller
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $dataProfil = user::find($user);
        return view('setting',[
            'title' => 'Edit Profil',
            'css2' => '',
            'js' => '',
            'ckeditor' => '',
            'dataProfil' => $dataProfil
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\controller  $controller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $namaAsli = $request->file('foto')->getClientOriginalName();
        $ekstensi = $request->file('foto')->getClientOriginalExtension();
        $namaFoto = date('ymdHis').'.'.$ekstensi;
        $request->file('foto')->storeAs('/foto', $namaFoto);
        $validatedData = $request->validate([
            'username' => 'min:4|max:50|required',
            'foto' => 'required|image|mimes:jpg,png,jpeg,svg|max:2048',
            'password' => 'required|min:8'
        ]);
        $validatedData['foto'] = $namaFoto;
        $validatedData['password'] = bcrypt($validatedData['password']);
        user::where('id',$id)->update($validatedData);
        return redirect('/profil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\controller  $controller
     * @return \Illuminate\Http\Response
     */
    public function destroy(controller $controller)
    {
        //
    }
}
