<!doctype html>
<html lang="en">
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="app-url" content="{{ env('APP_URL')}}">

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Aiz Main Admin Template</title>

	<!-- Favicon -->
	<link name="favicon" type="image/x-icon" href="assets/img/favicon.png" rel="shortcut icon" />

	<!-- google font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

	<!-- vendors css -->
	<link rel="stylesheet" href="assets/css/vendors.css">

	<!-- aiz core css -->
	<link rel="stylesheet" href="assets/css/aiz-core.css">


	<script>
    	var AIZ = AIZ || {};
	</script>

</head>
<body>

	<div class="aiz-main-wrapper d-flex">

		<div class="row no-gutters flex-grow-1">
			<div class="col-lg-6 col-xl-7">
				<div class="h-100 img-cover img-center d-flex flex-column justify-content-between p-5 text-white" style="background-image: url('assets/img/bg.jpg')">
					<div>
						<img src="assets/img/logo-light.png">
					</div>
					<div>
						<h1 class="my-4">Welcome to Aiz</h1>
					</div>
					<div>
						<p>&copy; Active It Zone 2020</p>
					</div>
				</div>
			</div>
			<div class="align-items-center col-lg-6 col-xl-5 d-flex">
				<div class="flex-grow-1 p-lg-5 p-3 pt-4">
					<div class="aiz-auth-form card mx-auto">
						<div class="justify-content-center card-header">
							<h3 class="h5 mb-0 text-dark">Login to your panel</h3>
						</div>
						<div class="card-body pt-4">
							<!--begin::Form-->
							<form action=" {{ route('login') }} " class="needs-validation" method="POST">
                @csrf
								<div class="form-group">
									<input class="form-control form-control-lg" type="email" placeholder="Email" name="email" autocomplete="off" required>
								</div>
								<div class="form-group">
									<input class="form-control form-control-lg" type="password" placeholder="Password" name="password" autocomplete="off" required>
								</div>
                <input type="hidden" name="admin" value="1">
								<!--begin::Action-->
								<div class="d-flex justify-content-between align-items-center">
									<a href="#" class="text-secondary">
										Forgot Password ?
									</a>
									<button type="submit" class="btn btn-primary">Sign In</button>
								</div>
								<!--end::Action-->
							</form>
							<!--end::Form-->
						</div>
					</div>
				</div>
			</div>
		</div>

	</div><!-- .aiz-main-wrapper -->

	<script src="assets/js/vendors.js" ></script>
	<script src="assets/js/aiz-core.js" ></script>
</body>
</html>
