@extends('theme')
@section('content')
<div class="container-fluid">
<h1>Личный кабинет</h1>
<div class="row align-items-center">
{{ Auth::user()->login}}
<a href="{{ route('changePass') }}">ChangePass</a>
</div>
</div>
@endsection
