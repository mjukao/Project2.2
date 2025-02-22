<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'image_url' => 'required|string',
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'category_id' => 'required|integer',
    ]);

    $product = Product::create($validatedData);

    return response()->json([
        'message' => 'Product created successfully!',
        'product' => $product
    ], 201);
}


    public function show($id)
    {
        return Product::find($id);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return response()->json($product, 200);
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json(null, 204);
    }
}
