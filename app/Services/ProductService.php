<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    private $productService;

    public function __construct(ProductService $service)
    {
        $this->productService = $service;
    }

    public function getProducts()
    {
        $products = Product::get();
        return $products;
    }
}
