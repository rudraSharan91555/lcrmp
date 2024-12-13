@extends('admin.master');


@section('content');
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">All Products</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          @if (session('success'))
          <div class="alert alert-success">
            {{ session('success')}}
          </div>
          @endif

          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product Title</th>
                <th scope="col">Product Slug</th>
                <th scope="col">Product Price</th>
                <th scope="col">Product Description</th>
                <th scope="col">Product Image</th>
                <th scope="col">Edit</th>
                <th scope="col">Delet</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($products_data as $products )
              <tr>
                <td>{{ $products['product_title'] }}</td>
                <td>{{ $products['product_slug'] }}</td>
                <td>{{ $products['product_price'] }}</td>
                <td>{{ $products['product_description']}}</td>
                <td>{{ $products['product_image'] }}</td>
                
                {{-- <td>@if($products['product_image'])
                  <img src="{{ asset('storage/'.$products['product_image']) }}" alt="Product Image" width="100" height="100">
                @else
                  No Image
                @endif</td> --}}
                <td><a href="/edit/{{ $products['id'] }}" class="btn btn-primary">Edit</a></td>
                <td><a href="/delete/{{ $products['id'] }}" 
                  class="btn btn-danger">Delet</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
            
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection