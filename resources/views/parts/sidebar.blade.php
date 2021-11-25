<div class="sidebar">
    <div class="profil p-4 mb-3" style="border-bottom:1px solid white;">
        <center>
            <img src="/storage/default/faris.jpg" alt="" class="rounded-circle" width="60%">
            <br>
            <div class="dataprofi pt-4" style="color:white;">
                <h5>Nama</h5>
                <h6>status</h6>
            </div>
        </center>
    </div>
    <ul>
        <li><a href="/dashboard">Dashboard</a></li>
        <li><a href="#">Pengaturan Profil</a></li>
        <li><a href="#" class="collapsed" data-toggle="collapse" data-target="#daftarBuku" aria-expanded="false">Daftar Buku Saya <i class="fas fa-caret-down pl-2" style="color:white;"></i></a></li>
        <li id="daftarBuku" class="collapse">
            <ul>
            @foreach($repository as $repo)
                <li> <a href="#">{{ $repo->nama_repo }}</a> </li>
            @endforeach
            </ul>
        </li>
        <li><a href="/logout">Logout</a></li>
    </ul>
    <br>
    <br>
    <br>
    <br>
</div>
