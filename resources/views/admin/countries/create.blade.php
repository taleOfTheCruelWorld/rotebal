@extends('admin/cabinet')
@section('fill')
<div class="container-fluid">
<form action="{{ route('countries.store') }}" method="post">
 @csrf
  <div class="mb-3">
    <label for=""  class="form-label">Name</label>
    <input type="text" name="name" class="form-control"  placeholder="Name">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Description</label>
    <input type="text" name="description" class="form-control"  placeholder="Description">
  </div>
  <button type="submit" style="width: 100%;" class="btn btn-primary">Submit</button>
</form>
@endsection
