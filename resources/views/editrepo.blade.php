@extends('parts/body')

@section('body')
    <div class="container mt-4">
        <center><h2>Edit Repository</h2></center>
        <form action="/dashboard/{{ $data->id_repo }}" method="POST">
            @csrf
            @method('PUT')
            <label for="namarepo">Nama Repository:</label>
            <input type="text" id="namarepo" name="nama_repo" class="form-control" placeholder="Isikan Nama Repository" value="{{ $data->nama_repo }}" required>
            <br>
            <label for="descrepo">Deskripsi:</label>
            <textarea name="deskripsi" id="descrepo" placeholder="deskripsi nama repository">{{ $data->deskripsi }}</textarea>
            <br>
            <input type="submit" class="btn btn-success form-control">
        </form>
    </div>
@endsection
