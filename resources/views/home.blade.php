@extends("layout")
@section("title", "Home")
@section("content")

    <h3>Dobro došli na <b>{{$name}}</b> prvi Laravel projekat</h3>
    <br>
    <p>Trenutno vrijeme je {{date('d-m-Y H:i:s')}}</p>


@endsection
