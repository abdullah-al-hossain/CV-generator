@extends('layouts.admin_app')


@section('content')
<div class="h3 text-center">
    Products table
</div>
<div class="table-responsive">
  <table class="table aiz-table mb-0 table-bordered table-hover">
    <thead>
      <tr>
        <th data-breakpoints="">#</th>
        <th data-breakpoints="">Name</th>
        <th data-breakpoints="">Category</th>
        <th data-breakpoints="">Description</th>
        <th data-breakpoints="">Image</th>
        <th data-breakpoints="">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
      <tr>
        <td>{{$product->id}}</td>
        <td>{{$product->name}}</td>
        <td>{{$product->category}}</td>
        <td>{{$product->description}}</td>
        <td><img src='{{asset("images/products/$product->image")}}' alt="Product_image" width="100" class="img-thumbnail"></td>
        <td>
          <a href="#" class="btn btn-warning">Edit</a>
          <a href="#" class="btn btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
