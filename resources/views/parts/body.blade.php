<!doctype html>
<html lang="id">

<head>
    <title>{{ $title }}</title>
    @include('parts/cdnbootstrap')
</head>

<body>
    @include('parts/navbar')

    <div class="container-fluid-xl">

        @include('parts/sidebar')

        <div class="container-fluid-xl" id="isi">
            <div class="container pt-3 pb-5">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('body')
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
    @include('parts/cdnjs')
</body>

</html>
