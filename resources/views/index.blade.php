@extends('theme')
@section('content')
<div class="container-fluid">

<div class="row align-items-center">
    @foreach ($prods as $prod)
    @include('parts.product')
    @endforeach
</div>
</div>
@endsection
