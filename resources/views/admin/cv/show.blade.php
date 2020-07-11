<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Download Pdf</title>
    <link rel="stylesheet" href="{{ asset('assets/css/vendors.css') }}">
    <style media="screen">
    #accordion .card-header {
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

    .bg-black {
      background: #000;
    }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12">
          @if (session('status_cv_exists'))
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {!! session('status_cv_exists') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @elseif (session('status'))
          <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {!! session('status') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif

          <div class="card">
            <div class="card-header">
              <div class="row w-100">
                <div class="col-md-4">
                  <img src="{{ asset('/images/'.$userPersonalInfo->image) }}" alt="CV image" style="height: 200px; width: 200px;" class="rounded-circle">
                </div>
                <div class="col-md-8" style="margin: auto 0px;">
                  <span style="font-size: 30px;"><strong>Name: </strong>{{ $userPersonalInfo->name }}</span>
                  <p class="mb-0"><strong>Address: </strong>{{ $userPersonalInfo->address }}</p>
                  <p class="mb-0"><strong>Email: </strong>{{ $userPersonalInfo->email }}</p>
                  <p class="mb-0"><strong>Mobile: </strong>{{ $userPersonalInfo->mobile }}</p>
                </div>
              </div>
            </div>

            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="pr-4 pl-4 pt-3 pb-3 text-center bg-black text-white">
                    <b>Career Objective</b>
                  </div>
                </div>
                <div class="col-md-8" style="font-size: 18px;">
                  <p style="text-align: justify;">{{ $userPersonalInfo->carObj }}</p>
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4">
                  <div class="pr-4 pl-4 pt-3 pb-3 text-center bg-black text-white">
                    <b>Projects Accomplished</b>
                  </div>
                </div>
                <div class="col-md-8  ">
                  <div class="">
                    <table class="table table-bordered">
                      <thead style="background: #002060; color: white; font-weight: 500;">
                        <th>Title of the Project</th>
                        <th>Project Details</th>
                      </thead>
                      <tbody>
                        @foreach ($projInfo as $proj)
                        <tr>
                          <td>{{ $proj->name }}</td>
                          <td>{{ $proj->details }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4">
                  <div class="pr-4 pl-4 pt-3 pb-3 text-center bg-black text-white">
                    <b>Educational Background</b>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead style="background: #002060; color: white; font-weight: 500;">
                        <th>Degree</th>
                        <th>GPA/CGPA</th>
                        <th>Institution</th>
                        <th>Batch</th>
                      </thead>
                      <tbody>
                        @foreach ($eduInfo as $edu)
                        <tr>
                          <td style="text-transform: uppercase;">{{ $edu->degree }}</td>
                          <td style="text-transform: uppercase;">{{ $edu->grade }}</td>
                          <td style="text-transform: uppercase;">{{ $edu->institution }}</td>
                          <td style="text-transform: uppercase;">{{ $edu->duration }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4">
                  <div class="pr-4 pl-4 pt-3 pb-3 text-center bg-black text-white">
                    <b>Skilled In</b>
                  </div>
                </div>
                <div class="col-md-8 " style="font-size: 20px;">
                  <div class="">
                    @foreach ($skillInfo as $skill)
                    <p style="margin: 0;"><b><u>{{ $skill->name }} :</u></b> {{ $skill->details }}</p>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
          <a href="{{ route('cv.download', ['uid' => $userPersonalInfo->user_id])}}" class="form-control text-center btn btn-success mt-2">
            <i class="fa fa-download" aria-hidden="true"></i>
            Download this CV . . .
          </a>
        </div>
      </div>
    </div>
  </body>
</html>
