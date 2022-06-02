@extends('parts/body')

@section('body')

<div class="container">
    <br>

    <!-- Button trigger modal Tambah Buku -->
    <button type="button" style="margin: 6px;" class="btn btn-secondary" data-toggle="modal" data-target="#ModalTambahBuku">
        Tambah Buku
    </button>

    <!-- Modal -->
    <div class="modal fade" id="ModalTambahBuku" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <h5 class="modal-title text-white fw-bold" id="exampleModalLongTitle">TAMBAH BUKU</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: white;">&times;</span>
                    </button>
                </div>
                <form method="POST">
                    @csrf
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
            </form>
            </div>
        </div>
    <!-- End Modal Tambah Buku -->

    <?php $i = 0; ?>
    <div class="row">
        @foreach ($repository as $repo)
        <div class="col-md-6 mt-4">
            <div class="card">
                <div class="card-header">
                    <h5 clas> {{ $repo->nama_repo }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text Hdeskripsi<?php echo $i; ?>" style="display:none;">{{ $repo->deskripsi }}
                    </p>
                    <p class="card-text deskripsi<?php echo $i; ?>">{{ $repo->deskripsi }}</p>
                    <br>
                    <small>{{ $repo->last_used_at }}</small>
                    <div class="row pl-3" style="justify-content: flex-start; width: 75%;">
                        <div class="col-md-4 p-0">
                            <a href="/dashboard/pembukuan/{{ $repo->id_repo }}" class="btn btn-outline-primary">Buka
                                Buku</a>
                        </div>
                    <!-- Button trigger modal Edit -->
                        <div class="col-md-4 p-0">
                            <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#ModalEdit">
                            Edit Buku
                            </button>
                        </div>

                    <!-- Modal -->
                    <form action="/dashboard/{{ $repo->id_repo }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-secondary">
                                        <h5 class="modal-title text-white fw-bold" id="exampleModalLongTitle">EDIT BUKU</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true" style="color: white;">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group text-left">
                                            <label for="namarepo">Nama Buku</label>
                                            <input type="text" id="namarepo" name="nama_repo" class="form-control" placeholder="Nama Buku" value="{{ $repo->nama_repo }}" required>
                                        </div>
                                        <div class="form-group text-left">
                                            <label for="descrepo">Deskripsi</label>
                                            <textarea type="text" id="descrepo" name="deskripsi" class="form-control" placeholder="Deskripsi Buku">{{ $repo->deskripsi }}</textarea>
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
                    <!-- End Modal Edit -->

                    <!-- Button trigger modal Hapus -->
                        <div class="col-md-4 p-0">
                            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#ModalHapus">
                            Hapus Buku
                            </button>
                        </div>
                    </div>

                    <!-- Modal -->
                    <form action="/dashboard/{{ $repo->id_repo }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-secondary">
                                        <h5 class="modal-title text-white fw-bold" id="exampleModalLongTitle">HAPUS BUKU</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true" style="color: white;">&times;</span>
                                        </button>
                                    </div>
                                    <div type="text" id="descrepo" name="deskripsi" class="modal-body">
                                        Apa Anda yakin ingin menghapus buku "{{ $repo->nama_repo }}" ini ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-danger text-white">Yakin</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- End Modal Hapus -->
                </div>
            </div>
            <?php $i++; ?>
        </div>
        @endforeach
    </div>
    <span id="jumlah" style="display:none;"><?php echo $i; ?></span>{{-- untuk mengkonversi ke html di js --}}
</div>
@endsection
