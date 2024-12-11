<li class="nav-item menu-open">
    <a href="#" class="nav-link active">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
        Dashboard
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="./index.html" class="nav-link active">
          <i class="far fa-circle nav-icon"></i>
          <p>Dashboard v1</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="./index2.html" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Dashboard v2</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="./index3.html" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Dashboard v3</p>
        </a>
      </li>
    </ul>
  </li>


  // function update(Request $request){

    //     $request ->validate([
    //         'ptitle' => 'required',
    //         'pslug' => 'required',
    //         'pprice' => 'required',
    //         'pdescription' => 'required',
    //         'pimage' => 'required',
    //     ],
    //     [
    //        'ptitle' => 'Product Title is required', 
    //        'pslug' => 'Product Slug is required', 
    //        'pprice' => 'Product Price is required', 
    //        'pdescription' => 'Product Description is required', 
    //        'pimage' => 'Product Image is required', 
    //     ],

    //     );

    //     $product = Products::find($request->pid);

    //     if (!$product) {
    //         return redirect()->back()->with('error', 'Product not found!');
    //     }

    //     $product->product_title = $request->ptitle;
    //     $product->product_slug = $request->pslug;
    //     $product->product_price = $request->pprice;
    //     $product->product_description = $request->pdescription;
    //     $product->product_image = $request->pimage; 
    
        
    //     $product->save();
    
    //     return redirect()->route('admin.all-products')->with('success', 'Product updated successfully!');
    //     // return redirect()->back()->with('products_data')
    //     // ->with('success', 'Product has been updated successfully!');
    // }