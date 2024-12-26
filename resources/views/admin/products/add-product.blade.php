@extends("layout")
@section("title", "Dodaj proizvod")
@section("content")

    @include("partials.status")

    <div class="max-w-lg mx-auto mt-10  p-8 rounded-lg ">
        <h3 class="text-2xl font-bold text-gray-700 mb-5">Dodaj proizvod</h3>

        <form action="{{route("products.saveproduct")}}" method="post" class="flex flex-col gap-4">
            @csrf
            <!-- Naziv proizvoda -->
            <div>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{old('name')}}"
                    placeholder="Unesite naziv proizvoda"
                    class="w-full p-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                >
                @error("name")
                <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                @enderror
            </div>

            <!-- Opis proizvoda -->
            <div>
                <textarea
                    name="description"
                    id="description"
                    placeholder="Unesite opis proizvoda"
                    class="w-full p-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                >{{old('description')}}</textarea>
                @error("description")
                <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                @enderror
            </div>

            <!-- Cijena proizvoda -->
            <div>
                <input
                    type="number"
                    name="price"
                    id="price"
                    value="{{old('price')}}"
                    placeholder="Unesite cijenu proizvoda"
                    class="w-full p-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                >
                @error("price")
                <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                @enderror
            </div>

            <!-- Slobodna mjesta -->
            <div>
                <input
                    type="number"
                    name="amount"
                    id="amount"
                    value="{{old('amount')}}"
                    placeholder="Unesite slobodna mjesta za kurs."
                    class="w-full p-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                >
                @error("amount")
                <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                @enderror
            </div>

            <!-- Link za sliku -->
            <div>
                <input
                    type="text"
                    name="image"
                    id="image"
                    value="{{old('image')}}"
                    placeholder="Unesite link za sliku proizvoda"
                    class="w-full p-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                >
                @error("image")
                <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <button
                type="submit"
                class="w-full bg-indigo-600 text-white py-3 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
            >
                Dodaj proizvod
            </button>
        </form>
    </div>

@endsection
