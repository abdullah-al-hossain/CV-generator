@extends('layouts.app')
<style media="screen">
.emsg, .nameerror, .emailerror, .mobileerror, .visaerror, .postalerror, .checkerror{
  color: red;
}
.hidden {
   visibility:hidden!important;
}

.loader {
  display: none;
  position: fixed;
  top: 40%;
  left: 45%;
  border-radius: 50%;
  background: #fff;
}

</style>

<meta name="csrf_token" content="{{ csrf_token() }}" />
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-8 offset-lg-2">
      <div class="card">
        <div class="card-header">
          <div class="h5 m-0">
            Form validation with jquery
          </div>
        </div>
        <div class="card-body">
          <form action="/" method="POST" id="myForm">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" id="name" class="form-control name">
              <p><span class="nameerror hidden">Please Enter a Valid Name</span></p>
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control email">
              <p><span class="emailerror hidden">Please Enter a Valid email address</span></p>
            </div>

            <div class="form-group">
              <label for="mobile">Phone</label>
              <input type="mobile" name="mobile" id="mobile" class="form-control mobile">
              <p><span class="mobileerror hidden">Please Enter a Valid mobile number</span></p>
            </div>

            <div class="form-group">
              <label for="address">Address</label>
              <input type="address" name="address" id="address" class="form-control address">
            </div>

            <div class="form-group">
              <label for="visa">Card Number</label>
              <input type="visa" name="visa" id="visa" class="form-control visa">
              <p><span class="visaerror hidden">Please Enter a Valid Card number</span></p>
            </div>

            <div class="form-group">
              <label for="postal">Postal/Zip Code</label>
              <input type="postal" name="postal" id="postal" class="form-control postal">
              <p><span class="postalerror hidden">Please Enter a Valid Postal Code</span></p>
            </div>

            <div class="form-group">
              <p><b>Gender</b></p>
              <label class="aiz-radio">
                <input type="radio" name="radio1" class="male gender" value="male" checked> Male
                <span class="aiz-rounded-check"></span>
              </label>

              <label class="aiz-radio ml-5">
                <input type="radio" name="radio1" class="female gender" value="female"> Female
                <span class="aiz-rounded-check"></span>
              </label>

              <label class="aiz-radio ml-5">
                <input type="radio" name="radio1" class="other gender" value="others"> Others
                <span class="aiz-rounded-check"></span>
              </label>
            </div>

            <div class="form-group">
              <p><b>Subject Choice</b></p>
              <label class="aiz-checkbox">
                <input type="checkbox" name="dept[]" class="dept" value="cse"> CSE
                <span class="aiz-square-check"></span>
              </label>
              <label class="aiz-checkbox ml-lg-4">
                <input type="checkbox" name="dept[]" class="dept" value="eee"> EEE
                <span class="aiz-square-check"></span>
              </label>
              <label class="aiz-checkbox ml-lg-4 ml-md-2">
                <input type="checkbox" name="dept[]" class="dept" value="ete"> ETE
                <span class="aiz-square-check"></span>
              </label>
              <label class="aiz-checkbox ml-lg-4 ml-md-2">
                <input type="checkbox" name="dept[]" class="dept" value="pme"> PME
                <span class="aiz-square-check"></span>
              </label>
              <label class="aiz-checkbox ml-lg-4 ml-md-2">
                <input type="checkbox" name="dept[]" class="dept" value="urp"> URP
                <span class="aiz-square-check"></span>
              </label>
              <label class="aiz-checkbox ml-lg-4 ml-md-2">
                <input type="checkbox" name="dept[]" class="dept" value="wre"> WRE
                <span class="aiz-square-check"></span>
              </label>
              <label class="aiz-checkbox ml-lg-4 ml-md-2">
                <input type="checkbox" name="dept[]" class="dept" value="rme"> RME
                <span class="aiz-square-check"></span>
              </label>
              <p><span class="checkerror hidden">Check at least 1 and at most 3 department.</span></p>
            </div>

            <div class="form-group">
              <label>Select grade</label>
              <select class="form-control target">
                <option value="a+">A+</option>
                <option value="a">A</option>
                <option value="a-">A-</option>
                <option value="b+">B+</option>
              </select>
              <small class="form-text text-muted">Select grading.</small>
            </div>
            <div class="alert alert-success offer price" data-price="12000" data-symbol="$">
              You will get 50% discount. You have to pay $6000.
            </div>
            <button href="" class="btn btn-primary btnsub">
              <span>Submit</span>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-8 offset-lg-2">
      <div class="card">
        <div class="card-header">
          <div class="h5 m-0">
            Your application
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Address</th>
                  <th>Card Number</th>
                  <th>Postal/Zip no.</th>
                  <th>Gender</th>
                </tr>
              </thead>
              <tbody id="application">

              </tbody>
              <tfoot>

              </tfoot>
            </table>
          </div>
        </div>
        <div class="loader">
          <img src="/images/abc.gif" alt="" style="width: 150px; height: 150px;">
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){
    var $regexname=/^([a-zA-Z ]{3,20})$/;
    var $regexemail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var $regexmobile= /(^([+]{1}[8]{2}|0088)?(01){1}[3-9]{1}\d{8})$/;
    var $regexvisa=/^4[0-9]{12}(?:[0-9]{3})?$/;
    var $regexpostal=/^\d{4,6}$/;
    var checkbox = 0;
    var price = parseFloat($('.price').data('price'));
    var symbol = $('.price').data('symbol');
    var pay = 6000;

    function validate_name($elem) {
      var bool = false;
      if (!$elem.val().match($regexname)) {
       // there is a mismatch, hence show the error message
          $('.nameerror').removeClass('hidden');
          $('.nameerror').show();
      } else{
         // else, do not display message
         $('.nameerror ').addClass('hidden');
         bool = true;
       }

       return bool;
    }

    function validate_email($elem) {
      var bool = false;
      if (!$elem.val().match($regexemail)) {
       // there is a mismatch, hence show the error message
          $('.emailerror').removeClass('hidden');
          $('.emailerror').show();
      } else{
         // else, do not display message
         $('.emailerror').addClass('hidden');
         bool = true;
       }

       return bool;
    }

    function validate_phone($elem) {
      var bool = false;
      if (!$elem.val().match($regexmobile)) {
       // there is a mismatch, hence show the error message
          $('.mobileerror ').removeClass('hidden');
          $('.mobileerror ').show();
      } else{
         // else, do not display message
         $('.mobileerror ').addClass('hidden');
         bool = true;
       }

       return bool;
    }

    function validate_postal($elem) {
      var bool = false;
      if (!$elem.val().match($regexpostal)) {
       // there is a mismatch, hence show the error message
          $('.postalerror').removeClass('hidden');
          $('.postalerror').show();
      } else{
         // else, do not display message
         $('.postalerror ').addClass('hidden');
         bool = true;
       }

       return bool;
    }

    function validate_visa($elem) {
      var bool = false;
      if (!$elem.val().match($regexvisa)) {
       // there is a mismatch, hence show the error message
          $('.visaerror').removeClass('hidden');
          $('.visaerror').show();
      } else{
         // else, do not display message
         $('.visaerror').addClass('hidden');
         bool = true;
       }

       return bool;
    }

    function validate_check($elem = '') {
      var bool = false;
      if($elem.checked) {
        checkbox++;
      } else {
        if ($elem == '') {

        } else checkbox--;
      }

      if(checkbox > 3 || checkbox < 1) {
        $('.checkerror').removeClass('hidden');
        $('.checkerror').show();
      }  else{
        // else, do not display message
        $('.checkerror ').addClass('hidden');
        bool = true;
      }

      return bool;
    }

    $('.name').on('keypress keydown keyup',function(){
      validate_name($(this));
    });

    $('.email').on('keypress keydown keyup',function(){
      validate_email($(this));
    });

    $('.mobile').on('keypress keydown keyup',function(){
      validate_phone($(this));
    });

    $('.postal').on('keypress keydown keyup',function(){
      validate_postal($(this));
    });

    $('.visa').on('keypress keydown keyup',function(){
      validate_visa($(this));
    });

    $("input:checkbox").change(function() {
      validate_check(this);
    });

  $("select").change(function(){
    var str = '<div class="alert alert-success offer price" data-price="12000" data-symbol="$">Your will get </div>';

    $('.offer').replaceWith(str);
    var selectedGrade = $(this).children("option:selected").val();
    if (selectedGrade == 'a+') {
      pay = price-(price*50)/100;
      $('.offer').append("50% discount . You have to pay "+ symbol + pay + '.');

    } else if (selectedGrade == 'a') {
      pay = price-(price*25)/100;
      $('.offer').append("25% discount . You have to pay "+ symbol + pay + '.');
    } else if (selectedGrade == 'a-') {
      pay = price-(price*10)/100;
      var str = '<div class="alert alert-warning offer price"  data-price="12000" data-symbol="$">Your will get </div>';
      $('.offer').replaceWith(str);
      $('.offer').append("10% discount . You have to pay "+ symbol + pay + '.');
    } else {
      pay = price;
      var str = '<div class="alert alert-danger offer price"  data-price="12000" data-symbol="$">Your will get </div>';
      $('.offer').replaceWith(str);
      $('.offer').append("0% discount . You have to pay "+ symbol + pay + '.');
    }
  });

    function loadData()
  	{
  		$.ajax({
  			url:"{{route('jquery.fetch')}}",
  			type:"GET",
  			success:function(data)
  			{
          var value = JSON.parse(data);
          var html1 = '';
          var html = '';
          if(value != null) {
            html1 = `
              <tr>
                <td>${value.name}</td>
                <td>${value.email}</td>
                <td>${value.phone}</td>
                <td>${value.address}</td>
                <td>${value.card}</td>
                <td>${value.zip}</td>
                <td style='text-transform: uppercase;'>${value.gender}</td>
              </tr>
            `;
          } else {
            html1 = `
              <tr>
                <td>N/A</td>
                <td>N/A</td>
                <td>N/A</td>
                <td>N/A</td>
                <td>N/A</td>
                <td>N/A</td>
                <td>N/A</td>
              </tr>
            `;
          }
  				$('#application').html(html1);
  			},
        error: function (request, status, error) {
          alert(request.responseText);
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

  var gender;
  gender = $('.gender:checked').val();

  $('.gender').on('change', function() {
    gender = $('.gender:checked').val();
  });

  $(".btnsub").on('click', function(e) {
    e.preventDefault();

    var res = validate_name($('.name'));
    res = validate_email($('.email'));
    res = validate_phone($('.mobile'));
    res = validate_visa($('.visa'));
    res = validate_postal($('.postal'));
    //res = validate_check();


    if(res == false){
      return;
    }

    var depts = [];
    $(".dept").each(function() {
      if(this.checked)
        depts.push($(this).val()); // you also had an error here, you should refer current field with this
    });


     $.ajax({
        url: "{{ route('jquery.post') }}",
        type: 'POST',
        dataType: 'json',
        data: {
           _token: $('meta[name="csrf-token"]').attr('content'),
           name: $('.name').val(),
           email: $('.email').val(),
           phone: $('.mobile').val(),
           address: $('.address').val(),
           card: $('.visa').val(),
           zip: $('.postal').val(),
           gender: gender,
           depts: depts,
           price: pay
        },
        success: function(result){
            loadData();
        }
      });
     });


  });

</script>
@endsection
