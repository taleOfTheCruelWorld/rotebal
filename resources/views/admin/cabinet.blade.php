@extends('theme')
@section('content')
<div class="container">
<ul class="nav justify-content-center nav-tabs">
  <li class="nav-item">
    <a class="nav-link " href="{{ route('categories.index')}}">Categories</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Products</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Countries</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{ route('reviews') }}">Reviews</a>
  </li>
</ul>
</div>
@yield('fill', default: '')
@endsection
