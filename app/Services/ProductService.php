<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ProductService
{
    public function getAll()
    {
        $userId = Auth::id();
        return Cache::remember("products:all:{$userId}", 600, function () {
            return Product::all();
        });
    }
}
