<!doctype html>
<html lang="en">
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="app-url" content="{{ env('APP_URL')}}">

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title')</title>

	<!-- Favicon -->
  <link rel="shortcut icon" href="{{ URL::to('/images/icon.png') }}" type="image/x-icon">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link name="favicon" type="image/x-icon" href="assets/img/favicon.png" rel="shortcut icon" />

	<!-- google font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
  <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@300&family=IBM+Plex+Sans&family=Notable&display=swap" rel="stylesheet">

	<!-- vendors css -->
	<link rel="stylesheet" href="{{ URL::to('assets/css/vendors.css') }}">

	<!-- aiz core css -->
	<link rel="stylesheet" href="assets/css/aiz-core.css">


  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

	<script>
    	var AIZ = AIZ || {};
	</script>

  <style media="screen">
    body {
      background: #D3CCE3;
      background: -webkit-linear-gradient(to right, #E9E4F0, #D3CCE3);
      background: linear-gradient(to right, #E9E4F0, #D3CCE3);
    }

    .card .card-body {

    }
  </style>
</head>

<body>
  <div class="aiz-main-wrapper">
    <div id="app" style="">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   <img src="{{ URL::to('/images/ico.png') }}" alt="icon" style="height:35px; width: auto;" class="pr-1"><span class="pl-2" style="border-left: 1px solid #000;">freeCV@Gen</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
  </div>
</body>
</html>
