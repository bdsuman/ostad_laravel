<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return response()->json([
            'data'    => $products,
            'success' => true,
            'status'  => 200
        ]);

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

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2',
            'price' => 'required|regex:/^[0-9]+(\.[0-9][0-9][0-9]?)?$/'
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ]);
        }
        // $product = Product::create($request->all());
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;

        $product->save();
        return response()->json([
            'msg'    => 'Product created successfully.',
            'success' => true,
            'status'  => 200
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
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
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if(is_null($product)){
            return response()->json([
                'msg'    => 'Product Not Found.',
                'success' => true,
                'status'  => 404
            ]);
         }
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2',
            'price' => 'required|regex:/^[0-9]+(\.[0-9][0-9][0-9]?)?$/'
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ]);
        }
        $product = Product::findOrFail($id);
        // $product->update($request->all());
        $product->name = $request->name;
        $product->price = $request->price;
        $product->update();
        return response()->json([
            'msg'    => 'Product Updated Successfully.',
            'success' => true,
            'status'  => 200
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if(is_null($product)){
            return response()->json([
                'msg'    => 'Product Not Found.',
                'success' => true,
                'status'  => 404
            ]);
         }
        $product->delete();
        return response()->json([
            'msg'    => 'Product Deleted Successfully.',
            'success' => true,
            'status'  => 200
        ]);
    }
}
