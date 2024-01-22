<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    /**
     * @return all products with their associated categories & images
     */
    public function getProducts()
    {
        // $products = Product::get();
        $products = Product::with(['categories', 'images'])->get();
        $title = "Products";
        
        // return view('products.index', compact('title', 'products'));
        return $products;
    }
}
