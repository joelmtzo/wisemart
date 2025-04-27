<?php

namespace App\Http\Controllers;

use App\Models\CartDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = auth()->user()->cart;
        
        return view('public.cart.index', compact('cart'));
    }

    public function addItem(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = auth()->user()->cart;
        
        if (!$cart) {
            $cart = auth()->user()->cart()->create([
                'total' => 0
            ]);
        }

        $product = Product::findOrFail($request->product_id);
        
        // Check if product already exists in cart
        $cartDetail = $cart->details()->where('product_id', $product->id)->first();
        
        if ($cartDetail) {
            // Update existing cart detail
            $cartDetail->quantity += $request->quantity;
            $cartDetail->subtotal = $cartDetail->quantity * $cartDetail->price;
            $cartDetail->save();
        } else {
            // Create new cart detail
            $cart->details()->create([
                'product_id' => $product->id,
                'quantity' => $request->quantity,
                'price' => $product->price,
                'subtotal' => $product->price * $request->quantity
            ]);
        }

        // Update cart total
        $cart->total = $cart->details()->sum('subtotal');
        $cart->save();

        return redirect()->back()->with('success', 'Producto agregado al carrito');
    }

    public function updateItem(Request $request, $detailId) 
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cartDetail = CartDetail::findOrFail($detailId);
        
        // Verify cart belongs to authenticated user
        if ($cartDetail->cart->user_id !== auth()->id()) {
            abort(403);
        }

        $cartDetail->quantity = $request->quantity;
        $cartDetail->subtotal = $cartDetail->quantity * $cartDetail->price;
        $cartDetail->save();

        // Update cart total
        $cart = $cartDetail->cart;
        $cart->total = $cart->details()->sum('subtotal');
        $cart->save();

        return redirect()->back()->with('success', 'Carrito actualizado');
    }

    public function removeItem($detailId)
    {
        $cartDetail = CartDetail::findOrFail($detailId);
        
        // Verify cart belongs to authenticated user
        if ($cartDetail->cart->user_id !== auth()->id()) {
            abort(403);
        }

        $cart = $cartDetail->cart;
        $cartDetail->delete();

        // Update cart total
        $cart->total = $cart->details()->sum('subtotal');
        $cart->save();

        return redirect()->back()->with('success', 'Producto eliminado del carrito');
    }

    public function clear()
    {
        $cart = auth()->user()->cart;
        
        if ($cart) {
            $cart->details()->delete();
            $cart->total = 0;
            $cart->save();
        }

        return redirect()->back()->with('success', 'Carrito vaciado');
    }
}
