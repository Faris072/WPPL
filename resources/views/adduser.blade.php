@extends('parts.bodyadmin')

@section('bodyadmin')
    <form action="/admin" method="POST">
    @csrf
    <label for="id">ID</label>
    <input type="number" name="id" id="id" placeholder="Masukkan ID User" class="form-control">
    <br>
    <label for="username">Username</label>
    <input type="text" name="username" id="username" placeholder="Masukkan Username" class="form-control">
    <br>
    <label for="email">Email</label>
    </form>
@endsection
