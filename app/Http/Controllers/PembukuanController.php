<?php

namespace App\Http\Controllers;

use App\Models\pembukuan;
use Illuminate\Http\Request;

class PembukuanController extends Controller
{

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


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required',
            'uraian' => 'required',
            'debit' => '',
            'kredit' => ''
        ]);

        $validatedData['saldo'] = insertSaldo($request->debit,$request->kredit);
        // @dd($validatedData);
        pembukuan::create($validatedData);

        return redirect('/pembukuan');
    }

    public function show(pembukuan $pembukuan)
    {
        //
    }

    public function edit($id)
    {
        $edit = pembukuan::find($id);
        return view('updatepembukuan',[
            'data' => $edit,
            'js' => '/js/body.js'
        ]);
    }


    public function update(Request $request, $id)
    {
        pembukuan::where('id', $id) -> update([
        'tanggal' => $request->tanggal,
        'uraian' => $request->uraian,
        'debit' => $request->debit,
        'kredit' => $request->kredit,
        'saldo' => updateSaldo($request->debit,$request->kredit,$id)
        ]);
        return redirect('/pembukuan');
    }


    public function destroy($id)
    {
        pembukuan::destroy($id);

        return redirect('/pembukuan');
    }
}
