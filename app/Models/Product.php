<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = [
        'title', 'price', 'description', 'images', 'category'
    ];

    protected $casts = [
        'images' => 'array',
    ];
}
