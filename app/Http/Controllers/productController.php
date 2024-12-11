<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;


class ProductController extends Controller 
{
    function index(){

        $products_data = Products::all()->toArray();

        // dd($products_data);

        return view('admin.all-products',compact('products_data'));
    }

    function store(Request $request)
    {
        $request ->validate([
            'ptitle' => 'required',
            'pslug' => 'required',
            'pprice' => 'required',
            'pdescription' => 'required',
        ],
        [
           'ptitle' => 'Product Title is required', 
           'pslug' => 'Product Slug is required', 
           'pprice' => 'Product Price is required', 
           'pdescription' => 'Product Description is required', 
        ],

        );

        $product = new Products();
        $product->product_title = $request->ptitle;
        $product->product_slug = $request->pslug;
        $product->product_price	 = $request->pprice;
        $product->product_description = $request->pdescription;
        $product->product_image = "1";

        $product->save();

        $products_data = Products::all()->toArray();

        return view('admin.add-product');
    }


    function delete($id) {
        $product = Products::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found!');
        }
        $product->delete();
        $products_data = Products::all()->toArray();
    
        return redirect()->back()->with('products_data', $products_data)
        ->with('success', 'Product has been deleted successfully!');
    }

    function edit($id){
        $product = Products::find($id)->toArray();

        return view('admin.edit-product',compact('product'));
    }

  
    function update(Request $request){

        $request ->validate([
            'ptitle' => 'required',
            'pslug' => 'required',
            'pprice' => 'required',
            'pdescription' => 'required',
        ],
        [
           'ptitle' => 'Product Title is required', 
           'pslug' => 'Product Slug is required', 
           'pprice' => 'Product Price is required', 
           'pdescription' => 'Product Description is required', 
        ],

        );

        $product = Products::find($request->pid);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found!');
        }

        $product->product_title = $request->ptitle;
        $product->product_slug = $request->pslug;
        $product->product_price = $request->pprice;
        $product->product_description = $request->pdescription;
        $product->product_image = "1"; 
    
        
        $product->save();
    
        return redirect()->route('admin.all-products')->with('success', 'Product updated successfully!');
        // return redirect()->back()->with('products_data')
        // ->with('success', 'Product has been updated successfully!');
    }
    
    
}
