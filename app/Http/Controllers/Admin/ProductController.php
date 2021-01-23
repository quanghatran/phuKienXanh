<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{

    // đưa ra danh sách sp trong kho
    public function index()
    {
        $product = Product::paginate(5);
        return view('admin/product/index', [
            'product' => $product
        ]);
    }

    // phương thức đưa ra giao diện chỉnh sửa sản phẩm
    public function edit($id)
    {
        $cats = Category::all();
        $model = Product::find($id);
        return view('admin/product/edit', [
            'model' => $model,
            'cats' => $cats
        ]);

        return view('admin.product.add', compact('cats'));
    }

    // phương thức đưa ra giao diện chỉnh sửa sản phẩm
    public function show($id)
    {
        $models = Product::find($id);
        return view('admin/product/show', [
            'model' => $models
        ]);
    }


    // phương thức chỉnh sửa sản phẩm
    public function update($id, Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'category' => 'required',
        //     'slug' => 'required|unique:product,slug',
        //     'price' => 'required|numeric|min:0|not_in:0',
        //     'sale_price' => 'required|numeric|min:0|lt:price',
        // ], [
        //     'name.required' => 'Tên sản phẩm không được để trống',
        //     'name.unique' => 'Tên sản phẩm đã có',

        //     'slug.required' => 'Tên đường dẫn SEO không được để trống',
        //     'slug.unique' => 'Tên slug mục đã có',
        // ]);

        $request->offsetUnset('_token'); // hàm để loại bỏ 1 tham số trong trường thông tin
        $request->offsetUnset('_method'); // hàm để loại bỏ 1 tham số trong trường thông tin

        // $request->only('name','status'); 
        // hàm để lấy ra những tham số trong trường thông tin

        Product::where(['id' => $id])->update($request->all());
        return redirect()->route('product.index');
    }

    // phương thức xóa sản phẩm trong csdl
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->back();
    }

    // đưa ra view thêm mới sp
    public function create()
    {
        $cats = Category::all();
        return view('admin.product.add', compact('cats'));
    }

    // thêm mới sản phẩm
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'category' => 'required',
            'slug' => 'required|unique:product,slug',
            'price' => 'required|numeric|min:0|not_in:0',
            'sale_price' => 'required|numeric|min:0|lt:price',
        ], [
            'name.required' => 'Tên sản phẩm không được để trống',
            'name.unique' => 'Tên sản phẩm đã có',

            'slug.required' => 'Tên đường dẫn SEO không được để trống',
            'slug.unique' => 'Tên slug mục đã có',
        ]);

        // $img = str_replace(url('uploads') . '/', '', $request->image);
        // $request->merge(['image' => $img]); 
        // dd($img); 

        Product::create($request->all());
        return redirect()->route('product.index');
    }
}
