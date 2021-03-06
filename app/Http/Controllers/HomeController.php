<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{

    public function index()
    {
        // $category =  Category::where('status', 1)->orderBy('name', 'ASC')->get();
        $top_product = Product::where('status', 1)->limit(4)->orderBy('id', 'DESC')->get();
        $sale_product = Product::where('sale_price', '>', 0)->where('status', 1)->limit(4)->orderBy('id', 'DESC')->get();

        return view('index', compact('top_product', 'sale_product'));
    }

    public function about()
    {
        return view('about');
    }


    public function View($slug)
    {
        $model = Category::where('slug', $slug)->first();
        $product = Product::where('slug', $slug)->first();
        // $category =  Category::where('status', 1)->orderBy('name', 'ASC')->get();

        if ($model) {
            return view('product', ['model' => $model]);
        } else if ($product) {
            return view('product-detail', ['model' => $product]);
        } else {
            return view('404');
        }
    }
}
