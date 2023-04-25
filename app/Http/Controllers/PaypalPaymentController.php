<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Cart;
use App\Models\Order;


class PaypalPaymentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function handlePayment()
    {
        $product = [];
        $product['items'] = [];

        foreach ($carts as $item) {
            array_push($product['items'], [
                'name' => $item->product->title,
                'price' => $item->product->price,
                'desc' => $item->product->slug,
                'qty' => $item->amount,
            ]);
        }
  
        $product['invoice_id'] = auth()->user()->id;
        $product['invoice_description'] = "Order #{$product['invoice_id']} Bill";
        $product['return_url'] = route('success.payment');
        $product['cancel_url'] = route('cancel.payment');
        
        $total = 0;
        foreach ($product['items'] as $item) {
            $total += $item['price'] * $item['qty'];
        }
        $product['total'] = $total;

        $paypalModule = new PayPalClient;
        
        //response from paypal
        $res = $paypalModule->createOrder($product);
        $res = $paypalModule->capturePayment($res['id']);
  
        return redirect($res['links'][1]['href']);
    }
   
    public function paymentCancel()
    {
        return redirect()->route('cart.index')->with([
            'info' => 'Order canceled'
        ]);
    }
  
    public function paymentSuccess(Request $request)
    {
        $paypalModule = new PayPalClient;
        $response = $paypalModule->capturePayment($request->query('paymentId'), $request->query('PayerID'));
  
        if (in_array(strtoupper($response['status']), ['COMPLETED'])) {
            foreach (\Cart::Content() as $item) {
                Order::create([
                    "user_id" => auth()->user()->id,
                    "product_name" => $item->product->title,
                    'price' => $item->product->price,
                    'qty' => $item->amount,
                    "total" => $item->product->price* $item->amount,
                    "paid" => 1
                ]);
                $cart->delete();
            }
            return redirect()->route('cart.index')->with([
                'success' => 'Paid successfully'
            ]);
        }
    }
}