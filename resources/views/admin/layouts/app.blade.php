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
		<link href="{{ asset('css/main-admin.css') }}" rel="stylesheet">
		@yield('custom--css')
	</head>
	<body>

		{{-- WRAPPER UTAMA --}}
		<div class="wrapper">

			{{-- NAV KIRI --}}
			<div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
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
				<div class="sidebar-background" style="background-image: url(../assets/img/sidebar-1.jpg) "></div>
			</div>

			{{-- ISI KANAN --}}
			<div class="main-panel">
				<nav class="navbar navbar-transparent navbar-absolute">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="#">Admin Dashboard</a>
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
									<a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
		 							   <i class="material-icons">person</i>
		 							   <p class="hidden-lg hidden-md">Profile</p>
			 						</a>
								</li>
							</ul>
						</div>
					</div>
				</nav>

				<div class="content">
					{{-- YIELD CONTENT DENGAN CONTENT DINAMIS --}}
					@yield('content')
				</div>

				{{-- INCLUDE FOOTER --}}
				@include('admin.layouts.footer')

			</div>
		</div>

	    <!-- Scripts -->
	    <script src="{{ asset('js/admin_app.js') }}"></script>
		@yield('custom--js')
		@yield('content-js')
	</body>
</html>
