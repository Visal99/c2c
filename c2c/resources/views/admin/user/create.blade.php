@extends('admin.master')
@section('title','Create User')
@section('boxicon','fa-user')
@section('boxtitle','Add Users')
@section('col-size','col-sm-8')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form role="form" action="{{url('system/users')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Select multiple-->
        <div class="form-group">
            <label>Role</label>
            <select name='role' class="form-control">
                <option>Admin</option>
                <option>Report</option>    
            </select>
        </div>
        <!-- text input -->
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
             

@endsection