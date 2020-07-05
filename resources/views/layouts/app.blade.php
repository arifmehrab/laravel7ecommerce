<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="Ecommerce online shop">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('Frontend/styles/bootstrap4/bootstrap.min.css') }}">
<link href="{{ asset('Frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('Frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('Frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('Frontend/plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('Frontend/plugins/slick-1.8.0/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('Frontend/styles/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('Frontend/styles/responsive.css') }}">
<!-- alerts CSS -->
<link href="{{ asset('Backend/assets/plugins/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
<!-- alerts CSS -->
<link href="{{ asset('Backend/assets/toster-js/css/toastr.css') }}" rel="stylesheet">

</head>

<body>

<div class="super_container">
	
	<!-- Header -->
	
	<header class="header">

		<!-- Top Bar -->

		@include('layouts.partials.topbar')

		<!-- Header Main -->

		@include('layouts.partials.main_header');
		
		<!-- Main Navigation -->

		@yield('category_menu')
		
        <!-- Menu -->
        @include('layouts.partials.menu')

    </header>
    
    <!--- Content Area --->
    @yield('content')
	
   <!-- Newsletter -->
   @include('layouts.partials.newsletter');

	<!-- Footer -->

    @include('layouts.partials.footer')

	<!-- Copyright -->

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
						<div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Developed By  <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">ArifMehrab</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
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
</div>

<script src="{{ asset('Frontend/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('Frontend/styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('Frontend/styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('Frontend/plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('Frontend/plugins/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset('Frontend/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('Frontend/plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('Frontend/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('Frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('Frontend/plugins/slick-1.8.0/slick.js') }}"></script>
<script src="{{ asset('Frontend/plugins/easing/easing.js') }}"></script>
<script src="{{ asset('Frontend/js/custom.js') }}"></script>
<!--- Notify js Start --->
<script src="{{ asset('Backend/assets/toster-js/js/toastr.js') }}"></script>
<!-- Sweet-Alert  -->
<script src="{{ asset('Backend/assets/plugins/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('Backend/assets/plugins/sweetalert2/sweet-alert.init.js') }}"></script>
<!--- Toastr Message --->
<script>
    @if(Session::has('message'))
      var type="{{Session::get('alert-type','info')}}"
      switch(type){
          case 'info':
               toastr.info("{{ Session::get('message') }}");
               break;
          case 'success':
              toastr.success("{{ Session::get('message') }}");
              break;
          case 'warning':
             toastr.warning("{{ Session::get('message') }}");
              break;
          case 'error':
              toastr.error("{{ Session::get('message') }}");
              break;
      }
    @endif
 </script>
</body>

</html>