<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\repo;
use App\Models\pembukuan;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = user::all();
        return view('/admin',[
            'title' => 'Dashboard Admin',
            'css' => '',
            'js' => '',
            'data' => $data,
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
        return view('adduser',[
            'title' => 'Add User',
            'css' => '',
            'js' => '',
            'ckeditor' => ''
        ]);
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
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'username' => 'required|min:5|max:255',
            'email' => 'required|email:dns',
            'phone' => 'required',
            'admin' => 'required'
        ]);

        user::where('id', $id)->update($validatedData);

        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $repo = repo::all()->where('id',$id);
        $i=0;
        foreach($repo as $y){
            $x[$i]=$y->id_repo;
            $i++;
        }
        $j=0;
        while($repo){
            pembukuan::destroy('id_repo', $x[$j]);
            $j++;
        }
        repo::destroy($id);
        user::destroy($id);
        return redirect('/admin');
    }
}
