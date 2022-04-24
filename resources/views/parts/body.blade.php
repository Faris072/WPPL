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
                @yield('body')
                
            </div>
        </div>
    </div>
    <div class="mode">
        <button class="rounded-circle btn btn-dark" id="btnmode"><i class="fas fa-moon fa-2x" style="color:yellow;"></i></button>
    </div>
    @include('parts/cdnjs')
</body>
</html>
