<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\OrderDetails;
use App\Models\Products;
use App\Models\User;
use App\Models\Orders;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {


        $customers = Customer::all();
        // dd($customers);
        $rule = [
            'name' => 'required|string',
            'phone' => 'required|string|unique:users,phone',
            'address' => 'required|string',
            'email' => 'required|email|unique:users,email',

        ];
        $request->validate($rule);
        // dd($request->name);
        // $customers = Customer::all();
        // $customer = $customers->where('customer_phone', $request->customer_phone)->first();

        // if ($customer == null) {

        //     // $userCustomer = User::create([
        //     //     'name' => $request->customer_name,
        //     //     'phone' => $request->customer_phone,
        //     //     'address' => $request->customer_address,
        //     //     'email' => $request->customer_email,
        //     //     'rolename' => 'client',
        //     //     'active' => 1,
        //     // ]);
        //     // $userId = $userCustomer->id;
        //     // dd($userId);
        //     $customer = Customer::create([
        //         'customer_name' => $request->customer_name,
        //         'customer_phone' => $request->customer_phone,
        //         'customer_email' => $request->customer_email,
        //         'customer_address' => $request->customer_address,
        //         // 'user_id'=>$userId,
        //         'active' => 1,
        //     ]);

        //     $customerId = $customer->id;

        // } else {
        //     $customerId = $customer->id;
        // }
         $customer = Customer::create([
                'customer_name' => $request->name,
                'customer_phone' => $request->phone,
                'customer_email' => $request->email,
                'customer_address' => $request->address,
                // 'user_id'=>$userId,
                'active' => 1,
            ]);
        $customerId = $customer->id;
        // dd($customer);
        $order = Orders::create([

            'order_customer_name' => $customer->customer_name,
            'order_customer_phone' => $customer->customer_phone,
            'order_customer_email' => $customer->customer_email,
            'order_customer_address' => $customer->customer_address,
            'customer_id' => $customerId,
            'active' => 1,
            'order_status' => 'Pay by cash',

        ]);
        $orderId = $order->id;
        foreach (session()->get('cart') as $id => $cart) {

            $product = Products::find($id);
            $productId = $product->id;

            OrderDetails::create([
                'product_id' => (int) $productId,
                'orders_id' => $orderId,
                'order_detail_quantity' => $cart['quantity'],
                'order_detail_price' => $cart['price'] * $cart['quantity']*1.05,
                'active' => 1,
            ]);

        };
        // session()->forget('cart');

        // session()->flash('haveordered', 'You have successfully ordered!');
        return redirect()->route('checkout.cart')->with('haveordered', 'You have successfully ordered!');
    }

}
