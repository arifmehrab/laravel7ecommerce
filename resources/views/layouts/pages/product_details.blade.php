@extends('layouts.app')
@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('Frontend/plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('Frontend/styles/product_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('Frontend/styles/product_responsive.css') }}">
<style type="text/css">

nav > .nav.nav-tabs{

border: none;
  color:#fff;
  background:#272e38;
  border-radius:0;

}
nav > div a.nav-item.nav-link,
nav > div a.nav-item.nav-link.active
{
border: none;
  padding: 18px 25px;
  color:#fff;
  background:#272e38;
  border-radius:0;
}

nav > div a.nav-item.nav-link.active:after
{
content: "";
position: relative;
bottom: -60px;
left: -10%;
border: 15px solid transparent;
border-top-color: #e74c3c ;
}
.tab-content{
background: #fdfdfd;
  line-height: 25px;
  border: 1px solid #ddd;
  border-top:5px solid #e74c3c;
  border-bottom:5px solid #e74c3c;
  padding:30px 25px;
}

nav > div a.nav-item.nav-link:hover,
nav > div a.nav-item.nav-link:focus
{
border: none;
  background: #e74c3c;
  color:#fff;
  border-radius:0;
  transition:background 0.20s linear;
}
</style>
@endpush
@section('content')
<!-- Single Product -->

<div class="single_product">
    <div class="container">
        <div class="row">

            <!-- Images -->
            <div class="col-lg-2 order-lg-1 order-2">
                <ul class="image_list">
                    <li data-image="{{ asset("Backend/assets/images/product/".$product->image_one) }}"><img src="{{ asset("Backend/assets/images/product/".$product->image_one) }}" alt=""></li>
                    <li data-image="{{ asset("Backend/assets/images/product/".$product->image_two) }}"><img src="{{ asset("Backend/assets/images/product/".$product->image_two) }}" alt=""></li>
                    <li data-image="{{ asset("Backend/assets/images/product/".$product->image_three) }}"><img src="{{ asset("Backend/assets/images/product/".$product->image_three) }}" alt=""></li>
                </ul>
            </div>

            <!-- Selected Image -->
            <div class="col-lg-5 order-lg-2 order-1">
                <div class="image_selected"><img src="{{ asset("Backend/assets/images/product/".$product->image_one) }}" alt=""></div>
            </div>

            <!-- Description -->
            <div class="col-lg-5 order-3">
                <div class="product_description">
                    <div class="product_category">{{ $product->category->category_name }}>{{ $product->subcategory->subcategory_name }}</div>
                    <div class="product_name">{{ $product->product_name }}</div>
                    <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                    {{-- @php
                        use Illuminate\Support\str;
                        $limit = Str::limit($product->product_details, 100);
                    @endphp --}}
                    <div class="product_text"><p>{!! $product->product_details !!}</p></div>
                    <div class="order_info d-flex flex-row">
                        <form  method="post" action="{{ route('add.product.card', $product->id) }}">
                            @csrf
                            <div class="row">
                                    <div class="col-lg-4">
                                          <div class="form-group">
                                            <label for="exampleFormControlSelect1">Color</label>
                                            <select class="form-control input-lg" id="exampleFormControlSelect1" name="color">
                                              <option value="">Select Color</option>
                                              @foreach($productColors as $color)
                                               <option value="{{ $color }}">{{ $color }}</option>
                                               @endforeach 
                                            </select>
                                          </div>
                                     </div>
                                     @if($product->product_size == NULL)
                                     @else
                                     <div class="col-lg-4">
                                        <div class="form-group">
                                          <label for="exampleFormControlSelect1">Size</label>
                                          <select class="form-control input-lg" id="exampleFormControlSelect1" name="size">
                                            <option value="">Select Size</option>
                                             @foreach($productSizes as $size)
                                             <option value="{{ $size }}">{{ $size }}</option>
                                             @endforeach 
                                          </select>
                                        </div>
                                    @endif
                                   </div>
                             
                                     <div class="col-lg-4">
                                          <div class="form-group">
                                        <label for="exampleFormControlSelect1">Quantity</label>
                                             <input class="form-control" type="number" pattern="[0-9]*" value="1" name="qty">
                                      </div>
                                     </div>
                                </div>
                            <div class="clearfix" style="z-index: 1000;">
                            </div>
                            @if($product->discount_price == NULL)
                            <div class="product_price"> Price ${{ $product->selling_price }}</div>
                            @else
                            <div class="product_price"> Price ${{ $product->discount_price }}/<strong style="color: red;">${{ $product->selling_price }}</strong></div>
                            @endif  
                            <br><br>
                                <button type="submit" class="button cart_button">Add to Cart</button>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                            </div><br><br>
                            <!-- ShareThis BEGIN -->
                            <div class="sharethis-inline-share-buttons"></div>
                            <!-- ShareThis END -->                   
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!--- Product Details start ---->
<div class="container">
    <div class="row">
      <div class="col-xs-12 ">
        <nav>
          <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Product Details</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Video Or Link</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Product Review</a>
          </div>
        </nav>
        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
           {!! $product->product_details !!}
          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
           {!! $product->video_link !!}
          </div>
          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <!--- Facebook Comment Box Embade Here -->
            <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="8" data-width=""></div>
            <!--- End Facebook Cmd Box --->
          </div>
        </div>
      
      </div>
    </div>
</div>
</div>
</div>

<!---- Product Details End ----->
<!-- Recently Viewed -->

<div class="viewed">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="viewed_title_container">
                    <h3 class="viewed_title">Related Products</h3>
                    <div class="viewed_nav_container">
                        <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                    </div>
                </div>

                <div class="viewed_slider_container">
                    
                    <!-- Related Products Slider -->

                    <div class="owl-carousel owl-theme viewed_slider">
                        
                        <!-- Related Products Item -->
                        @foreach($related_products as $row)
                        <div class="owl-item">
                            <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="viewed_image"><img width="130" height="120" src="{{ asset('Backend/assets/images/product/'.$row->image_one) }}" alt=""></div>
                                <div class="viewed_content text-center">
                                    @if($row->discount_price == NULL)
                                    <div class="viewed_price">${{ $row->selling_price }}</div>
                                    @else
                                    <div class="viewed_price">${{ $row->discount_price }} <span>{{ $row->selling_price }}</span></div>
                                    @endif
                                    <div class="viewed_name"><a href="#">{{ $row->product_name }}</a></div>
                                </div>
                                <ul class="item_marks">
                                    @if($row->discount_price == NULL)
										<li class="item_mark item_new" style="background: green;">new</li>
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
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center">
                                <img src="{{ asset('Backend/assets/images/brand/'.$row->brand_logo) }}" alt="">
                            </div>
                        </div>
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
@endsection
@push('js')
<script src="{{ asset('Frontend/js/product_custom.js') }}"></script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0" nonce="RL5X88RI"></script>
<!-- Product social share -->
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2d8c43e543350013c372aa&product=sop' async='async'></script>
@endpush