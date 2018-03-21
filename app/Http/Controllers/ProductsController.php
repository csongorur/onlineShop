<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function show($id) {
        $product = Product::findOrFail($id);

        return view('shop.products.show')->with([
            'product' => $product
        ]);
    }
}
