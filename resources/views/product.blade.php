@extends('theme', ['title'=> 'Продукт N'. $prod->id])
@section('content')
<div class="container-fluid">

    <h1 class="text-center">{{ $prod->name }}</h1>
    <p class="text-center text-body-secondary"> <a href="/category/{{ $prod->category->id}}">{{
            $prod->category->name}}</a></p>
    <p class="text-center text-body-secondary"> <a href="/country/{{ $prod->country->id}}">{{ $prod->country->name}}</a>
    </p>
    <p class="text-center">{{ $prod->description }}</p>

    @foreach ($prod->photos as $photo)
    <img src="https://www.вкусней.рф/{{Storage::url($photo->path) }}" class="img-thumbnail" width="300px"
        alt="https://www.вкусней.рф/{{ substr($photo->path,7) }}">
    @endforeach

    <table class="table">
        <tr>
            @if ($prod->volume !== null)
            <td>Volume</td>
            @endif
            @if ($prod->fat!== null)
            <td>Fat</td>
            @endif
            <td>Price</td>
            <td>Retail price</td>
        </tr>
        <tr>
            @if ($prod->volume !== null)
            <td>{{ $prod->volume}}</td>
            @endif
            @if ($prod->fat!== null)
            <td>{{ $prod->fat}}</td>
            @endif
            <td>{{ $prod->price}} руб</td>
            <td>{{ $prod->price_retail}} руб</td>
        </tr>
    </table>
    <h1>Похожие продукты</h1>
    <div class="row align-items-center">
        @foreach ( $prods as $prod)
        @include('parts.product')
        @endforeach
    </div>
</div>
@endsection
