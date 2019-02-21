@extends('admin.master')
@section('title','List Category')
@section('boxicon','fa-bar-chart')
@section('boxtitle',$parent_name)
@section('col-size','col-sm-12')
@section('content')
 
@section('block-btn-right')
<a href="{{url('/system/category/create/'.$parent_id)}}" class="btn btn-link pull-right">Add New</a>
@stop 
<table class="table table-striped" id="app-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Icon</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Order</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($categories as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td><img src="{{ url('storage', $item->icon)}}"/></td>
            <td><a href="{{url('/system/category/sub/'.$item->id)}}">{{ $item->name}} ({{$item->sub->count()}})</a></td>
            <td>{{ $item->slug}}</td>
            <td>
            @if(!$loop->first)
            <a href="{{url('/system/category/order/'.$item->id.'/'.$item->order.'/up')}}"><i class="fa fa-arrow-up fa-lg"></i></a>
            @endif
            @if(!$loop->last)    
                <a href="{{url('/system/category/order/'.$item->id.'/'.$item->order.'/down')}}"><i class="fa fa-arrow-down fa-lg"></i></a>
            @endif
            </td>
            <td>
                
                <a href="{{ url('/system/category/sub/'.$item->id)}}"><i class="fa fa-bars fa-lg"></i></a>
                &nbsp; 
                <a href="#"><i class="fa fa-edit fa-lg"></i></a>
            </td>
        </tr>
       
    @endforeach 
    </tbody>
</table>

@endsection
