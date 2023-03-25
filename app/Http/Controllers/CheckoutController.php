<?php

namespace App\Http\Controllers;

use App\Modules\Orders\Models\Order;
use App\Modules\Orders\Models\OrderItem;
use App\Modules\Products\Models\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showCheckout($productId)
    {
        if (auth()->check()) {
            $product = Product::where('active', 1)
                ->where('slug', $productId)
                ->first();
//            dd($product);
            return view('marketplace.checkout.index', compact('product'));
        }

        return redirect("login")
            ->with('warning', 'You are not allowed to access');
    }

    /**
     * Proceed to checkout
     *
     * @return response()
     */
    public function proceedToCheckout(Request $request)
    {



        if (auth()->check()) {
            $user = auth()->user();



                $order = new Order();
                $order->user_id = $user->id;
                $order->price = $request->price;
                $order->full_name = $request->full_name;
                $order->phone_number = $request->phone_number;
                $order->state = $request->state;
                $order->city = $request->city;
                $order->address1 = $request->address1;
                $order->address2 = $request->address2;
                $order->product_id = $request->product_id;
                $order->pin_code = $request->pin_code;

                $order->status = 'pending';

                $order->save();
                //order detail





                return redirect()
                    ->route('user.marketplace.order', $order->id)
                    ->with('success', 'Thank you for your order.');
            }


        return redirect("login")
            ->with('warning', 'You are not allowed to access');
    }

}
