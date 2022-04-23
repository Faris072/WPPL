@extends('parts.bodyadmin')

@section('bodyadmin')
    @if (session()->has('pesan'))
        <script> swal("Register gagal!", "{{ session('pesan') }}", "error");</script>
    @endif

    <form action="/admin" method="POST">
    @csrf
    <label for="username"><b>Username:</b></label>
    <input type="text" name="username" id="username" placeholder="Masukkan Username" class="form-control" required value="{{ old('username') }}">
    <small style="color:red;">@error('username') {{ $message }} @enderror</small>
    <br>
    <label for="email"><b>Email:</b></label>
    <input type="email" name="email" id="email" placeholder="Masukkan email" class="form-control" required value="{{ old('email') }}">
    <small style="color:red;">@error('email') {{ $message }} @enderror</small>
    <br>
    <label for="phone"><b>Phone:</b></label>
    <input type="text" name="phone" id="phone" placeholder="Masukkan No Telp" class="form-control" required value="{{ old('phone') }}">
    <small style="color:red;">@error('phone') {{ $message }} @enderror</small>
    <br>
    <label for="password"><b>Password:</b></label>
    <input type="password" name="password" id="password" placeholder="Masukkan Password" class="form-control" required value="{{ old('password') }}">
    <small style="color:red;">@error('password') {{ $message }} @enderror</small>
    <br>
    <label for="password2"><b>Confirm Password:</b></label>
    <input type="password" name="password2" id="password2" placeholder="Masukkan Konfirmasi Password" class="form-control" required value="{{ old('password2') }}">
    <small style="color:red;">@error('password2') {{ $message }} @enderror</small>
    <br>
    <label for="admin"><b>Admin:</b></label><br>
    <input type="radio" id="admin" name="admin" value="1" required>Admin &nbsp &nbsp
    <input type="radio" id="admin" name="admin" value="0" required>Bukan admin
    <br>
    <small style="color:red;">@error('admin') {{ $message }} @enderror</small>
    <br>
    <input type="submit" name="submit" value="Submit" class="btn btn-success form-control">
    </form>
@endsection
