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
        <td class="d-flex justify-content-center align-content-center"><img src='{{asset("images/products/$product->image")}}' alt="Product_image" width="150" class="img-thumbnail"></td>
        <td>
          <a href="#{{ route('product.show', ['product' => $product->id]) }}" class="btn btn-primary btn-sm">
            <i class="fa fa-eye" aria-hidden="true"></i>
            View
          </a>
          <a href="{{ route('product.edit', ['product' => $product->id]) }}" class="btn btn-warning btn-sm">
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            Edit
          </a>
          <form class="d-inline" action="{{ route('product.destroy', ['product' => $product->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">
              <i class="fa fa-trash" aria-hidden="true"></i>
              Delete
            </button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
