<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{ __('user/layout.header.title') }}</title>
	<base href="{{asset('')}}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />
	<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
	<link rel="stylesheet" href="user/css/animate.css">
	<link rel="stylesheet" href="user/css/icomoon.css">
	<link rel="stylesheet" href="user/css/bootstrap.css">
	<link rel="stylesheet" href="user/css/magnific-popup.css">
	<link rel="stylesheet" href="user/css/flexslider.css">
	<link rel="stylesheet" href="user/css/owl.carousel.min.css">
	<link rel="stylesheet" href="user/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="user/css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="user/fonts/flaticon/font/flaticon.css">
	<link rel="stylesheet" href="user/css/style.css">
	<script src="user/js/modernizr-2.6.2.min.js"></script>
</head>
<body>	
	<div class="colorlib-loader"></div>
	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-2">
							<div id="colorlib-logo"><a href="#">{{ __('user/layout.header.logo') }}</a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul style="color: white;">
								<li><a href="user/hotels">{{ __('user/layout.header.hotel') }}</a></li>
								<li><a href="#">{{ __('user/layout.header.about') }}</a></li>
								<li><a href="#">{{ __('user/layout.header.contract') }}</a></li>
								
                <li class="js-user-login">
                    <a href="{{ route('home') }}">{{ __('user/layout.header.home') }}</a>
                </li>
                <li class="js-user-logined"></li>
              	<li class="js-user-login">
                		<a href="#" id="js-logout">{{ __('user/layout.header.logout') }}</a>
                </li>

                <li class="js-user-not-login">
                    <a href="{{ route('user.login') }}" id="user-login">{{ __('user/layout.header.login') }}</a>
                    <a href="{{ route('user.register') }}" id="user-register">{{ __('user/layout.header.register') }}</a>
                </li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<aside id="colorlib-hero" style="height: 500px;">
			@include('user/layout/slide')
		</aside>

		<div class="colorlib-wrap">
			<div class="container">
				<div class="row">
					<!-- Content -->
					@yield('content')
					<!-- SIDEBAR-->
					@include('user/layout/sidebar')
				</div>
			</div>
		</div>
		<!-- List Place -->
		<div id="colorlib-hotel">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<h2>Recommended Places</h2>
					</div>
				</div>
				<div class="row">
					@include('user/layout/place')
				</div>
			</div>
		</div>

		<footer id="colorlib-footer" role="contentinfo">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-3 colorlib-widget">
						<h4>{{ __('user/layout.header.social_network') }}</h4>
						<p>
							<ul class="colorlib-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-dribbble"></i></a></li>
							</ul>
						</p>
					</div>
					<div class="col-md-2 colorlib-widget">
						<h4>{{ __('user/layout.header.book_now') }}</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#">{{ __('user/layout.header.hotel') }}</a></li>
								<li><a href="#">{{ __('user/layout.header.car_rent') }}</a></li>
								<li><a href="#">{{ __('user/layout.header.beach_resorts') }}</a></li>
							</ul>
						</p>
					</div>

					<div class="col-md-2 colorlib-widget">
						<h4>{{ __('user/layout.header.top_deals') }}</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#">Edina Hotel</a></li>
								<li><a href="#">Quality Suites</a></li>
							</ul>
						</p>
					</div>

					<div class="col-md-3 col-md-push-1">
						<h4>{{ __('user/layout.header.contract_information') }}</h4>
						<ul class="colorlib-footer-links">
							<li>{{ __('user/layout.header.address_street') }}</li>
							<li><a href="#">{{ __('user/layout.header.address_phone') }}</a></li>
							<li><a href="#">{{ __('user/layout.header.address_email') }}</a></li>
							<li><a href="#">{{ __('user/layout.header.address_website') }}</a></li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 text-center">
						<p>
							{{ __('user/layout.header.footer_content') }}
						</p>
					</div>
				</div>
			</div>
		</footer>
	</div>
	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	<script src="user/js/jquery.min.js"></script>
	<script src="user/js/jquery.easing.1.3.js"></script>
	<script src="user/js/bootstrap.min.js"></script>
	<script src="user/js/jquery.waypoints.min.js"></script>
	<script src="user/js/jquery.flexslider-min.js"></script>
	<script src="user/js/owl.carousel.min.js"></script>
	<script src="user/js/jquery.magnific-popup.min.js"></script>
	<script src="user/js/magnific-popup-options.js"></script>
	<script src="user/js/bootstrap-datepicker.js"></script>
	<script src="user/js/jquery.stellar.min.js"></script>
	<script src="user/js/main.js"></script>
	@yield('java-script')
</body>
</html>
