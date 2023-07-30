<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // public function size()
    // {
    //     return $this->hasMany(Size::class, 'product_id', 'id');
    // }

    // public function color()
    // {
    //     return $this->hasMany(Color::class, 'product_id', 'id');
    // }
}
