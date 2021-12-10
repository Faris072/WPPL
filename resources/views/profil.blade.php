@extends('parts.body')

@section('body')
<a href="/profil/{{Auth::user()->id}}/edit">Edit</a>
@endsection
