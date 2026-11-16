<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
    */

        public function index()
        {
            //
            return response()->json(Product::all());
        }

    public function store(StoreProductRequest $request)
        {
            $product = Product::create($request->validated());
            return response()->json($product,201);
        }

    /**
     * Update the specified resource in storage.
    */
        public function update(UpdateProductRequest $request, Product $product)
        {
            $product-> update($request->validated());
            return response()->json($product, 200);
        }
    /**
     * Remove the specified resource from storage.
    */
        
        public function destroy(Product $product)
        {
            $product->delete();
            return response()->json(['message'=> 'Product deleted successfully'], 200);
        }





    
}
