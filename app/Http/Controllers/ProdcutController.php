<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\DB;

class ProdcutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products = Product::with(['categories', 'images'])->get([DB::raw('concat(name," ",price) as name'),'price']);
        $products = Product::with(['categories', 'images'])->get();
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
        $images = [];
        $categories = Category::get();
        return view('products.add', compact('title', 'products', 'categories'));
    }


    public function store(Request $request)
    {
        // Validate inserted data
        $data = $request->validate([
            'name' => 'required', 'min:5;max:20',
            'description' => 'required', 'min:5;max:50',
            'price' => 'required', 'numeric',
        ]);
        $prodAction = Product::updateOrCreate(["id" => $request->prod_id], $data);

        $prod_id = $prodAction->id;

        $prodAction->categories()->detach();
        foreach ($request->category_ids as $cat) {
            $prodAction->categories()->attach($cat);
        }
        $old_photos = $request->old_photos;

        if ($request->old_photos) {
            Image::where('product_id', $prod_id)->whereNotIn('id', $old_photos)->delete();
        } else {
            Image::where('product_id', $prod_id)->delete();
        }
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $item) {
                $path = 'public/images/';
                $image = new Image();
                $name = "product-" . time() . $item->getClientOriginalName();
                $item->move($path, $name);
                $image->image_path = $name;
                $image->product_id = $prod_id;
                $image->save();
            }
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
        $title = "Edit Product";
        $images = Image::where('product_id', $product->id);
        $categories = Category::get();
        // Capture the selected product related categories -- extracting its ids using eloquent pluck function
        $product->selected_categories = $product->categories->pluck('id')->toArray();
        $images = $product->images;
        foreach ($images as $image) {
            $image->image_path = asset('public/images/' . $image->image_path);
        }
        $images_exist = true;
        return view('products.add', compact('title', 'product', 'images', 'categories'));
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
        $product->categories()->detach();
        $product->images()->delete();
        $product->delete();
        return to_route('product.index');
    }
}
