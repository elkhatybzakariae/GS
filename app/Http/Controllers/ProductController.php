<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::orderBy('id_Product', 'desc')->get();
        return response()->json(['product' => $product]);
    }
    public function store(ProductRequest $request)
    {
        $customIdPro = Helpers::generateIdProduct();
        $validatedData = $request->validated();
        $validatedData['id_Product'] = $customIdPro;
        Product::create($validatedData);
        return response()->json(['message' => 'Product created successfully']);
    }

    public function edit(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        return response()->json(['product' => $product]);
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        $product->update($request->validated());
        return response()->json(['message' => 'Product updated successfully']);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }
}
