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
            <div class="container">
                @yield('body')
            </div>
        </div>

    </div>

    @include('parts/cdnjs')

</body>
</html>
