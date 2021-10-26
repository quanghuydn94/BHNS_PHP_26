<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return view('frontend.cart.index', compact('products'));
    }

    public function shop()
    {
        $products = Products::all();
        return view('frontend.cart.shop', compact('products'));
    }

    public function addToCart1(Request $request, $id)
    {
        $product = Products::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->product_name,
                "quantity" => $request->quantity,
                "price" => $product->product_price,
                "image" => $product->product_image,
                "des" => $product->product_description,
            ];
        }

        session()->put('cart', $cart);
    //     // return view('frontend.cart.miniCart', compact('cart'));
    //     return response()->json(['message' => 'success']);
        // return redirect()->route('shop.index')->with('success', 'Product added to cart successfully!');

    }

    // public function addCart2(Request $request, $id)
    // {
    //     $product = Products::findOrFail($id);

    //     $cart = session()->get('cart1', []);

    //     if (isset($cart[$id])) {
    //         $cart[$id]['quantity']++;
    //     } else {
    //         $cart[$id] = [
    //             "name" => $product->product_name,
    //             "quantity" => $request->quantity,
    //             "price" => $product->product_price,
    //             "image" => $product->product_image,
    //             "des" => $product->product_description,
    //         ];
    //     }

    //     session()->put('cart1', $cart);
    //     dd(session()->get('cart1'));
    //     // return response()->json(['message' => 'success']);
    //     return view('frontend.cart.miniCart', compact('cart'));
    //     // return response()->json(['message' => 'success']);
    //     // return redirect()->route('shop.index')->with('success', 'Product added to cart successfully!');

    // }

    public function showCart()
    {
        $carts = session()->get('cart');
        return response()->view('frontend.cart.cart', compact('carts'));
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
        }
    }

    // public function update(Request $request)
    // {
    //     if ($request->id && $request->quantity) {
    //         $carts = session()->get( 'cart');
    //         $carts[$request->id]['quanntity'] = $request->quantity;
    //         session()->put('cart', $carts);
    //         $carts = session()->get( 'cart');
    //         $products = Products::all();
    //         $cartComponent = view('frontend.cart.cart', compact('carts', 'products'));
    //         return response()->json([
    //             'cart_component' => $cartComponent, 'code' => 200], status:200);
    //     }
    // }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
        }
        // return view('frontend.cart.miniCart', compact('cart'));
    }

    public function checkout()
    {
        if(session()->get('cart') != null) {

            return view('frontend.cart.checkout');
        }
        else {

            return redirect()->back()->with('cartNull', 'Cart empty!') ;

        }
    }
}
