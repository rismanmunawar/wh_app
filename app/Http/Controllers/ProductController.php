<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $title = "Data product";
        $products = Product::orderBy('id', 'asc')->paginate(5);
        return view('products.index', compact('products', 'title'));
    }

    public function create()
    {
        $title = "Add Data product";
        return view('products.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        product::create($request->post());

        return redirect()->route('products.index')->with('success', 'product has been created successfully.');
    }

    public function edit(product $product)
    {
        $title = "Edit Data product";
        return view('products.edit', compact('product', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        $product->fill($request->post())->save();

        return redirect()->route('products.index')->with('success', 'product Has Been updated successfully');
    }

    public function destroy(product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'product has been deleted successfully');
    }
    public function autocomplete(Request $request)
    {
        $data = Product::select("name as value", "id")
            ->where('name', 'LIKE', '%' . $request->get('search') . '%')
            ->get();

        return response()->json($data);
    }

    public function show(Product $product)
    {
        return response()->json($product);
    }
}
