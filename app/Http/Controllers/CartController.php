<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function add_to_cart(Product $product, Request $request){

        $user_id = Auth::id();
        $product_id = $product->id;
        $product_title = $product->slug;
        $product_price = $product->price;

        $existing_cart = Cart::where('product_id', $product->id)
            ->where('user_id', $user_id)
            ->first();
        
        if($existing_cart == null){
            $request->validate([
            'amount' => 'required|gte:1|lte:' . $product->inStock
            ]);

            Cart::create([
            'user_id' => $user_id,
            'product_id' => $product_id,
            'amount' => $request->amount,
            'product_title' => $product_title,
            'product_price' => $product_price,
            ]); 
        }else{
            $request->validate([
            'amount' => 'required|gte:1|lte:' . ($product->inStock - $existing_cart->amount)
            ]);


            $existing_cart->update([
                'amount' => $existing_cart->amount + $request->amount

            ]);
        }


        return Redirect::route('show_cart');
    }

    public function show_cart(){

        $user_id = Auth::id();
        $carts = Cart::where('user_id', $user_id)->get();
        return view('show_cart', compact('carts'));
    }

    public function update_cart(Cart $cart, Request $request){
       
        $request->validate([
            'amount' => 'required|gte:1|lte:' . $cart->product->inStock
        ]);

        $cart->update([
            'amount' => $request->amount
        ]);

        return Redirect::route('show_cart');    
    
    }

    public function delete_cart(Cart $cart){
        $cart->delete();
        return Redirect::back();
    }
}
