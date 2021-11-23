<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button id="btnsidebar" style="margin-right:50px;" class="btn btn-outline-light"></button>
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
        </ul>
        {{-- @auth @endauth untuk mengecek jika sudah login maka akan dijalankan element didalamnya
        @guest @endguest untuk mengecek jika belum login maka akan dijalankan didalamnya
        @auth @else @endauth gabungan dari auth dan guest. jika sudah login maka dijalankan element di dalam auth dan else jika belum maka dijalankan yang else dan endauth --}}
        @auth
            <div class="dropdown pr-5">
                <a class="dropdown-toggle" style="color:white;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Selamat datang {{ Auth::user()->username }}
                    {{-- Auth::user()->username. auth adalah nama classnya untuk yg sudah login. user adalah nama modelnya dan username adalah nama kolom di tabel --}}
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Pengaturan Profil</a>
                    <form action="/logout" method="POST">
                        @csrf
                        <button class="dropdown-item">Logout <i class='fas fa-sign-out-alt'></i></button>
                    </form>
                </div>
            </div>
        @else
            <a href="/login" class="btn btn-success">Login</a>
        @endauth

    </div>
</nav>
