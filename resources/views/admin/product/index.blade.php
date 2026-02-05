@extends('admin/cabinet')
@section('fill')
<div class="container-fluid">
<table class="table table-hover">
    <tr class="table-primary">
    <td>Id</td>
    <td>Name</td>
    <td>Description</td>
    <td>Actions <a class="btn btn-success" href="{{ route('products.create') }}">Add</a></td>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td><a class="link-offset-2 link-dark link-underline link-underline-opacity-0 " href="{{ route('products.show', ['product'=>$product->id]) }}">{!! $product['name']!!}</a></td>
        <td>{{ $product->description }}</td>
        <td><form method="post" action="{{ route('products.destroy', ['product'=>$product->id]) }}"><a class="btn btn-primary" href="{{ route('products.edit', ['product'=>$product->id]) }}">Edit</a> <a href=""></a>@csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
         </td>
    </tr>
    @endforeach
</table>
</div>
@endsection
