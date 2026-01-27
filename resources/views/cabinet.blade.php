@extends('theme')
@section('content')
<div class="container-fluid">

<div class="row align-items-center">
{{ Auth::user()->login}}
</div>
</div>
@endsection
