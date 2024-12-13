@extends('admin.master');


@section('content');
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Product</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Edit Product</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif


                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <form action="{{ url('/edit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $product['id'] }}" name="pid">
                        <div class="form-group">
                            <label for="productTitle">Product Title<Title></Title></label>
                            <input type="text" name="ptitle" class="form-control"
                                value="{{ $product['product_title'] }}" placeholder="Enter Title">
                        </div>

                        <div class="form-group">
                            <label for="productSlug">Product Slug<Title></Title></label>
                            <input type="text" name="pslug" class="form-control" value="{{ $product['product_slug'] }}"
                                placeholder="Enter Title">
                        </div>

                        <div class="form-group">
                            <label for="productPrice">Product Price<Title></Title></label>
                            <input type="text" name="pprice" class="form-control"
                                value="{{ $product['product_price'] }}" placeholder="Enter Title">
                        </div>

                        <div class="form-group">
                            <label for="productDescription">Product Description<Title></Title></label>
                            <textarea type="text" name="pdescription" value="" class="form-control">{{ $product['product_description'] }}</textarea>
                        </div>
                        
                        @if($product->product_image)
                        <div>
                            <img src="{{ asset('uploads/category/' . $product->product_image) }}" alt="Product Image" width="100">
                        </div>
                        @endif
                        
                        <div class="form-group">
                            <label for="pimage">Product Image</label>
                            <input type="file" name="pimage" class="form-control" accept="image/*">
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
