@extends('theme')
@section('content')
<div class="container-fluid">
<table class="table table-hover">
    <tr>
    <td>id</td>
    <td>name</td>
    <td>sort</td>
    <td>parent category</td>
    <td>Actions <a class="btn btn-success" href="{{ route('categories.create') }}">Create</a></td>
    </tr>
    @foreach ($cats as $cat)
    <tr>
        <td>{{ $cat->id }}</td>
        <td><a class="link-offset-2 link-dark link-underline link-underline-opacity-0 " href="{{ route('categories.show', ['category'=>$cat->id]) }}">{!! $cat['name']!!}</a></td>
        <td>{{ $cat->sort }}</td>
        <td>@isset($cat->category->name)
        {{ $cat->category->name}}
        @endisset</td>
        <td><form method="post" action="{{ route('categories.destroy', ['category'=>$cat->id]) }}"><a class="btn btn-primary" href="{{ route('categories.edit', ['category'=>$cat->id]) }}">Edit</a> <a href=""></a>            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
         </td>
    </tr>
    @endforeach
</table>
</div>
@endsection
