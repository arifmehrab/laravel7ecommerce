<div class="header_main">
    <div class="container">
        <div class="row">
            @php
                $setting = App\Models\Admin\setting::select('logo', 'shop_name')->first();
            @endphp
            <!-- Logo -->
            <div class="col-lg-2 col-sm-3 col-3 order-1">
                <div class="logo_container">
                    <div class="logo"><a href="{{ url('/') }}">{{ $setting->shop_name }}</a></div>
                </div>
            </div>

            <!-- Search -->
            <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                <div class="header_search">
                    <div class="header_search_content">
                        <div class="header_search_form_container">
                            <form class="header_search_form clearfix" method="POST" action="{{ route('product.search.resuit') }}">
                                @csrf
                                <input type="search" required="required" class="header_search_input" placeholder="Search for products..." onkeyup="productSearch(this)" name="search">
                                <div class="custom_dropdown">
                                    <div class="custom_dropdown_list">
                                        <span class="custom_dropdown_placeholder clc">All Categories</span>
                                        <i class="fas fa-chevron-down"></i>
                                        <ul class="custom_list clc">
                                            @php 
                                            $categories = App\Models\Admin\category::orderBy('id','ASC')->get();
                                            @endphp
                                            <li><a class="clc" href="#">All Categories</a></li>
                                            @foreach($categories as $category)
                                            <li><a class="clc" href="#">{{ $category->category_name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{ asset('Frontend') }}/images/search.png" alt=""></button>
                            </form>
                              <!--- show ajax search resuit -->
                              <div style="background: #fff; display: none; max-height: 400px; overflow-y: scroll; margin-top: 5px; padding: 1rem 0;" id="show_post"></div>
                              <!--- show ajax search resuit -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Wishlist -->
            <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                    <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                        @guest
                        @else
                        <div class="wishlist_icon"><img src="{{ asset('Frontend/images/heart.png') }}" alt=""></div>
                        @php 
                        // Authinticate User Wishlist..
                        $user = Auth::id();
                        $wishlist = App\Models\Frontend\wishlist::where('user_id', $user)->get();
                        @endphp
                        <div class="wishlist_content">
                            <div class="wishlist_text"><a href="{{ route('customer.wishlist.view') }}">Wishlist</a></div>
                            <div class="wishlist_count">{{ $wishlist->count() }}</div>
                        </div>  
                        @endguest
                    </div>

                    <!-- Cart -->
                    <div class="cart">
                        <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                            <div class="cart_icon">
                                <img src="{{ asset('Frontend/images/cart.png') }}" alt="">
                                <div class="cart_count"><span>{{ Cart::count() }}</span></div>
                            </div>
                            <div class="cart_content">
                                <div class="cart_text"><a href="{{ route('card.product.list') }}">Cart</a></div>
                                @if(Session::has('coupon'))
                                <div class="cart_price">{{ Session::get('coupon')['amount'] }}</div>
                                @else
                                @php
                                    $str = Cart::Subtotal();
                                    $cartsubtotal = str_replace( ',', '', $str);
                                @endphp
                                <div class="cart_price">{{ $cartsubtotal }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>