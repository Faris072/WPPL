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
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--Font awesome-->
    <script src="https://kit.fontawesome.com/7b5d20839a.js" crossorigin="anonymous"></script>
    <!--sweetalert-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--Font Google-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ $css }}">
    <link rel="stylesheet" href="{{ $css2 }}">
</head>
<body>

    <div class="container-fluid-xl">
        <div class="sidebar">
            <div class="profil p-4 mb-3" style="border-bottom:1px solid white;">
                <center>
                    <img src="storage/default/faris.jpg" alt="" class="rounded-circle" width="60%">
                    <br>
                    <div class="dataprofi pt-4" style="color:white;">
                        <h5>Nama</h5>
                        <h6>status</h6>
                    </div>
                </center>
            </div>
            <ul>
                <li><a href="#">sidebar</a></li>
                <li><a href="#">sidebar</a></li>
                <li><a href="#">sidebar</a></li>
                <li><a href="#">sidebar</a></li>
                <li><a href="#">sidebar</a></li>
                <li><a href="#">sidebar</a></li>
            </ul>
        </div>

        <div class="container-fluid-xl" id="isi">
            <div class="container pt-3">
                @yield('body')
            </div>
        </div>

    </div>
    <div class="mode">
        <button class="rounded-circle btn btn-dark" id="btnmode"><i class="fas fa-moon fa-2x" style="color:yellow;"></i></button>
    </div>

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