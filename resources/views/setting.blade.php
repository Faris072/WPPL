@extends('parts/body')

@section('body')
    <form action="/profil/{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto" class="form-control">
        <br>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" class="form-control" value="{{ $dataProfil->username }}">
        <br>
        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" class="form-control" value="{{ $dataProfil->phone }}">
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" class="form-control" value="">
        <br>
        <input type="submit" class="btn btn-success form-control" value="Edit Profil">
    </form>
@endsection
