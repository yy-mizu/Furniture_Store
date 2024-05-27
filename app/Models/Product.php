<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function category()
{
    return $this->belongsTo(Category::class, 'category_id');
}

public function photos()
{
    return $this->hasMany(Product_Image::class, 'product_id');
}

}
