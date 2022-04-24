@extends('parts/body')

@section('body')

<div class="container" style="margin: auto;">
    <br>
    <!-- Button trigger modal Tambah Buku -->
    <button type="button" style="margin: 6px;" class="btn btn-secondary" data-toggle="modal" data-target="#ModalTambahBuku">
        Tambah Buku
    </button>

    <!-- Modal -->
    <form method="POST">
        @csrf
        <div class="modal fade" id="ModalTambahBuku" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-secondary">
                        <h5 class="modal-title text-white fw-bold" id="exampleModalLongTitle">Tambah Buku</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="color: white;">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="namarepo">Nama Buku</label>
                            <input type="text" id="namarepo" name="nama_repo" class="form-control" placeholder="Nama Buku" required>
                        </div>
                        <div class="form-group">
                            <label for="descrepo">Deskripsi</label>
                            <textarea type="text" id="descrepo" name="deskripsi" class="form-control" placeholder="Deskripsi Buku"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary">Tambah</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- <a href="/dashboard/create" class="btn btn-outline-success">Tambah Buku</a> -->


    <!--Table-->
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead class="table-secondary table-bordered" style="text-align: center;">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Buku</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <?php $i = 0 ?>
            @foreach ($repository as $repo)
            <tbody class="table-bordered">
                <tr>
                    <th scope="row<?php echo $i ?>" style=" text-align: center">{{ $i+1 }}</th>
                    <td clas style=" text-align: center">{{ $repo->nama_repo }}</td>
                    <td>
                        <p class="card-text Hdeskripsi<?php echo $i ?>" style="display:none">{{ $repo->deskripsi }}</p>
                        <p class="card-text deskripsi<?php echo $i ?>">{{ $repo->deskripsi }}</p>
                    </td>
                    <td style=" text-align: center">
                        <a href="/dashboard/pembukuan/{{ $repo->id_repo }}" style="margin-bottom: 6px;" class="btn btn-secondary" role="button">Buka Buku</a>

                        <!-- Button trigger modal Edit -->
                        <button type="button" style="margin-bottom: 6px;" class="btn btn-warning text-white" data-toggle="modal" data-target="#ModalEdit">
                            Edit Buku
                        </button>

                        <!-- Modal -->
                        @foreach ($repository as $data)
                        <form action="/dashboard/{{ $data->id_repo }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-secondary">
                                            <h5 class="modal-title text-white fw-bold" id="exampleModalLongTitle">Edit Buku</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" style="color: white;">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group text-left">
                                                <label for="namarepo">Nama Buku</label>
                                                <input type="text" id="namarepo" name="nama_repo" class="form-control" placeholder="Nama Buku" value="{{ $data->nama_repo }}" required>
                                            </div>
                                            <div class="form-group text-left">
                                                <label for="descrepo">Deskripsi</label>
                                                <textarea type="text" id="descrepo" name="deskripsi" class="form-control" placeholder="Deskripsi Buku">{{ $data->deskripsi }}</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-warning text-white">Edit</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @endforeach

                        <!-- Button trigger modal Hapus -->
                        <button type="button" style="margin-bottom: 6px;" class="btn btn-danger" data-toggle="modal" data-target="#ModalHapus">
                            Hapus Buku
                        </button>

                        <!-- Modal -->
                        @foreach ($repository as $delete)
                        <form action="/dashboard/{{ $data->id_repo }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-secondary">
                                            <h5 class="modal-title text-white fw-bold" id="exampleModalLongTitle">Hapus Buku</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" style="color: white;">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group text-left">
                                                <label for="namarepo">Nama Buku</label>
                                                <table class="table col-md-12">
                                                    <tr>
                                                        <td>
                                                            <p type="text<?php echo $i ?>" id="namarepo" name="nama_repo" placeholder="Nama Buku">{{ $delete->nama_repo }}</p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="form-group text-left">
                                                <label for="descrepo">Deskripsi</label>
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <p type="text" id="descrepo" name="deskripsi" placeholder="Deskripsi Buku">{{ $delete->deskripsi }}</p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success text-white">Yakin</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @endforeach
                    </td>
                </tr>
            </tbody>
            <?php $i++; ?>
            <!-- <div class="card">
        <div class="card-header">
            <h5 clas> {{ $repo->nama_repo }}</h5>
        </div>
        <div class="card-body">
            <p class="card-text Hdeskripsi<?php echo $i ?>" style="display:none;">{{ $repo->deskripsi }}</p>
            <p class="card-text deskripsi<?php echo $i ?>">{{ $repo->deskripsi }}</p>
            <br>
            <small>{{ $repo->last_used_at }}</small>
            <a href="/dashboard/pembukuan/{{ $repo->id_repo }}" class="btn btn-outline-primary">Buka Buku</a>
            <a href="/dashboard/{{ $repo->id_repo }}/edit" class="btn btn-outline-warning" style="display:inline;">Edit</a>
            <form action="/dashboard/{{ $repo->id_repo }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-outline-danger" type="submit" value="Hapus Buku">
            </form>
        </div> -->
            <span id="jumlah" style="display:none;"><?php echo $i ?></span>{{-- untuk mengkonversi ke html di js --}}
            @endforeach
        </table>
    </div>
</div>

@endsection