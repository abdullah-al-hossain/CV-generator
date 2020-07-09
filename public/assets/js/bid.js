// This function fetches the winner of the auction and shows the winner
function getWinner() {
  $.ajax({
    url: $(".important-urls").data("getwinner"),
    type:"GET",
    timeout: 3000,
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
function setWinner() {
  $.ajax({
    url: $(".important-urls").data("setwinner"),
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

// This function load the latest bidder from  DB
function loadData() {
  $.ajax({
    url: $(".important-urls").data("loadbidder"),
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
var countDownDate = new Date($(".bidding-info").data('bidstart')).getTime();
var countDownDate1 = new Date($(".bidding-info").data('bidend')).getTime();
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

      document.getElementById("demo").innerHTML = "<span class='bell fa fa-bell'></span> Ends in : <br>" + daysEnd + "d " + hoursEnd + "h "
      + minutesEnd + "m " + secondsEnd + "s ";
      document.getElementById('btn').disabled = false;
      $('.btn').removeClass("no-drop");
      $("input[name=bidPrice]").removeClass("no-drop");
      $("input[name=bidPrice]").removeAttr("disabled");
    } else {
      clearInterval(countdowntimer);
      $('.contents').hide();
      $('.winner').show();
      setWinner();
      // var delay = setTimeout(function() {
      //   clearInterval(delay);
      // }, 2000);
      getWinner();
      AIZ.plugins.notify('primary','Bidding has ended!');
      document.getElementById('btn').disabled = true;
      $('.btn').addClass("no-drop");
      document.getElementById("demo").innerHTML = "EXPIRED";
    }
  }


}, 1000);



// Onclick posts the bidding price and does proper validation on bidding price ...
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
    url: $(".important-urls").data("setnewbidder"),
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
      AIZ.plugins.notify('danger', errorResponse.errors.bidPrice);
    },
    beforeSend: function(){
      $('.loader').show();
    },
    complete: function(){
      $('.loader').hide();
    }
  });
});
