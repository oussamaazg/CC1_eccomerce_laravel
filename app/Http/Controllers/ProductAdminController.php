<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::all();
        return view('products.index')->with([
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required | unique:products,slug',
            'description' => 'required',
            'price' => 'required|numeric',
            'inStock' => 'required|numeric',
            'category_id' => 'required|numeric'
        ]);
        
        Product::create($request->except('_token'));
        return redirect()->route("productsAdmin.index")->with([
            "success" => "product added successfully"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::where('slug', $id)->first();
        return view("products.showA")->with([
            "product" => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $product = Product::where('slug', $id)->first();
        return view("products.edit")->with([
            "product" => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $product = Product::where('slug', $id)->first();
       
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required | unique:products,id,'.$product->slug,
            'description' => 'required',
            'price' => 'required|numeric',
            'inStock' => 'required|numeric',
            'category_id' => 'required|numeric'
        ]);
        $data = $request->except(['_token', '_method']);
        $product->update($data);
        return redirect()->route("productsAdmin.index")->with([
            "success" => "product updated successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product = Product::where('slug', $id)->first();
        $product->delete();
        return redirect()->route("productsAdmin.index")->with([
            "success" => "Product deleted successfully"
        ]);
    }
}
