@extends('master')

@section('title', 'welcome')

@section('main')
<div class="jumbotron">
    <div class="container">
        <h1>Hello, home!</h1>
        <p>Contents ...</p>
        <p>
            <a class="btn btn-primary btn-lg">Learn more</a>
        </p>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <h2>New Product</h2>
    </div>
    @foreach($top_product as $tp)
    <div class="col-sm-3">
        <div class="thumbnail">
            <img src="{{$tp->image}}" alt="">
            <div class="caption">
                <h3>{{$tp->name}}</h3>
                <p>
                    @if($tp->sale_price > 0)
                    <s>
                        Old Price: {{number_format($tp->price)}} Đ
                    </s>
                    <br>
                    <b>
                        Sale Price: {{number_format($tp->sale_price)}} Đ
                    </b>
                    @else
                    <b>
                        Price: {{number_format($tp->price)}} Đ
                    </b>
                    @endif
                </p>
                <p>
                    <a href="{{route('view', ['slug'=>$tp->slug])}}" class="btn btn-xs btn-success">Detail</a>
                    <a href="#" class="btn btn-xs btn-default">Action</a>
                </p>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="row">
    <div class="col-md-12">
        <h2>Sale Product</h2>
    </div>
    @foreach($sale_product as $sp)
    <div class="col-sm-3">
        <div class="thumbnail">
            <img src="{{$sp->image}}" alt="image">
            <div class="caption">
                <h3>{{$sp->name}}</h3>
                <p>
                    <s>
                        Old Price: {{number_format($sp->price)}} Đ
                    </s>
                    <br>
                    <b>
                        Sale Price: {{number_format($sp->sale_price)}} Đ
                    </b>

                </p>
                <p>
                    <a href="{{route('view', ['slug'=>$sp->slug])}}" class="btn btn-xs btn-success">Detail</a>
                    <a href="#" class="btn btn-xs btn-default">Action</a>
                </p>
            </div>
        </div>
    </div>
    @endforeach
</div>
<hr>
@stop()