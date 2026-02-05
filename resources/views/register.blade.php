@extends('theme')
@section('content')
<div class="container">
<h1 class="h1" style="text-align: center;">Register</h1>
<form action="" method="post">
@csrf
<div class="mb-3">
    <label class="form-label">Username</label>
    <input type="text" name="login" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1"  class="form-label">Password</label>
    <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Repeat Password</label>
    <input type="password" name="pass_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Repeat Password">
  </div>
  <button type="submit" style="width: 100%;" class="btn btn-primary">Submit</button>
</form>
<span><a href="{{ route('login') }}" class="link-offset-2 link-dark link-underline link-underline-opacity-0 ">Login</a></span>
</div>
@endsection
