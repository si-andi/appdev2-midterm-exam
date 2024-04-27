<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['message' => 'Display all products']);
    }
    public function store(Request $request)
    {
        return response()->json(['message' => 'Product created successfully']);
    }
    public function show($id)
    {
        return response()->json(['message' => 'Display product with ID: ' . $id]);
    }
    public function update(Request $request, $id)
    {
        return response()->json(['message' => 'Product with ID ' . $id . ' updated successfully']);
    }
    public function destroy($id)
    {
        return response()->json(['message' => 'Product with ID ' . $id . ' deleted successfully']);
    }
}
