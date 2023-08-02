<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataApp extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'about_us', 'visi', 'misi'];
}
