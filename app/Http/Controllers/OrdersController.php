<?php

namespace App\Http\Controllers;

use App\Modules\Orders\Models\Order;
use App\Modules\Products\Models\Product;

class OrdersController extends Controller
{

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        if (auth()->check()) {
            $user = auth()->user();
            $orders = Order::where('user_id', $user->id)
                ->get();
            return view('marketplace.orders.index', compact('orders'));
        }

        return redirect("login")
            ->with('warning', 'You are not allowed to access');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function orderDetail($id)
    {
        if (auth()->check()) {
            $order = Order::find($id);
            $product = Product::where('id', $order->product_id)
                ->first();
//            dd($product);
            return view('marketplace.orders.detail', compact('product', 'order'));
        }

        return redirect("login")
            ->with('warning', 'You are not allowed to access');
    }

}
