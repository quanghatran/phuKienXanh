<?php 
namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProductController extends Controller {

    // đưa ra danh sách sp trong kho
    public function index() {
        $cats = Category::paginate(5);
        return view('admin/product/index',[
            'cats' => $cats
            ]);
    }

    // phương thức đưa ra giao diện chỉnh sửa sản phẩm
    public function edit($id) {
        $models = Category::find($id);
        return view('admin/category/edit', [
            'model' => $models
            ]);
    }
    
    // phương thức chỉnh sửa sản phẩm
    public function update($id, Request $request) {
        $request->offsetUnset('_token'); // hàm để loại bỏ 1 tham số trong trường thông tin
        $request->offsetUnset('method'); // hàm để loại bỏ 1 tham số trong trường thông tin
        
        // $request->only('name','status'); 
        // hàm để lấy ra những tham số trong trường thông tin

        Product::where(['id' =>$id])->update($request->all());
        return redirect()->route('product.index'); 
    }

    // phương thức xóa sản phẩm trong csdl
    public function destroy($id) {
        Product::find($id)->delete();
        return redirect()->back(); 
    }

    // đưa ra view thêm mới sp
    public function create() {
        $cats = Category::all();
        return view('admin.product.add', compact('cats'));
    }

    // thêm mới sản phẩm
    public function store(Request $request) {

        $this->validate($request,[
            'name' => 'required',
            'slug' => 'required|unique:product,name'
        ],[
            'name.required' => 'Tên sản phẩm không được để trống',
            'name.unique' => 'Tên sản phẩm đã có',

            'slug.required' => 'Tên slug không được để trống',
            'slug.unique' => 'Tên slug mục đã có',
        ]);

        Product::create($request->all());
        return redirect()->route('product.index'); 

    }
}