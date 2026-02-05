@extends('theme')
@section('content')
<div class="container-fluid">
<h1>Change password</h1>
<form action="{{ route('changePass') }}" method="post">
@csrf()
  <div class="mb-3">
    <label for="exampleInputPassword1"  class="form-label">Old Password</label>
    <input type="text" name="old_pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">New Password</label>
    <input type="text" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Repeat Password">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Repeat Password</label>
    <input type="text" name="pass_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Repeat Password">
  </div>
  </div>
  <button type="submit" style="width: 100%;" class="btn btn-primary">Submit</button>
</form>
@endsection
