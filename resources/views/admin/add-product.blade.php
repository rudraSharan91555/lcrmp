@extends('admin.master');


@section('content');
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Product</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Add Product</li>
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


                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <form action="{{ url('/add-product') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="productTitle">Product Title<Title></Title></label>
                            <input type="text" name="ptitle" class="form-control" placeholder="Enter Title">
                        </div>

                        <div class="form-group">
                            <label for="productSlug">Product Slug<Title></Title></label>
                            <input type="text" name="pslug" class="form-control" placeholder="Enter Title">
                        </div>

                        <div class="form-group">
                            <label for="productPrice">Product Price<Title></Title></label>
                            <input type="text" name="pprice" class="form-control" placeholder="Enter Title">
                        </div>


                        <div class="form-group">
                            <label for="productDescription">Product Description<Title></Title></label>
                            <textarea type="text" name="pdescription" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="productImage">Product Image</label>
                            <input type="file" name="pimage" class="form-control">
                            {{-- <input type="file" name="pimage" class="form-control" accept="image/*"> --}}
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
