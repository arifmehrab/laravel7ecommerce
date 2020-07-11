@extends('layouts.app')
@push('css')
<style type="text/css">
	.error{
		color: red;
		font-weight: bold;
	}
</style>
@endpush
@section('content')
<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->			
<div class="col-md-6 col-sm-6 sign-in">
	<h4 class="">Sign in</h4>
    <p class="">If You Have Already Account Please Login</p>
    <br>
	<div class="social-sign-in outer-top-xs">
		<a href="#" class="btn btn-primary btn-block"> Sign In with Facebook</a>
		<a href="{{ url('/login/github') }}" class="btn btn-dark btn-block"> Sign In with Github</a>
    </div>
    <br>
    <form method="POST" action="{{ route('login') }}">
        @csrf
		<div class="form-group">
		    <label class="info-title" for="email">Email Address <span>*</span></label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
		</div>
	  	<div class="form-group">
		    <label class="info-title" for="password">Password <span>*</span></label>
		    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <br>
		<div class="radio outer-xs">
		  	<label class="ml-2">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> 
                Remember Me
		  	</label>
		  	@if (Route::has('password.request'))
             <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
             </a>
             @endif
        </div>
        <br>
        <button type="submit" class="btn btn-primary">
            {{ __('Login') }}
        </button>
	</form>					
</div>
<!-- Sign-in -->

<!-- create a new account -->
<div class="col-md-6 col-sm-6 create-new-account">
	<h4 class="checkout-subtitle">Sign Up</h4>
	<p class="text title-tag-line">Create your new account.</p>
	<form method="POST" action="{{ route('register') }}" id="loginform">
		@csrf
		<div class="form-group">
	    	<label class="info-title" for="name">Your Name<span>*</span></label>
	    	<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name">

                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
	  	</div>
        <div class="form-group">
		    <label class="info-title" for="email">Your Email Address <span>*</span></label>
			<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

			@error('email')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
        <div class="form-group">
		    <label class="info-title" for="phone_number">Phone Number <span>*</span></label>
			<input id="phone_number" type="number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" autocomplete="phone_number">

			@error('phone_number')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
        <div class="form-group">
		    <label class="info-title" for="password">Password <span>*</span></label>
			<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

			@error('password')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
         <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
			<input id="confirm_password" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
		</div>
		<button type="submit" class="btn btn-info">
			{{ __('Sign Up') }}
		</button>
	</form>
	
	
</div>	
<!-- create a new account -->			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
	</div><!-- /.container -->
</div><!-- /.body-content -->
<br><br><br>
@endsection
@push('js')
	<script type="text/javascript" src="{{ asset('Frontend/validation/jquery.validate.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('Frontend/validation/form-validation-script.js') }}"></script>
@endpush