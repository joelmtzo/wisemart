<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $user = \App\Models\User::where('email', 'admin@example.com')->first();
        auth()->login($user);
    }
    
    public function index()
    {
        $products = Product::paginate();
        $categories = Category::all();
        
        return view('index', ['products' => $products, 'categories'=> $categories]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $relatedProducts = Product::where('category_id', $product->category_id)
                                 ->where('id', '!=', $id)
                                 ->limit(4)
                                 ->get();

        return view('public.product-detail', [
            'product' => $product,
            'relatedProducts' => $relatedProducts
        ]);
    }
}
