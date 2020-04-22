<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index() {
        $products = Product::all();
    
        return \response()->json($products);
    }

    public function create(Request $request) {
        $product = new Product;

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        $product->save();

        if($product){
            return response()->json([
            'status' => true,
            'message' => 'Success to create a new data',
            'data' => [
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description
            ],
            
        ], 200);
        }else{
             return response()->json([
            'status' => false,
            'message' => 'Failed to create a new data',
            'data' => ''
            
        ], 400);
        }
       

    }

    public function show($id){
        $product = Product::find($id);

        return \response()->json($product);
    }

    public function delete($id){
        $product = Product::find($id);

        $product->delete();

        return \response()->json('Success Delete');
    }

    public function update(Request $request, $id){
        $product = Product::find($id);

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');

        $product->update();
        return \response()->json($product);

        // if($product){
        //     return response()->json([
        //     'status' => true,
        //     'message' => 'Success to update data',
        //     'data' => [
        //         'name' => $request->name,
        //         'price' => $request->price,
        //         'description' => $request->description
        //     ],
            
        // ], 200);
        // }else{
        //      return response()->json([
        //     'status' => false,
        //     'message' => 'Failed to update data',
        //     'data' => ''
            
        // ], 400);
        // }


    }


    //
}
