<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $list = Orders::all();
        return response()->view('panel.orders.index', compact('list'));
    }

    public function create()
    {
        // $products = DB::table("products")->pluck('product_name', 'id');
        $products = Products::all();
        return response()->view('panel.orders.create', compact('products'));
    }

    // public function getProduct($id)
    // {
    //     $product = DB::table("products")
    //         ->select('product_name', 'product_price', 'id'  )
    //         ->where("id", $id)
    //         ->first();
    //     return json_encode($product);
    // }

    public function getCustomer(Request $request)
    {

        $search = $request->search;

        if ($search == '') {
            $customers = Customer::orderby('customer_phone', 'asc')
                ->select('customer_phone', 'customer_name', 'customer_email')
                ->limit(5)->get();
        } else {
            $customers = Customer::orderby('customer_phone', 'asc')
                ->select('customer_phone', 'customer_name', 'customer_email', )
                ->where('customer_phone', 'like', '%' . $search . '%')
                ->limit(5)->get();
        }

        $response = array();
        foreach ($customers as $customer) {
            $response[] = array(
                "phone" => $customer->customer_phone,
                "label" => $customer->customer_name,
                // "field" => $customer->customer_address,
                "email" => $customer->customer_email,
            );
        }

        return response()->json($response);
    }

    public function addToCart($id)
    {

        $product = Products::find($id);
        $cart = session()->get(key:'cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        } else {
            $cart[$id] = [
                'name' => $product->product_name,
                'price' => $product->product_price,
                'quantity' => 1,
                'image' => $product->product_image,
            ];
        }
        session()->put('cart', $cart);
        return response()->json([
            'code' => 200,
            'message' => 'success',
        ], status:200);

    }

    // public function showCart()
    // {
    //     $carts = session()->get(key: 'cart');
    //     return response()->view('');
    // }

    public function updateCart(Request $request)
    {
        if ($request->id && $request->quatity) {
            $carts = session()->get(key:'cart');
            $carts[$request->id]['quantity'] = $request->quatity;
            session()->put('cart', $carts);
            $carts = session()->get(key:'cart');
            $products = Products::all();
            $cartComponent = view('panel.orders.create', compact('carts', 'products'))->render();
            return response()->json([
                'cart_component' => $cartComponent, 'code' => 200], status:200);
        }
    }

    public function store(Request $request)
    {
        // $rule = [
        //     'customer_name' => 'required|string',
        //         'customer_phone' => 'required|string',
        //         'customer_address' => 'required|string',
        //         'customer_email' => 'required|email|unique:users',
        //         'customer_password' => 'required|string',
        //         'customer_avatar' => 'required|string',
        //         'customer_rolename' => 'required|string',
        // ];

        $customers = Customer::where('customer_phone',$request->customer_phone)->select('id', 'customer_phone')->first();
        // foreach ($customers as $cust) {
        //     if ($cust->customer_phone == $request->customer_phone) {
        //         $customerId = $cust->id;
        //     }
        // }
        $customer = Customer::find($customers->id);
        // dd($customer);
        $order = Orders::create([

            'order_customer_name' => $customer->customer_name,
            'order_customer_phone' => $customer->customer_phone,
            'order_customer_email' => $customer->customer_email,
            'order_customer_address' => $request->customer_address,
            'customer_id' => $customer->id,
            'active' => 1,
        ]);
        // dd($order);
        $orderId = $order->id;
        foreach (session()->get(key:'cart') as $id => $cart) {
            $product = Products::find($id);
            $productId = $product->id;
            // dd($productId);
            $orderDetail = OrderDetails::create([
                'product_id' => (int)$productId,
                'orders_id' => $orderId,
                'order_detail_quantity' => $cart['quantity'],
                'order_detail_price' => $cart['price']*$cart['quantity'],
                'active'=>1,
            ]);
            // dd($orderDetail);
        };
        session()->forget('cart');
        return redirect()->route('order.index')->with('success', 'You have successfully added');



    }
}
