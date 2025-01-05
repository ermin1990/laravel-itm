@extends("layout")
@section("title", "Korpa")
@section("content")

    <div class="container mx-auto mt-6">
        <h3 class="text-2xl font-bold mb-4">Hvala! Vaša narudžba je uspješna</h3>
        <h4 class=" text-1xl font-bold"> Hvala na povjerenju </h4>
        <a href="{{ route('home') }}">Povratak na početnu</a>
    </div>

@endsection
