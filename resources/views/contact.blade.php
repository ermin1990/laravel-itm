@include('partials\header')


<h3 class="font-bold">Kontakt forma</h3>
<h3>Jednostavna kontakt forma</h3>

<form action="" class=" p-5 bg-gray-100 flex flex-col gap-3 w-1/2">

    <label for="name">Ime</label>
    <input type="text" name="name" id="name">

    <label for="email">Email</label>
    <input type="email" name="email" id="email">

    <label for="message">Poruka</label>
    <textarea name="message" id="message" cols="30" rows="10"></textarea>

    <input class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded pointer" type="submit" value="Pošalji">
</form>


@include('partials\footer')
