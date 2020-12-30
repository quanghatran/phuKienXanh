@extends('admin/master')

@section('title', 'Quản lý người dùng')

@section('main')
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading"><b>Account list</b></div>
    <div class="panel-body">

        <form action="" method="POST" role="form" class="form-inline">
            <div class="form-group">
                <input type="text" class="form-control" name="search" placeholder="Input keyword">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>

            <a href="{{route('user_add')}}" class="btn btn-success">Add new</a>
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
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}} </td>
                <td>{{$user->name}} </td>
                <td>{{$user->status}} </td>
                <td>{{$user->create_at}} </td>
                <td>
                    <a href="{{route('user_edit', ['id'=>$user->id])}}" type="button" class="btn btn-xs btn-primary">Edit</a>
                    <a href="{{route('user_delete', ['id'=>$user->id])}}" type="button" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure!')">Delete</a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="clearfix">
        {{$users->links()}}
    </div>

</div>


@stop()