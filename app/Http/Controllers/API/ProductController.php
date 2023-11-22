<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(){
        $product = Product::all();
        $status = ($product->count() > 0) ? 200 : 402;

        if($product->count() > 0){
            return response()->json([
                'Status' => 200,
                'Message' => $product,
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Product Not Found',
            ], 200);
        }
        
    }

    public function store(Request $request){
        $validator = Validator::make($request -> all(), [
            'name' => 'required|string',
            'qty' => 'required|integer',
            'price' => 'required|integer',
            'brand' => 'required|string',
            'color' => 'required|string',
            'description' => 'required|string'
        ]);

        if($validator -> fails()){
            return response()->json([
                'status' => 422,
                'error' => $validator->errors()
            ], 422);
        }else{
            $product = Product::create([
                'name' => $request->name,
                'qty' => $request->qty,
                'price' => $request->price,
                'brand' => $request->brand,
                'color' => $request->color,
                'description' => $request->description,
            ]);

            if($product){
                return response()->json([
                    'status' => 200,
                    'message' => 'Item Created Successfully',
                ], 200);
            }else{
                return response()->json([
                    'status' => 500,
                    'message' => 'Something went Wrong',
                ], 500);
            }
        }
    }

    public function singleItem($id){
        $item = Product::find($id);
        if($item){
            return response()->json([
                'status' => 200,
                'message' => $item,
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'No Such Item Found'
            ]);
        }
    }

    public function edit($id){
        $item = Product::find($id);
        if($item){
            return response()->json([
                'status' => 200,
                'message' => $item,
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'No Such Item Found'
            ]);
        }
    }
    
    public function update(Request $request, int $id){
        $validator = Validator::make($request -> all(), [
            'name' => 'required|string',
            'qty' => 'required|integer',
            'price' => 'required|integer',
            'brand' => 'required|string',
            'color' => 'required|string',
            'description' => 'required|string'
        ]);

        if($validator -> fails()){
            return response()->json([
                'status' => 422,
                'error' => $validator->errors()
            ], 422);
        }else{
            $product = Product::find($id);
            if($product){
                $product -> update([
                    'name' => $request->name,
                    'qty' => $request->qty,
                    'price' => $request->price,
                    'brand' => $request->brand,
                    'color' => $request->color,
                    'description' => $request->description,
                ]);
                return response()->json([
                    'status' => 200,
                    'message' => 'Item Updated Successfully',
                ], 200);
            }else{
                return response()->json([
                    'status' => 500,
                    'message' => 'Such Item Not Found',
                ], 500);
            }
        }
    }

    public function delete($id){
        $deleteItem = Product::find($id);
        if($deleteItem){
            $deleteItem -> delete();
            return response() ->json([
                'status' => 200,
                'message' => 'Item Deleted Successfully'
            ], 200);
        }else{
            return response() -> json([
                'status' => 404,
                'message' => 'Such Item Not Found'
            ], 404);
        }
    }

}