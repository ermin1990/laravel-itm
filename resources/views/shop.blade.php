@extends("layout")
@section("title", "Shop")
@section("content")


<h3 class="font-bold">Shop</h3>


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
