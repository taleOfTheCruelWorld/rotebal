@extends('theme')
@section('content')


    @foreach (Auth::user()->products as $product)

        
    @endforeach

@endsection