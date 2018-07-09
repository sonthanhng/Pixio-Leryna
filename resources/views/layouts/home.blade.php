
<!DOCTYPE html>
	<html class="no-js">
	<head>
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Leryna</title>

	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600,400italic,700' rel='stylesheet' type='text/css'>

	<!-- Animate.css -->
	<link rel="stylesheet" href="{{asset('css/animate.css')}}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
	<!-- Simple Line Icons -->
	<link rel="stylesheet" href="{{asset('css/simple-line-icons.css')}}">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">

	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<link rel="stylesheet" href="{{asset('css/custom.css')}}">
	<link rel="stylesheet" href="{{asset('css/responsive.css')}}">


	<script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>
  @yield('header')

</head>
<body>
	<header role="banner" id="fh5co-header">
			<div class="container">
			    <nav class="navbar navbar-default">
		        <div class="navbar-header">
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
		          	<a class="navbar-brand" href="/">
									<img src="{{ asset('images/public/logo.png') }}"/>
								</a>
		        </div>
		        <div id="navbar" class="navbar-collapse collapse">
		          <ul class="nav navbar-nav navbar-right">
		            <li class="homepage-tab {{ (Request::is('/') ? 'active' : '') }}"><a href="/"><span>Trang chủ</span></a></li>
		            <li class="{{ (Request::is('products/*') || Request::is('products') || Request::is('product/*') ? 'active' : '') }}"><a href="/products"><span>Sản phẩm</span></a></li>
		            <li class="{{ (Request::is('about') ? 'active' : '') }}"><a href="/about"><span>Về Leryna</span></a></li>
		            <li class="{{ (Request::is('blogs/*') || Request::is('blogs') ? 'active' : '') }}"><a href="/blogs"><span>Blog</span></a></li>
								<li class="contact-tab"><a href="#" data-nav-section="contact"><span>Contact</span></a></li>
		          </ul>
		        </div>
			    </nav>
		  </div>
	</header>
  @yield('content')
  <footer id="footer" data-section="contact" role="contentinfo">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p class="text-center">depxopnails@yahoo.com<br /> 0962 144 072 - 0962 788 854 - 0962 977 721<br> 622/7 Xa Lộ Hà Nội, P. Phước Bình, Quận 9, HCM</p>
				</div>
			</div>
		</div>
	</footer>


	<!-- jQuery -->
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<!-- jQuery Easing -->
	<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
	<!-- Bootstrap -->
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<!-- Waypoints -->
	<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
	<!-- Owl Carousel -->
	<script src="{{ asset('js/owl.carousel.min.js') }}"></script>

	<!-- Main JS (Do not remove) -->
	<script src="{{ asset('js/main.js') }}"></script>
	<script src="{{ asset('js/modal-control.js') }}"></script>

	</body>
</html>
