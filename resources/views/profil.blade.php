@extends('parts.body')

@section('body')
<head>
    <link rel="stylesheet" type="text/css" href="{{asset('css/profil.css')}}">
</head>

<h1>Personal Info</h1>
<body>
<div class="container">
    <form action="#" style="width: 1000px" class="posisi";>
        <br>
        <table>
        <img src="/storage/foto/{{ Auth::user()->foto }}" width="10%" alt="Foto">
            <tr>
                <td style="padding-right:2vw;">Email</td>
                <td style="padding-right:1vw;">:</td>
                <td>{{ Auth::user()->email }}</td>
            </tr>
            <tr>
                <td style="padding-right:2vw;">Username</td>
                <td style="padding-right:1vw;">:</td>
                <td>{{ Auth::user()->username }}</td>
            </tr>
            <tr>
                <td style="padding-right:2vw;">Phone Number</td>
                <td style="padding-right:1vw;">:</td>
                <td>{{ Auth::user()->phone }}</td>
            </tr>
            
        </table>
       
       <button style="border-radius: 8px;margin-top: 10%;" class="button button1"> <a href="/profil/{{Auth::user()->id}}/edit">Edit Profil</a>
</button>

</div>
</body>
@endsection
