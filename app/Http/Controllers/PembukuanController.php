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
            'js' => 'cdnjs.js',
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
            'js' => 'cdnjs.js'
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
        $koneksi=mysqli_connect('localhost','root','','final_project');
        $model = new pembukuan;
        $model->tanggal = $request->tanggal;
        $model->uraian = $request->uraian;
        $model->debit = $request->debit;
        $model->kredit = $request->kredit;
        $model->saldo = ambilData($koneksi) + $request->debit - $request->kredit;
        $model->save();

        return redirect('pembukuan');
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
    public function edit(pembukuan $pembukuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pembukuan  $pembukuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pembukuan $pembukuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pembukuan  $pembukuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(pembukuan $pembukuan)
    {
        //
    }
}
