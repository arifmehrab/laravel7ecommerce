@extends('layouts.app')
@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('Frontend/styles/blog_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('Frontend/styles/blog_responsive.css') }}">
@endpush
@section('content')
	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('Frontend/images/shop_background.jpg') }}"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">Blog</h2>
		</div>
	</div>

	<!-- Blog -->

	<div class="blog">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="blog_posts d-flex flex-row align-items-start justify-content-between">
						
                        <!-- Blog post -->
                        @foreach($blogs as $row)
						<div class="blog_post">
                            <div class="blog_image" style="background-image:url({{ asset('/Backend/assets/images/post/'.$row->post_image) }})"></div>
                            @if(Session::get('language') == 'english')
                            <div class="blog_text">{{ $row->post_title_en }}</div>
                            @else
                            <div class="blog_text">{{ $row->post_title_bn }}</div>
                            @endif
                            @if(Session::get('language') == 'bangla')
                            <div class="blog_button"><a href="blog_single.html"></a>পড়া চালিয়ে যান</div>
                            @else
                            <div class="blog_button"><a href="blog_single.html"></a>Continue Reading</div>
                            @endif
						</div>
					   @endforeach
					</div>
				</div>
					
			</div>
		</div>
	</div>
@endsection
@push('js')
<script src="{{ asset('Frontend/js/blog_custom.js') }}"></script>
@endpush