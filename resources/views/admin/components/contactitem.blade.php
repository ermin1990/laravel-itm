@if(isset($contacts))
    <h3 class="font-bold">Svi kontakti</h3>
    @foreach($contacts as $contact)
        <div class=" my-5 text-xl p-4 bg-gray-200">
            <p class=" font-bold">{{$contact->email}}</p>
            <p class=" text-gray-500 uppercase">{{$contact->subject}}</p>
            <p class=" text-gray-500 text-lg p-2 border-2 bg-white rounded">{{$contact->message}}</p>
        </div>
    @endforeach

@endif
