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

    // CUSTOM FUNCTION - PROBANDO LARAVEL //

    public function onlyProduct(Request $request) {

        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric',
        ]); 

        if ($validator->fails()) {
            return response()->json($validator->errors());
        };

        $findProduct = Product::find($request->id);

        if (!$findProduct) {
            return response()->json([
                'message' => 'El producto no existe mi perro!'
            ], 404);
        }

        return $findProduct;
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
    public function update(Request $request)
    {
        //

        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric',
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
           return response()->json([
            'message' => 'Mi perro los criterios no se cumplieros',
            'errors' => $validator->errors(),
           ], 422);
        }

        $findProduct = Product::find($request->id);

        if (!$findProduct) {
            return response()->json([
                'message' => 'El producto no existe mi perro!'
            ], 404);
        }

        $findProduct->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json([
            'message' => 'El producto fue actualizado correctamente',
            'newProductData' => $findProduct
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
