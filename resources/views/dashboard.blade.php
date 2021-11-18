@extends('parts/body')

@section('body')
        <center><h1>Halo</h1></center>
        <p>aaaa</p>
        <form action="">
            <label for="teks">Teks</label>
            <input type="hidden" id="teks">
            <trix-editor input="teks"></trix-editor>

            <textarea id="test"></textarea>
        </form>
@endsection
