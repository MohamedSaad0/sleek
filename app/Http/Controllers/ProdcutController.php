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
        $images = [];
        $categories = Category::get();
        // return $categories;
        return view('products.add', compact('title', 'products', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     // dd($request->images);
    //     // dd($request);
    //     // Validate inserted data
    //     $data = $request->validate([
    //         'name' => 'required', 'min:5;max:20',
    //         'description' => 'required', 'min:5;max:50',
    //         'price' => 'required', 'numeric',
    //         // 'category_id' => 'required',
    //     ]);

    //     $prodAction = Product::updateOrCreate(["id" => $request->id], $data);
    //     $prod_id = $prodAction->id;
    //     // if the image is created for the same product it will be deleted and created again

    //     // if ($prod_id)
    //     // $duplicationCheck = Image::where('product_id', $prod_id)->delete();

    //     // dd($request->category_ids);
    //     // $duplicationCheck = CategoryProduct::where('product_id', $prod_id)->where('category_id', $request->category_id)->delete();
    //     // if ($request->image_path) {
    //     foreach ($request->category_ids as $cat) {
    //         $saveCategory = CategoryProduct::create([
    //             'category_id' => $cat,
    //             'product_id' => $prod_id
    //         ]);
    //     }
    //     // if ($request->file('images')) {
    //     //     dd($request->images);
    //     // }
    //     // if ($request->images) {

    //     // Start

    //     // Capture the current sent id's 
    //     // delete stm to delete from imgs where prod_id=! captured id
    //     // capture the new file within the request and store it

    //     $images = Image::where('product_id', $prod_id)->get();
    //     $preloaded = request('preloaded');
    //     // dd($request->photos);
    //     foreach ($images as $image) {
    //         if (!in_array($image->id, $preloaded)) {
    //             Image::where('id', $image->id)->delete();
    //         }
    //     }
    //     if ($request->hasfile(' ')) {
    //         foreach ($request->file('images') as $item) {
    //             $path = 'public/images/';
    //             $image = new Image();
    //             // $name = "product-" . time() . $item->getClientOriginalName();
    //             // $item->move($path, $name);
    //             // $image->image_path = $name;
    //             $item->move($path, $item);
    //             $image->image_path = $item;
    //             $image->product_id = $prod_id;
    //             $image->save();
    //         }
    //     }

    //     // End




    //     // foreach ($request->images as $image) {

    //     //     // $removeImage = Image::where('id', $image)->delete();

    //     //     // dd($image);

    //     //     // Image Validation & change sotrage to public --- Hashed as it interrupts image update
    //     //     $extension = $image->getClientOriginalExtension();
    //     //     $image_name = uniqid() . "." . $extension;
    //     //     $image->move(public_path("images/"), $image_name);
    //     //     // $image->move(public_path("images/"));

    //     //     $saveImage = Image::create([
    //     //         'image_path' => $image_name,
    //     //         'product_id' => $prod_id
    //     //     ]);
    //     // }
    //     // }

    //     return to_route('product.index');
    // }
    public function store(Request $request)
    {
        // Validate inserted data
        $data = $request->validate([
            'name' => 'required', 'min:5;max:20',
            'description' => 'required', 'min:5;max:50',
            'price' => 'required', 'numeric',
            // 'category_id' => 'required',
        ]);
        // dd($request);
        $prodAction = Product::updateOrCreate(["id" => $request->prod_id], $data);
        // $prodAction = Product::updateOrCreate($data);
        // dd($prodAction);

        $prod_id = $prodAction->id;

        foreach ($request->category_ids as $cat) {
            $saveCategory = CategoryProduct::create([
                'category_id' => $cat,
                'product_id' => $prod_id
            ]);
        }
        // Start

        // Capture the current sent id's 
        // delete stm to delete from imgs where prod_id=! captured id
        // capture the new file within the request and store it

        $images = Image::where('product_id', $prod_id)->get()->toArray();
        // dd(request('preloaded'));
        $old_photos = $request->old_photos;
        // dd($old_photos);
        // foreach ($images as $image) {
            foreach ($images as $image) {
            dd($image);
            if ($request->old_photos) {
                
                // dd($request->old_photo_value);
                // $old_photo_ids = [];
                // array_push($old_photo_ids, $old_photo);
                // dd(gettype($old_photos));
                // dd($image);
                $delete_imgs = array_diff($image, $old_photos);
                dd($delete_imgs);
                Image::where('id', $delete_imgs->id)->delete();

                // if (!in_array($image->id, $old_photo_ids)) {
                //     Image::where('id', $image->id)->delete();
                // }
                // }
            }
        }
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $item) {
                // dd($item);
                $path = 'public/images/';
                $image = new Image();
                $name = "product-" . time() . $item->getClientOriginalName();
                $item->move($path, $name);
                $image->image_path = $name;
                // $item->move($path, $item);
                // $image->image_path = $item;
                $image->product_id = $prod_id;
                $image->save();
            }
        }

        // End




        // foreach ($request->images as $image) {

        //     // $removeImage = Image::where('id', $image)->delete();

        //     // dd($image);

        //     // Image Validation & change sotrage to public --- Hashed as it interrupts image update
        //     $extension = $image->getClientOriginalExtension();
        //     $image_name = uniqid() . "." . $extension;
        //     $image->move(public_path("images/"), $image_name);
        //     // $image->move(public_path("images/"));

        //     $saveImage = Image::create([
        //         'image_path' => $image_name,
        //         'product_id' => $prod_id
        //     ]);
        // }
        // }

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
        // return $product->description;
        $images = Image::where('product_id', $product->id);
        // return Product::with('categories')->get();
        $categories = Category::get();
        // $prod_cat = Product::with('categories')->wherePivot('product_id', $product->id);
        // $prod_cat =  $product->load('categories');
        $product->selected_categories = $product->categories->pluck('id')->toArray();
        $images = $product->images;
        foreach ($images as $image) {
            $image->image_path = asset('public/images/' . $image->image_path);
        }
        $images_exist = true;
        // return $images;
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
        //
    }
}
