@extends('admin/cabinet')
@section('fill')
<div class="container-fluid">
<table class="table table-hover">
    <tr class="table-primary">
    <td>Id</td>
    <td>Name</td>
    <td>Description</td>
    <td>Actions <a class="btn btn-success" href="{{ route('countries.create') }}">Add</a></td>
    </tr>
    @foreach ($countries as $country)
    <tr>
        <td>{{ $country->id }}</td>
        <td><a class="link-offset-2 link-dark link-underline link-underline-opacity-0 " href="{{ route('countries.show', ['country'=>$country->id]) }}">{!! $country['name']!!}</a></td>
        <td>{{ $country->description }}</td>
        <td><form method="post" action="{{ route('countries.destroy', ['country'=>$country->id]) }}"><a class="btn btn-primary" href="{{ route('countries.edit', ['country'=>$country->id]) }}">Edit</a> <a href=""></a>@csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
         </td>
    </tr>
    @endforeach
</table>
</div>
@endsection
