<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller 
{
    function index()
    {
        $products_data = Products::all()->toArray();
        return view('admin.all-products', compact('products_data'));
    }

    function store(Request $request)
    {
        // Validation for the request data
        $request->validate([
            'ptitle' => 'required',
            'pslug' => 'required',
            'pprice' => 'required',
            'pdescription' => 'required',
            'pimage' => 'required|image', // Ensure pimage is an image
        ], [
            'ptitle.required' => 'Product Title is required', 
            'pslug.required' => 'Product Slug is required', 
            'pprice.required' => 'Product Price is required', 
            'pdescription.required' => 'Product Description is required', 
            'pimage.required' => 'Product Image is required',
            'pimage.image' => 'The image must be a valid image file.',
        ]);

        // Handle file upload for product image
        $filename = null;
        if ($request->has('pimage')) {
            $file = $request->file('pimage');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension; 
            // $path =
            $file->move(public_path('uploads/category'), $filename); // Move file to the category folder
        }

        // Create new product and save data
        $product = new Products();
        $product->product_title = $request->ptitle;
        $product->product_slug = $request->pslug;
        $product->product_price = $request->pprice;
        $product->product_description = $request->pdescription;
        $product->product_image = $filename; // Store the filename in the database

        $product->save();

        return redirect()->route('admin.all-products')->with('success', 'Product added successfully!');
    }

    function delete($id) 
    {
        $product = Products::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found!');
        }

        // Optional: Delete the product image from the storage (if needed)
        if ($product->product_image) {
            $imagePath = public_path('uploads/category/' . $product->product_image);
            if (file_exists($imagePath)) {
                unlink($imagePath); // Delete the image from the server
            }
        }

        $product->delete();
        return redirect()->route('admin.all-products')->with('success', 'Product deleted successfully!');
    }

    function edit($id)
    {
        $product = Products::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found!');
        }
        return view('admin.edit-product', compact('product'));
    }

   
    public function update(Request $request)
{
    $request->validate([
        'ptitle' => 'required',
        'pslug' => 'required',
        'pprice' => 'required',
        'pdescription' => 'required',
        'pimage' => 'required',
    ], 
    [
        'ptitle.required' => 'Product Title is required',
        'pslug.required' => 'Product Slug is required',
        'pprice.required' => 'Product Price is required',
        'pdescription.required' => 'Product Description is required',
        'pimage.image' => 'The image must be a valid image file.',
    ]);

    $product = Products::find($request->pid);
    if (!$product) {
        return redirect()->back()->with('error', 'Product not found!');
    }

    
    $filename = $product->product_image; 
    if ($request->hasFile('pimage')) {  
        $file = $request->file('pimage');
        
        if ($file->isValid()) {
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;  
            $file->move(public_path('uploads/category'), $filename); 

            
            if ($product->product_image) {
                $oldImagePath = public_path('uploads/category/' . $product->product_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); 
                }
            }
        }
    }

    
    $product->product_title = $request->ptitle;
    $product->product_slug = $request->pslug;
    $product->product_price = $request->pprice;
    $product->product_description = $request->pdescription;
    $product->product_image = $filename; 

    $product->save();

    return redirect()->route('admin.all-products')->with('success', 'Product updated successfully!');
}

}
