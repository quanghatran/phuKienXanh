<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // public $timestamps = false;
    protected $table = 'product';
    protected $fillable = ['name', 'status', 'slug', 'image', "image_list", 'price', 'sale_price', 'category_id', 'content'];

    // lấy ra danh mục của sản phẩm 
    // 1 product just have 1 category
    public function cat()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
