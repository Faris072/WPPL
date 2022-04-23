<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class settingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profil', [
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
        return view('setting', [
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
    public function update(Request $request, User $profil)
    {
        $validate = $request->validate([
            'username' => 'min:4|max:50|required',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,svg|max:2048',
            'phone' => 'required',
            'password' => 'min:8|nullable'
        ]);

        // Upload Photo Profile
        $image = $request->file('foto');
        if ($image) {
            $ekstensi = $image->getClientOriginalExtension();
            $namaFoto = date('ymdHis') . '.' . $ekstensi;
            $image->storeAs('/public/foto', $namaFoto);
            $validate['foto'] = $namaFoto;
        } else $validate['foto'] = $profil->foto;

        // set password
        if ($validate['password']) $validate['password'] = bcrypt($validate['password']);
        else unset($validate['password']);

        if ($profil->update($validate)) {
            return redirect()
                ->route('profil.index', $profil->id)
                ->with('success', 'Data Berhasil Diubah');
        } else {
            return redirect()
                ->route('profil.edit', $profil->id)
                ->with('error', 'Data Gagal Diubah');
        }
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
