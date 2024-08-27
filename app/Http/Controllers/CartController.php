<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Gloudemans\Shoppingcart\Cart as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        $subTotal = 0;
        $total = 0;
        foreach ($cart as $item) {
            $subTotal += $item['price'] * $item['qty'];
            $total = $subTotal;
        }
        return view('cart')->with(['items' => $cart, 'subTotal' => $subTotal, 'total' => $total]);
    }

    public function add(Request $request)
    {
        // Session::flush();
        $product = Plant::findOrFail($request->input("id"));
        $cartItems = session()->get("cart", []);
        if (array_key_exists($product->id, $cartItems)) {
            $cartItems[$product->id]["qty"]++;
        } else {
            $cartItems[$product->id] = [
                "id" => $product->id,
                "name" => $product->name,
                "price" => $product->price,
                "qty" => $request->input("qty"),
                "image" => $product->image_1
            ];
        }
        session()->put('cart', $cartItems);
        return redirect()->back()->with('success', "You've successfully added the product to your cart!");
    }
    public function delete($id)
    {
        $cart = Session::get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
        }
        Session::put('cart', $cart);
        return redirect("/cart");
    }

    public function clear()
    {
        Session::forget('cart');
        return redirect()->route('cart.index');
    }
    public function updateAll(Request $request)
    {
        $request->validate([
            'quantities.*' => 'required|integer|min:1', // Validate each quantity
        ]);

        $cart = session()->get('cart');

        foreach ($request->quantities as $id => $quantity) {
            if (isset($cart[$id])) {
                $cart[$id]['qty'] = $quantity; // Update the quantity
            }
        }

        session()->put('cart', $cart); // Update the session cart

        return response()->json(['success' => true]);
    }


}
