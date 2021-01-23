@extends('admin/master')

@section('title', 'Quản lý sản phẩm ')

@section('main')
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading"><b>Product list</b></div>
    <div class="panel-body">

        <form action="" method="POST" role="form" class="form-inline">
            <div class="form-group">
                <input type="text" class="form-control" name="search" placeholder="Input keyword">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>

            <a href="{{route('product.create')}}" class="btn btn-success">Add new</a>
        </form>

    </div>

    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Category</th>
                <th></th>
            </tr>

        </thead>
        <tbody>
            @foreach($product as $pro)
            <tr>
                <td>{{$pro->id}} </td>
                <td>

                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="{{$pro->image}}" alt="Image" width="50" height="50" style="background-size: cover;">
                            <!-- <img class="media-object" src="{{url('uploads')}}/{{$pro->image}}" alt="Image" width="50"> -->
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{$pro->name}}</h4>
                            <p>{{$pro->created_at->format('d-m-Y')}}</p>
                        </div>
                    </div>

                </td>
                <td>{{$pro->status}} </td>
                <td>{{$pro->cat->name}} </td>
                <td style="width: 100px;">

                    <form method="POST" action="{{route('product.destroy', ['id' =>$pro->id] ) }}">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">

                        <a href="{{route('product.show', ['id'=>$pro->id])}}" type="button" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
                        <a href="{{route('product.edit', ['id'=>$pro->id])}}" type="button" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                        <button class="btn btn-xs btn-danger" onclick="return confirm('Are you sure!')"><i class="fa fa-trash"></i>
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="clearfix">
        {{$product->links()}}
    </div>

</div>


@stop()