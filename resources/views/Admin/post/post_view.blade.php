@extends('Admin.master')
@section('content')
<div class="row">
   <div class="col-12">
    <a style="float: right;" class="btn btn-info" href="{{ route('admin.post.index') }}">All Post</a>
   </div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card p-3">
                <!-- From section one -->
                <hr>
                <div class="row">
                <!--- colum 1 --->
                  <div class="col-md-6">
                      <strong>Post Title English:- <span>{{ $post->post_title_en }}</span></strong>
                  </div>
                  <!--- colum 2 --->
                  <div class="col-md-6">
                    <strong>Post Title Bangla:- <span>{{ $post->post_title_bn }}</span></strong>
                  </div>
              </div><!-- From row end -->
                <hr>
              <!-- From section Two -->
              <div class="row">
                <!--- colum 4 --->
                  <div class="col-md-6">
                    <strong>Post Category Name:- <span>{{ $post->postcategory->category_name_en }}</span></strong>
                  </div>
                  <!--- colum 5 --->
                  <div class="col-md-6">
                    <strong>Post Image:- <span><img width="80" src="{{ asset('Backend/assets/images/post/'.$post->post_image) }}" alt=""></span></strong>
                  </div>
              </div><!-- From row end -->
               <hr>
              <!-- From section Four -->
              <div class="row">
                  <div class="col-12">
                    <strong>Post Details English:-</strong><br>
                    <p>{!! $post->post_details_en !!}</p>
                  </div>
              </div><!-- From row end -->
               <hr>
                <!-- From section Four -->
                <div class="form-row">
                  <div class="col-12">
                    <strong>Post Details Bangla:-</strong><br>
                    <p>{!! $post->post_details_bn !!}</p>
                  </div>
              </div><!-- From row end -->
              <hr>
           <!--- Product From start --->
        </div>
	</div>
</div>
@endsection

