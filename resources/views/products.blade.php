@extends('theme')
@section('content')
<div class="container-fluid">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Filters</a>
    <div class="collapse navbar-collapse" id="navbarNav">
    <form action="" method="get">
    @if (isSet($sr_value))
     <input type="hidden" name="name" value="{{ $sr_value }}">
    @endif
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
        <select name="category">
            <option value=" "></option>
            @foreach ($cats as $cat)
                @if (isSet($q_categ) && $cat->id == $q_categ)
                <option value="{{ $cat->id }}" selected>{{ $cat->name }}</option>
                @else
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endif
            @endforeach
        </select>
      </ul>
      <button class="btn" type="submit">Показать</button>
    </form>
    </div>
  </div>
</nav>
@if ($prods->isEmpty())
<h2>Ничего не найдено</h2>
@else

<div class="row align-items-center">
    @foreach ($prods as $prod)
    @include('parts.product')
    @endforeach
</div>
</div>
    {{$prods->links() }}
@endif
@endsection
