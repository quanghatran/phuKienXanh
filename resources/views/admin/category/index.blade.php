@extends('admin/master')

@section('title', 'Quản lý danh mục')

@section('main')
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading"><b>Category list</b></div>
    <div class="panel-body">

        <form action="" method="POST" role="form" class="form-inline">
            <div class="form-group">
                <input type="text" class="form-control" name="search" placeholder="Input keyword">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>

            <a href="{{route('category.create')}}" class="btn btn-success">Add new</a>
        </form>

    </div>

    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Created at</th>
                <th></th>
            </tr>

        </thead>
        <tbody>
            @foreach($cats as $cat)
            <tr>
                <td>{{$cat->id}} </td>
                <td>{{$cat->name}} </td>
                <td>{{$cat->status}} </td>
                <td>{{$cat->created_at}} </td>
                <td>

                    <form method="POST" action="{{route('category.destroy', ['id' =>$cat->id] ) }}">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">

                        <a href="{{route('category.edit', ['id'=>$cat->id])}}" type="button"
                            class="btn btn-xs btn-primary">Edit</a>
                        <button class="btn btn-xs btn-danger" onclick="return confirm('Are you sure!')">Delete
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="clearfix">
        {{$cats->links()}}
    </div>

</div>


@stop()