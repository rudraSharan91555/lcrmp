<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;


class ProductController extends Controller // <-- Updated to PascalCase
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

        return view('admin.add-product');
    }

    function delete($id){
        // echo $id;
        $product = Products::find($id);
        $product->delete();

        return view('admin.all-products');
    }
}
