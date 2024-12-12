@extends("layout")
@section("title", "Home")
@section("content")

    @if($hour >= 0 && $hour <= 12)
        <h3>Dobro jutro <b></b></h3>
    @elseif($hour >= 12 && $hour <= 18)
        <h3>Dobar dan <b></b></h3>
    @elseif($hour >= 18 && $hour <= 24)
        <h3>Dobro veče <b></b></h3>
    @endif

    <h3>Dobro došli na prvi Laravel projekat</h3>
    {{--<br>
    <p>Trenutno je {{$hour}}h. </p>
    <p>Trenutno vrijeme je {{$dateNow}}</p>--}}

    @if(isset($products))
        <h3 class="mt-4 font-bold">Poslednjih {{$products->count()}} proizvoda</h3>

        <section class="text-gray-600 body-font">
            <div class="container px-3 py-10 mx-auto">
                <div class="flex flex-wrap -m-6 ">

                    @include("components.productitem")

                </div>
            </div>
        </section>
    @endif

@endsection
