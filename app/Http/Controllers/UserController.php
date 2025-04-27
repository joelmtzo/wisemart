<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        $user = auth()->user();
        $orders = $user->orders()->orderBy('created_at', 'desc')->paginate(10);
        return view('public.user.index', compact('user', 'orders'));
    }

    public function orderHistory()
    {
        $orders = auth()->user()->orders()->orderBy('created_at', 'desc')->paginate(10);
        return view('public.user.orders', compact('orders'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        $user = auth()->user();
        $user->update($request->only(['name', 'email', 'phone', 'address']));

        return redirect()->route('public.user.index')->with('success', 'Perfil actualizado correctamente');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/')->with('success', 'Has cerrado sesión correctamente');
    }
}
