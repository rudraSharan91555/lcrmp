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


    // function delete($id) {
    //     $product = Products::find($id);
    
    //     $product->delete();
    //     $products_data = Products::all()->toArray();
    
    //     // return view('admin.all-products', compact('products_data'))->with
    //     // ('status', 'Product deleted successfully!');

    //     return redirect()->back()->with('products_data',$products_data)->
    //     with('success','Product has been deleted successfully!');
        
    // }
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
    
}
