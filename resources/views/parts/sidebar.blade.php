<div class="sidebar">
    <div class="profil p-4 mb-3" style="border-bottom:1px solid white;">
        <center>
            <img src="/storage/foto/{{ Auth::user()->foto }}" alt="" class="rounded-circle" height="100vw" width="100vw">
            <br>
            <div class="dataprofi pt-4" style="color:white;">
                <h5>{{ Auth::user()->username }}</h5>
                <h6>
                    @if(Auth::user()->admin == true)
                        {{ 'Admin' }}
                    @else
                        {{ 'User' }}
                    @endif
                </h6>
            </div>
        </center>
    </div>
    <ul>
        <li><a href="/dashboard">Dashboard</a></li>
        <li><a href="/profil">Pengaturan Profil</a></li>
        <li><a href="#" class="collapsed" data-toggle="collapse" data-target="#daftarBuku" aria-expanded="false">Daftar Buku Saya <i class="fas fa-caret-down pl-2" style="color:white;"></i></a></li>
        <li id="daftarBuku" class="collapse">
            <ul>
            @foreach(session('repository') as $repo)
                <li> <a href="/dashboard/pembukuan/{{ $repo->id_repo }}">{{ $repo->nama_repo }}</a> </li>
            @endforeach
            </ul>
        </li>
        <li>
            <form action="/logout" method="POST">
                @csrf
                <button><i class='fas fa-sign-out-alt'></i> Logout</button>
            </form>
        </li>
    </ul>
    <br>
    <br>
    <br>
    <br>
</div>
