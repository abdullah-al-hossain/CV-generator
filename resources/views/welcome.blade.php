@php
    $uid = Auth::check() ? Auth::user()->id : 0;
    $user_cv = \App\Cv::where('user_id', $uid)->first();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <title>Create your CV for free</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                transition: 100ms linear;
            }

            .userLinks > a {
              outline: none;
            }

            .userLinks > a:hover {
                border-radius: 20px!important;
                border: 1px solid #636b6f !important;
                background: #eef;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .fa-plus {
              -webkit-animation:spin 2s linear infinite;
              -moz-animation:spin 2s linear infinite;
              animation:spin 2s linear infinite;
            }

            @-moz-keyframes spin { 100% { -moz-transform: rotate(360deg); } }
            @-webkit-keyframes spin { 100% { -webkit-transform: rotate(360deg); } }
            @keyframes spin { 100% { -webkit-transform: rotate(360deg); transform:rotate(360deg); } }


        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/') }}">{{ Auth::user()->name }}</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <img src="{{ URL::to('/images/ico.png') }}" alt="" height="60"style="width: auto; padding-right: 10px; border-right: 1px solid #000;"><span style="padding-left: 15px;">freeCV@Gen</span>
                </div>

                <div class="links userLinks">

                  @if($user_cv == null)
                    <a href="{{ route('cv.create') }}" style="border: 1px solid #ccc; border-radius: 3px; font-size: 20px;">
                      <i class="fa fa-plus"></i>
                      Create CV
                      <i class="fa fa-plus"></i>
                    </a>
                  @endif
                  @if(!$user_cv == null)
                  <a href="{{ route('cv.show', ['cv' => $uid]) }}" style="border: 1px solid #ccc; border-radius: 3px;">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                    View CV
                  </a>
                  <a href="{{ route('cv.edit', ['cv' => $uid]) }}" style="padding:0px 30px; border: 1px solid #ccc; border-radius: 3px;">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    Edit CV
                  </a>
                  @endif
                </div>
            </div>
        </div>
        <script type="text/javascript">

          //Example of a callback function

          // function greeting(name) {
          //   alert('Hello ' + name);
          // }
          //
          // function processUserInput(games) {
          //   var name = prompt('Please enter your name.');
          //   games(name);
          // }
          //
          // processUserInput(greeting);
        </script>
    </body>
</html>
