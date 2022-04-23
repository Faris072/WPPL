@extends('parts.layoutcreate')

@section('body')
</br>
<legend><h2>update data</h2></legend>
    <form action="/pembukuan/{{ $data->id_pembukuans }}" method="POST">
        @csrf
        @method('PUT')
        <label>Tanggal: </label></br>
        <input type="date" name="tanggal" value="{{ $data->tanggal }}"></br>
        <label>Uraian: </label></br>
        <input type="text" name="uraian" value="{{ $data->uraian }}"></br>
        <label>Debit: </label></br>
        <input type="number" name="debit" value="{{ $data->debit }}"></br>
        <label>Kredit: </label></br>
        <input type="number" name="kredit" value="{{ $data->kredit }}"></br>
        <button class="btn btn-success" name="update" type="submit">UPDATE</button>
    </form>
@endsection
