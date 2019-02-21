@extends('master')
@section('content')
<h1>Login</h1>
<hr>
<div class="row">
    <div class="col-md-4">

<form action="{{route('member.login.check')}}" method="POST">
@csrf
    <p class="login-box-msg">
      @if (session('msg'))
          <div class="alert alert-danger">
              {{ session('msg') }}
          </div>
      @endif
    </p>
      @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
      @endif
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
 
  <button type="submit" class="btn btn-default">Submit</button>
</form>
    </div>
</div>
@stop