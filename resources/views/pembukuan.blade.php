@extends('parts.body')

@section('body')
    </br>

    @foreach ($repo as $judul)
        <center><h1>{{ $judul->nama_repo }}</h1></center>
    @endforeach
    </br></br>
    <a class="btn btn-info" href="/pembukuan/create">Tambah</a>
    <table class='table table-striped' border='1' cellpadding='10' style='positon:static;'>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Uraian</th>
                <th>Debit</th>
                <th>Kredit</th>
                <th>Saldo</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        @foreach($datas as $value)
            <tbody>
                <tr>
                    <td>{{ $value->tanggal }}</td>
                    <td>{{ $value->uraian }}</td>
                    <td>{{ $value->debit }}</td>
                    <td>{{ $value->kredit }}</td>
                    <td>{{ $value->saldo }}</td>
                    <td><a class="btn btn-warning" href="/dashboard/pembukuan/{{ $value->id_pembukuans }}/edit">Edit</a>
                    </td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDeletePembukuan{{ $value->id_pembukuans }}">
                            DELETE
                        </button>

                        <!-- Modal DELETE pembukuan -->
                        <div class="modal fade" id="modalDeletePembukuan{{ $value->id_pembukuans }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">DELETE DATA</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
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
            </tbody>
        @endforeach
    </table>
@endsection
