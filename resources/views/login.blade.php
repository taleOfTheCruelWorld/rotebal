@extends('theme')
@section('content')
<div class="container">
<h1 style="text-align: center;">Login</h1>
<form action="" method="post">
@csrf()
<div class="mb-3">
    <label class="form-label">Username</label>
    <input type="text" name="login" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
</div>
  <div class="mb-3">
    <label for="exampleInputPassword1"  class="form-label">Password</label>
    <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Repeat Password</label>
    <input type="password" name="pass_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Repeat Password">
  </div>
  <div class="md-3">
  <div class="form-check">
  <input class="form-check-input" name="rememberMe"  type="hidden" value="0" id="flexCheckDefault">
  <input class="form-check-input" name="rememberMe"  type="checkbox" value="1" id="flexCheck">
  <label class="form-check-label" for="flexCheckDefault">
  Remember Me
  </label>
  </div>
  </div>
  <button type="submit" style="width: 100%;" class="btn btn-primary">Submit</button>
</form>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<span><a href="{{ route('register') }}" class="link-offset-2 link-dark link-underline link-underline-opacity-0 ">Register</a></span>
</div>
@endsection
