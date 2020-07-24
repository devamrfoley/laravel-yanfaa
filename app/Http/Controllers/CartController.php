<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;

class CartController extends Controller
{
    public function index(Request $request)
    {
        return view('cart');
    }

    public function store(Request $request, Product $product)
    {
        $cart = new Cart($request->session()->get('cart'));

        $cart->addItem($product);
        
        $request->session()->put('cart', $cart);

        return redirect()->back();
    }

    public function edit(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|min:1'
        ]);

        $cart = new Cart($request->session()->get('cart'));

        $cart->editItem($product, $request['quantity']);

        $request->session()->put('cart', $cart);

        return redirect()->back();
    }

    public function delete(Request $request, Product $product)
    {
        $cart = new Cart($request->session()->get('cart'));

        $cart->removeItem($product);

        if($cart->totalItems == 0) {
            $this->destroy($request);
        } else {
            $request->session()->put('cart', $cart);
        }

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $request->session()->forget('key');
        $request->session()->flush();
        
        return redirect(route('home'));
    }

}
