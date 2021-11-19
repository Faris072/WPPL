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
                    <td><a class="btn btn-warning" href="pembukuan/{{ $value->id }}/edit">Edit</a>
                    </td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDeletePembukuan">
                            DELETE
                        </button>
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>
@endsection
