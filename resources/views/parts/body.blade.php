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

        @yield('body')

    </div>

    @include('parts/cdnjs')

</body>
</html>
