<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index() {

        $products = Product::query()
        ->with('attrs')
        ->with('attrs.attr')
        ->with('colors')
        ->with('colors.color')
        ->with('colors.images')
        ->take(4)
        ->get();

        $products_discount = Product::query()
        ->with('attrs')
        ->with('attrs.attr')
        ->with('colors')
        ->with('colors.color')
        ->with('colors.images')
        ->where('old_price', '!=', null)
        ->get();

        return view('index', [
            'products' => $products,
            'products_discount' => $products_discount
        ]);
    }

}
