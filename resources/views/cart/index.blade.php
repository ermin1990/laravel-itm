@php use Illuminate\Support\Facades\Session; @endphp
@extends("layout")
@section("title", "Korpa")
@section("content")

    <div class="container mx-auto mt-6">
        <h3 class="text-2xl font-bold mb-4">Vaša Korpa</h3>
        <p class="mb-4">Dobro došli na stranicu korpe.</p>

        @if(!empty($cartProducts) && is_array($cartProducts) && count($cartProducts) > 0)
            <div class="bg-white p-6 rounded-lg shadow-md">
                <table class="w-full table-auto border-collapse">
                    <thead>
                    <tr class="bg-gray-200">
                        <th class="text-left px-4 py-2">Proizvod</th>
                        <th class="text-left px-4 py-2">Količina</th>
                        <th class="text-left px-4 py-2">Cijena</th>
                        <th class="text-left px-4 py-2">Ukupno</th>
                        <th class="text-left px-4 py-2">Akcije</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cartProducts as $product)
                        <tr class="border-b">
                            <td class="px-4 py-2 font-semibold text-gray-700">{{ $product->name }} <span
                                    class="text-xs text-gray-500 ml-2">Dostupno: {{ $product->amount }}</span></td>

                            <td class="px-4 py-2">
                                <form method="POST" action="{{ route('cart.update') }}">
                                    @csrf
                                    @method('PUT')

                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="number" name="quantity" value="{{ $product->quantity }}" min="1"
                                           max="{{ $product->amount }}"
                                           class="w-16 border rounded px-2 py-1">
                                    <button type="submit"
                                            class="ml-2 px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                                        Ažuriraj
                                    </button>
                                </form>
                            </td>

                            <td class="px-4 py-2">{{ $product->price }}</td>
                            <td class="px-4 py-2">{{ $product->price * $product->quantity }}</td>
                            @php
                                Session::push('ukupno', $product->price * $product->quantity);
                            @endphp
                            <td class="px-4 py-2">
                                <form method="GET" action="{{ route('cart.delete', $product->id) }}">
                                    @csrf
                                    <button type="submit"
                                            class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                        Ukloni
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="narudzba mt-6 p-4 bg-gray-200">
                    <p class="text-gray-500 flex justify-end font-bold">Ukupno: {{ $ukupnaCijena }}€</p>

                    <div class="mt-4 flex justify-end">
                        <a
                            class="px-6 py-2 bg-green-500 text-white rounded hover:bg-green-600">Nastavi sa
                            narudžbom</a>
                    </div>
                </div>
            </div>
        @else
            <p class="text-gray-500">Nema proizvoda u korpi.</p>
        @endif
    </div>

@endsection
