@extends('layouts.app')
@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('Frontend/styles/cart_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('Frontend/styles/cart_responsive.css') }}">
<style type="text/css">
    /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;
  width: 100%;
  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
</style>
@endpush
@section('content')
	<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
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
                <div class="col-lg-12">
                    <div class="cart_title text-center">Pay Now</div>
                    <br><br><br>
                    <form action="{{ route('stripe.charge') }}" method="post" id="payment-form" style="border: 1px solid gray; padding:15px;">
                        @csrf
                        <div class="form-row">
                          <label for="card-element">
                            Credit or debit card
                          </label>
                          <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                          </div>
                      
                          <!-- Used to display form errors. -->
                          <div id="card-errors" role="alert"></div>
                        </div>
                        <!----- Extra Information ----->
                        <!-- Order Info -->
                        <input type="hidden" value="{{ $charge }}" name="shipping">
                        @php
                        $strr = Cart::Subtotal();
                        $subtotal = str_replace( ',', '', $strr);
                        @endphp
                        <input type="hidden" value="{{ $subtotal + $charge }}" name="cartTotal">
                        <!-- Shipping Info -->
                        <input type="hidden" value="{{ $payment['name'] }}" name="ship_name">
                        <input type="hidden" value="{{ $payment['email'] }}" name="ship_email">
                        <input type="hidden" value="{{ $payment['phone_number'] }}" name="ship_phone">
                        <input type="hidden" value="{{ $payment['address'] }}" name="ship_address">
                        <input type="hidden" value="{{ $payment['city'] }}" name="ship_city">
                        <input type="hidden" value="{{ $payment['post_code'] }}" name="ship_post_code">
                        <input type="hidden" value="{{ $payment['payment'] }}" name="payment_type">
                        <!-- Extra Info End -->
                      <br>
                        <button class="btn btn-info">Pay Now</button>
                      </form>
                </div><!-- end rwo colum 5 -->
                <br><br><br><br><br><br>
			</div>
		</div>
	</div>

@endsection
@push('js')
<script src="{{ asset('Frontend/js/cart_custom.js') }}"></script>  
<script type="text/javascript">
  // Create a Stripe client.
var stripe = Stripe('pk_test_51H6KoSHPevkCFYETI0pR6HzFY6ZjjAjh6PJBr7AOCduJFSIabaHTZmfavE9V2UnpXwePKutU9SorFdwem8RVDeNW00uKFlveYv');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
} 
</script> 
@endpush