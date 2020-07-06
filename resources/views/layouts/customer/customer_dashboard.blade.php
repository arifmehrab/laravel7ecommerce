@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    You are logged in!
                </div>
            </div>
        </div>
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
@endsection
