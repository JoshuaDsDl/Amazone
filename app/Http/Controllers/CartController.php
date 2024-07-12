<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = array_sum(array_column($cart, 'total_price'));
        return view('cart.index', compact('cart', 'total'));
    }

    public function add(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $cart = session()->get('cart', []);
        $id = $product->id;

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            $cart[$id]['total_price'] = $cart[$id]['quantity'] * $cart[$id]['price'];
        } else {
            $cart[$id] = [
                'id' => $product->id,
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'total_price' => $product->price,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            if ($request->has('increase')) {
                $cart[$id]['quantity']++;
            } elseif ($request->has('decrease')) {
                $cart[$id]['quantity']--;
                if ($cart[$id]['quantity'] < 1) {
                    unset($cart[$id]);
                }
            }
            if (isset($cart[$id])) {
                $cart[$id]['total_price'] = $cart[$id]['quantity'] * $cart[$id]['price'];
            }
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Cart updated!');
    }

    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);
        unset($cart[$request->product_id]);
        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
    }

    public function checkout()
    {
        return view('cart.checkout');
    }

    public function processCheckout(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'card_number' => 'required|numeric',
            'expiration_date' => 'required|date',
            'cvv' => 'required|numeric',
        ]);

        //Création de la commande
        $cart = session()->get('cart', []);
        $total = array_sum(array_column($cart, 'total_price'));

        $order = Order::create([
            'user_id' => auth()->id(),
            'total' => $total,
            'status' => 'pending',
            'payment_info' => json_encode($request->only(['name', 'address', 'card_number', 'expiration_date', 'cvv'])),
        ]);

        //Sauvegarde des produits de la commande
        foreach ($cart as $product_id => $product) {
            $order->products()->attach($product_id, ['quantity' => $product['quantity'], 'price' => $product['price']]);
        }

        // Vider le panier
        session()->forget('cart');

        return redirect()->route('home')->with('success', 'Votre commande a été passée avec succès!');
    }

}
