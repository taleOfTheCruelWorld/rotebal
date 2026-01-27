@extends('theme', ['title'=> 'Категория N'. $cat->id])
@section('content')
<div class="container-fluid">

<h1 class="text-center">{{ $cat->name }}</h1>
@if ($cat->category == null)
@else
<p class="text-center text-body-secondary"> <a href="{{ route('category', ['Category'=>$cat->parent_id]) }}">{{ $cat->category->name}}</a></p>
@endif
<p class="">{{ $cat->description }}</p>
@if ($cat->categories->isEmpty())
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Filters</a>
    <div class="collapse navbar-collapse" id="navbarNav">
    <form action="" method="get">
      <ul class="navbar-nav">
        <li class="nav-item">
          <span class="nav-link active" aria-current="page" href="#">Ценa</span>
          @if (isSet($q_min))
          <input type="number" name="min" value="{{ $q_min }}" placeholder="min">
          @else
          <input type="number" name="min" value="" placeholder="min">
          @endif
          @if (isSet($q_max))
          <input type="number" name="max" value="{{ $q_max }}" placeholder="max">
          @else
          <input type="number" name="max" value="" placeholder="max">
          @endif
        </li>
      </ul>
        <select name="sort">
            <option value=""></option>
            <option value="price_down" @if (isSet($q_sort) && $q_sort == 'price_down') {{'selected'}} @endif>Сначала дешевые</option>
            <option value="price_up"@if (isSet($q_sort) && $q_sort == 'price_up'){{'selected'}} @endif>Сначала дорогие</option>
            <option value="abc"@if (isSet($q_sort) && $q_sort == 'abc'){{'selected'}}@endif>По алфавиту</option>
            <option value="new"@if (isSet($q_sort) && $q_sort == 'new'){{'selected'}}@endif>Сначала новые</option>
        </select>
        <select name="country">
            <option value=""></option>
            @foreach ($countries as $country)
                @if (isSet($q_country) && $country->id == $q_country)
                <option value="{{ $country->id }}" selected>{{ $country->name }}</option>
                @else
                <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endif
            @endforeach
        </select>
      <button class="btn" type="submit">Показать</button>
      <a class="btn" href="{{ route('category', ['Category'=>$cat->id]) }}">Reset</a>
    </form>
  </div>
</nav>
@else
<h2>Подкатегории</h2>
<table class="table table-hover">
    @foreach ($cat->categories as $category)
    <tr>
        <td><a class="link-offset-2 link-dark link-underline link-underline-opacity-0 " href="{{ route('category', ['Category'=>$category->id]) }}">{!! $category->name!!}</a></td>
    </tr>
    @endforeach
</table>
@endif
@if ($cat->products->isEmpty() || $prods->isEmpty())
<h1>Товаров нет</h1>
@else
<h2>Товары</h2>
<table class="table table-hover">
    <tr>
        <td></td>
        <td>Name</td>
        <td>Price</td>
    </tr>
    @foreach ($prods as $prod)
    <tr>
        <td> <a href="https://www.вкусней.рф/{{Storage::url($prod->photos[0]->path) }}""> <img src="https://www.вкусней.рф/{{Storage::url($prod->photos[0]->thumbnails->path) }}" class="img-thumbnail" width="200px" alt=""></a></td>
        <td><a class="link-offset-2 link-dark link-underline link-underline-opacity-0 " href="{{ route('product', ['Product'=>$prod->id]) }}">{!! $prod->name!!}</a></td>
        <td>{{ $prod->price }} руб</td>
    </tr>
    @endforeach
</table>
@endif
    {{ $prods->links() }}
</div>
@endsection
