<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('products', compact('products'));
    }
    
    // --- CRUD FROM CART VIEW ---
    public function cart() {
        return view('cart');
    }

    public function addToCart($id) {
        $product = Product::findOrFail($id);
 
        $cart = session()->get('cart', []);
 
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "product_name" => $product->product_name,
                "photo" => $product->photo,
                "price" => $product->price,
                "quantity" => 1
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart!');
    }
 
    public function updateCart(Request $request) {

        if($request->id && $request->quantity){
            $cart = session()->get('cart');

            if(isset($cart[$request->id])) { 
                $cart[$request->id]["quantity"] = $request->quantity;
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Cart updated!');
        }
    }
 
    public function remove(Request $request) {

        if($request->id) {
            $cart = session()->get('cart');
            
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed!');
        }
    }

    // --- CRUD FROM DATABASE ---

     // -- add product --
    public function store(Request $request) {
        $request->validate([
            'product_name' => 'required',
            'price' => 'required|numeric',
            'product_description' => 'required',
            'photo' => 'required|image',
        ]);

        // upload file
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $photoPath = $file->storeAs('', $file->getClientOriginalName(), 'public');
        } else {
            $photoPath = null;
        }

        Product::create([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'product_description' => $request->product_description,
            'photo' => $photoPath
        ]);

        return redirect()->route('products.index')->with('success', 'Product added!');
    }

    // -- edit product --
    public function edit($id) {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function updateProduct(Request $request, $id) {
        $request->validate([
            'product_name' => 'required',
            'price' => 'required|numeric',
            'product_description' => 'required',
            'photo' => 'required',
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'product_description' => $request->product_description,
            'photo' => $request->photo
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated!');
    }

    // -- delete product --
    public function destroy($id) {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted!');
    }

}
