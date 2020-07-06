<style media="screen">
  .card-header {
    background: #ad5389;
    background: -webkit-linear-gradient(to right, #3c1053, #ad5389);
    background: linear-gradient(to right, #3c1053, #ad5389);
    color: #fff;
  }

  .card .collapse {
    background: #3C3B3F;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #605C3C, #3C3B3F);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #605C3C, #3C3B3F); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    color: #fff!important;
  }

  .card .collapse thead {
    color: #fff;
  }
</style>
@extends('layouts.app')
@section('title')
  Edit CV!
@endsection
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

  @if(session('hack'))
      <div class="alert alert-danger fade show">
          <ul style="margin: 0;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
              {!! session('hack') !!}
          </ul>
      </div>
  @endif
  <div class="row">
    <div class="col-lg-8 offset-lg-2">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0 h6"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit CV . . .</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('cv.update', [ 'cv' => Auth::user()->id ]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="uid" value="{{ auth()->user()->id }}">
            <div class="form-group">
              <label>Full Name</label>
              <input type="text" class="form-control" name="name" placeholder="John Doe" value="{{ $userPersonalInfo->name }}">
            </div>
            <div class="form-group">
              <label>Address</label>
              <input type="text" class="form-control" name="address" placeholder="Enter Address" value="{{ $userPersonalInfo->address }}">
            </div>
            <div class="form-group">
              <label>Email address</label>
              <input type="email" class="form-control" name="email" placeholder="email@example.com" value="{{ $userPersonalInfo->email }}">
            </div>
            <div class="form-group">
              <label>Mobile</label>
              <input type="text" class="form-control"name="mobile" placeholder="+88018XXXXXXXX" value="{{ $userPersonalInfo->mobile }}">
            </div>
            <div class="form-group">
              <label>Image select</label>
              <div class="custom-file custom-file-sm">
                <label class="custom-file-label">
                  <input type="file" onchange="showImage.call(this)" class="custom-file-input" name="image">
                  <input type="hidden" name="existingImage" value="{{ $userPersonalInfo->image }}">
                  <span class="custom-file-name">Choose file</span>
                </label>
              </div>
              <img src="{{ asset('/images/'.$userPersonalInfo->image) }}" class="pt-2 rounded-circle mx-auto my-3" style="display: block; height:150px; width: 150px;"  id="image">
            </div>

            <div class="form-group">
              <label>Career objective</label>
              <textarea name="carObj" class="form-control resize-off" rows="3">{{ $userPersonalInfo->carObj }}</textarea>
            </div>
            <div class="form-group">
              <label>Enter project details</label>
              <table class="table table-bordered table-striped" id="user_table">
                <thead>
                  <tr>
                    <th width="30%">Name of Project</th>
                    <th width="50%">Details</th>
                    <th width="25%">Action</th>
                  </tr>
                </thead>
                <tbody id="projects">
                  @foreach ($projInfo as $proj)
                  <tr>
                    <td><input type="text" name="projname[]" class="form-control" value="{{ $proj->name }} "/></td>
                    <td><textarea name="projdetails[]" class="form-control" style="resize:none;">{{ $proj->details }}</textarea></td>
                    <td><button type="button" name="remove" id="" class="btn btn-danger removeProj"><i class="fa fa-trash" aria-hidden="true"></i> Remove </button></td>
                  </tr>
                  @endforeach
                </tbody>
                <tfooter>
                  <tr>
                    <td colspan="3"><button type="button" name="add" id="addProj" class="btn btn-success form-control"><i class="fa fa-plus" aria-hidden="true"></i> Add Field</button></td>
                  </tr>
                </tfooter>
              </table>
            </div>
            <div class="form-group">
              <label>Education details</label>
              <table class="table table-bordered table-striped" id="user_table">
                <thead>
                 <tr>
                     <th width="15%">Name of Degree</th>
                     <th width="40%">Institution</th>
                     <th width="5%">GPA/CGPA</th>
                     <th width="18%">Time Period</th>
                     <th width="22%">Action</th>
                 </tr>
                </thead>
                <tbody id="educations">
                    @foreach ($eduInfo as $edu)
                    <tr>
                      <td><input type="text" name="eduName[]" class="form-control" value="{{ $edu->degree }} "/></td>
                      <td><input type="text" name="instName[]" class="form-control" value="{{ $edu->institution }} "/></td>
                      <td><input type="text" name="grade[]" class="form-control" value="{{ $edu->grade }} "/></td>
                      <td><input type="text" name="duration[]" class="form-control" value="{{ $edu->duration }} "/></td>
                      <td><button type="button" name="remove" id="" class="btn btn-danger removeEdu"><i class="fa fa-trash" aria-hidden="true"></i> Remove </button></td>
                    </tr>
                    @endforeach
                </tbody>
                <tfooter>
                  <tr>
                    <td colspan="5"><button type="button" name="add" id="addEdu" class="btn btn-success form-control"><i class="fa fa-plus" aria-hidden="true"></i> Add Field</button></td>
                  </tr>
                </tfooter>
              </table>
            </div>
            <div class="form-group">
              <label>Skilled In</label>
              <table class="table table-bordered table-striped" id="user_table">
                <thead>
                  <tr>
                    <th width="30%">Skilled In</th>
                    <th width="50%">Details</th>
                    <th width="25%">Action</th>
                  </tr>
                </thead>
                <tbody id="skills">
                  @foreach ($skillInfo as $skill)
                  <tr>
                    <td><input type="text" name="skillName[]" class="form-control" value="{{ $skill->name }} "/></td>
                    <td><textarea name="skillDetails[]" class="form-control" style="resize:none;">{{ $skill->details }}</textarea></td>
                    <td><button type="button" name="remove" id="" class="btn btn-danger removeSkill"><i class="fa fa-trash" aria-hidden="true"></i> Remove</button></td>
                  </tr>
                  @endforeach
                </tbody>
                <tfooter>
                  <tr>
                    <td colspan="3"><button type="button" name="add" id="addSkill" class="btn btn-success form-control"><i class="fa fa-plus" aria-hidden="true"></i> Add Field</button></td>
                  </tr>
                </tfooter>
              </table>
            </div>
            <div class="col-md-12 text-md-right">
              <button type="submit" class="btn btn-warning form-control">
                <i class="fa fa-refresh" aria-hidden="true"></i>
                <span>Update CV!</span>
              </button>
              <button type="button" class="btn btn-md btn-primary form-control mt-1" data-toggle="modal" data-target="#exampleModalLong">
                <i class="fa fa-eye" aria-hidden="true"></i>
                Preview you CV . . .
              </button>
              <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      ...
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script type="text/javascript">


$(document).ready(function(){

  var countProj = <?php echo count($projInfo) ?>;
  var countEdu = <?php echo count($eduInfo) ?>;
  var countSkill = <?php echo count($skillInfo) ?>;

// ** Starting of Projects Dynamic input generation code **
  function dynamic_field_proj(number)
  {
  var html = '<tr>';
        html += '<td><input type="text" name="projname[]" class="form-control" /></td>';
        html += '<td><textarea name="projdetails[]" class="form-control" style="resize: none;"></textarea></td>';
        if(number > 1)
        {
            html += '<td><button type="button" name="remove" id="" class="btn btn-danger removeProj"><i class="fa fa-trash" aria-hidden="true"></i> Remove </button></td></tr>';
            $('#projects').append(html);
        }
        else
        {
            html += '<td><button type="button" name="add" id="addProj" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add </button></td></tr>';
            $('#projects').html(html);
        }
  }

  $(document).on('click', '#addProj', function(){
    countProj++;
    dynamic_field_proj(countProj);
  });

  $(document).on('click', '.removeProj', function(){
    countProj--;
    $(this).closest("tr").remove();
  });

// ** End of Projects Dynamic input generation code **

// ****************************


// ** Start of education Dynamic input generation code **
  function dynamic_field_edu(number)
  {
        var htmlEdu = '<tr>';

        htmlEdu += '<td><input type="text" name="eduName[]" class="form-control" /></td>';
        htmlEdu += '<td><input type="text" name="instName[]" class="form-control" /></td>';
        htmlEdu += '<td><input type="text" name="grade[]" class="form-control" /></td>';
        htmlEdu += '<td><input type="text" name="duration[]" class="form-control" /></td>';
        if(number > 1)
        {
            htmlEdu += '<td><button type="button" name="remove" id="" class="btn btn-danger removeEdu"><i class="fa fa-trash" aria-hidden="true"></i> Remove </button></td></tr>';
            $('#educations').append(htmlEdu);
        }
        else
        {
            htmlEdu += '<td><button type="button" name="add" id="addEdu" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add </button></td></tr>';
            $('#educations').html(htmlEdu);
        }
  }

  $(document).on('click', '#addEdu', function(){
    countEdu++;
    dynamic_field_edu(countEdu);
  });

  $(document).on('click', '.removeEdu', function(){
    countEdu--;
    $(this).closest("tr").remove();
  });
// ** End of education Dynamic input generation code **


// ** Start of skills Dynamic input generation code **
  function dynamic_field_skill(number)
  {
  var htmlSkills = '<tr>';
        htmlSkills += '<td><input type="text" name="skillName[]" class="form-control" /></td>';
        htmlSkills += '<td><textarea name="skillDetails[]" class="form-control" style="resize: none;"></textarea></td>';
        if(number > 1)
        {
            htmlSkills += '<td><button type="button" name="remove" id="" class="btn btn-danger removeSkill"><i class="fa fa-trash" aria-hidden="true"></i> Remove </button></td></tr>';
            $('#skills').append(htmlSkills);
        }
        else
        {
            htmlSkills += '<td><button type="button" name="add" id="addSkill" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>Add </button></td></tr>';
            $('#skills').html(htmlSkills);
        }
  }

  $(document).on('click', '#addSkill', function(){
    countSkill++;
    dynamic_field_skill(countSkill);
  });

  $(document).on('click', '.removeSkill', function(){
    countSkill--;
    $(this).closest("tr").remove();
  });
// ** End of skills Dynamic input generation code **
});

function showImage()
{
  if (this.files && this.files[0]) {
    var obj = new FileReader();
    obj.onload = function(data) {
      var image = document.getElementById("image");
      // alert(data.target.result);
      image.src = data.target.result;
    }

    obj.readAsDataURL(this.files[0]);
  }
}
</script>
@endsection
