@extends('admin/cabinet')
@section('fill')
  <div class="container-fluid">
    <form action="{{ route('products.store') }}" method="post">
      @csrf
      <div class="mb-3">
        <label for="" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" placeholder="Name">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Description</label>
        <input type="text" name="description" class="form-control" placeholder="Description">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Price</label>
        <input type="number" name="price" class="form-control" placeholder="Description">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Sort</label>
        <input type="number" name="sort" class="form-control" placeholder="Description">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Category</label>
        <select name="category_id" class="form-select">
          <option value="0"></option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}">
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
            <option value="{{ $country->id }}">{{ $country->name }}</option>
          @endforeach
        </select>
      </div>
      <button type="submit" style="width: 100%;" class="btn btn-primary">Submit</button>
    </form>
@endsection