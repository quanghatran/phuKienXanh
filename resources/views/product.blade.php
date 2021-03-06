@extends('master')

@section('title', 'welcome')

@section('main')
<div class="jumbotron">
    <div class="container">
        <h1>Hello, category!</h1>
        <p>Contents ...</p>
        <p>
            <a class="btn btn-primary btn-lg">Learn more</a>
        </p>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <h2> Danh mục {{$model->name}}</h2>
    </div>

    @foreach($model->products as $pd)
    <div class="col-sm-3">
        <div class="thumbnail">
            <img src="{{$pd->image}}" alt="image">
            <div class="caption">
                <h3>{{$pd->name}}</h3>
                <p>
                    <s>
                        Old Price: {{number_format($pd->price)}} Đ
                    </s>
                    <br>
                    <b>
                        Sale Price: {{number_format($pd->sale_price)}} Đ
                    </b>

                </p>
                <p>
                    <a href="{{route('view', ['slug'=>$pd->slug])}}" class="btn btn-xs btn-success">Detail</a>
                    <a href="#" class="btn btn-xs btn-default">Action</a>
                </p>
            </div>
        </div>
    </div>
    @endforeach
</div>


<hr>
@stop()
<!-- 
@section('seconds')
<p>place for seconds section</p>

@stop() -->