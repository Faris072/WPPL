@extends('parts/body')

@section('body')

    <div class="container">
        <br>
        <a href="/dashboard/create" class="btn btn-success">Repsitory Baru</a>
        <?php $i = 0 ?>
        @foreach ($repository as $repo)
            <div class="card">
                <div class="card-header">
                    <h5 clas> {{ $repo->nama_repo }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text Hdeskripsi<?php echo $i ?>" style="display:none;">{{ $repo->deskripsi }}</p>
                    <p class="card-text deskripsi<?php echo $i ?>">{{ $repo->deskripsi }}</p>
                    <br>
                    <small>{{ $repo->last_used_at }}</small>
                    <a href="/dashboard/pembukuan/{{ $repo->id_repo }}" class="btn btn-primary mb-3">Buka Buku</a>
                    <a href="/dashboard/{{ $repo->id_repo }}/edit" class="btn btn-warning">Edit</a>
                    <form action="/dashboard/{{ $repo->id_repo }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" type="submit" value="Hapus Buku">
                    </form>
                </div>
            </div>
        <?php $i++; ?>
        @endforeach
        <span id="jumlah" style="display:none;"><?php echo $i ?></span>{{-- untuk mengkonversi ke html di js --}}
    </div>

@endsection
