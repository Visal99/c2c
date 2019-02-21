@extends('admin.master')
@section('title','Add Category')
@section('boxicon','fa-bar-chart')
@section('boxtitle',"add sub $parent_name")
@section('col-size','col-sm-6')
@section('content')
<form role="form" action="{{url('system/category')}}" method="POST" enctype="multipart/form-data">
        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
        @endif
        @csrf
        <input type="hidden" name="parent_id" value="{{ $parent_id }}"/>
        <div class="form-group">
            <label>Name *</label>
            <input type="text" name="name" class="form-control"/>
        </div>

        <div class="form-group">
            <label>Slug *</label>
            <input type="text" name="slug" class="form-control"/>
        </div>

        <div class="form-group">
            <label>Icon *</label>
            <input type="file" name="icon" class="form-control"/>
        </div>
        <input type="submit" class="btn btn-primary pull-right" value="Add"/>
</form>
@endsection