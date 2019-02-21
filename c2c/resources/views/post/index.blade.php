@extends('master')
@section('content')
<div>
    <h1>Add Post </h1>
    <hr>

    <div class="col-md-3">
        <img width="64px" src="{{url('storage',Auth::user()->profile)}}"/>
        <p>{{Auth::user()->name}}</p>
        <a href="{{route('member.logout')}}">Logout</a>
    </div>
    
    <div class="col-md-7">
    <form action="{{url('/post/store')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="form-group">
                <label>Category</label>
                <select name="category" id="cat-root" class="form-control">
                @foreach($cat_root as $item)
                    <option value="{{ $item->id}}">{{ $item->name}}</option>
                @endforeach
                </select>
        </div>
        <div class="form-group" id="box-sub-cat">
                <label>Sub Category</label>
                <select name="subcategory" id="sub-cat" class="form-control">
                    <option value="1">Apple</option>
                    <option value="2">Samsung</option>
                </select>
        </div>
        <div class="form-group">
            <label>Product Name:</label>
            <input name="name" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Price :</label>
            <input name="price" type="number" class="form-control">
        </div>
        <div class="form-group">
            <label>Picture :</label>
            <input name="product" type="file" class="form-control">
        </div>
        <div class="form-group">
        <label>Detail :</label>
            <textarea class="form-control" name="detail" >
            </textarea>
        </div>
        <input type="submit" class="btn btn-primary pull-right" value="Post">
    </form>
</div>
</div>

@stop

@section('script')

<script type="text/javascript">
    var catRoot = $('#cat-root');
    var subCat = $('#sub-cat');
    var boxSubCat = $('#box-sub-cat');

    catRoot.change(function(){
        var text = $(this).find("option:selected").text();
        var value = $(this).val();
        // alert(value+ " : " + text);
        var url ="http://127.0.0.1:8000/getsubcat/" + value;
        $.get(url, function(data, status){

            if(data.length == 0)
            {
                boxSubCat.hide();
            }
            else{
                boxSubCat.show();
            }


            var option_sub = '';
            // console.log(data);
            for(var i = 0; i< data.length; i++){
                option_sub += '<option value ="'+ data[i].id+'">'+ data[i].name +'</option>';
            }
            subCat.html(option_sub);
        });
    });
</script>

@stop