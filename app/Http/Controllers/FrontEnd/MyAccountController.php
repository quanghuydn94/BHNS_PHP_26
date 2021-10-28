<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Customer;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MyAccountController extends Controller
{
    public function get()
    {

        $customer = Customer::where('user_id',(int)Auth()->user()->id)->first();

        $dataOrders = OrderDetails::join('orders', 'orders.id', '=', 'orderdetails.orders_id')
            ->join('products', 'products.id', '=', 'orderdetails.product_id')
            ->where('orders.customer_id', '=', (int)$customer->id)
            ->select(
                'orderdetails.order_detail_quantity',
                'orderdetails.order_detail_price',
                'orders.created_at',
                'orders.id',
                'orders.order_status',
                'products.product_symbol',
                'products.product_name',
                'products.product_description',
            )
            ->get();
        // dd($dataOrders);

        return view('frontend.auth.myaccount', compact('dataOrders'));
    }

    public function post(Request $request)
    {
        $request->validate([
            // 'name' => 'required|string',
            // 'email' => 'required|email',
            'password' => 'nullable|string|confirmed',
        ]);
        // $name = $request->name;
        // $email = $request->email;
        // $update = [
        //     // 'name' => $name,
        //     'email' => $email,
        //     // 'gender' => $gender,
        //     // 'birthday' => $birthday,
        // ];
        if (isset($request->old_password) || isset($request->password) || isset($request->password_confirmation)) {
            if (Hash::check($request->old_password, auth()->user()->password)) {
                $password = Hash::make($request->password);
                $update['password'] = $password;
            } else {
                return redirect()->back()->with('message', 'Wrong old password!');
            }
        }
        $user = User::find(auth()->user()->id);
        $user->update($update);

        return redirect()->back();
    }

    // Display details information of customer
    public function haveOrdered($id)
    {

        $id = Auth()->user()->id;
        $customer = Customer::find((int) $id);

        $dataOrders = OrderDetails::join('orders', 'orders.id', '=', 'orderdetails.orders_id')
            ->join('products', 'products.id', '=', 'orderdetails.product_id')
            ->where('orders.customer_id', '=', $id)
            ->select(
                'orderdetails.order_detail_quantity',
                'orderdetails.order_detail_price',
                'orders.created_at',
                'products.product_symbol',
                'products.product_name',
                'products.product_description',
            )
            ->get();

        return response()->view('frontend.auth.myaccount', [
            'customer' => $customer,
            'dataOrders' => $dataOrders,
        ]);

    }
}
