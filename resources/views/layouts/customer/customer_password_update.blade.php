@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <form method="POST" action="{{ route('customer.password.update') }}">
                    @csrf
                    <div class="form-group">
                        <label class="info-title" for="current_password">Enter Your Current Password <span>*</span></label>
                        <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autocomplete="new-password">
            
                        @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="password">Enter New Password <span>*</span></label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                     <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Again New Password <span>*</span></label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <button type="submit" class="btn btn-info">
                        {{ __('Update') }}
                    </button>
                </form>
            </div>
        </div><!-- end colum -->
        <!-- col md 4 --->
        <div class="col-md-4">
            <div class="card text-center">
                <img src="{{ asset('Frontend/images/profile/'.Auth::user()->profile) }}" alt="John" style="width: 100%; height:50%;">
                <h2>{{ Auth::user()->name }}</h2>
                <p class="title">{{ Auth::user()->phone_number }}</p>
                <p>{{ Auth::user()->email }}</p>
                <a class="btn btn-primary btn-block" href="{{ route('customer.profile.edit') }}">Update Profile</i></a>
                <a class="btn btn-info btn-block" href="{{ route('customer.password.change') }}">Password Update</i></a>
                <a class="btn btn-success btn-block" href="#">Wishlist</i></a>
                <a class="btn btn-danger btn-block" href="{{ route('customer.loguot') }}">Logout</a> 
              </div>
        </div>
    </div><!-- end row -->
</div><!-- end container -->
<br><br><br>
@endsection
