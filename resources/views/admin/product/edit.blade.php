@extends('admin.master')

@section('title', 'Sửa sản phẩm')

@section('main')

<div class="box-body">

    <form action="{{route('product.store')}}" method="POST" role="form">

        @csrf
        <div class="row">
            <div class="col-md-9">

                <!-- name product -->
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="input files" value="{{$model->name}}">
                    @if($errors->has('name'))
                    {{$errors->first('name')}}
                    @endif()
                </div>

                <!-- slug product -->
                <div class="form-group">
                    <label for="">Đường dẫn SEO</label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="input files" value="{{$model->slug}}">
                    @if($errors->has('slug'))
                    {{$errors->first('slug')}}
                    @endif()
                </div>


                <div class="form-group">
                    <!-- để thêm được frame của tinymce thì cần phải sử dụng thẻ <textarea> thay vì dùng thẻ <input> -->
                    <label for="">Nội dung sản phẩm</label>
                    <textarea name="content" id="content" class="form-control">
                    {{$model->content}}
                    </textarea>
                </div>

            </div>

            <div class="col-md-3">

                <!-- category of product -->
                <div class="form-group">
                    <label for="">Danh mục sản phẩm</label>
                    <select name="category_id" class="form-control">
                        <option value="">Chọn 1</option>
                        @foreach($cats as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- price product -->
                <div class="form-group">
                    <label for="">Giá sản phẩm</label>
                    <input type="text" class="form-control" name="price" placeholder="input files" value="{{$model->price}}">
                    @if($errors->has('price'))
                    {{$errors->first('price')}}
                    @endif()
                </div>

                <!-- sale price -->
                <div class="form-group">
                    <label for="">Giá khuyến mãi</label>
                    <input type="text" class="form-control" name="sale_price" placeholder="input files" value="{{$model->sale_price}}">
                    @if($errors->has('sale_price'))
                    {{$errors->first('sale_price')}}
                    @endif()
                </div>

                <!-- status -->
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="status" id="input" value="1" checked>
                            Hiển thị
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="status" id="input" value="0">
                            Ẩn
                        </label>
                    </div>
                </div>

                <!-- image -->
                <div class="form-group">
                    <label for="">Ảnh sản phẩm</label>
                    <input type="text" class="form-control" name="image" placeholder="input files" value="{{$model->image}}">
                    <span class="input-group-btn">
                        <a href="#modal-file" id="show_img" data-toggle="modal" class="btn btn-default">Select</a>
                    </span>
                    <img src="{{$model->image}}" alt="image" id="show_img" style="width: 100%">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

</div>

@stop()

@section('js')

<!-- <h1 style="color: red;">chờ tí nữa check lại phẩn add images</h1>
<a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Trigger modal</a>
<div class="modal fade" id="modal-id">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div> -->


<script src="{{url('admin/')}}/js/slug.js"></script>
<!-- muốn sử dụng được slug thì phải cho id của trường nhập là name còn id của trường in ra slug là slug  -->

<script src="{{url('admin/')}}/tinymce/tinymce.min.js"></script>
<script src="{{url('admin/')}}/tinymce/config.js"></script>
@stop()