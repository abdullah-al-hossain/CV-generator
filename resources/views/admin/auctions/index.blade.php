@extends('layouts.admin_app')


@section('content')
<?php
  use Carbon\Carbon;
 ?>
<div class="table-responsive">
  <table class="table aiz-table mb-0 table-bordered table-hover">
    <thead>
      <tr>
        <th data-breakpoints="">#</th>
        <th data-breakpoints="">Product Name</th>
        <th data-breakpoints="">Image</th>
        <th data-breakpoints="">Initial Price</th>
        <th data-breakpoints="">Start time</th>
        <th data-breakpoints="">End time</th>
        <th data-breakpoints="">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($auctions as $auction)
      <tr>
        <td>{{$auction->id}}</td>
        <td>{{$auction->product->name}}</td>
        <td><img src='<?php echo "images/products/".$auction->product->image; ?>' alt="Product_image" width="100" class="img-thumbnail"></td>
        <td>{{ $auction->product_init_price }}</td>
        <td>{{ $auction->auctionStartDate() }}</td>
        <td>{{ $auction->auctionEndDate() }}</td>
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
