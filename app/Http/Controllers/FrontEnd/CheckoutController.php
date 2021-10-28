<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function payment(Request $request)
    {
        // $customers = Customer::all();

        if (Auth()->user() != null) {

            $customer = Customer::where('user_id', (int)Auth()->user()->id)->first();
            // dd($customer);

        } else {

            $rule = [
                'name' => 'required|string',
                'phone' => 'required|string|unique:users,phone',
                'address' => 'required|string',
                'email' => 'required|email|unique:users,email',

            ];
            $request->validate($rule);

            $customer = Customer::create([
                'customer_name' => $request->name,
                'customer_phone' => $request->phone,
                'customer_email' => $request->email,
                'customer_address' => $request->address,
                'active' => 1,
            ]);
        }

        $order = Orders::create([

            'order_customer_name' => $customer->customer_name,
            'order_customer_phone' => $customer->customer_phone,
            'order_customer_email' => $customer->customer_email,
            'order_customer_address' => $customer->customer_address,
            'customer_id' => (int) $customer->id,
            'active' => 1,
            'order_status' => 'Pay by cash',

        ]);
        foreach (session()->get('cart') as $id => $cart) {

            $product = Products::find($id);
            $productId = $product->id;

            OrderDetails::create([
                'product_id' => (int) $productId,
                'orders_id' => (int) $order->id,
                'order_detail_quantity' => $cart['quantity'],
                'order_detail_price' => $cart['price'] * $cart['quantity'] * 1.05,
                'active' => 1,
            ]);

        }

        // session()->forget('cart');
        return redirect()->back()->with('orders', ' success');
    }

    public function payOnline()
    {
        $carts = session()->get('cart');
        return view('frontend.checkout.payOnline', compact('carts'));
    }

    public function viewCreditCard()
    {
        return view('frontend.checkout.creditCard');
    }
}
