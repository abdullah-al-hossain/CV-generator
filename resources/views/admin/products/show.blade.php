@extends('layouts.admin_app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-4 offset-lg-4">
      <div class="card">
          @php  $image = "images/products/".$product->image;  @endphp
          <img card-img-top src='<?php echo asset($image);?>' alt="Product_image" class="img-thumbnail">
        <div class="card-body">
          <h5 class="card-title">Name: {{ $product->name }}</h5>
          <p class="card-text">Description: {{ $product->description }}</p>
        </div>
      </div>
      <a href="{{ route('product.edit', ['product' => $product->id]) }}" class="btn btn-primary form-control">Edit this product</a>
    </div>
  </div>
</div>

@endsection
