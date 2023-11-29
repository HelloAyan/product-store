<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function home(){
        $product = Product::all();
        return view('home', ['viewProduct' => $product]);
    }

    public function index(){
        $product = Product::all();
        return view('product', ['viewProduct' => $product]);
    }

    public function create(){
        return view('add');
    }

    public function store(Request $request){

        $store_data = $request->validate([
            'name' => 'required',
            'qty' => 'required',
            'price' => 'required|numeric',
            'brand' => 'required',
            'color' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
        ]);
    
        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName); // Adjust the storage path as needed
    
            // Assign the image name to the store_data array
            $store_data['image'] = $imageName;
        }
    
        $newProduct = Product::create($store_data);
        return redirect(route('product.index'))->with('success', 'Product Added Successfully');
        
        // $store_data = $request-> validate([
        //     'name' => 'required',
        //     'qty' => 'required',
        //     'price' => 'required | decimal:0,10',
        //     'brand' => 'required',
        //     'color' => 'required',
        //     'description' => 'required',
            
        // ]);
        // $newProduct = Product::create($store_data);
        // return redirect(route('product.index'))->with('success', 'Product Added Successfully');
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

    public function delete(Product $product){
        $product->delete();
        return redirect(route('product.index'))->with('success', 'Product Deleted Successfully');
    }
}