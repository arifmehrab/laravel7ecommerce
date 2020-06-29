@extends('Admin.master')
@section('content')
<div class="row">
   <div class="col-12">
    <a style="float: right;" class="btn btn-info" href="{{ route('admin.product.index') }}">All Products</a>
   </div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card p-3">
            <div class="row">
               <div class="col-md-4">
                   <strong>Product Name:- {{ $productShow->product_name }} </strong>
               </div><!-- edn colum -->
               <div class="col-md-4">
                <strong>Product Code:- {{ $productShow->product_code }} </strong>
              </div><!-- edn colum -->
              <div class="col-md-4">
                <strong>Product Quantity:- {{ $productShow->product_quantity }} </strong>
              </div><!-- edn colum -->
            </div><!--- end 2nd row -->
            <br><hr>
            <div class="row">
                <div class="col-md-4">
                    <strong>Product Category:- {{ $productShow->category->category_name }} </strong>
                </div><!-- edn colum -->
                <div class="col-md-4">
                  <strong>Product Subcategory:- {{ $productShow->subcategory->subcategory_name }} </strong>
                </div><!-- edn colum -->
                <div class="col-md-4">
                 <strong>Product Brand:- {{ $productShow->brand->brand_name }} </strong>
               </div><!-- edn colum -->
             </div><!--- end 2nd row -->
             <br><hr>
             <div class="row">
              <div class="col-md-4">
                <strong>Product Color:- {{ $productShow->product_color }} </strong>
              </div><!-- edn colum -->
                <div class="col-md-4">
                    <strong>Product size:- {{ $productShow->product_size }} </strong>
                </div><!-- edn colum -->  
                <div class="col-md-4">
                 <strong>Product Price:- {{ $productShow->selling_price }} </strong>
               </div><!-- edn colum -->
            </div><!--- end 2nd row -->
             <br><hr>
             <div class="row">
                <div class="col-md-12">
                    <strong>Product Details:-</strong>
                    <p>{!! $productShow->product_details !!}</p>
                </div><!-- edn colum -->
            </div><!--- end 2nd row -->
             <br><hr>
             <div class="row">
                <div class="col-md-4">
                    <strong>Product Image One:-</strong>
                    <img width="100" height="100" src="{{ asset('Backend/assets/images/product/'.$productShow->image_one) }}" alt="">
                </div><!-- edn colum -->
                <div class="col-md-4">
                    <strong>Product Image Two:-</strong>
                    <img width="100" height="100" src="{{ asset('Backend/assets/images/product/'.$productShow->image_two) }}" alt="">
               </div><!-- edn colum -->
               <div class="col-md-4">
                <strong>Product Image Three:-</strong>
                <img width="100" height="100" src="{{ asset('Backend/assets/images/product/'.$productShow->image_three) }}" alt="">
               </div><!-- edn colum -->
            </div><!--- end 2nd row -->
             <br><hr>
             <div class="row">
                <div class="col-md-4">
                    <strong>Main Slider</strong>
                    @if($productShow->main_slider == 1)
                    <span class="bg-primary p-2 text-light">Active</span>
                    @else
                    <span class="bg-danger p-2 text-light">Inactive</span>
                    @endif
                </div><!-- edn colum -->
                <div class="col-md-4">
                    <strong>Hot Deal</strong>
                    @if($productShow->hot_deal == 1)
                    <span class="bg-primary p-2 text-light">Active</span>
                    @else
                    <span class="bg-danger p-2 text-light">Inactive</span>
                    @endif
               </div><!-- edn colum -->
               <div class="col-md-4">
                <strong>Best Rated</strong>
                @if($productShow->best_rated == 1)
                <span class="bg-primary p-2 text-light">Active</span>
                @else
                <span class="bg-danger p-2 text-light">Inactive</span>
                @endif
               </div><!-- edn colum -->
            </div><!--- end 2nd row -->
             <br><hr>
             <div class="row">
                <div class="col-md-4">
                    <strong>Mid Slider</strong>
                    @if($productShow->mid_slider == 1)
                    <span class="bg-primary p-2 text-light">Active</span>
                    @else
                    <span class="bg-danger p-2 text-light">Inactive</span>
                    @endif
                </div><!-- edn colum -->
                <div class="col-md-4">
                    <strong>Hot New</strong>
                    @if($productShow->hot_new == 1)
                    <span class="bg-primary p-2 text-light">Active</span>
                    @else
                    <span class="bg-danger p-2 text-light">Inactive</span>
                    @endif
               </div><!-- edn colum -->
               <div class="col-md-4">
                <strong>Trendy</strong>
                @if($productShow->trendy == 1)
                <span class="bg-primary p-2 text-light">Active</span>
                @else
                <span class="bg-danger p-2 text-light">Inactive</span>
                @endif
               </div><!-- edn colum -->
            </div><!--- end 2nd row -->
             <br><hr>
        </div>
	</div><!--- End colum -->
</div><!--- end row --->
@endsection
