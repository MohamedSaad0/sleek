<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdcutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['categories', 'images'])->get();
        // return ($products);
        $title = "Products";
        return view('products.index', compact('title', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::get();
        $title = "Add Product";
        return view('products.add', compact('title', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate inserted data
        $data = $request->validate([
            'name' => 'required', 'min:5;max:20',
            'description' => 'required', 'min:5;max:50',
            'price' => 'required', 'numeric',
            'category_id' => 'required',
        ]);

        $prodAction = Product::updateOrCreate($data);
        $prod_id = $prodAction->id;
        // if the image is created for the same product it will be deleted and created again
        $duplicationCheck = Image::where('product_id', $prod_id)->delete();

        foreach ($request->image_path as $image) {

            // Image Validation & change sotrage to public
            $extension = $image->getClientOriginalExtension();
            $image_name = uniqid() . "." . $extension;
            $image->move(public_path("images/"), $image_name);

            $saveImage = Image::create([
                'image_path' => $image_name,
                'product_id' => $prod_id
            ]);
        }
        return to_route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // $products = Product::get();
        $title = "Edit Product";
        $images = Image::where('prod_id', $product->id);
        // return Product::with('categories')->get();
        $categories = Category::get();
        // $prod_cat = Product::with('categories')->wherePivot('product_id', $product->id);
        // $prod_cat =  $product->load('categories');
        $product->selected_categories = $product->categories->pluck('id')->toArray();
        $images = $product->load('images');
        // return $images;
        return view('products.add', compact('title', 'product', 'images', 'categories', 'images'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
