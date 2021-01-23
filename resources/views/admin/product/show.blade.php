@extends('admin/master')

@section('title', 'Chi tiết sản phẩm')


@section('main')
<?php
$images = json_decode($model->image_list);
// dd($images);
?>

<div class="box-body">
    <div class="row">
        <div class="col-md-5">
            <!-- <img src="{{url('uploads')}}/{{$model->image}}" alt="" style="width: 100%;"> -->
            <img src="{{$model->image}}" alt="image" style="width: 100%;">

            <!-- hiển thị ra danh sách images sản phẩm nếu có  -->
            @if(is_array($images))
            <div class="row">
                <hr>
                @foreach($images as $img)
                <div class="col-md-4">
                    <img src="{{$img}}" alt="image" style="width: 100%; height: 150px; border:0;overflow-y:auto; background-size: cover;">
                </div>
                @endforeach
            </div>
            @endif
        </div>
        <div class="col-md-7">
            <h1 class="text-center text-success">{{$model->name}}</h1>
            <hr>
            <h3>Content of product</h3>
            <p>{{$model->content}}</p>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <h4>Price</h4>
                    <p>{{$model->price}}</p>
                </div>
                <div class="col-md-4">
                    <h4>Sale Price</h4>
                    <p>{{$model->sale_price}}</p>
                </div>
                <div class="col-md-4">
                    <h4>Status</h4>
                    <p>{{$model->status}}</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <h4>Created at</h4>
                    <p>{{$model->created_at}}</p>
                </div>
                <div class="col-md-4">
                    <h4>Updated at</h4>
                    <p>{{$model->updated_at}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@stop()