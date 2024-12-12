@include('partials.status')

@if(isset($contacts))
    <h3 class="font-bold text-2xl mb-4">Svi kontakti</h3>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 border-b">Email</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 border-b">Predmet</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 border-b">Poruka</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 border-b text-right">Akcije</th>
            </tr>
            </thead>
            <tbody>
            @foreach($contacts as $contact)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 text-sm text-gray-700 border-b">{{ $contact->email }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700 border-b">{{ $contact->subject }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700 border-b">{{ $contact->message }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700 border-b text-right">
                        <a class="p-1 text-black hover:bg-blue-300 transition:ease-in-out duration-300 rounded">
                            Pregledaj
                        </a>
                        <a href="{{route("admin.editcontact", $contact->id)}}" class="p-1 text-black hover:bg-yellow-300 transition:ease-in-out duration-300 rounded">
                            Edit
                        </a>
                        <a href="{{route("admin.deletecontact", $contact->id)}}"
                            class="p-1 text-black hover:bg-red-300 transition:ease-in-out duration-300 rounded">
                            Izbriši
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@else
    <p class="text-gray-500">Nema dostupnih kontakata.</p>
@endif
