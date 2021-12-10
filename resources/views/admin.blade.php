@extends('parts/bodyadmin')

@section('bodyadmin')
    <form action="/logout" method="POST">
        @csrf
        <input type="submit"class="btn btn-success" value="Logout">
    </form>
@endsection
