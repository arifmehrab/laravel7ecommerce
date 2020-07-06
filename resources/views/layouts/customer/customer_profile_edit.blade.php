@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <form method="POST" action="{{ route('customer.profile.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Your Name<span>*</span></label>
                        <input id="name" type="text" class="text-dark form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}">
            
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                      </div>
                    <div class="form-group">
                        <label>Your Email Address <span>*</span></label>
                        <input id="email" type="email" class="text-dark form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}">
            
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Phone Number <span>*</span></label>
                        <input id="phone_number" type="number" class="text-dark form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $user->phone_number }}">
            
                        @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Profile <span>*</span></label>
                        <input onchange="readURL(this)" id="profile" type="file" class="text-dark form-control @error('profile') is-invalid @enderror" name="profile">

                        @error('profile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <img id="profile1" width="80" height="80" src="{{ asset('Frontend/images/profile/'.$user->profile) }}" alt="">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-info">
                        {{ __('Update Profile') }}
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
@push('js')
  <!--- Profie Image Render --->
  <script type="text/javascript">
	function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#profile1')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
  </script>
@endpush
