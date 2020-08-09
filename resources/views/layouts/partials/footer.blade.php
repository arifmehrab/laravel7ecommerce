<footer class="footer">
    <div class="container">
        <div class="row">
            @php
              $setting = App\Models\Admin\setting::all()->first();
            @endphp
            <div class="col-lg-3 footer_col">
                <div class="footer_column footer_contact">
                    <div class="logo_container">
                        <div class="logo"><a href="#">{{ $setting->shop_name }}</a></div>
                    </div>
                    <div class="footer_title">Got Question? Call Us 24/7</div>
                    <div class="footer_phone">+88{{ $setting->phone }}</div>
                    <div class="footer_contact_text">
                        <p>{{ $setting->address }}</p>
                    </div>
                    <div class="footer_social">
                        <ul>
                            @if($setting->facebook_url)
                            <li><a href="{{ $setting->facebook_url }}"><i class="fab fa-facebook-f"></i></a></li>
                            @endif
                            @if($setting->twitter_url)
                            <li><a href="{{ $setting->twitter_url }}"><i class="fab fa-twitter"></i></a></li>
                            @endif
                            @if($setting->youtube_url)
                            <li><a href="{{ $setting->youtube_url }}"><i class="fab fa-youtube"></i></a></li>
                            @endif
                            @if($setting->vimeo_url)
                            <li><a href="{{ $setting->vimeo_url }}"><i class="fab fa-google"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 offset-lg-2">
                <div class="footer_column">
                    <div class="footer_title">Find it Fast</div>
                    <ul class="footer_list">
                        <li><a href="#">Computers & Laptops</a></li>
                        <li><a href="#">Cameras & Photos</a></li>
                        <li><a href="#">Hardware</a></li>
                        <li><a href="#">Smartphones & Tablets</a></li>
                        <li><a href="#">TV & Audio</a></li>
                    </ul>
                    <div class="footer_subtitle">Gadgets</div>
                    <ul class="footer_list">
                        <li><a href="#">Car Electronics</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="footer_column">
                    <ul class="footer_list footer_list_2">
                        <li><a href="#">Video Games & Consoles</a></li>
                        <li><a href="#">Accessories</a></li>
                        <li><a href="#">Cameras & Photos</a></li>
                        <li><a href="#">Hardware</a></li>
                        <li><a href="#">Computers & Laptops</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="footer_column">
                    <div class="footer_title">Customer Care</div>
                    <ul class="footer_list">
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Order Tracking</a></li>
                        <li><a href="#">Wish List</a></li>
                        <li><a href="#">Customer Services</a></li>
                        <li><a href="#">Returns / Exchange</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Product Support</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</footer>
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col">
                
                <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                    <div class="copyright_content">
                        {{ $setting->copyright }}
                    </div>
                    <div class="logos ml-sm-auto">
                        <ul class="logos_list">
                            <li><a href="#"><img src="{{ asset('Frontend') }}/images/logos_1.png" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('Frontend') }}/images/logos_2.png" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('Frontend') }}/images/logos_3.png" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('Frontend') }}/images/logos_4.png" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>