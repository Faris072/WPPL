@extends('parts/body')

@section('body')

    <div class="container">
        <br>
        <a href="/dashboard/create" class="btn btn-success">Repsitory Baru</a>
        @foreach ($repository as $repo)
            <div class="card">
                <h5 class="card-header">{{ $repo->nama_repo }}</h5>
                <div class="card-body">
                    <p class="card-text" id="deskripsi">{{ $repo->deskripsi }}</p>
                    <br>
                    <small>{{ $repo->last_used_at }}</small>
                    <a href="/pembukuan/{{ $repo->id_repo }}" class="btn btn-primary">Buka Buku</a>
                </div>
            </div>
        @endforeach
    </div>

@endsection
