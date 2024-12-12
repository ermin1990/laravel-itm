<div class="overflow-x-auto mt-3">
    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
        <thead>
        <tr class="bg-gray-100">
            <th class="px-2 py-3 text-left text-sm font-medium text-gray-600 border-b">Naziv</th>
            <th class="px-2 py-3 text-left text-sm font-medium text-gray-600 border-b">Cijena</th>
            <th class="px-2 py-3 text-left text-sm font-medium text-gray-600 border-b">Količina</th>
            <th class="px-2 py-3 text-left text-sm font-medium text-gray-600 border-b text-right">Akcije</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr class="hover:bg-gray-50">
                <td class="px-2 py-4 text-sm text-gray-700 border-b">{{$product->name}}</td>
                <td class="px-2 py-4 text-sm text-gray-700 border-b">{{$product->price}}</td>
                <td class="px-2 py-4 text-sm text-gray-700 border-b">{{$product->amount}}</td>
                <td class="px-2 py-4 text-sm text-gray-700 border-b text-right">
                    <a href="" class=" p-1 text-black hover:bg-blue-300 transition:ease-in-out duration-300 rounded">Pregledaj</a> |
                    <a href="" class=" p-1 text-black hover:bg-yellow-300 transition:ease-in-out duration-300 rounded">Uredi</a> |
                    <a href="{{ route('admin.deleteproduct', $product->id) }}" class=" p-1 text-black hover:bg-red-300 transition:ease-in-out duration-300 rounded">Izbriši
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
