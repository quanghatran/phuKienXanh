<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;



class AdminController extends Controller
{
    public function index()
    {
        return view('admin/index');
    }

    public function login()
    {
        return view('admin/login');
    }

    public function post_login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required'  => 'email không được để trống',
            'email.email'  => 'email không đúng định dạng',
            'password.required'  => 'password không được để trống',
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->has('rmb'))) {
            return redirect()->route('admin');
        } else {
            return redirect()->back();
        }
        // dd($request->only('email', 'password', 'rmb'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route(('login'));
    }
}
