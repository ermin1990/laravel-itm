@extends("layout")
@section("title", "Home")
@section("content")

    @if($hour >= 0 && $hour <= 12)
        <h3>Dobro jutro <b>{{$name}}</b></h3>
    @elseif($hour >= 12 && $hour <= 18)
        <h3>Dobar dan <b>{{$name}}</b></h3>
    @elseif($hour >= 18 && $hour <= 24)
        <h3>Dobro veče <b>{{$name}}</b></h3>
    @endif

    <h3>Dobro došli na prvi Laravel projekat</h3>
    <br>
    <p>Trenutno je {{$hour}}h. </p>
    <p>Trenutno vrijeme je {{$dateNow}}</p>


@endsection
