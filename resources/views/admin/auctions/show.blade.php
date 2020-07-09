@extends('layouts.admin_app')


@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 col-lg-8 offset-md-0 offset-lg-2">
      <div class="card">
        <div class="card-header">
          <div class="col-md-5">
            @php
              $image = "images/products/".$auction->product->image;
            @endphp
            <img src='{{ asset($image) }}' alt="Product_image" class="img-thumbnail">
          </div>
          <div class="col-md-7">
            <p class="display-4">{{ $auction->product->name }}</p>
            <p class="lead">{{ $auction->product->description }}</p>
            <p class="h6 mt-4">Initial price: {{ $auction->product_init_price }}</p>
            @php
              $start1 = strtotime($auction->bid_start);
              $start = date('Y-m-d', $start1);
            @endphp
            <p class="h6">Start Date: {{ $start }}</p>
            @php
              $start1 = strtotime($auction->bid_start);
              $start = date('H:i A', $start1);
            @endphp
            <p class="h6">Start Time: {{ $start }}</p>
            @php
              $start1 = strtotime($auction->bid_end);
              $start = date('Y-m-d', $start1);
            @endphp
            <p class="h6">End Date: {{ $start }}</p>
            @php
              $start1 = strtotime($auction->bid_end);
              $start = date('H:i A', $start1);
            @endphp
            <p class="h6">End Time: {{ $start }}</p>
          </div>
          <a href="{{ route('auction.edit', ['auction' => $auction->id]) }}" class="btn btn-sm btn-warning " style="position: absolute; top: 8px; right: 20px;">Edit</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table aiz-table mb-0 table-bordered table-hover">
              <thead>
                <tr>
                  <th data-breakpoints="">#</th>
                  <th data-breakpoints="">Bidder's Name</th>
                  <th data-breakpoints="">Bidded price</th>
                  <th data-breakpoints="">Bidding Time</th>
                  <th data-breakpoints="">Actions</th>
                </tr>
              </thead>
              <tbody>
                @php $counter = 1; @endphp
                @foreach($bidders as $bidder)
                <tr>
                  <td>{{ $counter++ }}</td>
                  <td>{{$bidder->user->name}}</td>
                  <td>{{ $bidder->bidding_price }}</td>
                  <td>{{ $bidder->created_at->diffForHumans() }}</td>
                  <td>
                    <a href="#" class="btn btn-danger btn-sm">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
