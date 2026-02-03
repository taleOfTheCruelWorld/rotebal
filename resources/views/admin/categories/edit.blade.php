@extends('admin/cabinet')
@section('fill')
<div class="container-fluid">
<form action="{{ route('categories.update', ['category'=>$cat->id]) }}" method="post">
  
@csrf
@method('PUT')
  <div class="mb-3">
    <label for=""  class="form-label">Name</label>
    <input type="text" name="name" class="form-control"  placeholder="Name" value="{{ $cat->name }}">
  </div>
  <div class="mb-3">
    <label for=""  class="form-label">Sort</label>
    <input type="number" name="sort" class="form-control"  placeholder="Name" value="{{ $cat->sort}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Description</label>
    <input type="text" name="description" class="form-control"  placeholder="Description" value="{{ $cat->description }}">
  </div>
  <div class="mb-3">
   <select name="parent_id" class="form-select">
    
   <option value="0"></option>
   @foreach ($cats as $category)
            <option  value="{{ $category->id }}" @selected($cat->id == $category->id)>{{ $category->name }}</option>
   @endforeach
   </select>
  </div>
  <button type="submit" style="width: 100%;" class="btn btn-primary">Submit</button>
</form>
@endsection
