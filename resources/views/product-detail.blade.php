@extends('master')

@section('title', 'welcome')

@section('main')
<div class="row">
    <div class="col-md-5">
        <img src="{{$model->image}}" alt="" style="width:100%">
        <?php
        $images = json_decode($model->image_list);
        ?>
        @if(is_array($images))
        <div class="row">
            <hr>
            @foreach($images as $img)
            <div class="col-md-4">
                <img src="{{$img}}" alt="" style="width:100%">
            </div>
            @endforeach
        </div>
        @endif
    </div>
    <div class="col-md-7">
        <h1>{{$model->name}}</h1>
        <div>{!!$model->content !!}</div>

        <p>

            <form action="" method="POST" class="form-inline" role="form">
                <legend>Form title</legend>

                <div class="form-group">
                    <input type="number" class="form-control" name="quantity" id="" placeholder="quantity">
                </div>

                <button type="submit" class="btn btn-success">Add to Cart</button>
            </form>

        </p>

    </div>
</div>
@stop()