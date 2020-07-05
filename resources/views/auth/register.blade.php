@extends('layouts.app')

@section('content')

<div class="py-4 py-lg-5">
	<div class="container">
		<div class="row">
			<div class="col-xxl-4 col-xl-5 col-md-7 mx-auto">
				<div class="card">
					<div class="card-body">

						<div class="mb-5 text-center">
							<h1 class="h3 text-primary mb-0">Join with us</h1>
							<p>Fill out the form to get started.</p>
						</div>
						<form method="POST" action="{{ route('register') }}">
							@csrf
							<div class="form-group">
								<label class="form-label" for="name">Full Name</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
							</div>

							<div class="form-group">
								<label class="form-label" for="email">Email address</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
							</div>

							<div class="form-group">
								<label class="form-label" for="password">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
								<small>Minimun 8 characters</small>
							</div>

							<div class="form-group">
								<label class="form-label" for="password-confirm">Confirm password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
								<small>Minimun 8 characters</small>
							</div>

							<!-- <div class="form-group mb-4">
								<div class="aiz-radio-inline">
									<label class="aiz-radio">
										<input type="radio" name="user_types[]" checked="checked"> As A Freelancer
										<span class="aiz-rounded-check"></span>
									</label>
									<label class="aiz-radio">
										<input type="radio" name="user_types[]"> As A Client
										<span class="aiz-rounded-check"></span>
									</label>
								</div>
							</div> -->

							<div class="form-group">
								<div class="aiz-checkbox-list">
									<label class="aiz-checkbox">
										<input type="checkbox" name="condition" required>
											<span class="fs-13">By signing up you agree to our terms and conditions.</span>
										<span class="aiz-square-check"></span>
									</label>
								</div>
							</div>


							<div class="mb-5">
                  <button type="submit" class="btn btn-block btn-primary">Join With Us</button>
              </div>

              <div class="mb-5">
                  <div class="separator mb-3">
                      <span class="bg-white px-3">Or Login With</span>
                  </div>

                  <ul class="list-inline social colored text-center">
                      <li class="list-inline-item">
                          <a href="{{url('/facebook/redirect')}}" class="facebook" title="Facebook"><i class="lab la-facebook-f"></i></a>
                      </li>
                      <li class="list-inline-item">
                          <a href="" class="twitter" title="Twitter"><i class="lab la-twitter"></i></a>
                      </li>
                      <li class="list-inline-item">
                          <a href="{{ url('auth/google') }}" class="google" title="Google"><i class="lab la-google"></i></a>
                      </li>
                      <li class="list-inline-item">
                          <a href="{{ url('auth/linkedin') }}" class="linkedin" title="Linkedin"><i class="lab la-linkedin-in"></i></a>
                      </li>
                  </ul>
              </div>

              <div class="text-center">
                  <p class="text-muted mb-0">Already have an account?</p>
                  <a href="{{ route('login') }}">Login to your account</a>
              </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
