@extends('admin/cabinet', ['title'=> 'Категория N'. $cat->id])
@section('fill')
<div class="container-fluid">

<h1 class="text-center">{{ $cat->name }}</h1>
<p class="">{{ $cat->description }}</p>
@endsection
