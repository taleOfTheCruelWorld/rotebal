@extends('theme', ['title'=> 'Cтрана:'. $country->id])
@section('content')
<div class="container-fluid">

<h1 class="text-center">{{ $country->name }}</h1>
<p class="text-center">{{ $country->description }}</p>

</div>
@endsection
