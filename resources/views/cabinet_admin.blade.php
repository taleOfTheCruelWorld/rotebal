@extends('theme')
@section('content')
<div class="container-fluid">
<h1>Кабинет администратора</h1>
<div class="row align-items-center">
You are admin {{ Auth::user()->login}} !
</div>
</div>
@endsection
