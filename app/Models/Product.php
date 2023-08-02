<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function productCategory()
    {
        return $this->hasMany(ProductCategories::class, 'product_id', 'id');
    }

    public function productImage()
    {
        return $this->hasMany(ProductImages::class, 'product_id', 'id');
    }
    // public function size()
    // {
    //     return $this->hasMany(Size::class, 'product_id', 'id');
    // }

    // public function color()
    // {
    //     return $this->hasMany(Color::class, 'product_id', 'id');
    // }
}
