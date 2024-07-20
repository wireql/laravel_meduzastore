<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index() {

        $products = Product::query()
            ->with('attrs')
            ->with('attrs.attr')
            ->with('colors')
            ->with('colors.color')
            ->with('colors.images')
            ->get();

        return view('products',[
            'products' => $products
        ]);
    }

    public function show(Request $request, $id) {

        $color = $request->query('color', null);

        $product = Product::query()->where('id', '=', $id)
            ->with('attrs')
            ->with('attrs.attr')
            ->with('colors')
            ->with('colors.color')
            ->with('colors.images')
            ->first();

        $index = 0;

        if($color != null) {
            $colors = collect($product->colors);

            $index = $colors->search(function ($item) use ($color) {
                return $item->color_id == $color;
            });

            if($index === false) {
                return redirect()->route('index');
            }
        }

        return view('product', [
            'product' => $product,
            'color' => $index
        ]);
    }

    public function store() {
        
    }
    
}
