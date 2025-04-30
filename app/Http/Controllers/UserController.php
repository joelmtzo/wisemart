<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        $user = auth()->user();
        $orders = $user->orders()->orderBy('id', 'desc')->paginate(10);
        return view('public.user.index', compact('user', 'orders'));
    }

    public function showUserInfo()
    {
        $user = auth()->user();
        return view('public.user.profile', compact('user'));
    }

    public function orderDetail($orderId)
    {
        $user = auth()->user();
        $order = $user->orders()->where('id', $orderId)->firstOrFail();

        return view('public.user.order-detail', compact('order'));
    }

    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
            'phone' => 'nullable|string|max:20',
            'address_line1' => 'nullable|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255', 
            'zipcode' => 'nullable|string|max:10',
        ]);

        $user = auth()->user();
        $user->update($validated);

        return redirect()->route('user.info')->with('success', 'Perfil actualizado correctamente');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/')->with('success', 'Has cerrado sesión correctamente');
    }
}
