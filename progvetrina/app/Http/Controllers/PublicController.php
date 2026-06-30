<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;

class PublicController extends Controller {
    
    public function home() {
        $randomProducts = Product::inRandomOrder()->take(5)->get();

        return view('welcome', compact('randomProducts'));
    }

    public function menu(){
        $categories = Category::with(['products.allergens'])->orderBy('name', 'asc')->get();
        return view('menu', compact('categories'));
    }

    public function contacts(){
        return view('contacts');
    }

    public function profile()
    {
        $myProducts = Product::where('user_id', Auth::id())->latest()->get();
        return view('profile', compact('myProducts'));
    }
}

