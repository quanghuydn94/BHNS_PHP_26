<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index()
    {
        $list = Orders::all();
        return response()->view('panel.orders.index', compact('list'));
    }

    public function create()
    {
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
                "email" => $customer->customer_email,
            );
        }

        return response()->json($response);
    }

    public function addToCart(Request $request, $id)
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
        echo "</pre>";
        print_r(session()->get(key:'cart'));
        return response()->json([
            'code' => 200,
            'message' => 'success',
        ], status:200);

    }

    public function showCart()
    {
        $carts = session()->get(key:'cart');
        return response()->view('panel.orders.showOrders', compact('carts'));
    }

    public function updateCart(Request $request)
    {
        if ($request->id && $request->quatity) {
            $carts = session()->get(key:'cart');
            $carts[$request->id]['quantity'] = $request->quatity;
            session()->put('cart', $carts);
            $carts = session()->get(key:'cart');
            $products = Products::all();
            $cartComponent = view('panel.orders.showOrders', compact('carts', 'products'))->render();
            return response()->json([
                'cart_component' => $cartComponent, 'code' => 200], status:200);
        }
    }

    public function store(Request $request)
    {
        $rule = [
            'customer_name' => 'required|string',
            'customer_phone' => 'required|string',
            'customer_address' => 'required|string',
            'customer_email' => 'required|email|unique:users',

        ];
        $request->validate($rule);

        $customers = Customer::all();
        $customer = $customers->where('customer_phone', $request->customer_phone)->first();

        // dd($customer);
        if ($customer == null) {

            $cust = Customer::create([
                'customer_name' => $request->customer_name,
                'customer_phone' => $request->customer_phone,
                'customer_email' => $request->customer_email,
                'customer_address' => $request->customer_address,
                'active' => 1,
            ]);

            $customerId = $cust->id;

        } else {

            $customerId = $customer->id;

        }
        // dd($customerId);
        $order = Orders::create([

            'order_customer_name' => $customer->customer_name,
            'order_customer_phone' => $customer->customer_phone,
            'order_customer_email' => $customer->customer_email,
            'order_customer_address' => $request->customer_address,
            'customer_id' => $customerId,
            'active' => 1,

        ]);
        $orderId = $order->id;
        foreach (session()->get(key:'cart') as $id => $cart) {

            $product = Products::find($id);
            $productId = $product->id;

            OrderDetails::create([
                'product_id' => (int) $productId,
                'orders_id' => $orderId,
                'order_detail_quantity' => $cart['quantity'],
                'order_detail_price' => $cart['price'] * $cart['quantity'],
                'active' => 1,
            ]);

        };
        session()->forget('cart');
        return redirect()->route('order.index')->with('success', 'You have successfully added');

    }

    public function show($id)
    {
        $order = Orders::find($id)->getCustomer;
        $orderDetail = Orders::find($id)->getOrderDetail;
        $product = OrderDetails::find();

        // $orderCustomer = Customer::join('orders', 'orders.customer_id', '=', 'customers.id')
        // ->join('orderdetails', 'orderdetail.orders_id', '=', 'orders.id')
        // ->join('products', 'products.id', '=','orderdetails.product_id')
        // ->get([
        //     'customers.customer_name',
        //     'customers.customer_phone',
        //     'orders.order_customer_address',
        //     'orders.order_customer_email',
        // 'orderdetails.order_detail_quantity',
        // 'orderdetails.order_detail_price',
        // 'products.product_symbol',
        // 'products.product_name',
        // 'products.product_image',
        // 'products.product_description',
        // ]);
        dd($orderDetail);
        // return response()->view('panel.orders.showDetail', compact('order', 'orderDetail'));
    }

    public function edit($id)
    {
        $order = Orders::find($id);
        return response()->view('panel.orders.edit', compact('order'));

    }
    public function update()
    {

    }
    public function destroy()
    {

    }
}
