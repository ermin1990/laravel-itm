@extends("layout")
@section("title", $product->name)
@section("content")

    @if(isset($product))
    <div class="p-2 w-full md:w-1/3 ">
        <div class="h-full bg-gray-200 p-6 rounded-lg hover:bg-gray-300">
            <img class="h-70 rounded w-full object-cover object-center mb-6" src="{{$product->image}}" alt="content">

            <h3 class="text-lg text-gray-900 font-medium mb-2">{{$product->name}}
                @if($product->name == "PHP" || $product->name == "Laravel")
                    <span class="text-red-500 text-xl font-bold">- Super sniženje</span>
                @endif</h3>
            <h4 class="text-indigo-500 text-xl font-bold mb-4">{{$product->price}}€</h4>
            <p class="leading-relaxed text-base">{{$product->description}}</p>

            <p class=" text-gray-500 text-right mt-2">Na stanju: <span class=" bg-green-500 text-white p-1 rounded">{{$product->amount}}</span></p>

            <form action="{{route('cart.add')}}" method="post">
                @csrf
                <input type="number" name="product_id" value="{{$product->id}}" hidden>
                <input type="number" name="quantity" value="{{old("quantity")}}" max="{{$product->amount}}" min="1" class="w-1/3 p-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Količina">
                <p class="text-red-600 text-sm mt-1">Maksimalan broj narudžbe je {{$product->amount}}</p>
                <button type="submit" class=" w-full bg-indigo-600 text-white py-3 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Dodaj u korpu</button>
            </form>

    @else
        <div class="p-2 w-full md:w-1/3 ">
            <div class="h-full bg-gray-200 p-6 rounded-lg hover:bg-gray-300">
                <h3>Ne postoji proizvod</h3>
            </div>
        </div>
    @endif

@endsection
