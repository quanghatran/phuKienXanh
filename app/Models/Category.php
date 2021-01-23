<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // public $timestamps = false;
    protected $table = 'category';
    protected $fillable = ['name', 'status', 'slug'];

    // lấy ra danh sách sản phẩm của danh mục 
    // 1 category have n product
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
