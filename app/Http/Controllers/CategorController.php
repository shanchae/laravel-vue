<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategorController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();

        return response()->json([
            'success' => true,
            'data' => $categories,
            'message' => 'Categories retrieved successfully'
        ]);
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $category,
            'message' => 'Category retrieved successfully'
        ]);
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());

        return response()->json([
            'success' => true,
            'data' => $category,
            'message' => 'Category created successfully'
        ]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());

        return response()->json([
            'success' => true,
            'data' => $category,
            'message' => 'Category updated successfully'
        ], 200);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully'
        ], 200);
    }
}
