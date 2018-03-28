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

    public function edit(Product $product) {
        return view('admin.products.edit')->with([
            'product' => $product
        ]);
    }

    public function update(Request $request, Product $product) {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'nr' => 'required'
        ]);

        $data_array = [
            'name' => $request->post('name'),
            'price' => $request->post('price'),
            'nr' => $request->post('nr')
        ];

        if (!is_null($request->file('file'))) {
            $request->file('file')->move('products/images', $request->file('file')->getClientOriginalName());
            $data_array['file'] = $request->file('file')->getClientOriginalName();
        }

        $product->update($data_array);

        return redirect()->route('admin.products.edit', ['product' => $product->id]);
    }
}
