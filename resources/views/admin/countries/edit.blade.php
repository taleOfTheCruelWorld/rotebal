@extends('admin/cabinet')
@section('fill')
<div class="container-fluid">
<form action="{{ route('countries.update', ['country'=>$country->id]) }}" method="post">
@csrf
@method('PUT')
  <div class="mb-3">
    <label for=""  class="form-label">Name</label>
    <input type="text" name="name" class="form-control"  placeholder="Name" value="{{ $country->name }}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Description</label>
    <input type="text" name="description" class="form-control"  placeholder="Description" value="{{ $country->description }}">
  </div>
  <button type="submit" style="width: 100%;" class="btn btn-primary">Submit</button>
</form>
@endsection
