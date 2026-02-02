@extends('admin/cabinet', ['title'=> 'Категория N'. $country->id])
@section('fill')
<div class="container-fluid">

<h1 class="text-center">{{ $country->name }}</h1>
<p class="">{{ $country->description }}</p>
@endsection
