<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{

    public function checkout()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }


        return view('frontend.checkout', compact('cart', 'total'));
    }
    public function placeOrder(Request $request)
    {

        $cart = session()->get('cart');

        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $order = Order::create([

            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'total' => $total,
            'status' => 'Pending'

        ]);

        foreach ($cart as $id => $item) {

            OrderItem::create([

                'order_id' => $order->id,
                'product_id' => $id,
                'qty' => $item['quantity'],
                'price' => $item['price']

            ]);
        }

        session()->forget('cart');

        return redirect('/')->with('success', 'Order placed successfully');
    }
}
