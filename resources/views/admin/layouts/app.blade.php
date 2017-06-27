<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <!-- CSRF Token -->
	    <meta name="csrf-token" content="{{ csrf_token() }}">

	    <title>{{ config('app.name', 'Laravel') }}</title>

	    <!-- Styles -->
	    <link href="{{ asset('css/admin_app.css') }}" rel="stylesheet">
		<link href="{{ asset('css/main-admin.css?v='. mt_rand(0, 999)) }}" rel="stylesheet">
		<link href="{{ asset('css/dropify.css') }}" rel="stylesheet">
		@yield('custom--css')
	</head>
	<body>

		{{-- CHECK IF ADMIN IS LOGGED IN --}}
		@if ( Auth::guard('admin')->check() )
			{{-- WRAPPER UTAMA --}}
			<div class="wrapper">

				{{-- NAV KIRI --}}
				<div class="sidebar" data-color="purple" data-image="{{ asset('img/admin/coding.jpg') }}">
					<!--
				        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
				        Tip 2: you can also add an image using data-image tag
				    -->
					<div class="logo">
						<a href="http://komputerkit.dev/admin" class="simple-text">
							Kursus <br> KomputerKit
						</a>
					</div>

					<div class="sidebar-wrapper sidebar-wrapper--custom">
						{{-- INCLUDE NAV FROM OTHER FILE --}}
						@include('admin.layouts.side-nav')
					</div>

					<div class="sidebar-footer">
						{{-- <ul class="nav">
							<li class="active-pro"> --}}
								<a href="!#" id="admin--jam">
									<i class="material-icons">watch_later</i>&nbsp;&nbsp;
									<span id="admin--jam-c">Loading...</span>
								</a>
							{{-- </li>
						</ul> --}}
					</div>

					<div class="sidebar-background" style="background-image: url({{ asset('img/admin/coding.jpg') }}) "></div>
				</div>

				{{-- ISI KANAN --}}
				<div class="main-panel">
					<nav class="navbar navbar-custom navbar-absolute">
						<div class="container-fluid">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand" href="#"> @yield('page-title') </a>
							</div>
							<div class="collapse navbar-collapse">
								<ul class="nav navbar-nav navbar-right">
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">
											<i class="material-icons">notifications</i>
											<span class="notification">5</span>
											<p class="hidden-lg hidden-md">Notifications</p>
										</a>
										<ul class="dropdown-menu">
											<li><a href="#">Mike John responded to your email</a></li>
											<li><a href="#">You have 5 new tasks</a></li>
											<li><a href="#">You're now friend with Andrew</a></li>
											<li><a href="#">Another Notification</a></li>
											<li><a href="#">Another One</a></li>
										</ul>
									</li>
									<li>
			 							   <i class="material-icons">person</i>
			 							   <p class="hidden-lg hidden-md">Profile</p>
				 						</a>
									</li>
								</ul>
							</div>
						</div>
					</nav>

					<div class="content">
						<a href="#pablo" class="dropdown-toggle" data-toggle="dropdown"></a>
						{{-- YIELD CONTENT DENGAN CONTENT DINAMIS --}}
						@yield('content')
					</div>

					{{-- INCLUDE FOOTER --}}
					@include('admin.layouts.footer')

				</div>
			</div>
		@else
			<div class="content">
				{{-- YIELD CONTENT DENGAN CONTENT DINAMIS --}}
				@yield('content')
			</div>
		@endif

		@yield('modal')

	    <!-- Scripts -->
	    <script src="{{ asset('js/admin_app.js') }}"></script>
		<script src="{{ asset('js/dt.min.js') }}" charset="utf-8"></script>
		<script src="{{ asset('js/dropify.js') }}" charset="utf-8"></script>

		@yield('custom--js')

		<script type="text/javascript">
			$(document).ready(function() {
				$('.dropify').dropify({
					messages: {
				        'default': 'Drag atau drop file didalam area berikut',
				        'replace': 'Drag atau drop file untuk mengganti',
				        'remove':  'Hapus',
				        'error':   'Upppssss, ada sesuatu buruk terjadi.'
				    }
				});

				$('#admin--jam').click(function(event) {
					event.preventDefault();
				});
				$('.li--main').click(function(event) {
					event.preventDefault();
				});
				function timer() {
					$('#admin--jam-c').html(moment().format('D MMMM YYYY H:mm:ss'));
				}
				setInterval(timer, 1000);
			});
		</script>

		@yield('content-js')
	</body>
</html>
