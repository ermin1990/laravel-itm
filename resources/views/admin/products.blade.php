@extends("layout")
@section("title", "Svi proizvodi")
@section("content")

    <h3> Svi proizvodi</h3>

    @if(isset($products))
        @include('partials.status')
        @include("admin.components.productitem")
    @endif


@endsection
