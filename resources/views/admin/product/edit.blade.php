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


                <!-- content of product -->
                <div class="form-group">
                    <!-- để thêm được frame của tinymce thì cần phải sử dụng thẻ <textarea> thay vì dùng thẻ <input> -->
                    <label for="">Nội dung sản phẩm</label>
                    <!-- <input type="text" class="form-control" name="content" placeholder="input files"> -->
                    <textarea name="content" id="content" class="form-control">
                    {{$model->name}}
                    </textarea>
                </div>

                <div class="form-group">
                    <?php
                    $images = json_decode($model->image_list);
                    ?>
                    <label for="">Các ảnh khác <a href="#modal-files" data-toggle="modal" type="button" class="btn btn-info">Select</a></label>
                    <input type="hidden" name="image_list" id="image_list">
                    <div class="row" id="image_show_list">
                        @if(is_array($images))
                        <div class="row">
                            <hr>
                            @foreach($images as $img)
                            <div class="col-md-4">
                                <img src="{{$img}}" alt="" width="100%">
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
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

                    <div class="input-group">
                        <input type="text" class="form-control" id="image" name="image" placeholder="input files" value="{{$model->image    }}">
                        <span class="input-group-btn">
                            <a href="#modal-file" data-toggle="modal" type="button" class="btn btn-default">Select</a>
                        </span>
                    </div>
                    <img src="{{$model->image}} " alt="{{$model->name}}" id="show_img" style="width: 100%; margin-top: 20px">

                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

</div>

@stop()

@section('js')

<!-- modal for image -->
<div class="modal fade" id="modal-file">
    <div class="modal-dialog" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Quản lý file</h4>
            </div>
            <div class="modal-body">
                <iframe src="{{url('../file')}}/dialog.php?akey=wJHNmWuMzMPv5WwVT7BpmgHIA78UYXJ3JknWlBAdr2Y&field_id=image" style="width: 100%; height: 500px; border:0;overflow-y:auto"></iframe>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- modal for image_list -->
<div class="modal fade" id="modal-files">
    <div class="modal-dialog" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Quản lý file</h4>
            </div>
            <div class="modal-body">
                <iframe src="{{url('../file')}}/dialog.php?akey=wJHNmWuMzMPv5WwVT7BpmgHIA78UYXJ3JknWlBAdr2Y&field_id=image_list" style="width: 100%; height: 500px; border:0;overflow-y:auto"></iframe>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script src="{{url('admin/')}}/js/slug.js"></script>
<!-- muốn sử dụng được slug thì phải cho id của trường nhập là name còn id của trường in ra slug là slug  -->
<script src="{{url('admin/')}}/tinymce/tinymce.min.js"></script>
<script src="{{url('admin/')}}/tinymce/config.js"></script>

<script type="text/javascript">
    // event for image 
    $('#modal-file').on('hide.bs.modal', function() {
        var _img = $('input#image').val();
        $('img#show_img').attr('src', _img);
    });

    // event for image_list
    $('#modal-files').on('hide.bs.modal', function() {
        var _imgs = $('input#image_list').val();
        var img_list = $.parseJSON(_imgs);
        var _html = '';

        for (var i = 0; i < img_list.length; i++) {
            _html += '<div class="col-md-3 thumbnail">';
            _html += '<img src="' + img_list[i] + '" alt="">';
            _html += '</div>';
        }

        $('#image_show_list').html(_html);
    })
</script>

@stop()