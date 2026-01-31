@extends('theme', ['title'=> 'Категория N'. $cat->id])
@section('content')
<div class="container-fluid">

<h1 class="text-center">{{ $cat->name }}</h1>
<p class="">{{ $cat->description }}</p>
@endsection
