@extends("layout")
@section("title", "Shop")
@section("content")


<h3 class="font-bold">Shop</h3>

<section class="bg-gray-500 p-5 my-5 rounded">
    <h1 class="text-3xl text-white font-weight-light">Admin</h1>
    <ul class="flex my-3 gap-3 text-white">
        <a class=" rounded bg-gray-700 text-white p-2 hover:bg-gray-200 hover:text-black transition:ease-in-out duration-700" href="{{route("admin.addproduct")}}">Dodaj proizvod</a>
        <a class=" rounded bg-gray-700 text-white p-2 hover:bg-gray-200 hover:text-black transition:ease-in-out duration-700" href="{{route("admin.products")}}">Svi proizvodi</a>
    </ul>
</section>

<section class="text-gray-600 body-font">
    <div class="container px-3 py-10 mx-auto">
        <div class="flex flex-wrap -m-6 ">
        @if(isset($products))
            @include("components.productitem")
            @else
                <p>Nema proizvoda</p>
            @endif
        </div>
    </div>
</section>


@endsection
