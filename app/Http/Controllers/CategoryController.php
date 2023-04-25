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
        //
        $category = Category::all();
        return view('category.index')->with([
            'categories' => $category
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required | unique:categories,slug',
        ]);
        
        Category::create($request->except('_token'));
        return redirect()->route("category.index")->with([
            "success" => "category added successfully"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $category = Category::where('slug', $id)->first();
        return view("category.show")->with([
            "category" => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $category = Category::where('slug', $id)->first();
        return view("category.edit")->with([
            "category" => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required | unique:categories,slug',
        ]);

        $data = $request->except(['_token', '_method']);
        $category->update($data);
        return redirect()->route("category.index")->with([
            "success" => "category updated successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $category = Category::where('slug', $id)->first();
        $category->delete();
        return redirect()->route("category.index")->with([
            "success" => "category deleted successfully"
        ]);
    }
}
