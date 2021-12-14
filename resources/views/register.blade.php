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
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--Font awesome-->
    <script src="https://kit.fontawesome.com/7b5d20839a.js" crossorigin="anonymous"></script>
    <!--sweetalert-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--Font Google-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
    <!-- Trix -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix-core.js" integrity="sha512-H8CbNdhcOBCt62S6eVGAUSiyNx5OGVEVrYIIVs0iIgurgD1+oTA9THTZ1tqxSE9yw9vzfilg83xgyxD467a28g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix-core.min.js" integrity="sha512-lyT4F0/BxdpY5Rn1EcTA/4OTTGjvJT9SxWGxC1boH9p8TI6MzNexLxEuIe+K/pYoMMcLZTSICA/d3y0ColgiKg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js" integrity="sha512-2RLMQRNr+D47nbLnsbEqtEmgKy67OSCpWJjJM394czt99xj3jJJJBQ43K7lJpfYAYtvekeyzqfZTx2mqoDh7vg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--CKEditor-->
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ $css2 }}">

</head>

<body>
    @if(session()->has('pesan'))
    <script>swal("Register gagal!", "{{ session('pesan') }}", "error");</script>
    @endif

    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
    {{-- endnavbar --}}

    <div class="container">
        <div class="form mt-4">
            <form action="/register" method="POST">
                @csrf
                <label for="email">Email: <span style="color:red;">*</span></label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Masukkan email aktif disini" required>
                <small style="color:red;" >@error('email') {{ $message }} @enderror</small>
                <br>
                <label for="username">Username: <span style="color:red;">*</span></label>
                <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" placeholder="Masukkan username anda" required>
                <small style="color:red;" >@error('username') {{ $message }} @enderror</small>
                <br>
                <label for="phone">Phone: <span style="color:red;">*</span></label>
                <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="Masukkan No.Telfon anda" required>
                <small style="color:red;" >@error('phone') {{ $message }} @enderror</small>
                <br>
                <label for="password">Password: <span style="color:red;">*</span></label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password anda" required>
                <small style="color:red;" >@error('password') {{ $message }} @enderror</small>
                <br>
                <label for="password2">Konfirmasi Password: <span style="color:red;">*</span></label>
                <input type="password" name="password2" id="password2" class="form-control @error('password2') is-invalid @enderror" placeholder="Masukkan password anda kembali" required>
                <small style="color:red;" >@error('password2') {{ $message }} @enderror</small>
                <br>
                <input type="submit" name="submit" value="Buat akun" class="form-control btn btn-success">
            </form>
            <br>
            <center>Sudah punya akun? klik <a href="/login">Login</a> untuk login</center>
        </div>
    </div>

    @include('parts/cdnjs')
    <br>
    <br>
    <br>
    <br>
    <br>
</body>

</html>
