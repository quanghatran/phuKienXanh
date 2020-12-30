<?php 
namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CategoryController extends Controller {

    public function index() {
        $cats = Category::paginate(5);
        return view('admin/category/index',[
            'cats' => $cats
            ]);
    }

    public function edit($id) {
        $models = Category::find($id);
        return view('admin/category/edit', [
            'model' => $models
            ]);
    }
    
    public function update($id, Request $request) {
        $request->offsetUnset('_token'); // hàm để loại bỏ 1 tham số trong trường thông tin
        $request->offsetUnset('method'); // hàm để loại bỏ 1 tham số trong trường thông tin
        
        // $request->only('name','status'); 
        // hàm để lấy ra những tham số trong trường thông tin

        Category::where(['id' =>$id])->update($request->all());
        return redirect()->route('category.index'); 
    }

    public function destroy($id) {
        Category::find($id)->delete();
        return redirect()->back(); 
    }

    public function create() {
        return view('admin/category/add');
    }

    public function store(Request $request) {

        $this->validate($request,[
            'name' => 'required|unique:category,name',
            'slug' => 'required|unique:category,name'
        ],[
            'name.required' => 'Tên danh mục không được để trống',
            'name.unique' => 'Tên danh mục đã có',

            'slug.required' => 'Tên slug không được để trống',
            'slug.unique' => 'Tên slug mục đã có',
        ]);

        Category::create($request->all());
        return redirect()->route('category.index'); 

    }
}