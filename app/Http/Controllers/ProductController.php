<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();

        return response()->json([
            'success' => true,
            'data' => $products,
            'message' => 'Products retrieved successfully'
        ], 200);
    }

    public function show($id)
    {
        $product = Product::findorFail($id);
        return response()->json([
            'success' => true,
            'data' => $product,
            'message' => 'Product retrieved successfully'
        ], 200);
    }

    public function store(Request $request)
    {
        $product = Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => $request->input('image'),
            'category_id' => $request->input('category_id'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'seller_id' => $request->input('seller_id')
        ]);

        return response()->json([
            'success' => true,
            'data' => $product,
            'message' => 'Product created successfully'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update($request->all());

        return response()->json([
            'success' => true,
            'data' => $product,
            'message' => 'Product updated successfully'
        ], 200);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully'
        ], 200);
        
    }
}
