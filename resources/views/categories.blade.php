@extends('theme')
@section('content')
<div class="container-fluid">
<table class="table table-hover">
    @foreach ($cats as $cat)
    <tr>
        <td><a class="link-offset-2 link-dark link-underline link-underline-opacity-0 " href="{{ route('category', ['Category'=>$cat->id]) }}">{!! $cat['name']!!}</a></td>
    </tr>
    @endforeach
</table>
</div>
@endsection
