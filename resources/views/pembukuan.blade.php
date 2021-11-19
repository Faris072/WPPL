@extends('parts.body')

@section('body')
    </br>
    <h1 align='center'>Pembukuan</h1>
    </br></br>
    <a class="btn btn-info" href="{{ url('pembukuan/create') }}">Tambah</a>
    <table class='table table-striped' border='1' cellpadding='10'>
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
        @foreach ($datas as $value)
            <tbody>
                <tr>
                    <td>{{ $value->tanggal }}</td>
                    <td>{{ $value->uraian }}</td>
                    <td>{{ $value->debit }}</td>
                    <td>{{ $value->kredit }}</td>
                    <td>{{ $value->saldo }}</td>
                    <td><a class="btn btn-outline-warning" href="{{ url('pembukuan/' . $value->id . '/edit') }}">Edit</a>
                    </td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Launch demo modal
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <form action="pembukuan/{{ $value->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger" type="submit" value="Tetap Hapus">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>
@endsection
