@extends('parts/body')

@section('body')
    <div class="container mt-4">
        <center><h2>Add a new repository</h2></center>
        <form action="/dashboard" method="POST">
            @csrf
            <label for="namarepo">Nama Repository:</label>
            <input type="text" id="namarepo" name="nama_repo" class="form-control" placeholder="Isikan Nama Repository" required>
            <br>
            <label for="descrepo">Deskripsi:</label>
            <textarea name="deskripsi" id="descrepo" placeholder="deskripsi nama repository"></textarea>
            <br>
            <input type="submit" class="btn btn-success form-control">
        </form>
    </div>
@endsection
