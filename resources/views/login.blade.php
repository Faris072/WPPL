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
    @if(session()->has('errorLogin'))
        {{-- has adalah untuk mengechek apakah suatu session membawa session/mempunyai session loginError --}}
        <script>swal("Login gagal!", "{{ session('errorLogin') }}", "error");</script>
    @endif

    <div class="container">
        <div class="form mt-4">
            <form action="/login/authenticate" method="POST">
                @csrf
                <label for="email">Email: <span style="color:red;">*</span></label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Masukkan email aktif disini" required>
                <small style="color:red;" >@error('email') {{ $message }} @enderror</small>
                <br>
                <label for="passwor">Password: <span style="color:red;">*</span></label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password anda kembali" required>
                <small style="color:red;" >@error('password') {{ $message }} @enderror</small>
                <br>
                <input type="submit" name="submit" value="LOGIN" class="form-control btn btn-success">
            </form>
        </div>
    </div>

    @include('parts/cdnjs')

</body>

</html>
