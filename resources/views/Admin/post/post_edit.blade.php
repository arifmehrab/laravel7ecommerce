@extends('Admin.master')
@push('css')
<link href="{{ asset('Backend/assets/plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('Backend/assets/plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" />
<!-- summernotes CSS -->
<link href="{{ asset('Backend/assets/plugins/summernote/dist/summernote-bs4.css') }}" rel="stylesheet" />
@endpush
@section('content')
<div class="row">
   <div class="col-12">
    <a style="float: right;" class="btn btn-info" href="{{ route('admin.post.index') }}">All Post</a>
   </div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card p-3">
           <!--- Product From start --->
            <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <!-- From section one -->
                <div class="form-row">
                <!--- colum 1 --->
                  <div class="col-md-6">
                      <div class="form-group">
                         <label for="">Post Title English <strong style="color: red;">*</strong></label>
                         <input type="text" class="form-control" name="post_title_en" value="{{ $post->post_title_en }}">
                      </div>
                      <!--- Error Message -->
                      @error('post_title_en')
                      <strong style="color: red;">{{ $message }}</strong>
                      @enderror
                  </div>
                  <!--- colum 2 --->
                  <div class="col-md-6">
                    <div class="form-group">
                       <label for="">Post Title Bangla<strong style="color: red;">*</strong></label>
                       <input type="text" class="form-control" name="post_title_bn" value="{{ $post->post_title_bn }}">
                    </div>
                  </div>
                  <!--- Error Message -->
                  @error('post_title_bn')
                  <strong style="color: red;">{{ $message }}</strong>
                  @enderror
              </div><!-- From row end -->

              <!-- From section Two -->
              <div class="form-row">
                <!--- colum 4 --->
                  <div class="col-md-6">
                      <div class="form-group">
                         <label for="">Post Category <strong style="color: red;">*</strong></label>
                         <select class="select2 form-control custom-select" style="width: 100%; height:60px;" name="postcategory_id" id="category">
                            <option>Select postcategory</option>
                            @foreach($postcategories as $row)
                            <option {{ ($post->postcategory_id == $row->id)?'selected':'' }} value="{{ $row->id }}">
                                {{ $row->category_name_en }}
                            </option>
                            @endforeach
                        </select>
                      </div>
                  <!--- Error Message -->
                  @error('postcategory_id')
                  <strong style="color: red;">{{ $message }}</strong>
                  @enderror
                  </div>
                  <!--- colum 5 --->
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Post Thumbnails Image <strong style="color: red;">*</strong></label>
                        <input type="file" name="post_image" class="form-control" onchange="readURL(this)">
                        <img  width="80" height="80" src="{{ asset('Backend/assets/images/post/'.$post->post_image) }}" id="image1" alt="">
                        </select>
                 <!--- Error Message -->
                  @error('post_image')
                  <strong style="color: red;">{{ $message }}</strong>
                  @enderror
                    </div>
                  </div>
              </div><!-- From row end -->

              <!-- From section Four -->
              <div class="form-row">
                  <div class="col-12">
                     <textarea name="post_details_en" class="summernote" rows="3">
                         {{ $post->post_details_en }}
                     </textarea>
                  </div>
                   <!--- Error Message -->
                   @error('post_details_en')
                   <strong style="color: red;">{{ $message }}</strong>
                   @enderror
              </div><!-- From row end -->

               <!-- From section Four -->
               <div class="form-row">
                <div class="col-12">
                   <textarea name="post_details_bn" class="summernote" rows="3">
                    {{ $post->post_details_bn  }}
                   </textarea>
                </div>
                 <!--- Error Message -->
                 @error('post_details_bn')
                 <strong style="color: red;">{{ $message }}</strong>
                 @enderror
            </div><!-- From row end -->
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
   <script src="{{ asset('Backend/assets/plugins/summernote/dist/summernote-bs4.min.js') }}"></script>
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
   });
 </script>
@endpush
