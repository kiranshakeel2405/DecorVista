<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected $table = 'sub_categories'; 
    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'subCategory_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class,'sub_category','id');
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
}
