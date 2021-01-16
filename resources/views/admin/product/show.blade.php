@extends('admin/master')

@section('title', 'Chi tiết sản phẩm')


@section('main')
<?php
$images = json_decode($model->image_list);
// dd($images);
?>

<div class="box-body">
    <div class="row">
        <div class="col-md-5" style="background:red">
            <img src="{{url('uploads')}}/{{$model->image}}" alt="" style="width: 100%;">

            <!-- hiển thị ra danh sách images sản phẩm nếu có  -->
            <!-- @if(is_array($images))
            <div class="row">
                <hr>
                @foreach($images as $img)
                <div class="col-md-4">
                    <img src="{{$img}}" alt="image" style="width: 100%;">
                </div>
                @endforeach
            </div>
            @endif -->
        </div>
        <div class="col-md-7">
            <h3>{{$model->name}}</h3>
        </div>
    </div>
</div>

@stop()