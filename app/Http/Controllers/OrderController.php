<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $orders = Order::all();
        return view('orders.index')->with([
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $order = Order::where('product_name', $id)->first();
        return view("orders.show")->with([
            "order" => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $order = Order::where('product_name', $id)->first();
        return view("orders.edit")->with([
            "order" => $order
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $order = Order::where('product_name', $id)->first();
       
        $this->validate($request, [
            'product_name' => 'required | unique:orders,id,'.$order->product_name,
            'qty' => 'required',
            'price' => 'required|numeric',
            'total' => 'required|numeric',
            'paid' => 'required|numeric',
            'delivered' => 'required|numeric',
        ]);
        $data = $request->except(['_token', '_method']);
        $order->update($data);
        return redirect()->route("orders.index")->with([
            "success" => "order updated successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $order = Order::where('product_name', $id)->first();
        $order->delete();
        return redirect()->route("orders.index")->with([
            "success" => "order deleted successfully"
        ]);
    }

    public function order_receipt(string $id)
    {
        $order = Order::where('product_name', $id)->first();
        return view("orders.receipt")->with([
            "order" => $order
        ]);
    }
}
