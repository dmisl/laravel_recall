<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ImportProducts extends Command
{

    protected $signature = 'import:products';
    protected $description = 'Import products from fakestoreapi.com';

    public function handle()
    {
        $response = Http::get('https://dummyjson.com/products?limit=1000');

        if ($response->successful()) {
            $products = $response->json('products');

            foreach ($products as $item) {
                Product::updateOrCreate(
                    [
                        'title' => $item['title'],
                        'description' => $item['description'],
                        'price' => $item['price'],
                        'category' => $item['category'],
                        'images' => $item['images'],
                    ]
                );
            }
        }

        $this->info("Import finished.");
    }
}
