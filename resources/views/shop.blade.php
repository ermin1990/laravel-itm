@extends("layout")
@section("title", "Shop")
@section("content")


<h3 class="font-bold">Shop</h3>


<section class="text-gray-600 body-font">
    <div class="container px-3 py-10 mx-auto">
        <div class="flex flex-wrap -m-6 ">
        @if(isset($products))
            @foreach($products as $product)
            <div class="p-2 md:w-1/2 lg:w-1/4 ">
                <div class="h-full bg-gray-200 p-6 rounded-lg hover:bg-gray-300">

                    <h3 class="text-lg text-gray-900 font-medium mb-2">{{$product["name"]}}
                        @if($product["name"] == "PHP" || $product["name"] == "Laravel")
                            <span class="text-red-500 text-xl font-bold">- Super sniženje</span>
                        @endif</h3>
                    <h4 class="text-indigo-500 text-xl font-bold mb-4">{{$product["price"]}}€</h4>
                    <p class="leading-relaxed text-base">{{$product["description"]}}</p>

                </div>
            </div>
                @endforeach
            @else
                <p>Nema proizvoda</p>
            @endif

        </div>
    </div>
</section>


@endsection
