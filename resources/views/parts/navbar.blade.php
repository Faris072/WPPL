<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    @auth
    <button id="btnsidebar" style="margin-right:50px;" class="btn btn-outline-light"></button>
    @endauth
    <a class="navbar-brand" href="#">Navbar</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        @auth
            <div class="dropdown pr-5">
                <a class="dropdown-toggle" style="color:white;" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
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
