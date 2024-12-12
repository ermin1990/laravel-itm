@extends("layout")
@section("title", "Svi kontakti")
@section("content")

    @include('partials.status')

    <h1 class="text-3xl font-bold my-5">Izmjena kontakt</h1>

    @if($contact)

    <form action="{{route('admin.updatecontact', $contact->id)}}" method="POST" class="p-2 bg-gray-100 flex flex-col gap-3">
        @csrf
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Unesite email" value="{{old('email', $contact->email)}}" class="p-2 rounded">

        <label for="subject">Subject</label>
        <input type="text" name="subject" id="subject" placeholder="Unesite subject" value="{{old('subject', $contact->subject)}}" class="p-2 rounded">

        <label for="message">Poruka</label>
        <textarea name="message" id="message" cols="30" rows="10" placeholder="Unesite poruku"  class="p-2 rounded">{{old('message', $contact->message)}}</textarea>

        <button class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded pointer" type="submit" name="submit">Posalji</button>
    </form>

    @endif

@endsection
