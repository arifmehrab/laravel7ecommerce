@extends('layouts.app')
@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('Frontend/styles/cart_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('Frontend/styles/cart_responsive.css') }}">

@endpush
@section('content')
	<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-7">
					<div class="cart_container">
						<div class="cart_title text-center">Product Informatin</div>
						<div class="cart_items">
							<ul class="cart_list">
                                @foreach($cartList as $row)
								<li class="cart_item clearfix">
                                    <div class="cart_item_image"><img height="80" src="{{ asset('Backend/assets/images/product/'.$row->options->image) }}" alt=""></div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Name</div>
											<div class="cart_item_text">{{ $row->name }}</div>
										</div>
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Color</div>
											<div class="cart_item_text">{{ $row->options->color }}</div>
										</div>
										<div class="cart_item_quantity cart_info_col">
                                            <div class="cart_item_title">Quantity</div>
                                            <div class="cart_item_text">{{ $row->qty }}</div>
										</div>
										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title">Price</div>
											<div class="cart_item_text">${{ $row->price }}</div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Total</div>
											<div class="cart_item_text">${{ $row->price*$row->qty }}</div>
                                        </div>
									</div>
                                </li>
                                @endforeach
							</ul>
						</div>
						
						<!-- Order Total -->
						<div class="order_total">
							<div class="order_total_content text-md-right">
								@php
									$shipping = App\Models\Admin\setting::first();
									$charge = $shipping->shipping_charge;
								@endphp
								<div class="order_total_title">Shipping Charge:</div>
								<div class="order_total_amount">${{ $charge }}</div>
								<br>
								<div class="order_total_title">Total:</div>
								@if(Session::has('coupon'))
								<div class="order_total_amount">${{ Session::get('coupon')['amount'] + $charge }}</div>
								@else
								@php
									$str = Cart::Subtotal();
									$cartTotal = str_replace( ',', '', $str);
								@endphp
								<div class="order_total_amount">${{ $cartTotal + $charge }}</div>
								@endif
							</div>
						</div>
					</div>
                </div><!--- end row colum 7 -->
                <div class="col-lg-5">
                    <div class="cart_title text-center">Shipping Address</div>
                    <br><br><br>
                    <form method="POST" action="{{ route('payment.process') }}" id="loginform">
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
                            <label class="info-title" for="password">Address <span>*</span></label>
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" autocomplete="new-password">
                
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                         <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">City<span>*</span></label>
                            <input id="city" type="text" class="form-control" name="city">
                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                           @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">post Code<span>*</span></label>
                            <input id="post_code" type="text" class="form-control" name="post_code">
                            @error('post_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                           @enderror
                        </div>
                        <br>
                        <h3 style="text-align: center;">Choose Payment Gateway</h3>
                        <br>
                        <div class="logos ml-sm-auto">
							<ul class="logos_list">
								<li><input type="radio" value="mastercard" name="payment"><img src="{{ asset('Frontend') }}/images/payment/download.png" alt="" style="width: 80px;"></li>
								<li><input type="radio" value="paypal" name="payment"><img src="{{ asset('Frontend') }}/images/payment/download.jpg" alt="" style="width: 80px;"></li>
								<li><input type="radio" value="ideal" name="payment"><img src="{{ asset('Frontend') }}/images/payment/images.jpg" alt="" style="width: 80px;"></li>
                            </ul>
                            @error('payment')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                           @enderror
                        </div>
                        <br><br>
                        <button type="submit" class="btn btn-info">
                            Pay Now
                        </button>
                    </form>
                </div><!-- end rwo colum 5 -->
                <br><br><br><br><br><br>
			</div>
		</div>
	</div>

@endsection
@push('js')
<script src="{{ asset('Frontend/js/cart_custom.js') }}"></script>   
@endpush