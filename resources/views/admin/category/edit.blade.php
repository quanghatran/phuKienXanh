@extends('admin/master')
@section('title', 'Chỉnh sửa danh mục: ' .$model->name )

@section('main')
<div class="container">

    <form action="{{route('category.update', ['id'=>$model->id] )}}" method="POST" role="form">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <legend>Form add new</legend>

        <div class="form-group">
            <label for="">Category Name</label>
            <input type="text" class="form-control" name="name" id="" value="{{$model->name}}">
        </div>

        <div class="radio">
            <label>
                <input type="radio" name="status" id="input" value="1" <?php echo $model->status == 1 ? 'checked' : ''; ?>>
                Public
            </label>
            <label>
                <input type="radio" name="status" id="input" value="0" <?php echo $model->status == 0 ? 'checked' : ''; ?>>
                Un public
            </label>
        </div>
        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?')">Save</button>
        <a href="{{route('category.index')}}" class="btn btn-danger">Cancel</a>
    </form>
</div>

@stop()