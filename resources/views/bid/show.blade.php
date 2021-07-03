@extends('layouts.app')
<style>

.col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto {
  position: relative;
  width: 100%;
  padding-right: 0px !important;
  padding-left: 5px !important;
}

.card .card-body {
  padding: 20px 25px;
  border-radius: 0px  0px 4px 4px !important;
}

.card {
  margin-bottom: 0 !important;
}

.alert {
  margin-bottom: 0px !important;
}

p.demo {
  text-align: center;
  font-size: 30px;
  margin: auto 0px;
}

.loader {
  display: none;
  position: fixed;
  top: 40%;
  left: 45%;
  border-radius: 50%;
  background: #fff;
  z-index: 2;
}

.winner {
  display: none;
}

.no-drop {
  cursor: no-drop!important;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('css/ring_animation.css') }}">
<meta name="csrf_token" content="{{ csrf_token() }}" />
@section('content')
<div class="loader">
  <img src="{{asset('/images/abc.gif')}}" alt="" style="width: 150px; height: 150px;">
</div>
<div class="container">

  <div class="row">
    <div class="col-lg-3">
      <div class="card text-center text-md-left text-white">
        @php  $image = "images/products/".$auction->product->image;  @endphp
        <img src='{{ asset($image) }}' alt="Product_image" class="card-img-top">
        <div class="card-body bg-success text-white">
          <h5 class="card-title">{{ $auction->product->name }}</h5>
          <p class="card-text">{{ $auction->product->description }}</p>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card h-100 bg-dark" style="border-radius: 7px;">
        <div class="card-body text-capitalize absolute-center text-white">
          <div class="contents">
            <form action="{{ route('bid.new') }}" method="post">
              @csrf
              <div class="form-group mb-1">
                <label class="w-100 mb-0">
                  <p class="h1 text-center"><i class="fa fa-money" aria-hidden="true"></i> Enter a Bidding price</p>
                  <input type="text" name="bidPrice" class="form-control" style="border: 1px solid #ccc;" placeholder="Insert you bidding price . . . ">
                </label>
                <input type="hidden" name="auction" value="{{ $auction->id }}">
                <input type="hidden" name="uid" value="{{ Auth::user()->id }}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-md btn-primary btnsub w-100" id="btn">Bid!</button>
              </div>
            </form>

          </div>
        </div>
        <div class="alert alert-success winner text-capitalize absolute-center h-100">
          <p id="winner" class="demo"></p>
        </div>
      </div>
    </div>

    <div class="col-lg-3">
      <div class="card h-50 bg-success text-white">
        <p id="demo" class="my-auto demo"></p>
      </div>
      <div class="card h-50 text-center bg-success text-white">
        <div class="m-auto h5">
          <span style="margin-bottom: 0px;"><b>Initial price was :</b><span>{{ $auction->product_init_price }}</span></span>
          <p>Last bidded :
            <span id="bidprice">
              @if($bidded != null)
              {{ $bidded->latest()->first()->bidding_price }}
              By {{ $bidded->latest()->first()->user->name }}
              @else
              No Bid Made
              @endif
            </span>
          </p>
        </div>
      </div>
    </div>

  </div>
</div>

<div class="bidding-info d-none"
data-bidstart="{{ $auction->bid_start }}"
data-bidend="{{ $auction->bid_end }}"
>
</div>

<div class="important-urls"
    data-getwinner="{{ route('show.winner') }}"
    data-setwinner="{{ route('bid.winner') }}"
    data-loadbidder="{{route('bid.shownew')}}"
    data-setnewbidder="{{ route('bid.new') }}"
>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript" src="{{ asset('assets/js/bid.js') }}"></script>
@endsection
