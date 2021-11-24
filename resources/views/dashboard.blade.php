@extends('parts/body')

@section('body')

    <div class="container">
        @foreach ($repository as $repo)
            <div class="card">
                <h5 class="card-header">{{ $repo->nama_repo }}</h5>
                <div class="card-body">
                    <p class="card-text">{{ $repo->deskripsi }}</p>
                    <br>
                    <small>{{ $repo->last_used_at }}</small>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        @endforeach
    </div>

@endsection
