@extends('layouts.app')


<meta name="csrf_token" content="{{ csrf_token() }}" />
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-8 offset-lg-2">
      <div class="card">
        <div class="card-header">
          <span class="h5">{{ $auction->product->product_name }}</span>
        </div>
        <div class="card-body">
          <h4>Initial price was <span>{{ $auction->product_init_price }}</span></h4>
          <h4>Last bidded price
              <span id="bidprice">
                @if($bidded != null)
                  {{ $bidded->latest()->first()->bidding_price }}
                  By {{ $bidded->latest()->first()->user->name }}
                @else
                  No Bid Made
                @endif

            </span>
          </h4>
          <form action="{{ route('bid.new') }}" method="post">
            @csrf
            <div class="form-group">
              <label>
                Enter a Bidding price
                <input type="text" name="bidPrice" class="form-control">
              </label>
              <input type="hidden" name="auction" value="{{ $auction->id }}">
              <input type="hidden" name="uid" value="{{ Auth::user()->id }}">

              <button type="submit" class="btn btn-md btn-primary btnsub">Bid!</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

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
    beforeSend: function(){
      $('.loader').show();
    },
    complete: function(){
      $('.loader').hide();
    }
  });
}

loadData();
var id = setInterval(function() {
  loadData();
}, 3000); // 30 seconds


$(".btnsub").on('click', function(e) {
  e.preventDefault();

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
        $('#bidprice').html(result);
    }
  });
});
</script>
@endsection
