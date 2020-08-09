@extends('layouts.app')
@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('Frontend/styles/shop_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('Frontend/styles/shop_responsive.css') }}">  
@endpush
@section('content')
<!-- Home -->

<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
    <div class="home_overlay"></div>
    <div class="home_content d-flex flex-column align-items-center justify-content-center">
        <h2 class="home_title">Shop</h2>
    </div>
</div>

<!-- Shop -->

<div class="shop">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">

                <!-- Shop Sidebar -->
                <div class="shop_sidebar">
                    <div class="sidebar_section">
                        <div class="sidebar_title">Categories</div>
                        <ul class="sidebar_categories">
                            @foreach($categories as $row)
                            <li>
                                <a href="{{ url('products/category/'.$row->id.'/'.$row->category_name) }}">
                                 {{ $row->category_name }}
                               </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar_section">
                        <div class="sidebar_title">Sub Categories</div>
                        <ul class="sidebar_categories">
                            @foreach($subcategories as $row)
                            <li><a href="{{ url('products/'.$row->id.'/'.$row->subcategory_name) }}">{{ $row->subcategory_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar_section filter_by_section">
                        <div class="sidebar_title">Filter By</div>
                        <div class="sidebar_subtitle">Price</div>
                        <div class="filter_price">
                            <div id="slider-range" class="slider_range"></div>
                            <p>Range: </p>
                            <p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
                        </div>
                    </div>
                    <div class="sidebar_section">
                        <div class="sidebar_subtitle color_subtitle">Color</div>
                        <ul class="colors_list">
                            <li class="color"><a href="#" style="background: #b19c83;"></a></li>
                            <li class="color"><a href="#" style="background: #000000;"></a></li>
                            <li class="color"><a href="#" style="background: #999999;"></a></li>
                            <li class="color"><a href="#" style="background: #0e8ce4;"></a></li>
                            <li class="color"><a href="#" style="background: #df3b3b;"></a></li>
                            <li class="color"><a href="#" style="background: #ffffff; border: solid 1px #e1e1e1;"></a></li>
                        </ul>
                    </div>
                    <div class="sidebar_section">
                        <div class="sidebar_subtitle brands_subtitle">Brands</div>
                        <ul class="brands_list">
                            @foreach($brands as $row)
                            <li class="brand"><a href="#">{{ $row->brand_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>

            <div class="col-lg-9">
                
                <!-- Shop Content -->

                <div class="shop_content">
                    <div class="shop_bar clearfix">
                        <div class="shop_product_count"><span>{{ $products->count() }}</span> products found</div>
                        <div class="shop_sorting">
                            <span>Sort by:</span>
                            <ul>
                                <li>
                                    <span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
                                    <ul>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
                                        <li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="product_grid row">
                        <div class="product_grid_border"></div>

                        <!-- Product Item -->
                        @foreach($products as $row)
                        <div class="product_item discount">
                            <div class="product_border"></div>
                            <div class="product_image d-flex flex-column align-items-center justify-content-center"><img width="100" src="{{ asset("Backend/assets/images/product/".$row->image_one) }}" alt=""></div>
                            <div class="product_content">
                                @if($row->discount_price == NULL)
                                <div class="product_price" style="color:black">{{ $row->selling_price }}</div>
                                @else
                                <div class="product_price">${{ $row->discount_price }}<span>${{ $row->selling_price }}</span></div>
                                @endif
                                <div class="product_name"><div><a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}" tabindex="0">{{ $row->product_name }}</a></div></div>
                            </div>
                            <button id="wishlist" data-id="{{ $row->id }}">
                                <div class="product_fav">
                                    <i class="fas fa-heart">
                                    </i>
                                </div>
                            </button>
                            <ul class="product_marks">
                                @if($row->discount_price == NULL)
                                <li class="product_mark product_new" style="background-color:green;">new</li>
                                @else
                                @php
                                    $amount = $row->selling_price - $row->discount_price;
                                    $discount = $amount/$row->selling_price*100;
                                @endphp
                                <li class="product_mark product_discount">-{{  intval($discount) }}%</li>
                                @endif
                            </ul>
                        </div>
                      @endforeach
                    </div>

                    <!-- Shop Page Navigation -->

                    <div class="shop_page_nav d-flex flex-row">
                        {{ $products->links() }}
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{ asset('Frontend/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('Frontend/js/shop_custom.js') }}"></script>  
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