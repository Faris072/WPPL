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
            <div class="container pt-3">
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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</body>
</html>
