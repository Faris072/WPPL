@extends('parts.layoutcreate')

@section('body')
</br>
<legend><h2>Add data</h2></legend>
<form method="POST" action="/pembukuan">
    @csrf
    <label>Tanggal: </label></br>
    <input type="date" name="tanggal"></br>
    <label>Uraian: </label></br>
    <input type="text" name="uraian"></br>
    <label>Debit: </label></br>
    <input type="number" name="debit"></br>
    <label>Kredit: </label></br>
    <input type="number" name="kredit"></br>
    <button class="btn btn-success" type="submit">SAVE</button>
</form>
@endsection
