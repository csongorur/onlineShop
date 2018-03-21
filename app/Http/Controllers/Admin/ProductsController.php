<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function index() {
        $products = Product::all();

        return view('admin.products.index')->with(['products' => $products]);
    }

    public function add() {
        return view('admin.products.add');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'nr' => 'required',
            'file' => 'required'
        ]);


        $file = $request->file('file');
        $path = asset('products/images');
        $file->move('products/images', $file->getClientOriginalName());

        Product::create([
            'name' => $request->post('name'),
            'price' => $request->post('price'),
            'nr' => $request->post('nr'),
            'file' => $request->file('file')->getClientOriginalName()
        ]);

        return redirect('admin/products');
    }

    public function delete($id) {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect('admin/products');
    }
}
