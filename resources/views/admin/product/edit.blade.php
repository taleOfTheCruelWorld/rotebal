@extends('admin/cabinet')
@section('fill')
  <div class="container-fluid">
    <form action="{{ route('products.update', ['product'=>$product->id]) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $product->name }}">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Description</label>
        <input type="text" name="description" class="form-control" placeholder="Description" value="{{ $product->description }}">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Price</label>
        <input type="number" name="price" class="form-control" placeholder="Price" value="{{ $product->price}}">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Sort</label>
        <input type="number" name="sort" class="form-control" placeholder="Description" value="{{ $product->sort }}">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Category</label>
        <select name="category_id" class="form-select">
          <option value="0"></option>
          @foreach ($categories as $category)
            <option @selected($category->id == $product->category_id) value="{{ $category->id }}">
              {{ $category->name }}
            </option>
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Country</label>
        <select name="country_id" class="form-select">
          <option value="0"></option>
          @foreach ($countries as $country)
            <option @selected($country->id == $product->country_id) value="{{ $country->id }}">{{ $country->name }}</option>
          @endforeach
        </select>
      </div>
       <div class="mb-3">
        <label for="" class="form-label">Image</label>
        <input type="file" name="image" value="">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Thumbnails</label>
        <input type="file" name="thumb" value="">
      </div>
      <button type="submit" style="width: 100%;" class="btn btn-primary">Submit</button>
    </form>
@endsection
