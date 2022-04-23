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
        session()->put('idRepo', $idRepo);//membuat session untuk idRepo
        // $idRepo = repo::select('id_repo')->where('id', $id);//select untuk memilih beberapa kolom
        //$pecah = mysqli_fetch_array(tampilPembukuan($auth->id,$idRepo));
        //$datas = $pecah;
        //$datas = pembukuan::select('SELECT * FROM pembukuans, repo WHERE pembukuans.id_repo = repo.id_repo AND repo.id = '.$auth->id.' AND id_repo = '.$idRepo);
        //$datas = pembukuan::join('repo','repo.id_repo','=','pembukuans.id_repo')->all()->where('repo.id',$auth->id)->where('id_repo',$idRepo);//data tabel dengan multiple where. jika ingin menggunakan or maka gunakan orWhere(); jika ingin menggunakan sql like di dalam where maka gunakan where('id', 'LIKE' , '%'.$id.'%');
        $datas = pembukuan::all()->where('id_repo', $idRepo)->sortBy('tanggal');
        //@dd($datas);
        $repo = repo::all()->where('id_repo', $idRepo);//
        $repository = repo::all()->where('id', $auth->id);
        return view('pembukuan', [
            'css2' => '',
            'datas' => $datas,
            'idRepo' => $idRepo,
            'css' => '/css/body.css',
            'title' => 'Pembukuan',
            'js' => '/js/pembukuan.js',
            'ckeditor' => '',
            'repo' => $repo,
            'repository' => $repository,
            'auth' => $auth
        ]);
    }

    public function create()
    {
        $model = new pembukuan;
        return view('create', [
            'model' => $model,
            'idRepo' => session('idRepo'),
            'title' => 'Tambah Pembukuan',
            'css' => '/css/pembukuan.css',
            'js' => ''
        ]);
    }


    public function store(Request $request)
    {
        $request['id_repo'] = session('idRepo');
        if(empty(pembukuan::all()->where('id_repo',session('id_repo')))){
            $request['id_pembukuans'] = mt_rand(1000000000,9999999999);
        }

        $idRepo = session('idRepo');

        $dataRepo = Repo::all()->where('id_repo',$idRepo)->first();
        // @dd($dataRepo);

        $validatedData = $request->validate([
            'id_repo' => '',
            'id_pembukuans' => '',
            'tanggal' => 'required',
            'uraian' => 'required',
            'arus' => 'required',
            'nominal' => 'required'
        ]);

        if($request->arus =='debit'){
            $validatedData['nominal'] = $validatedData['nominal'];
            $saldo = $dataRepo->saldo+$validatedData['nominal'];
            Repo::where('id_repo',$idRepo)->update(['saldo'=>$saldo]);
        }
        else if($request->arus =='kredit'){
            $validatedData['nominal'] = -$validatedData['nominal'];
            $saldo = $dataRepo->saldo+$validatedData['nominal'];
            // @dd($saldo);
            Repo::where('id_repo',$idRepo)->update(['saldo'=>$saldo]);
        };

        pembukuan::create($validatedData);

        $redirect = '/dashboard/pembukuan/'.session('idRepo');
        return redirect($redirect);
    }

    public function show(pembukuan $pembukuan)
    {
        //
    }

    public function edit($idBuku)
    {
        $edit = pembukuan::find($idBuku);
        return view('updatepembukuan',[
            'data' => $edit,
            'js' => '',
            'idRepo' => session('idRepo')
        ]);
    }


    public function update(Request $request, $idBuku)
    {
        pembukuan::where('id_pembukuans', $idBuku) -> update([
        'tanggal' => $request->tanggal,
        'uraian' => $request->uraian,
        'arus' => $request->arus,
        'nominal' => $request->nominal,
        'saldo' => updateSaldo(session('idRepo'), $request->debit, $request->kredit, $idBuku)
        ]);

        $redirect = "/dashboard/pembukuan/".session('idRepo');
        return redirect($redirect);
    }


    public function destroy($idBuku)
    {
        $data = pembukuan::where('id_pembukuans', $idBuku)->get()->first();
        $nominal = $data->nominal;
        $idRepo = session('idRepo');
        $dataRepo = Repo::all()->where('id_repo', $idRepo)->first();
        $saldo = $dataRepo->saldo;
        if($nominal < 0){
            $saldo = $saldo - $nominal;
            // @dd($saldo);
            repo::where('id_repo', $idRepo)->update(['saldo' => $saldo]);
        }
        else{
            $saldo = $saldo - $nominal;
            // @dd($saldo);
            repo::where('id_repo', $idRepo)->update(['saldo' => $saldo]);
        }
        pembukuan::destroy($idBuku);
        $redirect = '/dashboard/pembukuan/'.session('idRepo');
        return redirect($redirect);
    }
}
