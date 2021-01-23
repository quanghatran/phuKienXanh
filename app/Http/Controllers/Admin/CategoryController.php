<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
{

    // đưa ra danh sách sp trong kho
    public function index()
    {
        $cats = Category::paginate(5);
        return view('admin/category/index', [
            'cats' => $cats
        ]);
    }

    // phương thức đưa ra giao diện chỉnh sửa sản phẩm
    public function edit($id)
    {
        $models = Category::find($id);
        return view('admin/category/edit', [
            'model' => $models
        ]);
    }

    // phương thức chỉnh sửa sản phẩm
    public function update($id, Request $request)
    {
        $request->offsetUnset('_token'); // hàm để loại bỏ 1 tham số trong trường thông tin
        $request->offsetUnset('_method'); // hàm để loại bỏ 1 tham số trong trường thông tin
        // dd($request->all());

        // $request->only('name','status'); 
        // hàm để lấy ra những tham số trong trường thông tin

        Category::where(['id' => $id])->update($request->all());
        return redirect()->route('category.index');
    }

    // phương thức xóa sản phẩm trong csdl
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->back();
    }

    // đưa ra view thêm mới sp
    public function create()
    {
        return view('admin/category/add');
    }

    // thêm mới sản phẩm
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|unique:category,name',
            'slug' => 'required|unique:category,name'
        ], [
            'name.required' => 'Tên danh mục không được để trống',
            'name.unique' => 'Tên danh mục đã có',

            'slug.required' => 'Tên slug không được để trống',
            'slug.unique' => 'Tên slug mục đã có',
        ]);

        Category::create($request->all());
        return redirect()->route('category.index');
    }
}
