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
    @foreach($datas as $key=>$value)
    <tbody>
        <tr>
            <td>{{ $value->tanggal }}</td>
            <td>{{ $value->uraian }}</td>
            <td>{{ $value->debit }}</td>
            <td>{{ $value->kredit }}</td>
            <td>{{ $value->saldo }}</td>
            <td><a class="btn btn-outline-warning" href="{{ url('pembukuan/'.$value->id.'/edit') }}">Edit</a></td>
            <td>
                <form action="{{ url('pembukuan/'.$value->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-outline-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
    </tbody>
    @endforeach
</table>
@endsection
