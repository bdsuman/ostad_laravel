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
        $data['products'] = Product::paginate(5);
        
        return view('product.index',$data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
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
            return redirect()->back()->withErrors($validator)->withInput(); 
        }
      
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;

        $product->save();
        return back()->withSuccess('Product created successfully.');
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
    public function edit($id)
    {
        $data['product'] = Product::find($id);

        if(is_null($data['product']) || empty($data['product'])){
            return redirect()->back()->withErrors(['Product Not Found.'])->withInput(); 
            }

        return view('product.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if(is_null($product)){
            return redirect()->back()->withErrors(['Product Not Found.'])->withInput(); 
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2',
            'price' => 'required|regex:/^[0-9]+(\.[0-9][0-9][0-9]?)?$/'
        ]);
 
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput(); 
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->update();
        return back()->withSuccess('Product Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if(is_null($product)){
            return redirect()->back()->withErrors(['Product Not Found.'])->withInput(); 
        }

        $product->delete();
        
        return back()->withSuccess('Product Deleted Successfully.');
        
    }
}
