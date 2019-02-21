@extends('admin.master')
@section('title','List Product')
@section('boxicon','fa-list-alt')
@section('boxtitle','List Product')
@section('col-size','col-sm-12')
@section('content')
<table class='table table-hover' id="app-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>User</th>
                <th>View</th>
                <th>Description</th>
                <th>Status</th>
                <th>Feature</th>
                <th>Action</th>
              
            </tr>
        </thead>
        <tbody>
                <!-- <td>01</td>
                <td>Coca</td>
                <td>1$</td>
                <td>Drink</td>
                <td>User</td>
                <td>1</td>
                <td>Coca Cola</td>
                <td>Blue</td>
                <td>Blue</td>
                <td><img src="#" alt=""></td>
                <td>Action</td> -->
                @foreach($a as $item)
            <tr>
                <td>{{$loop->iteration }}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->cat_id}}</td>
                <td>{{$item->user_id}}</td>
                <td>{{$item->view}}</td>
                <td>{{$item->des}}</td>
                <td>{{$item->status}}</td>
                <td>{{$item->feature}}</td>
                <td>Change Password</td>
            </tr>
        @endforeach
        </tbody>
        
   </table>
@endsection