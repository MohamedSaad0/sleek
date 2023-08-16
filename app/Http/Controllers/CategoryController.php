<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Category Index";
        $categories = Category::get();
        return view('category.index', compact('categories', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create Category";

        return view('category.add', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['name'] = $request->name;
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $item) {
                $path = 'public/images/categories/';
                $name = "category-" . time() . $item->getClientOriginalName();
                $item->move($path, $name);
                $data['images'] = $name;
            }
        }
        // dd($request->cat_id);
        $category = Category::updateOrCreate(["id" => $request->cat_id], $data);
        // return $category;
        return to_route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // return $category;
        $title = "Edit Category";
        $category->image_path = asset('public/images/categories/' . $category->images);
        $images_exist = true;
        return view('category.add', compact('category', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('category.index');
    }
}
