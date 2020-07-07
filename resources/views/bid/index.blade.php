@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-8 offset-lg-2">
      <div class="card">
        <div class="card-header">
          <span class="h5 py-0">Biddings of the going on</span>
        </div>
        <div class="card-body">
          @foreach($auctions as $auction)
          <p>
            <a href="{{route('bid.show', [ 'id' => $auction->id ])}}">
              <img src="{{ asset('images/images.jfif') }}" alt="image" width="40">
              {{ $auction->product->name }}
              ({{ Carbon\Carbon::parse($auction->bid_start)->diffForHumans() }})
            </a>
          </p>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
