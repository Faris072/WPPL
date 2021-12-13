@extends('parts.body')

@section('body')
<a href="/profil/{{Auth::user()->id}}/edit">Edit</a>
<div class="container">
    <center><img src="/storage/foto/{{ Auth::user()->foto }}" width="10%" alt="Foto"></center>
        <br>
        <table>
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
</div>
@endsection
