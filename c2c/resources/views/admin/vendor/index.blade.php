@extends('admin.master')
@section('title','List User')
@section('boxicon','fa-user')
@section('boxtitle','List Users')
@section('col-size','col-sm-12')
@section('content')
   <table class='table table-hover' id="app-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Profile</th>
                <th>Role</th>
                <th>Phone</th>
                <th>Action</th>
              
            </tr>
        </thead>
        <tbody>
        @foreach($a as $item)
            <tr>
                <td>{{$loop->iteration }}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td><img src= "{{url('storage',$item->profile)}}" height="64 "/></td>
                <td>{{$item->role}}</td>
                <td>{{$item->phone}}</td>
                <td>Change Password</td>
            </tr>
        @endforeach
        </tbody>
   </table>
@endsection