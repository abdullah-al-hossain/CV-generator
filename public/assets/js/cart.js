var cartPrice = 0;

var countt = $('.remove').length;

$(".itemss").html(countt);
var total = 0;
$( document ).ready(function() {
  $(".cart-toggler").on('click', function() {
    $('.cart-sidebar').removeClass("collapse-sidebar-closed");
  });

  $(".close-cart").on('click', function() {
    $('.cart-sidebar').addClass("collapse-sidebar-closed");
  });
});

$(document).on('click', '.remove', function(){
  $(this).closest("div").remove();
  var price = $(this).data("price");
  total -= price;
  $(".checkout").html(total);
  var countt = $('.remove').length;

  $(".itemss").html(countt);

  if (countt <= 0) {
    $(".cart-empty").removeClass('d-none');
    $(".checkout").html('0');
  }

});

$(document).on('click', '.add', function(){
  var name = $(this).data("name");
  var image = $(this).data("image");
  var price = $(this).data("price");
  total += price;

  $(".checkout").html(total);
  var html = `
  <div class="cart-item d-flex align-items-center">
  <div class="flex-shrink-0 mr-3">
  <img src="${image}" class="mw-100" width="50">
  </div>
  <div class="flex-grow-1 text-truncate-2">
  <div class="fs-13">${name}</div>
  </div>
  <div class="mx-2 c-base-1">
  1x
  ${price}৳
  </div>
  <button class="btn remove" data-price="${price}"><i class="la la-trash"></i></button>
  </div>
  `;

  $(".cartt").append(html);

  var countt = $('.remove').length;
  $(".itemss").html(countt);

  if (countt <= 0) {
    $(".cart-empty").removeClass('d-none');
  } else {
    $(".cart-empty").addClass('d-none');
  }

});

$(document).mouseup(function(e)
{
  var container = $(".cart-sidebar");

  // if the target of the click isn't the container nor a descendant of the container
  console.log(container.has(e.target).length);
  if (!container.is(e.target) && container.has(e.target).length === 0)
  {
    container.addClass("collapse-sidebar-closed");
  }
});
