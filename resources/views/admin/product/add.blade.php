@extends('admin.master')

@section('title', 'Thêm mới sản phẩm')

@section('main')

<div class="box-body">

    <form action="{{route('product.store')}}" method="POST" role="form">

        @csrf
        <div class="row">
            <div class="col-md-9">

                <!-- name product -->
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" placeholder="input files">
                </div>

                <!-- slug product -->
                <div class="form-group">
                    <label for="">Đường dẫn SEO</label>
                    <input type="text" class="form-control" name="slug" placeholder="input files">
                </div>

                <!-- content product -->
                <div class="form-group">
                    <label for="">Nội dung</label>
                    <textarea name="content" id="content" class="form-control"></textarea>
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
                    <input type="text" class="form-control" name="price" placeholder="input files">
                </div>

                <!-- sale price -->
                <div class="form-group">
                    <label for="">Giá khuyến mãi</label>
                    <input type="text" class="form-control" name="sale_price" placeholder="input files">
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
                    <input type="text" class="form-control" name="image" placeholder="input files">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

</div>

@stop()