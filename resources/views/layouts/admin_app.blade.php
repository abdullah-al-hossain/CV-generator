<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Aiz Main Admin Template</title>

	<!-- Favicon -->
	<link name="favicon" type="image/x-icon" href="assets/img/favicon.png" rel="shortcut icon" />

	<!-- google font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- vendors css -->
	<link rel="stylesheet" href=" {{ asset('assets/css/vendors.css') }}">

	<!-- aiz core css -->
	<link rel="stylesheet" href="{{ asset('assets/css/aiz-core.css') }}">

	<script>
    	var AIZ = AIZ || {};
	</script>

</head>
<body>

	<div class="aiz-main-wrapper">

		<div class="aiz-sidebar-wrap">
			<div class="aiz-sidebar left c-scrollbar">
				<div class="aiz-side-nav-logo-wrap">
					<a href="{{ route('admin.index') }}" class="d-block">
						<img src="{{ asset('assets/img/logo-light.png') }}" class="img-fluid">
					</a>
				</div>
				<div class="aiz-side-nav-wrap">
					<ul class="aiz-side-nav-list" data-toggle="aiz-side-menu">

						<li class="aiz-side-nav-item">
							<a href="index.html" class="aiz-side-nav-link">
								<i class="las la-home aiz-side-nav-icon"></i>
								<span class="aiz-side-nav-text">Dashboard</span>
							</a>
						</li>

						<li class="aiz-side-nav-item">
							<a href="javascript:void(0);" class="aiz-side-nav-link">
								<i class="fa fa-eye" aria-hidden="true"></i>
								<span class="aiz-side-nav-text">&nbsp;&nbsp;View</span>
								<span class="aiz-side-nav-arrow"></span>
							</a>
							<ul class="aiz-side-nav-list level-2">
								<li class="aiz-side-nav-item">
									<a href="{{ route('auction.index')}}" class="aiz-side-nav-link">
										<span class="aiz-side-nav-text">Auctions</span>
									</a>
								</li>
								<li class="aiz-side-nav-item">
									<a href="{{ route('product.index')}}" class="aiz-side-nav-link">
										<span class="aiz-side-nav-text">Products</span>
									</a>
								</li>
							</ul>
						</li>

						<li class="aiz-side-nav-item">
							<a href="javascript:void(0);" class="aiz-side-nav-link">
								<i class="las la-tachometer-alt aiz-side-nav-icon"></i>
								<span class="aiz-side-nav-text">Dashboard</span>
							</a>
						</li>

						<li class="aiz-side-nav-item">
							<a href="javascript:void(0);" class="aiz-side-nav-link">
								<i class="las la-tachometer-alt aiz-side-nav-icon"></i>
								<span class="aiz-side-nav-text">Dashboard</span>
							</a>
						</li>

						<li class="aiz-side-nav-item">
							<a href="javascript:void(0);" class="aiz-side-nav-link">
								<i class="las la-tachometer-alt aiz-side-nav-icon"></i>
								<span class="aiz-side-nav-text">Dashboard</span>
							</a>
						</li>

						<li class="aiz-side-nav-item">
							<a href="javascript:void(0);" class="aiz-side-nav-link">
								<i class="las la-tachometer-alt aiz-side-nav-icon"></i>
								<span class="aiz-side-nav-text">Dashboard</span>
							</a>
						</li>

						<li class="aiz-side-nav-item">
							<a href="javascript:void(0);" class="aiz-side-nav-link">
								<i class="las la-tachometer-alt aiz-side-nav-icon"></i>
								<span class="aiz-side-nav-text">Dashboard</span>
							</a>
						</li>

						<li class="aiz-side-nav-item">
							<a href="javascript:void(0);" class="aiz-side-nav-link">
								<i class="las la-tachometer-alt aiz-side-nav-icon"></i>
								<span class="aiz-side-nav-text">Multi level</span>
								<span class="aiz-side-nav-arrow"></span>
							</a>
							<ul class="aiz-side-nav-list level-2">
								<li class="aiz-side-nav-item">
									<a href="javascript:void(0);" class="aiz-side-nav-link">
										<span class="aiz-side-nav-text">Level 2</span>
										<span class="aiz-side-nav-arrow"></span>
									</a>

									<ul class="aiz-side-nav-list level-3">
										<li class="aiz-side-nav-item">
											<a href="javascript:void(0);" class="aiz-side-nav-link">
												<span class="aiz-side-nav-text">Level 3</span>
											</a>
										</li>
										<li class="aiz-side-nav-item">
											<a href="javascript:void(0);" class="aiz-side-nav-link">
												<span class="aiz-side-nav-text">Level 3</span>
											</a>
										</li>
									</ul>
								</li>
								<li class="aiz-side-nav-item">
									<a href="index.html" class="aiz-side-nav-link">
										<span class="aiz-side-nav-text">Level 2</span>
									</a>
								</li>
								<li class="aiz-side-nav-item">
									<a href="javascript:void(0);" class="aiz-side-nav-link">
										<span class="aiz-side-nav-text">Level 2</span>
									</a>
								</li>
							</ul>
						</li>

					</ul><!-- .aiz-side-nav -->
				</div><!-- .aiz-side-nav-wrap -->
			</div><!-- .aiz-sidebar -->
			<div class="aiz-sidebar-overlay"></div>
		</div><!-- .aiz-sidebar -->

		<div class="aiz-content-wrapper">

			<div class="aiz-topbar px-15px px-lg-25px d-flex align-items-stretch justify-content-between">
				<div class="d-xl-none d-flex">
					<div class="aiz-topbar-nav-toggler d-flex align-items-center justify-content-start mr-2 mr-md-3" data-toggle="aiz-mobile-nav">
						<button class="aiz-mobile-toggler">
							<span></span>
						</button>
					</div>
					<div class="aiz-topbar-logo-wrap d-flex align-items-center justify-content-start">
						<a href="index.html" class="d-block">
							<img src=" {{ asset('assets/img/logo.png') }}" class="img-fluid" height="45">
						</a>
					</div>
				</div>
				<div class="d-flex justify-content-between align-items-stretch flex-grow-xl-1">
					<div class="d-none d-md-flex justify-content-around align-items-center align-items-stretch">
						<div class="aiz-topbar-item">
							<div class="d-flex align-items-center">
		                        <a class="btn btn-light" href="{{ route('home') }}" target="_blank">
		                        	<i class="las la-external-link-square-alt"></i>
		                        	<span class="d-none d-xl-inline-block">Browse Website</span>
		                        </a>
	                        </div>
						</div><!-- .aiz-topbar-item -->
						<div class="aiz-topbar-item ml-2">
							<div class="align-items-stretch d-flex dropdown">
		                        <a class="dropdown-toggle no-arrow" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
		                        	<span class="btn btn-light">
			                        	<i class="las la-plus"></i>
			                        	<span class="d-none d-xl-inline-block">Add New</span>
		                        	</span>
		                        </a>
		                        <div class="dropdown-menu dropdown-menu-animated dropdown-menu-md">
		                            <a href="{{ route('product.create') }}" class="dropdown-item text-capitalize">
		                                <i class="las la-sign-out-alt"></i>
		                                <span>Add New Product</span>
		                            </a>

																<a href="{{ route('auction.create') }}" class="dropdown-item text-capitalize">
		                                <i class="las la-sign-out-alt"></i>
		                                <span>Add New Auction</span>
		                            </a>
		                        </div>
		                    </div>
						</div><!-- .aiz-topbar-item -->
					</div>
					<div class="d-flex justify-content-around align-items-center align-items-stretch">
						<div class="aiz-topbar-item ml-2">
							<div class="align-items-stretch d-flex dropdown">
		                        <a class="dropdown-toggle no-arrow" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
		                        	<span class="btn btn-light">
			                        	<i class="las la-bell"></i>
			                        </span>
		                        </a>
		                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-xs">
		                            <a href="javascript:void(0);" class="dropdown-item">
		                                <img src="{{ asset('assets/img/flags/en.png') }}" height="11">
		                                <span class="ml-2">English</span>
		                            </a>

		                            <a href="javascript:void(0);" class="dropdown-item">
		                                <img src="{{ asset('assets/img/flags/en.png') }}" height="11">
		                                <span class="ml-2">English</span>
		                            </a>
		                        </div>
		                    </div>
						</div><!-- .aiz-topbar-item -->
						<div class="aiz-topbar-item ml-2">
							<div class="align-items-stretch d-flex dropdown">
		                        <a class="dropdown-toggle no-arrow" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
		                        	<span class="btn btn-light">
		                        		<img src="{{ asset('assets/img/flags/en.png') }}" height="11">
		                        	</span>
		                        </a>
		                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-xs">
		                            <a href="javascript:void(0);" class="dropdown-item">
		                                <img src="{{ asset('assets/img/flags/en.png') }}" height="11">
		                                <span class="ml-2">English</span>
		                            </a>

		                            <a href="javascript:void(0);" class="dropdown-item">
		                                <img src="{{ asset('assets/img/flags/en.png') }}" height="11">
		                                <span class="ml-2">English</span>
		                            </a>
		                        </div>
		                    </div>
						</div><!-- .aiz-topbar-item -->
						<div class="aiz-topbar-item ml-2">
							<div class="align-items-stretch d-flex dropdown">
		                        <a class="dropdown-toggle no-arrow text-dark" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
		                        	<span class="d-flex align-items-center">
			                            <span class="mr-md-2">
			                                <img src=" {{ asset('assets/img/avatar-place.png') }}" alt="user-image" class="rounded-circle img-fluid" height="36" width="36">
			                            </span>
			                            <span class="d-none d-md-block">
			                                <span class="d-block fw-500">{{ Auth::user()->name }}</span>
			                                <span class="d-block small opacity-60">Admin</span>
			                            </span>
		                            </span>
		                        </a>
		                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-md">
		                            <a href="#" class="dropdown-item">
		                                <i class="las la-user-circle"></i>
		                                <span>My Account</span>
		                            </a>

		                            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
		                                <i class="las la-sign-out-alt"></i>
		                                <span>Logout</span>
		                            </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
		                        </div>
		                    </div>
						</div><!-- .aiz-topbar-item -->
					</div>
				</div>
			</div><!-- .aiz-topbar -->

			<div class="aiz-main-content">
				<div class="px-15px px-lg-25px">
          @yield('content')
				</div>
			</div><!-- .aiz-main-content -->

		</div><!-- .aiz-content-wrapper -->

	</div><!-- .aiz-main-wrapper -->

	<script src="{{ asset('assets/js/vendors.js') }}" ></script>
	<script src="{{ asset('assets/js/aiz-core.js') }}" ></script>
</body>
</html>
