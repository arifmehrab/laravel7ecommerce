@extends('layouts.app')
@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('Frontend/styles/cart_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('Frontend/styles/cart_responsive.css') }}">

@endpush
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7">
           @if($tracking->status == 0)
           <strong>Your Order Is now Pending</strong>
           <div class="progress">
            <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          @elseif($tracking->status == 1)
          <strong>Your Order Is now Accept Payment</strong>
          <div class="progress">
            <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
            <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          @elseif($tracking->status == 2)
          <strong>Your Order Is now Progress Delievery Soon!</strong>
          <div class="progress">
            <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
            <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          @elseif($tracking->status == 3)
          <strong>Your Order Is Shipped!</strong>
          <div class="progress">
            <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
            <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
            <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          @else
          <strong>Your Order is Cancled! Please Contact Soon Our Customer Support!</strong>
          <div class="progress">
            <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
           @endif
        </div><!-- end col 7 -->
        <div class="col-md-5">
            <ul class="list-group">
                <li class="list-group-item active">Order Information</li>
                <li class="list-group-item">Payment Type:- {{ $tracking->payment_type }}</li>
                <li class="list-group-item">Strip Order Id:- {{ $tracking->strip_order_id }}</li>
                <li class="list-group-item">Amount:- ${{ $tracking->total }}</li>
                <li class="list-group-item">Date:- {{ $tracking->date }}</li>
              </ul>
        </div>
     </div><!-- end row -->
</div>
@endsection