@extends('theme', ['title'=> 'Продукт N'. $product->id])
@section('content')
<div class="container-fluid">

    <h1 class="text-center">{{ $product->name }}</h1>
    <p class="text-center text-body-secondary"> <a
            href="{{ route('category', ['Category'=>$product->category_id]) }}">{{
            $product->category->name}}</a></p>
    <p class="text-center text-body-secondary"> <a href="{{ route('country', ['Country'=>$product->country_id]) }}">{{
            $product->country->name}}</a>
    </p>
    <p class="text-center">{{ $product->description }}</p>

    @foreach ($product->photos as $photo)
    <img src="https://www.вкусней.рф/{{Storage::url($photo->path) }}" class="img-thumbnail" width="300px"
        alt="https://www.вкусней.рф/{{ substr($photo->path,7) }}">
    @endforeach

    <table class="table">
        <tr>
            @if ($product->volume !== null)
            <td>Volume</td>
            @endif
            @if ($product->fat!== null)
            <td>Fat</td>
            @endif
            <td>Price</td>
            <td>Retail price</td>
        </tr>
        <tr>
            @if ($product->volume !== null)
            <td>{{ $product->volume}}</td>
            @endif
            @if ($product->fat!== null)
            <td>{{ $product->fat}}</td>
            @endif
            <td>{{ $product->price}} руб</td>
            <td>{{ $product->price_retail}} руб</td>
        </tr>
    </table>
    <h1>Похожие продукты</h1>
    <div class="row align-items-center">
        @foreach ( $prods as $prod)
        @include('parts.product')
        @endforeach
    </div>
    @auth
    <h1>Оставить отзыв</h1>
    <form action="{{ route('review', ['Product'=>$product->id]) }}" method="post">
        @csrf()
        <div class="mb-3">
            <label class="form-label">Text</label>
            <input type="textarea" name="text" class="form-control" placeholder="text" aria-label="text"
                aria-describedby="basic-addon1">
        </div>
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <select class="form-select" name="rating">
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">3</option>
                <option value="2">2</option>
                <option value="1">1</option>
            </select>
        </div>
        <button type="submit" style="width: 100%;" class="btn btn-primary">Submit</button>
    </form>
    @endauth
    <h1>Отзывы</h1>
    <div class="row align-items-center">
        @forelse ( $product->reviews as $review)
        <figure style="border-bottom: 2px solid black;">
            <blockquote class="blockquote">
            <h5>{{ $review->user->login }}</h5>
                <p>{{ $review->content}}</p>
            </blockquote>
            <figcaption class="blockquote-footer">
            @for ($i =0 ; $i < 5; $i++)
            @if ($i<$review->rating)
               ★
            @else
                ☆
            @endif
            @endfor
                </figcaption>
            <figcaption class="blockquote-footer">
               <cite>Date: {{ $review->created_at}}</cite>
                </figcaption>
        </figure>
        @empty
        <h3>No reviews</h3>
        @endforelse
    </div>
</div>
@endsection
