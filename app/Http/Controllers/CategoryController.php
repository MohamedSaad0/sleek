<?php

namespace App\Http\Controllers;

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
        // return $categories;
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
        // $validated_data = $request->validate([
        //     'name' => 'required|min:5|max:20',
        //     'images' => 'required|image|'
        // ]);
        foreach ($request->images as $image) {
            $data = [
                'name' => $request->name,
                'images' => $image
            ];
        }
        dd($image);
        // $data = $request->all(['name', 'images']);
        $category = Category::updateOrCreate(["id" => $request->id], $data);
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
        //
    }
}
