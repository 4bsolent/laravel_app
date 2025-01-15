<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $products = Product::all();
        //products = Product::select('name', 'description')->get();

        //return $product;
        return response()->json($products);
    }

    public function onlyProduct(Request $request) {

        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric',
        ]); 

        if ($validator->fails()) {
            return response()->json($validator->errors());
        };

        $findProuct = Product::find($request->id);

        if (!$findProuct) {
            return response()->json([
                'message' => 'El producto no existe mi perro!'
            ], 404);
        }

        return $findProuct;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
        return response()->json([
            'message' => 'Producto encontrado',
            'product' => $product
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
