@extends('layouts.app')
<style>
p {
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

<meta name="csrf_token" content="{{ csrf_token() }}" />
@section('content')
<div class="loader">
  <img src="{{asset('/images/abc.gif')}}" alt="" style="width: 150px; height: 150px;">
</div>
<div class="container">

  <div class="row">
    <div class="col-lg-3">
      <div class="alert alert-warning h-50">
        <p id="demo" class="my-auto"></p>
      </div>
      <div class="alert alert-primary h-50 text-center">
        <h4><b><u>Initial price was</u> :</b><span>{{ $auction->product_init_price }}</span></h4>
        <h4><u>Last bidded :</u>
            <span id="bidprice">
              @if($bidded != null)
                {{ $bidded->latest()->first()->bidding_price }}
                By {{ $bidded->latest()->first()->user->name }}
              @else
                No Bid Made
              @endif
            </span>
        </h4>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <div class="contents">
          <form action="{{ route('bid.new') }}" method="post">
            @csrf
            <div class="form-group mb-1">
              <label class="w-100 mb-0">
                <p class="h1 text-center">Enter a Bidding price</p>
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
          <div class="alert alert-success winner">
            <p id="winner"></p>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-3">
      <div class="card">
        <div class="card-header">
          @php  $image = "images/products/".$auction->product->image;  @endphp
          <img src='<?php echo asset($image);?>' alt="Product_image" class="img-thumbnail">
        </div>
        <div class="card-body">
          <span class="h4 d-block"><b>Product Name :</b>{{ $auction->product->name }}</span>
          <span><b>Product Details:</b>{{ $auction->product->description }}</span>
        </div>
      </div>
    </div>

  </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script type="text/javascript">

// This function fetches the winner of the auction and shows the winner
function getWinner() {
  $.ajax({
    url:"{{route('show.winner')}}",
    type:"GET",
    data: {
      aid: $("input[name=auction]").val(),
    },
    success:function(data)
    {
      $('#winner').html(data);
    },
    error: function (request, status, error) {
      // alert(request.responseText);
    },
  });
}


// After the bidding time is over this inserts the bidder that wins in the DB
function winner() {
  $.ajax({
    url: "{{ route('bid.winner') }}",
    type: 'POST',
    data: {
       _token: $('meta[name="csrf-token"]').attr('content'),
       bidPrice: $("input[name=bidPrice]").val(),
       uid: $("input[name=uid]").val(),
       aid: $("input[name=auction]").val()
    },
    beforeSend: function(){
      $('.loader').show();
    },
    complete: function(){
      $('.loader').hide();
    }
  });
}

function loadData()
{
  $.ajax({
    url:"{{route('bid.shownew')}}",
    type:"GET",
    data: {
      aid: $("input[name=auction]").val(),
    },
    success:function(data)
    {
      $('#bidprice').html(data);
    },
    error: function (request, status, error) {
      // alert(request.responseText);
    },
  });
}

loadData();

// Set the date we're counting down to
var countDownDate = new Date("<?php echo $auction->bid_start ?>").getTime();
var countDownDate1 = new Date("<?php echo $auction->bid_end ?>").getTime();
// Get today's date and time

// Update the count down every 1 second
var countdowntimer = setInterval(function() {


  var now = new Date().getTime();
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
  var distanceEnd = countDownDate1 - now;

  // If the count down is finished, write some text
  if (distance > 0) {
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("demo").innerHTML = "Starts after : <br>" + days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";
    document.getElementById('btn').disabled = true;
    $('.btn').addClass("no-drop");
    $("input[name=bidPrice]").addClass("no-drop");
    $("input[name=bidPrice]").attr("disabled", "disabled");
  } else {
    if (distanceEnd > 0) {
      loadData();

      var daysEnd = Math.floor(distanceEnd / (1000 * 60 * 60 * 24));
      var hoursEnd = Math.floor((distanceEnd % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutesEnd = Math.floor((distanceEnd % (1000 * 60 * 60)) / (1000 * 60));
      var secondsEnd = Math.floor((distanceEnd % (1000 * 60)) / 1000);

      document.getElementById("demo").innerHTML = "Ends in : <br>" + daysEnd + "d " + hoursEnd + "h "
      + minutesEnd + "m " + secondsEnd + "s ";
      document.getElementById('btn').disabled = false;
      $('.btn').removeClass("no-drop");
      $("input[name=bidPrice]").removeClass("no-drop");
      $("input[name=bidPrice]").removeAttr("disabled");
    } else {
      clearInterval(countdowntimer);
      $('.contents').hide();
      $('.winner').show();
      winner();
      getWinner();
      AIZ.plugins.notify('primary','Bidding has ended!');
      document.getElementById('btn').disabled = true;
      $('.btn').addClass("no-drop");
      document.getElementById("demo").innerHTML = "EXPIRED";
    }
  }


}, 1000);


// This function loads the latest bidder and the bidded price

// Onclick submit button...
$(".btnsub").on('click', function(e) {
  e.preventDefault();
  // Time check of expiration and starting of the Bidding
  var now = new Date().getTime();
  var distance = countDownDate - now;
  var distanceEnd = countDownDate1 - now;

  if (distance > 0 ) {
    AIZ.plugins.notify('primary','The bidding has not started yet!!');
    return;
  } else {
    if (distanceEnd < 0) {
      AIZ.plugins.notify('primary','The bidding has ended!!');
      return;
    }
  }

  $.ajax({
    url: "{{ route('bid.new') }}",
    type: 'POST',
    data: {
       _token: $('meta[name="csrf-token"]').attr('content'),
       bidPrice: $("input[name=bidPrice]").val(),
       uid: $("input[name=uid]").val(),
       aid: $("input[name=auction]").val()
    },
    success: function(result){
        result = JSON.parse(result);
        if(result.hasOwnProperty('error')) {
          AIZ.plugins.notify('danger', result.error);
        } else
          AIZ.plugins.notify('success','Your bid has been added!');
    },
    error: function (request, status, error) {
      var errorResponse = JSON.parse(request.responseText);
      AIZ.plugins.notify('danger',errorResponse.errors.bidPrice);
    },
    beforeSend: function(){
      // $('.loader').show();
    },
    complete: function(){
      $('.loader').hide();
    }
  });
});
</script>
@endsection
