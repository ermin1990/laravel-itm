@extends("layout")
@section("title", "Kontakt")
@section("content")

    <a href="{{route('admin.contacts')}}" class="rounded bg-gray-500 text-white p-2"> Svi dosadašnji kontakti</a>
<h3 class="font-bold mt-4">Kontakt forma</h3>
<h3>Jednostavna kontakt forma</h3>

<div class="wrapper flex flex-wrap gap-4 justify-center items-center">
    <div id="forma" class="w-[400px]">

        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Greska!</strong>
                    <span class="block sm:inline">{{ $error }}</span>
                </div>
            @endforeach
        @endif

        <form action="{{route('contact.send')}}" method="POST" class="p-2 bg-gray-100 flex flex-col gap-3">
            @csrf
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Unesite email" class="p-2 rounded">

            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" placeholder="Unesite subject" class="p-2 rounded">

            <label for="message">Poruka</label>
            <textarea name="message" id="message" cols="30" rows="10" placeholder="Unesite poruku" class="p-2 rounded"></textarea>

            <input class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded pointer" type="submit" value="Pošalji">
        </form>
    </div>

    <div id="mapa" class="">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6763.666128480022!2d18.668743272088303!3d44.54031507632657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475ead03ad64e779%3A0xa667fa80a17fd8cb!2sTuzla!5e0!3m2!1shr!2sba!4v1733773951198!5m2!1shr!2sba" width="500" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

</div>


@endsection
