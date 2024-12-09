@extends("layout")
@section("title", "Shop")
@section("content")


<h3 class="font-bold">Shop</h3>
<h3>Odaberite proizvode za sebe</h3>

<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap -m-4 ">

            <div class="p-4 md:w-1/2 lg:w-1/4 ">
                <div class="h-full bg-gray-100 p-6 rounded-lg hover:bg-gray-200">
                    <h3 class="text-lg text-gray-900 font-medium mb-2">PHP</h3>
                    <h4 class="text-indigo-500 text-xl font-bold mb-4">$50</h4>
                    <p class="leading-relaxed text-base">PHP je popularni server-side jezik za razvoj dinamičkih web aplikacija.</p>
                </div>
            </div>

            <div class="p-4 md:w-1/2 lg:w-1/4">
                <div class="h-full bg-gray-100 p-6 rounded-lg hover:bg-gray-200">
                    <h3 class="text-lg text-gray-900 font-medium mb-2">CSS</h3>
                    <h4 class="text-indigo-500 text-xl font-bold mb-4">$30</h4>
                    <p class="leading-relaxed text-base">CSS se koristi za stiliziranje web stranica i kreiranje responzivnih dizajna.</p>
                </div>
            </div>

            <div class="p-4 md:w-1/2 lg:w-1/4">
                <div class="h-full bg-gray-100 p-6 rounded-lg hover:bg-gray-200">
                    <h3 class="text-lg text-gray-900 font-medium mb-2">React</h3>
                    <h4 class="text-indigo-500 text-xl font-bold mb-4">$70</h4>
                    <p class="leading-relaxed text-base">React je popularna JavaScript biblioteka za izgradnju korisničkih sučelja.</p>
                </div>
            </div>

            <div class="p-4 md:w-1/2 lg:w-1/4">
                <div class="h-full bg-gray-100 p-6 rounded-lg hover:bg-gray-200">
                    <h3 class="text-lg text-gray-900 font-medium mb-2">Laravel</h3>
                    <h4 class="text-indigo-500 text-xl font-bold mb-4">$90</h4>
                    <p class="leading-relaxed text-base">Laravel je moćni PHP framework za razvoj modernih web aplikacija.</p>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
