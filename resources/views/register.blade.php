<!doctype html>
<html lang="id">

<head>
    <title>{{ $title }}</title>

    @include('parts/cdnbootstrap')

    <style>

    </style>
</head>

<body>

    @include('parts/navbar')

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
                <input type="phone" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="Masukkan No.Telfon anda" required>
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
        </div>
    </div>

    @include('parts/cdnjs')

</body>

</html>
