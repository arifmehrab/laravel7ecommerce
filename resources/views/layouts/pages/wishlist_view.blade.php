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
				<div class="col-lg-12">
					<div class="cart_container">
						<div class="cart_title">Wishlist</div>
						<div class="cart_items">
							<ul class="cart_list">
                                @foreach($wishlistView as $row)
								<li class="cart_item clearfix">
									<div class="cart_item_image"><img height="100" src="{{ asset('Backend/assets/images/product/'.$row->product->image_one) }}" alt=""></div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Name</div>
											<div class="cart_item_text">{{ $row->product->product_name }}</div>
										</div>
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Color</div>
											<div class="cart_item_text">{{ $row->product->product_color }}</div>
										</div>
									
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Size</div>
											<div class="cart_item_text">{{ $row->product->product_size }}</div>
										</div>
									
										<div class="cart_item_quantity cart_info_col">
                                            <div class="cart_item_title">Product Code</div>
                                            <div class="cart_item_text">{{ $row->product->product_code }}</div>
										</div>
										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title">Price</div>
                                            @if($row->product->discount_price == NULL)
                                            <div class="cart_item_text">${{ $row->product->selling_price }}</div>
                                            @else
                                            <div class="cart_item_text">
                                                <strong style="color: red">${{ $row->product->discount_price }}</strong>/
                                                ${{ $row->product->selling_price }}
                                            </div>
                                            @endif
										</div>
                                        <div class="cart_item_total cart_info_col">
                                            <div class="cart_item_title">Action</div>
                                            <br>
											<button data-id="{{ $row->product_id }}" class="btn btn-primary" id="product_cart_button" type="button" data-toggle="modal" data-target="#productView">
                                                Add To Cart
                                              </button>
										</div>
									</div>
                                </li>
                                @endforeach
							</ul>
						</div>
						
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
          $(document).on('click', '#product_cart_button', function(){
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
@endpush