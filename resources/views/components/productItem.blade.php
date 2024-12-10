@foreach($products as $product)
    <div class="p-2 w-full md:w-1/3 ">
        <div class="h-full bg-gray-200 p-6 rounded-lg hover:bg-gray-300">

            <h3 class="text-lg text-gray-900 font-medium mb-2">{{$product->name}}
                @if($product->name == "PHP" || $product->name == "Laravel")
                    <span class="text-red-500 text-xl font-bold">- Super sniženje</span>
                @endif</h3>
            <h4 class="text-indigo-500 text-xl font-bold mb-4">{{$product->price}}€</h4>
            <p class="leading-relaxed text-base">{{$product->description}}</p>

            <p class=" text-gray-500 text-right mt-2">Na stanju: <span class=" bg-green-500 text-white p-1 rounded">{{$product->amount}}</span></p>


        </div>
    </div>
@endforeach
