<!doctype html>
<html lang="id">

<head>
    <title>{{ $title }}</title>
    <style>

    </style>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--Font awesome-->
    <script src="https://kit.fontawesome.com/7b5d20839a.js" crossorigin="anonymous"></script>
    <!--sweetalert-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--Font Google-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
    <!-- Trix -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"
        integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css"
        integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix-core.js"
        integrity="sha512-H8CbNdhcOBCt62S6eVGAUSiyNx5OGVEVrYIIVs0iIgurgD1+oTA9THTZ1tqxSE9yw9vzfilg83xgyxD467a28g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix-core.min.js"
        integrity="sha512-lyT4F0/BxdpY5Rn1EcTA/4OTTGjvJT9SxWGxC1boH9p8TI6MzNexLxEuIe+K/pYoMMcLZTSICA/d3y0ColgiKg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css"
        integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"
        integrity="sha512-2RLMQRNr+D47nbLnsbEqtEmgKy67OSCpWJjJM394czt99xj3jJJJBQ43K7lJpfYAYtvekeyzqfZTx2mqoDh7vg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--CKEditor-->
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <!-- Custom Style -->
    
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/body.css') }}">
    <link rel="stylesheet" href="{{ $css }}">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        @auth
            <button id="btnsidebar" style="margin-right:50px;" class="btn btn-outline-light"></button>
        @endauth
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
                    <a class="nav-link dropdown-toggle" href="#navbarDropdown" role="button" data-toggle="collapse"
                        aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-biasa collapse" id="navbarDropdown"
                        style="position:absolute; z-index: 99999; background-color:white; border-radius:5px;">
                        <div class="dropdown-kotak">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
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
                    <a class="dropdown-toggle" style="color:white;" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Selamat datang {{ Auth::user()->username }}
                        {{-- Auth::user()->username. auth adalah nama classnya untuk yg sudah login. user adalah nama modelnya dan username adalah nama kolom di tabel --}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="/profile">Pengaturan Profil</a>
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


    <div class="container-fluid-xl">

        <div class="sidebar">
            <div class="profil p-4 mb-3" style="border-bottom:1px solid white;">
                <center>
                    <img src="/storage/foto/{{ Auth::user()->foto }}" alt="" class="rounded-circle" width="60%">
                    <br>
                    <div class="dataprofi pt-4" style="color:white;">
                        <h5>{{ Auth::user()->username }}</h5>
                        <h6>Admin</h6>
                    </div>
                </center>
            </div>
            <ul>
                <li><a href="/dashboard">Dashboard</a></li>
                <li><a href="#">Pengaturan Profil</a></li>
                {{-- <li><a href="#" class="collapsed" data-toggle="collapse" data-target="#daftarBuku" aria-expanded="false">Daftar Buku Saya <i class="fas fa-caret-down pl-2" style="color:white;"></i></a></li> --}}
                {{-- <li id="daftarBuku" class="collapse"> --}}
                {{-- <ul>
                    @foreach ($repository as $repo)
                        <li> <a href="/dashboard/pembukuan/{{ $repo->id_repo }}">{{ $repo->nama_repo }}</a> </li>
                    @endforeach
                    </ul> --}}
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


        <div class="container-fluid-xl" id="isi">
            <div class="container pt-3 pb-5">
                @yield('bodyadmin')
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>
    <div class="mode">
        <button class="rounded-circle btn btn-dark" id="btnmode"><i class="fas fa-moon fa-2x"
                style="color:yellow;"></i></button>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="/js/body.js"></script>
    <script src="{{ $js }}"></script>
    <script>
        CKEDITOR.replace('{{ $ckeditor }}');
    </script>

</body>

</html>
