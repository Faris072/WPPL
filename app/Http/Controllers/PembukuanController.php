<?php

namespace App\Http\Controllers;

use App\Models\pembukuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\repo;

class PembukuanController extends Controller
{

    public function index($idRepo)
    {
        $auth = Auth::user();
        // $idRepo = repo::select('id_repo')->where('id', $id);//select untuk memilih beberapa kolom
        $datas = pembukuan::all()->where('id_repo',$idRepo);
        $repo = repo::all()->where('id_repo', $idRepo);
        $repository = repo::all()->where('id', $auth->id);
        return view('pembukuan', [
            'css2' => '',
            'datas' => $datas,
            'idRepo' => $idRepo,
            'css' => '/css/body.css',
            'title' => 'Pembukuan',
            'js' => 'js/body.js',
            'ckeditor' => '',
            'repo' => $repo,
            'repository' => $repository,
            'auth' => $auth
        ]);
    }

    public function create($idRepo)
    {
        $model = new pembukuan;
        return view('create', [
            'model' => $model,
            'idRepo' => $idRepo,
            'title' => 'Tambah Pembukuan',
            'css' => '/css/pembukuan.css',
            'js' => '/js/body.js'
        ]);
    }


    public function store(Request $request,$idRepo)
    {
        $request['id_repo'] = $idRepo;
        if(empty(pembukuan::all()->where('id_repo',$idRepo))){
            $request['id_pembukuans'] = mt_rand(1000000000,9999999999);
        }

        $validatedData = $request->validate([
            'id_repo' => '',
            'id_pembukuans' => '',
            'tanggal' => 'required',
            'uraian' => 'required',
            'debit' => '',
            'kredit' => ''
        ]);

        $validatedData['saldo'] = insertSaldo($idRepo,$request->debit,$request->kredit);
        pembukuan::create($validatedData);

        $redirect = 'pembukuan/'.$idRepo;
        return redirect($redirect);
    }

    public function show(pembukuan $pembukuan)
    {
        //
    }

    public function edit($idRepo,$idBuku)
    {
        $edit = pembukuan::find($idBuku);
        return view('updatepembukuan',[
            'data' => $edit,
            'js' => '/js/body.js',
            'idRepo' => $idRepo
        ]);
    }


    public function update(Request $request, $idRepo, $idBuku)
    {
        pembukuan::where('id_pembukuans', $idBuku) -> update([
        'tanggal' => $request->tanggal,
        'uraian' => $request->uraian,
        'debit' => $request->debit,
        'kredit' => $request->kredit,
        'saldo' => updateSaldo($idRepo, $request->debit, $request->kredit, $idBuku)
        ]);

        $redirect = "/pembukuan/".$idRepo;
        return redirect($redirect);
    }


    public function destroy($idRepo,$idBuku)
    {
        pembukuan::destroy($idBuku);
        $redirect = 'pembukuan/'.$idRepo;
        return redirect($redirect);
    }
}
