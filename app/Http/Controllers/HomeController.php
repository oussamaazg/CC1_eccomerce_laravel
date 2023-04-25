<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show all products
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        return view('home')->with([
            "products" =>Product::latest()->paginate(10),
            "categories" =>Category::has("products")->get(),
        ]);

    }

     /**
     * Show  products by category
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function getProductByCategory(Category $category)
    {
        $product=$category->products()->paginate(10);
        return view('home')->with([
            "products" =>$product,
            "categories" =>Category::has("products")->get(),
        ]);

    }

}

