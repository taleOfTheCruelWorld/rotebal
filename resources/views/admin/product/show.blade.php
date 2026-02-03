@extends('admin/cabinet', ['title'=> 'Категория N'. $product->id])
@section('fill')
<div class="container-fluid">

<h1 class="text-center">{{ $product->name }}</h1>
<p class="">{{ $product->description }}</p>
@endsection
