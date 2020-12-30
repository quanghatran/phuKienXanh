@extends('admin/master')

@section('title', 'Thêm mới tài khoản')

@section('main')
<div class="container">
    <form action="" method="POST" role="form">
        @csrf
        <legend>Form add new</legend>

        <div class="form-group">
            <label for=""> Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Input field">
            @if($errors->has('name'))
            {{$errors->first('name')}}
            @endif()
        </div>

        <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Input field">
            @if($errors->has('email'))
            {{$errors->first('email')}}
            @endif()
        </div>

        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password" id="email" placeholder="Input field">
            @if($errors->has('password'))
            {{$errors->first('password')}}
            @endif()
        </div>

        <div class="form-group">
            <label for="">Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password" id="email" placeholder="Input field">
            @if($errors->has('confirm_password'))
            {{$errors->first('confirm_password')}}
            @endif()
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('user')}}" class="btn btn-danger">Cancel</a>

    </form>

</div>
@stop()