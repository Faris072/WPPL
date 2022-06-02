<?php

namespace App\Http\Controllers;

use App\Models\repo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class repoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->admin == true){
            return redirect('/admin');
        }
        $auth = Auth::user();//mendapatkan id dari user yang login
        $repository = repo::all()->where('id', $auth->id);//mendapatkan semua kolom berdasarkan id = id dari user yg login
        session()->put('repository', $repository);
        return view('dashboard', [
            'title' => 'dashboard',
            'css' => 'css/body.css',
            'css2' => '',
            'js' => 'js/dashboard.js',
            'ckeditor' => 'test',
            'repository' => $repository,
            'auth' => $auth
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $auth = Auth::user();//mendapatkan id dari user yang login
        $repository = repo::all()->where('id', $auth->id);//mendapatkan semua kolom berdasarkan id = id dari user yg login
        return view('createrepo', [
            'title' => 'Add a new repository',
            'css2' => '',
            'js' => '',
            'ckeditor' => 'descrepo',
            'repository' => $repository,
            'auth' => $auth
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
        $request['id'] = Auth::user()->id;
        $request['id_repo'] = mt_rand(1000000000,9999999999);
        $validatedData = $request->validate([
            'nama_repo' => 'required|max:50',
            'deskripsi' => '',
            'id' => '',
            'id_repo' => '',
            'saldo' => '',
            'mata_uang' => ''
        ]);

        $validatedData['saldo'] = 0;
        $validatedData['mata_uang'] = 'Rp';
        @dd($validatedData['mata_uang']);
        repo::create($validatedData);

        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\repo  $repo
     * @return \Illuminate\Http\Response
     */
    public function show(repo $repo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\repo  $repo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Repo::find($id);
        return view('editrepo', [
            'title' => 'Edit repository',
            'css2' => '',
            'js' => '',
            'ckeditor' => 'descrepo',
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\repo  $repo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_repo)
    {
        Repo::where('id_repo', $id_repo)->update([
            'nama_repo' => $request->nama_repo,
            'deskripsi' => $request->deskripsi
        ]);
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\repo  $repo
     * @return \Illuminate\Http\Response
     */
    public function destroy($repo)
    {
        repo::destroy($repo);
        return redirect('/dashboard');
    }
}
