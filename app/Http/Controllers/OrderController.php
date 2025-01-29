<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('products', compact('products'));
    }

    // --- admin views ---
    public function admin() {
        $products = Product::all();
        return view('admin.admin', compact('products'));
    }

    public function create() {
        return view('admin.create'); 
    }

    public function update() {
        return view('admin.update'); 
    }

    // --- checkout ---
    public function orders() {
        return view('orders');
    }

    public function checkout(Request $request) {

        if (session()->has('cart')) {

            // save cart to orders 
            session(['orders' => session('cart')]);

            // clear cart 
            session()->forget('cart');
        }
        return redirect()->route('orders')->with('success', "Order placed!");
    }
}

