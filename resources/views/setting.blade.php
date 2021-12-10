@extends('parts/body')

@section('body')
    <form action="/web" method="POST" encptype="multipart/form-data">
        @csrf
        <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto" class="form-control">
        <br>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" class="form-control" value="{{ $dataProfil->username }}">
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" class="form-control" value="">
        <br>
        <input type="submit" class="btn btn-success form-control" value="Edit Profil">
    </form>
@endsection
