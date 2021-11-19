<?php

namespace App\Http\Controllers;

use App\Models\pembukuan;
use Illuminate\Http\Request;

class PembukuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = pembukuan::all();

        return view('pembukuan', [
            'css2' => '',
            'datas' => $datas,
            'css' => '/css/body.css',
            'title' => 'Pembukuan',
            'js' => 'js/body.js',
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
        $model = new pembukuan;
        return view('create', [
            'model' => $model,
            'title' => 'Tambah Pembukuan',
            'css' => '/css/pembukuan.css',
            'js' => '/js/body.js'
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
        $validatedData = $request->validate([
            'tanggal' => 'required',
            'uraian' => 'required',
            'debit' => '',
            'kredit' => ''
        ]);

        $koneksi=mysqli_connect('localhost','root','','project-akhir-wabw');
        $validatedData['saldo'] = insertSaldo($koneksi,$request->debit,$request->kredit);
        pembukuan::create($validatedData);


        return redirect('/pembukuan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pembukuan  $pembukuan
     * @return \Illuminate\Http\Response
     */
    public function show(pembukuan $pembukuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pembukuan  $pembukuan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = pembukuan::find($id);
        return view('updatepembukuan',[
            'data' => $edit,
            'js' => '/js/body.js'

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pembukuan  $pembukuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $koneksi=mysqli_connect('localhost','root','','project-akhir-wabw');
        pembukuan::where('id', $id) -> update([
            'tanggal' => $request->tanggal,
            'uraian' => $request->uraian,
            'debit' => $request->debit,
            'kredit' => $request->kredit,
            'saldo' => insertSaldo($koneksi,$request->debit,$request->kredit)
        ]);

        return redirect('/pembukuan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pembukuan  $pembukuan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        pembukuan::destroy($id);

        return redirect('/pembukuan');
    }
}
