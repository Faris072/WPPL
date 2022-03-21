@extends('parts.layoutcreate')

@section('body')
</br>
<legend><h2>Add data</h2></legend>
<form method="POST" action="/dashboard/pembukuan">
    @csrf
    <label>Tanggal: </label></br>
    <input type="date" name="tanggal"></br>
    <label>Uraian: </label></br>
    <input type="text" name="uraian"></br>
    <label>Pilihan:</label><br>
    <input type="radio" id="debit" name="arus" value="debit">
    <label for="debit" class="mr-5">Debit</label>
    <input type="radio" id="kredit" name="arus" value="kredit">
    <label for="kredit">Kredit</label>
    <br>
    <label for="nominal">Nominal:</label> <br>
    <input type="number" name="nominal" placeholder="Nominal">
    <br><br>
    <button class="btn btn-success" type="submit">SAVE</button>
</form>
@endsection
