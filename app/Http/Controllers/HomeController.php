<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $user = \App\Models\User::where('email', 'admin@example.com')->first();
    //     auth()->login($user);
    // }
    
    public function index(Request $request)
    {
        $query = Product::query();
        
        if ($request->has('brand')) {
            $query->where('brand', $request->input('brand'));
        }

        if ($request->has('category')) {
            $query->where('category_id', $request->input('category'));
        }

        if ($request->has('query')) {
            $query->where(function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->input('query') . '%')
              ->orWhere('brand', 'like', '%' . $request->input('query') . '%');
            });
        }

        $products = $query->paginate();
        $categories = Category::all();
        
        return view('index', ['products' => $products, 'categories' => $categories]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $relatedProducts = Product::where('category_id', $product->category_id)
                                 ->where('id', '!=', $id)
                                 ->limit(5)
                                 ->get();

        return view('public.product-detail', [
            'product' => $product,
            'relatedProducts' => $relatedProducts
        ]);
    }
}
