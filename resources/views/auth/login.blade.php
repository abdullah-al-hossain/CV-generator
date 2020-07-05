@extends('layouts.app')

@section('content')
<div class="py-4 py-lg-5">
		    <div class="container">
		        <div class="row">
		            <div class="col-xxl-4 col-xl-5 col-md-7 mx-auto">
		                <div class="card">
		                    <div class="card-body">

		                        <div class="mb-5 text-center">
		                            <h1 class="h3 text-primary mb-0">Welcome back</h1>
		                            <p>Login to manage your account.</p>
		                        </div>

		                        <form class="" method="POST" action="{{ route('login') }}">
                                @csrf
		                            <div class="form-group">
		                                <label class="form-label" for="email">{{ __('E-Mail Address') }}</label>
		                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
		                            </div>

		                            <div class="form-group">
		                                <label class="form-label" for="password">
		                                    <span class="d-flex justify-content-between align-items-center">
		                                        Password
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
		                                    </span>
		                                </label>
		                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
		                            </div>

		                            <div class="mb-3 text-right">
                                    @if (Route::has('password.request'))
                                        <a class="link-muted text-capitalize font-weight-normal" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
		                            </div>

		                            <div class="mb-5">
		                                <button type="submit" class="btn btn-block btn-primary">Login to your Account</button>
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
		                                <p class="text-muted mb-0">Don&#039;t have an account?</p>
		                                <a href="{{ route('register') }}">Create an account</a>
		                            </div>

		                        </form>
		                    </div>
		                </div>

		            </div>
		        </div>
		    </div>
		</div>
@endsection
