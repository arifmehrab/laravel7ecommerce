@extends('layouts.app')
@section('category_menu')
@include('layouts.partials.category_menu')
@endsection
@section('content')
	<!-- Banner -->
	<div class="banner">
		<div class="banner_background" style="background-image:url({{ asset('Frontend/images/banner_background.jpg') }})"></div>
		<div class="container fill_height">
			<div class="row fill_height">
				<div class="banner_product_image"><img src="{{ asset('Backend/assets/images/product/'.$bannerProduct->image_one) }}" alt=""></div>
				<div class="col-lg-5 offset-lg-4 fill_height">
					<div class="banner_content">
						<h1 class="banner_text">{{ $bannerProduct->product_name }}</h1>
						<div class="banner_price">
							@if($bannerProduct->discount_price == NULL)
							<h3 class="text-dark">${{ $bannerProduct->selling_price }}</h3>
							@else
							<span>${{ $bannerProduct->discount_price }}</span>${{ $bannerProduct->selling_price }}
							@endif
						</div>
						<div class="banner_product_name">{{ $bannerProduct->brand->brand_name }}</div>
						<div class="button banner_button"><a href="{{ route('product.shop') }}">Shop Now</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Characteristics -->

	<div class="characteristics">
		<div class="container">
			<div class="row">

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="images/char_1.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="images/char_2.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="images/char_3.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="images/char_4.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Deals of the week -->

	<div class="deals_featured">
		<div class="container">
			<div class="row">
				<div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">
					
					<!-- Deals -->

					<div class="deals">
						<div class="deals_title">Deals of the Week</div>
						<div class="deals_slider_container">
							
							<!-- Deals Slider -->
							<div class="owl-carousel owl-theme deals_slider">
								@foreach($hotDeal as $row)
								<!-- Deals Item -->
								<div class="owl-item deals_item">
									<div class="deals_image"><img width="140" src="{{ asset('Backend/assets/images/product/'.$row->image_one) }}" alt=""></div>
									<div class="deals_content">
										<div class="deals_info_line d-flex flex-row justify-content-start">
											<div class="deals_item_category"><a href="#">{{ $row->subcategory->subcategory_name }}</a></div>
											@if($row->discount_price !== NULL)
											<div class="deals_item_price_a ml-auto">${{ $row->selling_price }}</div>
											@endif
										</div>
										<div class="deals_info_line d-flex flex-row justify-content-start">
											<div class="deals_item_name">{{ $row->product_name }}</div>
											@if($row->discount_price !== NULL)
											<div class="deals_item_price ml-auto">${{ $row->discount_price }}</div>
											@else
											<div class="deals_item_price ml-auto">${{ $row->selling_price }}</div>
											@endif		
										</div>
										<div class="available">
											<div class="available_line d-flex flex-row justify-content-start">
												<div class="available_title">Available: <span>{{ $row->product_quantity }}</span></div>
												<div class="sold_title ml-auto">Already sold: <span>28</span></div>
											</div>
											<div class="available_bar"><span style="width:17%"></span></div>
										</div>
										<div class="deals_timer d-flex flex-row align-items-center justify-content-start">
											<div class="deals_timer_title_container">
												<div class="deals_timer_title">Hurry Up</div>
												<div class="deals_timer_subtitle">Offer ends in:</div>
											</div>
											<div class="deals_timer_content ml-auto">
												<div class="deals_timer_box clearfix" data-target-time="">
													<div class="deals_timer_unit">
														<div id="deals_timer1_hr" class="deals_timer_hr"></div>
														<span>hours</span>
													</div>
													<div class="deals_timer_unit">
														<div id="deals_timer1_min" class="deals_timer_min"></div>
														<span>mins</span>
													</div>
													<div class="deals_timer_unit">
														<div id="deals_timer1_sec" class="deals_timer_sec"></div>
														<span>secs</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
                               @endforeach
							</div>

						</div>

						<div class="deals_slider_nav_container">
							<div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
							<div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
						</div>
					</div>
					
					<!-- Featured -->
					<div class="featured">
						<div class="tabbed_container">
							<div class="tabs">
								<ul class="clearfix">
									<li class="active">Featured</li>
									<li>Trendy</li>
									<li>Best Rated</li>
								</ul>
								<div class="tabs_line"><span></span></div>
							</div>

							<!-- Product Panel -->
							<div class="product_panel panel active">
								<div class="featured_slider slider">
                                    @foreach($feturedProduct as $row)
									<!-- Slider Item -->
									<div class="featured_slider_item">
										<div class="border_active"></div>
										<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
											<div class="product_image d-flex flex-column align-items-center justify-content-center"><img width="120" height="130" src="{{ asset('Backend/assets/images/product/'.$row->image_one) }}" alt=""></div>
											<div class="product_content">
												@if($row->discount_price == NULL)
												<div class="product_price discount"><h4 class="text-dark">${{ $row->selling_price }}<h4></div>
												@else
												<div class="product_price discount">${{ $row->discount_price }}<span> ${{ $row->selling_price }}</span></div>
												@endif
												<div class="product_name"><div>
													<a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">{{ $row->product_name }}</a>
												</div></div>
												<div class="product_extras">
													<button data-id="{{ $row->id }}" type="button" class="product_cart_button" data-toggle="modal" data-target="#productView">
														Add To Cart
													  </button>
													{{-- <button id="addtocard" data-id="{{ $row->id }}" class="product_cart_button">Add to Cart</button> --}}
												</div>
											</div>
										<button id="wishlist" data-id="{{ $row->id }}">
											<div class="product_fav">
												<i class="fas fa-heart">
												</i>
											</div>
										</button>
											<ul class="product_marks">
												@if($row->discount_price == NULL)
												<li class="product_mark product_new" style="background: green;">new</li>
												@else
												@php 
												$amount = $row->selling_price - $row->discount_price;
												$discount = $amount/$row->selling_price*100;
												@endphp
												<li class="product_mark product_discount">-{{ intval($discount) }}%</li>
												@endif
											</ul>
										</div>
									</div>
                                @endforeach
								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>

							<!-- Trendy Product Panel -->

							<div class="product_panel panel">
								<div class="featured_slider slider">

									<!-- Slider Item -->
									@foreach($trendyProduct as $row)
									<div class="featured_slider_item">
										<div class="border_active"></div>
										<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
											<div class="product_image d-flex flex-column align-items-center justify-content-center"><img width="120" height="130" src="{{ asset('Backend/assets/images/product/'.$row->image_one) }}" alt=""></div>
											<div class="product_content">
												@if($row->discount_price == NULL)
												<div class="product_price discount"><h4 class="text-dark">${{ $row->selling_price }}<h4></div>
												@else
												<div class="product_price discount">${{ $row->discount_price }}<span> ${{ $row->selling_price }}</span></div>
												@endif
												<div class="product_name"><div><a href="product.html">{{ $row->product_name }}</a></div></div>
												<div class="product_extras">
													<div class="product_color">
														<input type="radio" checked name="product_color" style="background:#b19c83">
														<input type="radio" name="product_color" style="background:#000000">
														<input type="radio" name="product_color" style="background:#999999">
													</div>
													<div class="product_extras">
														<button data-id="{{ $row->id }}" type="button" class="product_cart_button" data-toggle="modal" data-target="#productView">
															Add To Cart
														  </button>
														{{-- <button id="addtocard" data-id="{{ $row->id }}" class="product_cart_button">Add to Cart</button> --}}
													</div>
												</div>
											</div>
											<button id="wishlist" data-id="{{ $row->id }}">
											<div class="product_fav">
												<i class="fas fa-heart"></i>
											</div>
											</button>
											<ul class="product_marks">
												@if($row->discount_price == NULL)
												<li class="product_mark product_new" style="background: green;">new</li>
												@else
												@php 
												$amount = $row->selling_price - $row->discount_price;
												$discount = $amount/$row->selling_price*100;
												@endphp
												<li class="product_mark product_discount">-{{ intval($discount) }}%</li>
												@endif
											</ul>
										</div>
									</div>
									@endforeach
								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>

							<!-- Best Rated Product Panel -->

							<div class="product_panel panel">
								<div class="featured_slider slider">

									<!-- Slider Item -->
									@foreach($bestRated as $row)
									<div class="featured_slider_item">
										<div class="border_active"></div>
										<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
											<div class="product_image d-flex flex-column align-items-center justify-content-center"><img width="120" height="130" src="{{ asset('Backend/assets/images/product/'.$row->image_one) }}" alt=""></div>
											<div class="product_content">
												@if($row->discount_price == NULL)
												<div class="product_price discount"><h4 class="text-dark">${{ $row->selling_price }}<h4></div>
												@else
												<div class="product_price discount">${{ $row->discount_price }}<span> ${{ $row->selling_price }}</span></div>
												@endif
												<div class="product_name"><div><a href="product.html">{{ $row->product_name }}</a></div></div>
												<div class="product_extras">
													<div class="product_color">
														<input type="radio" checked name="product_color" style="background:#b19c83">
														<input type="radio" name="product_color" style="background:#000000">
														<input type="radio" name="product_color" style="background:#999999">
													</div>
													<div class="product_extras">
														<button data-id="{{ $row->id }}" type="button" class="product_cart_button" data-toggle="modal" data-target="#productView">
															Add To Cart
														  </button>
														{{-- <button id="addtocard" data-id="{{ $row->id }}" class="product_cart_button">Add to Cart</button> --}}
													</div>
												</div>
											</div>
											<button id="wishlist" data-id="{{ $row->id }}">
											<div class="product_fav">
												<i class="fas fa-heart"></i>
											</div>
											</button>
											<ul class="product_marks">
												@if($row->discount_price == NULL)
												<li class="product_mark product_new" style="background: green;">new</li>
												@else
												@php 
												$amount = $row->selling_price - $row->discount_price;
												$discount = $amount/$row->selling_price*100;
												@endphp
												<li class="product_mark product_discount">-{{ intval($discount) }}%</li>
												@endif
											</ul>
										</div>
									</div>
                                   @endforeach
								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Popular Categories -->

	<div class="popular_categories">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="popular_categories_content">
						<div class="popular_categories_title">Popular Categories</div>
						<div class="popular_categories_slider_nav">
							<div class="popular_categories_prev popular_categories_nav text-dark"><i class="fas fa-angle-left ml-auto" style="size: 20px;"></i></div>
							<div class="popular_categories_next popular_categories_nav text-dark"><i class="fas fa-angle-right ml-auto"></i></div>
						</div>
						<div class="popular_categories_link"><a href="#">full catalog</a></div>
					</div>
				</div>
				
				<!-- Popular Categories Slider -->

				<div class="col-lg-9">
					<div class="popular_categories_slider_container">
						<div class="owl-carousel owl-theme popular_categories_slider">

							<!-- Popular Categories Item -->
							@foreach($popularCategories as $row)
							<div class="owl-item">
								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
									<div class="popular_category_image"><img src="images/popular_1.png" alt=""></div>
									<div class="popular_category_text"><a href="{{ url('products/category/'.$row->id.'/'.$row->category_name) }}"> {{  $row->category_name }} </a></div>
								</div>
							</div>
                           @endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Hot New Arrivals -->

	<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="tabbed_container">
						<div class="tabs clearfix tabs-right">
							<div class="new_arrivals_title">Top Categories</div>
							<ul class="clearfix">
								<li class="active">Electronices</li>
								<li>Man's</li>
								<li>Woman's</li>
							</ul>
							<div class="tabs_line"><span></span></div>
						</div>
						<div class="row">
							<div class="col-lg-9" style="z-index:1;">

								<!-- Electronic Product Panel -->
								<div class="product_panel panel active">
									<div class="arrivals_slider slider">
                                        @foreach($electronicProducts as $row)
										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img width="120" height="130" src="{{ asset('Backend/assets/images/product/'.$row->image_one) }}" alt=""></div>
												<div class="product_content">
												@if($row->discount_price == NULL)
												<div class="product_price discount"><h4 class="text-dark">${{ $row->selling_price }}<h4></div>
												@else
												<div class="product_price discount">${{ $row->discount_price }}<span> ${{ $row->selling_price }}</span></div>
												@endif
													<div class="product_name"><div><a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">{{ $row->product_name }}</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<div class="product_extras">
															<button data-id="{{ $row->id }}" type="button" class="product_cart_button" data-toggle="modal" data-target="#productView">
																Add To Cart
															  </button>
															{{-- <button id="addtocard" data-id="{{ $row->id }}" class="product_cart_button">Add to Cart</button> --}}
														</div>
													</div>
												</div>
												<button id="wishlist" data-id="{{ $row->id }}">
												<div class="product_fav">
													<i class="fas fa-heart"></i>
												</div>
												</button>
												<ul class="product_marks">
												@if($row->discount_price == NULL)
												<li class="product_mark product_new" style="background: green;">new</li>
												@else
												@php 
												$amount = $row->selling_price - $row->discount_price;
												$discount = $amount/$row->selling_price*100;
												@endphp
												<li class="product_mark product_discount">-{{ intval($discount) }}%</li>
												@endif
												</ul>
											</div>
										</div>
                                        @endforeach
									</div>
									<div class="arrivals_slider_dots_cover"></div>
								</div>

								<!-- Mans's Product Panel -->
								<div class="product_panel panel">
									<div class="arrivals_slider slider">
										@foreach($mansProducts as $row)
										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img width="120" height="130" src="{{ asset('Backend/assets/images/product/'.$row->image_one) }}" alt=""></div>
												<div class="product_content">
												@if($row->discount_price == NULL)
												<div class="product_price discount"><h4 class="text-dark">${{ $row->selling_price }}<h4></div>
												@else
												<div class="product_price discount">${{ $row->discount_price }}<span> ${{ $row->selling_price }}</span></div>
												@endif
													<div class="product_name"><div><a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">{{ $row->product_name }}</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Add to Cart</button>
													</div>
												</div>
												<button id="wishlist" data-id="{{ $row->id }}">
												<div class="product_fav">
													<i class="fas fa-heart"></i>
												</div>
												</button>
												<ul class="product_marks">
												@if($row->discount_price == NULL)
												<li class="product_mark product_new" style="background: green;">new</li>
												@else
												@php 
												$amount = $row->selling_price - $row->discount_price;
												$discount = $amount/$row->selling_price*100;
												@endphp
												<li class="product_mark product_discount">-{{ intval($discount) }}%</li>
												@endif
												</ul>
											</div>
										</div>
                                        @endforeach
									</div>
									<div class="arrivals_slider_dots_cover"></div>
								</div>

								<!-- Woman's Product Panel -->
								<div class="product_panel panel">
									<div class="arrivals_slider slider">
										@foreach($womansProducts as $row)
										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img width="120" height="130" src="{{ asset('Backend/assets/images/product/'.$row->image_one) }}" alt=""></div>
												<div class="product_content">
												@if($row->discount_price == NULL)
												<div class="product_price discount"><h4 class="text-dark">${{ $row->selling_price }}<h4></div>
												@else
												<div class="product_price discount">${{ $row->discount_price }}<span> ${{ $row->selling_price }}</span></div>
												@endif
													<div class="product_name"><div><a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">{{ $row->product_name }}</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Add to Cart</button>
													</div>
												</div>
												<button id="wishlist" data-id="{{ $row->id }}">
												<div class="product_fav">
													<i class="fas fa-heart"></i>
												</div>
												</button>
												<ul class="product_marks">
												@if($row->discount_price == NULL)
												<li class="product_mark product_new" style="background: green;">new</li>
												@else
												@php 
												$amount = $row->selling_price - $row->discount_price;
												$discount = $amount/$row->selling_price*100;
												@endphp
												<li class="product_mark product_discount">-{{ intval($discount) }}%</li>
												@endif
												</ul>
											</div>
										</div>
                                        @endforeach
									</div>
									<div class="arrivals_slider_dots_cover"></div>
								</div>

							</div>
						</div>
								
					</div>
				</div>
			</div>
		</div>		
	</div>

	<!-- Best Sellers -->

	<div class="best_sellers">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="tabbed_container">
						<div class="tabs clearfix tabs-right">
							<div class="new_arrivals_title">Top Best Sellers</div>
							<ul class="clearfix">
								<li class="active">Top Price</li>
								<li>Application & Book</li>
								<li>Movies & Car</li>
							</ul>
							<div class="tabs_line"><span></span></div>
						</div>

						<div class="bestsellers_panel panel active">

							<!-- Best Sellers Slider -->

							<div class="bestsellers_slider slider">
                               @foreach($top_price as $row)
								<!-- Best Sellers Item -->
								<div class="bestsellers_item discount">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img width="130" height="120" src="{{ asset('Backend/assets/images/product/'.$row->image_one) }}" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">{{ $row->subcategory->subcategory_name }}</a></div>
											<div class="bestsellers_name">
												<a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">
													{{ $row->product_name }}
												</a>
											</div>
											<div class="bestsellers_price discount">
												@if($row->discount_price)
												${{ $row->discount_price }} <span>${{ $row->selling_price }}</span>
												@else
												${{ $row->selling_price }}
												@endif
											</div>
										</div>
									</div>
									<button id="wishlist" data-id="{{ $row->id }}">
										<div class="bestsellers_fav active">
											<i class="fas fa-heart"></i>
										</div>
									</button>
									<ul class="bestsellers_marks">
										@if($row->discount_price == NULL)
												<li class="bestsellers_mark bestsellers_new" style="background: green;">new</li>
												@else
												@php 
												$amount = $row->selling_price - $row->discount_price;
												$discount = $amount/$row->selling_price*100;
												@endphp
												<li class="bestsellers_mark bestsellers_discount">-{{ intval($discount) }}%</li>
												@endif
									</ul>
								</div><!--- end top pricef -->
                               @endforeach
							</div>
						</div><!-- Panel one -->

						<!--- panel Two -->
						<div class="bestsellers_panel panel">

							<!-- Best Sellers Slider -->

							<div class="bestsellers_slider slider">
                               @foreach($book_Appli_products as $row)
								<!-- Best Sellers Item -->
								<div class="bestsellers_item discount">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img width="130" height="120" src="{{ asset('Backend/assets/images/product/'.$row->image_one) }}" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">{{ $row->subcategory->subcategory_name }}</a></div>
											<div class="bestsellers_name">
												<a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">
													{{ $row->product_name }}
												</a>
											</div>
											<div class="bestsellers_price discount">
												@if($row->discount_price)
												${{ $row->discount_price }} <span>${{ $row->selling_price }}</span>
												@else
												${{ $row->selling_price }}
												@endif
											</div>
										</div>
									</div>
									<button id="wishlist" data-id="{{ $row->id }}">
										<div class="bestsellers_fav active">
											<i class="fas fa-heart"></i>
										</div>
									</button>
									<ul class="bestsellers_marks">
										@if($row->discount_price == NULL)
												<li class="bestsellers_mark bestsellers_new" style="background: green;">new</li>
												@else
												@php 
												$amount = $row->selling_price - $row->discount_price;
												$discount = $amount/$row->selling_price*100;
												@endphp
												<li class="bestsellers_mark bestsellers_discount">-{{ intval($discount) }}%</li>
												@endif
									</ul>
								</div><!--- end top pricef -->
                               @endforeach
							</div>
						</div><!--panel two -->

						<!-- Panel Thereee --->
						<div class="bestsellers_panel panel">

							<!-- Best Sellers Slider -->

							<div class="bestsellers_slider slider">
                               @foreach($movi_car_products as $row)
								<!-- Best Sellers Item -->
								<div class="bestsellers_item discount">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img width="130" height="120" src="{{ asset('Backend/assets/images/product/'.$row->image_one) }}" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">{{ $row->subcategory->subcategory_name }}</a></div>
											<div class="bestsellers_name">
												<a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">
													{{ $row->product_name }}
												</a>
											</div>
											<div class="bestsellers_price discount">
												@if($row->discount_price)
												${{ $row->discount_price }} <span>${{ $row->selling_price }}</span>
												@else
												${{ $row->selling_price }}
												@endif
											</div>
										</div>
									</div>
									<button id="wishlist" data-id="{{ $row->id }}">
										<div class="bestsellers_fav active">
											<i class="fas fa-heart"></i>
										</div>
									</button>
									<ul class="bestsellers_marks">
										@if($row->discount_price == NULL)
												<li class="bestsellers_mark bestsellers_new" style="background: green;">new</li>
												@else
												@php 
												$amount = $row->selling_price - $row->discount_price;
												$discount = $amount/$row->selling_price*100;
												@endphp
												<li class="bestsellers_mark bestsellers_discount">-{{ intval($discount) }}%</li>
												@endif
									</ul>
								</div><!--- end top pricef -->
                               @endforeach
							</div>
						</div><!--panel Three end -->
					</div>
						
				</div>
			</div>
		</div>
	</div>

	<!-- Adverts -->

	<div class="adverts">
		<div class="container">
			<div class="row">

				<div class="col-lg-4 advert_col">
					
					<!-- Advert Item -->

					<div class="advert d-flex flex-row align-items-center justify-content-start">
						<div class="advert_content">
							<div class="advert_title"><a href="#">Trends 2018</a></div>
							<div class="advert_text">Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</div>
						</div>
						<div class="ml-auto"><div class="advert_image"><img src="images/adv_1.png" alt=""></div></div>
					</div>
				</div>

				<div class="col-lg-4 advert_col">
					
					<!-- Advert Item -->

					<div class="advert d-flex flex-row align-items-center justify-content-start">
						<div class="advert_content">
							<div class="advert_subtitle">Trends 2018</div>
							<div class="advert_title_2"><a href="#">Sale -45%</a></div>
							<div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
						</div>
						<div class="ml-auto"><div class="advert_image"><img src="images/adv_2.png" alt=""></div></div>
					</div>
				</div>

				<div class="col-lg-4 advert_col">
					
					<!-- Advert Item -->

					<div class="advert d-flex flex-row align-items-center justify-content-start">
						<div class="advert_content">
							<div class="advert_title"><a href="#">Trends 2018</a></div>
							<div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
						</div>
						<div class="ml-auto"><div class="advert_image"><img src="images/adv_3.png" alt=""></div></div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Trends -->

	<div class="trends">
		<div class="trends_background" style="background-image:url(images/trends_background.jpg)"></div>
		<div class="trends_overlay"></div>
		<div class="container">
			<div class="row">

				<!-- Trends Content -->
				<div class="col-lg-3">
					<div class="trends_container">
						<h2 class="trends_title">Hot New 2020</h2>
						<div class="trends_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</p></div>
						<div class="trends_slider_nav">
							<div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
							<div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
						</div>
					</div>
				</div>

				<!-- Trends Slider -->
				<div class="col-lg-9">
					<div class="trends_slider_container">

						<!-- Trends Slider -->

						<div class="owl-carousel owl-theme trends_slider">
                         @foreach($hot_new as $row)
							<!-- Trends Slider Item -->
							<div class="owl-item">
								<div class="trends_item is_new">
									<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img width="280" height="200" src="{{ asset('Backend/assets/images/product/'.$row->image_one) }}" alt=""></div>
									<div class="trends_content">
										<div class="trends_category"><a href="#">{{ $row->subcategory->subcategory_name }}</a></div>
										<div class="trends_info clearfix">
											<div class="trends_name"><a href="product.html">{{ $row->product_name }}</a></div>
											@if($row->discount_price == NULL)
											<div class="trends_price">${{ $row->selling_price }}</div>
											@else
											<div class="product_price discount">${{ $row->discount_price }}<span> ${{ $row->selling_price }}</span></div>
											@endif
										</div>
									</div>
									<ul class="trends_marks">
										@if($row->discount_price == NULL)
											<li class="product_mark product_new" style="background: green;">new</li>
											@else
											@php 
											$amount = $row->selling_price - $row->discount_price;
											$discount = $amount/$row->selling_price*100;
											@endphp
											<li class="product_mark product_discount">-{{ intval($discount) }}%</li>
											@endif
									</ul>
									<button id="wishlist" data-id="{{ $row->id }}">
									<div class="trends_fav"><i class="fas fa-heart"></i></div>
									</button>
								</div>
							</div>
                          @endforeach
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Recently Viewed -->

	<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title">Recently Viewed</h3>
						<div class="viewed_nav_container">
							<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
							<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
						</div>
					</div>

					<div class="viewed_slider_container">
						
						<!-- Recently Viewed Slider -->

						<div class="owl-carousel owl-theme viewed_slider">
							@foreach($random_products as $row)
							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img width="130" height="120" src="{{ asset('Backend/assets/images/product/'.$row->image_one) }}" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">
											@if($row->discount_price == NULL)
											${{ $row->selling_price }}
											@else
											${{ $row->discount_price }} <span>${{ $row->selling_price }}</span>
											@endif
										</div>
										<div class="viewed_name"><a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">{{ $row->product_name }}</a></div>
									</div>
									<ul class="item_marks">
										@if($row->discount_price == NULL)
												<li class="item_mark item_discount" style="background: green;">new</li>
												@else
												@php 
												$amount = $row->selling_price - $row->discount_price;
												$discount = $amount/$row->selling_price*100;
												@endphp
												<li class="item_mark item_discount">-{{ intval($discount) }}%</li>
												@endif
									</ul>
								</div>
							</div>

							@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Brands -->

	<div class="brands">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="brands_slider_container">
						
						<!-- Brands Slider -->

						<div class="owl-carousel owl-theme brands_slider">
							@foreach($brands as $row)
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('Backend/assets/images/brand/'.$row->brand_logo) }}" alt=""></div></div>
                            @endforeach
						</div>
						
						<!-- Brands Slider Navigation -->
						<div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
						<div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!--- Product Sort Description Model --->
<div class="modal fade" id="productView" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="staticBackdropLabel">Product Sort Details</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
		  <!-- model row -->
		  <div class="row text-dark">
             <div class="col-md-4">
               <img id="imageone" alt="">
			 </div><!-- end colum -->
			 <div class="col-md-4">
                <ul class="list-group">
					<li class="list-group-item active"><span id="pname"></span>
					</li>
					<li class="list-group-item">product Code:- <span id="pcode"></span></li>
					<li class="list-group-item">Category:- <span id="cname"></span></li>
					<li class="list-group-item">SubCategory:- <span id="sname"></span></li>
					<li class="list-group-item">Brand:- <span id="bname"></span></li>
					<li class="list-group-item">Stock:- <span class="qty bg-success p-1 text-light">avaiable</span></li>
				  </ul>				  
			 </div><!-- end colum -->
			 <div class="col-md-4">
				<form method="POST" action="{{ route('product.cart.insert') }}">
					@csrf
					<input type="hidden" name="product_id" id="product_id">
					<div class="form-group">
					  <label>Product Color</label>
					  <select name="color" class="form-control">
					  </select>
					</div>
					<div class="form-group">
						<label>Product Size</label>
						<select name="size" id="size" class="form-control">
						</select>
					</div>
					<div class="form-group form-check">
					   <label>Product Quantity</label>
					  <input type="number" class="form-control" id="quantity" name="qty" value="1">
					</div>
					<button type="submit" class="btn btn-primary">Add To Cart</button>
				  </form>
			 </div><!-- end colum -->
		  </div><!-- end row -->
		</div><!-- end model body -->
	  </div>
	</div>
  </div>
  <!--- End Model ---->
@endsection
@push('js')
	<!---- Product Sort Details By Model ---->
	<script type="text/javascript">
	  $(document).ready(function(){
        $(document).on('click', '.product_cart_button', function(){
			var product_id = $(this).data('id');
			$.ajax({
               url: "{{ route('product.view') }}",
			   type: "GET",
			   data: {product_id:product_id},
			   success:function(data){
				   var public_path =  {!! json_encode(url('/')) !!}+"/Backend/assets/images/product/"+data.product.image_one;
                 $('#pname').text(data.product.product_name);
				 $('#imageone').attr('src',public_path);
				 $('#pcode').text(data.product.product_code);
				 $('#cname').text(data.product.category_name);
				 $('#sname').text(data.product.subcategory_name);
				 $('#bname').text(data.product.brand_name);
				 $('#product_id').val(data.product.id);
				 // Color 
				 var d = $('select[name="color"]').empty();
				 $.each(data.color, function(key,v){
					 $('select[name="color"]').append('<option value"'+v+'">'+v+'</option>');
				 });
				 // Size
				 var d = $('select[name="size"]').empty();
				 $.each(data.size, function(key,v){
					 $('select[name="size"]').append('<option value"'+v+'">'+v+'</option>');
				 });
			   }
			});
		});
	  });
	</script>
	<!---- Add to card Ajax request ---->
	<script type="text/javascript">
	  $(document).ready(function(){
        $(document).on('click', '#addtocard', function(){
          var product_id = $(this).data('id');
		  $.ajax({
             url: "{{ route('add.to.card') }}",
			 type: "GET",
			 data: {product_id:product_id},
			 success:function(data) {
				const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000,
				timerProgressBar: true,
				onOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				}
				})
				if($.isEmptyObject(data.error)){
					Toast.fire({
					icon: 'success',
					title: data.success
				})
				} else{
                    Toast.fire({
					icon: 'error',
					title: data.error
				  })
			  }
			 } // End Success //
		  });
		});
	  });
	</script>
    <!---- Wishlist Ajax request ---->
	<script type="text/javascript">
	  $(document).ready(function(){
         $(document).on('click','#wishlist', function(){
			var product_id = $(this).data('id');
			$.ajax({
             url : "{{ route('customer.wishlist') }}",
             type: "GET",
			 data: {product_id:product_id},
			 success:function(data){
				const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000,
				timerProgressBar: true,
				onOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				}
				})
				if($.isEmptyObject(data.error)){
					Toast.fire({
					icon: 'success',
					title: data.success
				})
				} else{
                    Toast.fire({
					icon: 'error',
					title: data.error
				  })
			  }
			 }// end success
		 });
	  });
	});
	</script>
@endpush