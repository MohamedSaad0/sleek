<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function getProducts()
    {
        // $products = Product::get();
        $products = Product::with(['categories', 'images'])->get();
        $title = "Products";
        
        // return view('products.index', compact('title', 'products'));
        return $products;
    }
}
