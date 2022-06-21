@extends('parts.body')

@section('body')
</br>

@foreach ($repo as $judul)
<div class="card">
    <div class="card-header" data-target="#deskripsi" data-toggle="collapse">
        <center>
            <h3><b>{{ $judul->nama_repo }} &nbsp <i class="fas fa-caret-down"></i></b></h3>
        </center>
    </div>
    <div class="card-body collapse" id="deskripsi">
        <h5 class="card-title">Deskripsi</h5>
        <p class="card-text" id="deskripsiBuku">{{ $judul->deskripsi }}</p>
    </div>
</div>
@endforeach
<br>
@foreach ($repo as $saldo)
<p>Saldo: <span id="saldo">{{ $saldo->saldo }}</span></p>
@endforeach
</br></br>
<!-- <a class="btn btn-info" href="/pembukuan/create">Tambah</a> -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalTambahPembukuan">
    Tambah
</button>

<!-- Modal Tambah Pembukuan-->
<div class="modal fade" id="modalTambahPembukuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">TAMBAH DATA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="/dashboard/pembukuan">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="namarepo">Tanggal</label>
                        <input type="date" id="tanggal" name="tanggal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="namarepo">Uraian</label>
                        <input type="text" id="uraian" name="uraian" class="form-control" placeholder="Uraian" required>
                    </div>
                    <div class="form-group">
                        <label for="namarepo">Pilihan</label>
                        <br>
                        <input type="radio" id="debit" name="arus" value="debit">
                        <label for="debit" class="mr-5">Debit</label>
                        <input type="radio" id="kredit" name="arus" value="kredit">
                        <label for="kredit">Kredit</label>
                    </div>
                    <div class="form-group">
                        <label for="namarepo">Nominal</label>
                        <input type="number" id="nominal" name="nominal" class="form-control" placeholder="Nominal" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Tambah</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->
<div class="table-responsive-lg">
    <table class='table table-hover table-dark mt-4'>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Uraian</th>
                <th>Arus Keuangan</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($datas as $value)
                <tr>
                    <td>{{ $value->tanggal }}</td>
                    <td>{{ $value->uraian }}</td>
                    <td class="arus">{{ $value->nominal }}</td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#modalDeletePembukuan{{ $value->id_pembukuans }}">
                            DELETE
                        </button>

                    <!-- Modal DELETE pembukuan -->
                    <div class="modal fade" id="modalDeletePembukuan{{ $value->id_pembukuans }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="color:black" id="exampleModalLabel">DELETE DATA</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="color:black">
                                    Dengan menghapus data ini, maka saldo setelah data ini akan disesuaikan
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <form action="/pembukuan/{{ $value->id_pembukuans }}/destroy" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger" type="submit" value="Tetap Hapus">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--endmodal-->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
