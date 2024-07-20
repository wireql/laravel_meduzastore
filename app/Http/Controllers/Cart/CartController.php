<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index() {

        $cart = Session::get('cart', []);
        $productIds = array_keys($cart);

        $products = Product::query()->whereIn('id', $productIds)->get();

        return $products;

        return view('cart', [
            'cart' => $cart
        ]);
    }

    public function store($id) {

        $cart = Session::get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }else {
            $cart[$id] = [
                'product_id' => $id,
                'quantity' => 1,
            ];
        }

        Session::put('cart', $cart);

        return response()->json([
            'message' => 'Товар успешно добавлен'
        ]);
    }

    public function delete($id) {
        $cart = Session::get('cart', []);

        if(isset($cart[$id])) {
            unset($cart[$id]);
            Session::put('cart', $cart);
        }

        return response()->json([
            'message' => 'Товар успешно удален из корзины'
        ]);
    }
}
