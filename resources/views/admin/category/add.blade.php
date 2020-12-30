@extends('admin/master')
@section('title', 'Thêm mới danh mục')

@section('main')
<div class="container">
    <form action="{{route('category.store')}}" method="POST" role="form">
        @csrf
        <legend>Form add new</legend>

        <div class="form-group">
            <label for="">Category Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Input field">
            @if($errors->has('name'))
            {{$errors->first('name')}}
            @endif()
        </div>
        <div class="form-group">
            <label for="">Category Slug</label>
            <input type="text" class="form-control" name="slug" id="slug" placeholder="Input field">
            @if($errors->has('slug'))
            {{$errors->first('slug')}}
            @endif()
        </div>

        <div class="radio">
            <label>
                <input type="radio" name="status" id="input" value="0">
                Un public
            </label>
            <label>
                <input type="radio" name="status" id="input" value="1" checked>
                Public
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('category.index')}}" class="btn btn-danger">Cancel</a>

    </form>

</div>
@stop()

@section('js')
<script src="{{url('admin/')}}/js/slug.js"></script>
@stop()