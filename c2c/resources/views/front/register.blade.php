@extends('master')
@section('content')
    <div class="row">
    <div class="col-md-6 col-md-offset-3">
   
    <form role="form" action="{{url('/register')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="form-group">
            <label>Full Name</label>
            <input name='name' value="{{old('name')}}" type="text" class="form-control" placeholder="Full Name...">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input name='email' value="{{old('email')}}" type="email" class="form-control" placeholder="Email...">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input name='password' type="password" class="form-control" placeholder="Password">
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input name='confirm_password' type="password" class="form-control" placeholder="Confirm Password">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input name='phone'value="{{old('phone')}}" type="text" class="form-control" placeholder="Phone">
        </div>
        <div class="form-group">
            <label>Profile</label>
            <input name='profile' type="file" class="form-control" placeholder="">
        </div>
        <div class="form-group">
            
            <input class='btn btn-primary pull-right' type="submit" value='Save'>
        </div>
    
        
        

    </form>
    </div>
    
    </div>
@stop