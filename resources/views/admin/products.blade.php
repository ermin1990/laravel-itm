@extends("layout")
@section("title", "Svi proizvodi")
@section("content")

    <h3> Svi proizvodi</h3>

    @if(isset($products))
        @if(isset($errors))
            @foreach($errors->all() as $error)
                <p class="text-red-500">{{$error}}</p>
            @endforeach
        @endif
        @include("admin.components.productitem")
    @endif


@endsection
