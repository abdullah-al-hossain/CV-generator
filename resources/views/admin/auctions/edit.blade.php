@extends('layouts.admin_app')


@section('content')
<div class="container">

  @if ($errors->any())
      <div class="alert alert-danger fade show">
          <ul style="margin: 0;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
              @foreach ($errors->all() as $error)
                  <li>{!! $error !!}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <div class="row">
    <div class="col-lg-8 offset-lg-2">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0 h6">Edit Auction . . .</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('auction.update', ['auction' => $auction->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label>Select Product</label>
              <select class="form-control" name="prod_id">
                @foreach($products as $product)
                <option value="{{ $product->id }}" @if($auction->product_id == $product->id) selected @endif > {{ $product->name }}</option>
                @endforeach
              </select>
              <small class="form-text text-muted">Help text.</small>
            </div>
            <div class="form-group">
              <label>Initial Price</label>
              <input type="text" name="price" class="form-control" required value="{{ $auction->product_init_price }}">
            </div>
            <div class="d-flex">
              <div class="form-group">
                <label>Start Date</label>
                @php
                  $start1 = strtotime($auction->bid_start);
                  $start = date('Y-m-d', $start1);
                @endphp
                <input type="text" name="startdate" class="aiz-date-range form-control" value="{{ $start }}" placeholder="Select Date" data-single="true" required/>
              </div>
              <div class="form-group">
                <label>Start Time</label>
                @php
                  $start1 = strtotime($auction->bid_start);
                  $start = date('H:i A', $start1);
                @endphp
                <input type="text" name="starttime" class="aiz-time-picker form-control" value="{{ $start }}" data-minute-step="1" required/>
                <small class="form-text text-muted">Some help text.</small>
              </div>
            </div>

            <div class="d-flex">
              <div class="form-group">
                <label>End Date</label>
                @php
                  $end1 = strtotime($auction->bid_end);
                  $end = date('Y-m-d', $end1);
                @endphp
                <input type="text" name="enddate" class="aiz-date-range form-control" required value="{{ $end }}" placeholder="Select Date" data-single="true">
              </div>
              <div class="form-group">
                <label>End Time</label>
                @php
                  $end1 = strtotime($auction->bid_end);
                  $end = date('H:i A', $end1);
                @endphp
                <input type="text" name="endtime" class="aiz-time-picker form-control" value="{{ $end }}" data-minute-step="1" required/>
                <small class="form-text text-muted">Some help text.</small>
              </div>
            </div>

            <div class="col-md-12 text-md-right">
              <button type="submit" class="btn btn-primary form-control">
                <i class="fa fa-refresh" aria-hidden="true"></i>
                <span>Update Auction!</span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
  function showImage()
  {
    if (this.files && this.files[0]) {
      var obj = new FileReader();
      obj.onload = function(data) {
        var image = document.getElementById("image");
        // alert(data.target.result);
        image.src = data.target.result;
        image.style.display = "block";
      }

      obj.readAsDataURL(this.files[0]);
    }
  }
  </script>
</div>
@endsection
