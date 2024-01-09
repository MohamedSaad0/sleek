<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\ProductService;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $service = new ProductService();
        $products = $service->getProducts();
        $fruitCat = $products->filter(function ($prod) {
            return $prod['category'] == 'Fruits';
        });

        return view('user/index', compact('products'));
        return view('user/index', compact('categoryNames'));
    }

    /**
     * Show the form for Producteating a new resource.
     */
    public function Producteate()
    {
        echo "YOHO";
    }

    /**
     * Store a newly Producteated resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $Product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $Product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $Product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $Product)
    {
        //
    }
}
