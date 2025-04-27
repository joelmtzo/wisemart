<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = auth()->user()->cart;
        $user = auth()->user();
        
        if (!$cart || $cart->details->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Tu carrito está vacío');
        }

        return view('public.checkout.index', compact('cart', 'user'));
    }

    public function saveShipping(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'zipcode' => 'required|string|max:10'
        ]);

        $user = auth()->user();
        $user->update($validated);

        return back()->with('success', 'Información de envío guardada correctamente');
    }

    public function confirm()
    {
        $cart = auth()->user()->cart;
        
        if (!$cart || $cart->details->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Tu carrito está vacío');
        }

        $user = auth()->user();
        return view('public.checkout.confirm', compact('cart', 'user'));
    }

    public function process(Request $request)
    {
        $cart = auth()->user()->cart;

        if (!$cart || $cart->details->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Tu carrito está vacío');
        }

        // Verify shipping information exists
        $user = auth()->user();
        if (!$user->address_line1 || !$user->address_line2 || !$user->city || !$user->state || !$user->zipcode || !$user->phone) {
            return redirect()->route('checkout.index')
                ->with('error', 'Por favor completa tu información de envío');
        }

        // Create order
        $order = auth()->user()->orders()->create([
            'user_id' => auth()->id(),
            'order_date' => now(),
            'total' => $cart->total,
            'payment_status' => 'PENDING',
            'shipping_status' => 'PENDING',
            'order_status' => 'PENDING',
            'tracking_number' => '0'
        ]);

        // Create order details
        foreach ($cart->details as $detail) {
            $order->details()->create([
                'product_id' => $detail->product_id,
                'quantity' => $detail->quantity,
                'price' => $detail->price,
                'subtotal' => $detail->subtotal
            ]);
        }

        // Clear cart
        $cart->details()->delete();
        $cart->total = 0;
        $cart->save();

        return redirect()->route('user.index')->with('success', 'Tu pedido ha sido procesado correctamente');
    }
}
