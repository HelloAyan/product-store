<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index(){
        $product = Product::all();
        return view('product', ['viewProduct' => $product]);
    }

    public function create(){
        return view('add');
    }

    public function store(Request $request){
        $store_data = $request-> validate([
            'name' => 'required',
            'qty' => 'required',
            'price' => 'required | decimal:0,10',
            'brand' => 'required',
            'color' => 'required',
            'description' => 'required',
        ]);
        $newProduct = Product::create($store_data);
        return redirect(route('product.index'))->with('success', 'Product Added Successfully');
    }

    public function edit(Product $product){
        return view('edit', ['singleItem' => $product]);
    }

    public function update(Product $product, Request $request){
        $store_data = $request-> validate([
            'name' => 'required',
            'qty' => 'required',
            'price' => 'required | decimal:0,10',
            'brand' => 'required',
            'color' => 'required',
            'description' => 'required',
        ]);
        $product->update($store_data);
        return redirect(route('product.index'))->with('success', 'Product Updated Successfully');
    }
}