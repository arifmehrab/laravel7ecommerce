@extends('Admin.master')
@push('css')
<link href="{{ asset('Backend/assets/plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('Backend/assets/plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" />
<link href="{{ asset('Backend/assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" />
<link href="{{ asset('Backend/assets/plugins/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css" />
<!-- summernotes CSS -->
<link href="{{ asset('Backend/assets/plugins/summernote/dist/summernote-bs4.css') }}" rel="stylesheet" />
@endpush
@section('content')
<div class="row">
   <div class="col-12">
    <a style="float: right;" class="btn btn-info" href="{{ route('admin.product.index') }}">All Products</a>
   </div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card p-3">
           <!--- Product From start --->
            <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- From section one -->
                <div class="form-row">
                <!--- colum 1 --->
                  <div class="col-md-4">
                      <div class="form-group">
                         <label for="">Product Name <strong style="color: red;">*</strong></label>
                         <input type="text" class="form-control" name="product_name" value="{{ old('product_name') }}">
                      </div>
                      <!--- Error Message -->
                      @error('product_name')
                      <strong style="color: red;">{{ $message }}</strong>
                      @enderror
                  </div>
                  <!--- colum 2 --->
                  <div class="col-md-4">
                    <div class="form-group">
                       <label for="">Product Code <strong style="color: red;">*</strong></label>
                       <input type="text" class="form-control" name="product_code" value="{{ old('product_code') }}">
                    </div>
                  </div>
                  <!--- Error Message -->
                  @error('product_code')
                  <strong style="color: red;">{{ $message }}</strong>
                  @enderror
                <!--- colum 3 --->
                <div class="col-md-4">
                    <div class="form-group">
                       <label for="">Quantity <strong style="color: red;">*</strong></label>
                       <input type="text" class="form-control" name="product_quantity">
                    </div>
                </div>
              </div><!-- From row end -->

              <!-- From section Two -->
              <div class="form-row">
                <!--- colum 4 --->
                  <div class="col-md-4">
                      <div class="form-group">
                         <label for="">Category <strong style="color: red;">*</strong></label>
                         <select class="select2 form-control custom-select" style="width: 100%; height:60px;" name="category" id="category">
                            <option>Select</option>
                            @foreach($categories as $row)
                            <option value="{{ $row->id }}">
                                {{ $row->category_name }}
                            </option>
                            @endforeach
                        </select>
                      </div>
                  <!--- Error Message -->
                  @error('category')
                  <strong style="color: red;">{{ $message }}</strong>
                  @enderror
                  </div>
                  <!--- colum 5 --->
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Sub Category <strong style="color: red;">*</strong></label>
                        <select name="subcategory" class="select2 form-control custom-select" style="width: 100%; height:60px;" id="subcategory">
                            <option>Select</option>
                        </select>
                    </div>
                  </div>
                   <!--- colum 6 --->
                   <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Brand <strong style="color: red;">*</strong></label>
                        <select name="brand" class="select2 form-control custom-select" style="width: 100%; height:60px;">
                            <option>Select</option>
                               @foreach($brands as $row)
                               <option value="{{ $row->id }}">
                                 {{ $row->brand_name }}
                               </option>
                               @endforeach
                        </select>
                    </div>
                  </div>
              </div><!-- From row end -->

               <!-- From section Three -->
               <div class="form-row">
                <!--- colum 7 --->
                  <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Add Color <strong style="color: red;">*</strong></label><br>
                            <input name="product_color" type="text" class="form-control" value="green,black" data-role="tagsinput" placeholder="add Color" style="width: 100%; height:60px;" />
                      </div>
                 <!--- Error Message -->
                  @error('product_color')
                  <strong style="color: red;">{{ $message }}</strong>
                  @enderror
                  </div>
                  <!--- colum 8 --->
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Add Size <strong style="color: red;">*</strong></label><br>
                            <input name="product_size" type="text" class="form-control" value="M,L,XL" data-role="tagsinput" placeholder="add Size" style="width: 100%; height:60px;" />
                    </div>
                <!--- Error Message -->
                  @error('product_size')
                  <strong style="color: red;">{{ $message }}</strong>
                  @enderror
                  </div>
                   <!--- colum 9 --->
                   <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Selling Price <strong style="color: red;">*</strong></label>
                        <input type="text" class="form-control" name="selling_price" value="{{ old('selling_price') }}">
                    </div>
                  </div>
                   <!--- Error Message -->
                   @error('selling_price')
                   <strong style="color: red;">{{ $message }}</strong>
                   @enderror
              </div><!-- From row end -->

              <!-- From section Four -->
              <div class="form-row">
                  <div class="col-12">
                     <textarea name="product_details" class="summernote" rows="8">
                         Products Details write here... {{ old('product_details') }}
                     </textarea>
                  </div>
                   <!--- Error Message -->
                   @error('product_details')
                   <strong style="color: red;">{{ $message }}</strong>
                   @enderror
              </div><!-- From row end -->

              <!-- From section Five -->
              <div class="form-row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="">video Link<strong style="color: red;">*</strong></label>
                        <input type="text" class="form-control" name="video_link">
                    </div>
                </div>
            </div><!-- From row end -->

             <!-- From section Six -->
               <div class="form-row">
                <!--- colum 12 --->
                  <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Image One (Main Thumbnails) <strong style="color: red;">*</strong></label>
                        <div class="custom-file mb-3">
                            <input name="image1" type="file" class="custom-file-input" id="customFile" onchange="readURL(this)" required>
                            <label class="custom-file-label form-control" for="customFile">Choose file</label>
                          </div>
                          <img src="#" id="image1" alt="">
                  <!--- Error Message -->
                   @error('image1')
                   <strong style="color: red;">{{ $message }}</strong>
                   @enderror
                      </div>
                  </div>
                  <!--- colum 13 --->
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Image Two <strong style="color: red;">*</strong></label>
                        <div class="custom-file mb-3">
                            <input name="image2" type="file" class="custom-file-input" id="customFile" onchange="readURL2(this)" required>
                            <label class="custom-file-label form-control" for="customFile">Choose file</label>
                          </div>
                          <img src="#" id="image2" alt="">
                    <!--- Error Message -->
                   @error('image2')
                   <strong style="color: red;">{{ $message }}</strong>
                   @enderror
                    </div>
                  </div>
                   <!--- colum 14 --->
                   <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Image Three <strong style="color: red;">*</strong></label>
                        <div class="custom-file mb-3">
                            <input name="image3" type="file" class="custom-file-input" id="customFile" onchange="readURL3(this)" required>
                            <label class="custom-file-label form-control" for="customFile">Choose file</label>
                          </div>
                          <img src="#" id="image3" alt="">
                 <!--- Error Message -->
                   @error('image3')
                   <strong style="color: red;">{{ $message }}</strong>
                   @enderror
                    </div>
                  </div>
              </div><!-- From row end -->

              <!-- From section Seven -->
              <div class="form-row">
                <!--- colum 15 --->
                  <div class="col-md-4">
                      <div class="form-group">
                        <input name="main_slider" value="1" type="checkbox" id="main_slider" class="filled-in chk-col-purple">
                        <label for="main_slider">Main slider</label>
                      </div>
                  </div>
                  <!--- colum 16 --->
                  <div class="col-md-4">
                    <div class="form-group">
                        <input name="hot_deal" value="1" type="checkbox" id="hot_deal" class="filled-in chk-col-purple" >
                        <label for="hot_deal">Hot Deal</label>
                    </div>
                  </div>
                   <!--- colum 17 --->
                   <div class="col-md-4">
                    <div class="form-group">
                        <input name="best_rated" value="1" type="checkbox" id="best_rated" class="filled-in chk-col-purple">
                        <label for="best_rated">Best Band</label>
                    </div>
                  </div>
              </div><!-- From row end -->

            <!-- From section Eight -->
              <div class="form-row">
                <!--- colum 18 --->
                  <div class="col-md-4">
                      <div class="form-group">
                        <input name="mid_slider" value="1" type="checkbox" id="mid_slider" class="filled-in chk-col-purple">
                        <label for="mid_slider">Mid Slider</label>
                      </div>
                  </div>
                  <!--- colum 19 --->
                  <div class="col-md-4">
                    <div class="form-group">
                        <input name="hot_new" value="1" type="checkbox" id="hot_new" class="filled-in chk-col-purple" >
                        <label for="hot_new">Hot New</label>
                    </div>
                  </div>
                   <!--- colum 20 --->
                   <div class="col-md-4">
                    <div class="form-group">
                        <input name="trendy" value="1" type="checkbox" id="trendy" class="filled-in chk-col-purple">
                        <label for="trendy">Trendy</label>
                    </div>
                  </div>
              </div><!-- From row end -->
              <hr>
              <!-- From Submit section -->
              <div class="form-row">
                  <div class="col-12">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
              </div>

            </form>
           <!--- Product From start --->
        </div>
	</div>
</div>
@endsection
@push('js')
 <!-- This page plugins -->
   <script src="{{ asset('Backend/assets/plugins/select2/dist/js/select2.full.min.js') }}" type="text/javascript"></script>
   <script src="{{ asset('Backend/assets/plugins/bootstrap-select/bootstrap-select.min.js') }}" type="text/javascript"></script>
   <script src="{{ asset('Backend/assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('Backend/assets/plugins/multiselect/js/jquery.multi-select.js') }}"></script>
   <script src="{{ asset('Backend/assets/plugins/summernote/dist/summernote-bs4.min.js') }}"></script>
   <!--- Ajax Request For sub Category --->
   <script type="text/javascript">
       $(document).ready(function(){
          $(document).on('change','#category', function(){
              var category_id = $(this).val();
              $.ajax({
                  type: "GET",
                  url : "{{ route('admin.product.sub.get') }}",
                  data: {category_id,category_id},
                  success:function(data) {
                     var html = '<option value="">Select Subcategory</option>';
                     $.each(data, function(k,v){
                        html+= '<option value="'+v.id+'">'+v.subcategory_name+'</option>';
                     });
                     $('#subcategory').html(html);
                  }
              });
          });
       });
   </script>
   <!--- Image Render One --->
  <script type="text/javascript">
	function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#image1')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
  </script>
  <!--- Image Render Two --->
  <script type="text/javascript">
	function readURL2(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#image2')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
  </script>
  <!--- Image Render Three --->
  <script type="text/javascript">
	function readURL3(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#image3')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
  </script>
    <script>
    jQuery(document).ready(function() {

        $('.summernote').summernote({
            height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });

        $('.inline-editor').summernote({
            airMode: true
        });

    });

    window.edit = function() {
            $(".click2edit").summernote()
        },
        window.save = function() {
            $(".click2edit").summernote('destroy');
        }
    </script>
   <script type="text/javascript">
    $(function() {
       // For select 2
       $(".select2").select2();
       $('.selectpicker').selectpicker();
       // For multiselect
       $('#pre-selected-options').multiSelect();
       $('#optgroup').multiSelect({
           selectableOptgroup: true
       });
   });
 </script>
@endpush
