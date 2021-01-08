<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// use App\Http\Controllers\Controller;



class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate(5);
        return view('admin/user/index', [
            'users' => $users
        ]);
    }

    // public function index() {
    //     $cats = Category::paginate(5);
    //     return view('admin/category/index',[
    //         'cats' => $cats
    //         ]);
    // }


    // public function edit($id) {
    //     $models = User::find($id);
    //     return view('admin/user/edit', [
    //         'model' => $models
    //         ]);
    // }

    // public function post_edit($id, Request $request) {
    //     $request->offsetUnset('_token'); // hàm để loại bỏ 1 tham số trong trường thông tin

    //     // $request->only('name','status'); 
    //     // hàm để lấy ra những tham số trong trường thông tin

    //     User::where(['id' =>$id])->update($request->all());
    //     return redirect()->route('user'); 
    // }

    // public function delete($id) {
    //     User::find($id)->delete();
    //     return redirect()->back(); 
    // }

    public function add()
    {
        return view('admin/user/add');
    }

    public function post_add(Request $request)
    {

        // user_add

        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'email' => 'required|email|unique:user,email'
        ], [
            'name.required' => 'Tên người dùng không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
            'confirm_password.same' => 'Mật khẩu xác nhận không trùng khớp',
            'confirm_password.required' => 'Nhập lại mật khẩu',
            'email.email' => 'Email phải đúng định dạng',
            'email.required' => 'Email không được để trống',
            'email.unique' => 'Email đã có',
        ]);

        // encode password
        $password = bcrypt($request->password);
        $request->merge(['password' => $password]);

        // $confirm_password = bcrypt($request->confirm_password);
        // $request->merge(['confirm_password' =>$confirm_password]);
        // dd($request->all());
        User::create($request->all());
        return redirect()->route('user');
    }
}