@extends('admin/cabinet')
@section('fill')
<div class="container-fluid">
<form action="{{ route('categories.store') }}" enctype="multipart/form-data" method="post">
 @csrf
  <div class="mb-3">
    <label for=""  class="form-label">Name</label>
    <input type="text" name="name" class="form-control"  placeholder="Name">
  </div>
  <div class="mb-3">
    <label for=""  class="form-label">Sort</label>
    <input type="number" name="sort" class="form-control"  placeholder="Name" value="">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Description</label>
    <input type="text" name="description" class="form-control"  placeholder="Description">
  </div>
  <div class="mb-3">
   <select class="form-select">
   <option value="0"></option>
   @foreach ($cats as $category)
            <option value="category">{{ $category->name }}</option>
   @endforeach
   </select>
  </div>
  <div class="mb-3">
        <label for="" class="form-label">Image</label>
        <input type="file" name="file" value="">
      </div>
  <button type="submit" style="width: 100%;" class="btn btn-primary">Submit</button>
</form>
@endsection
