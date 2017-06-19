<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Komputer Kit') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/main-app.css') }}" rel="stylesheet">
	@yield('custom--css')
</head>
<body>
    {{-- <div id="app"> --}}
		<ul id="slide-out" class="side-nav">
            <li>
				<div class="userView">
		            <div class="background teal" style=""></div>
		            <img class="circle" src="{{ asset('img/com.jpg') }}" style="background-color: whitesmoke; padding: 2px;">
		            <span class="white-text name">{{ Auth::user()->name }}</span>
		            <span class="white-text email">{{ Auth::user()->email }}</span>
	            </div>
			</li>
			@isset( $id_detail_kursus )
				<input type="hidden" name="KJashkjasdb" id="KJashkjasdb" value="{{ $id_detail_kursus }}">
				<input type="hidden" name="aASDbjkbasd" id="aASDbjkbasd" value="{{ Auth::user()->name }}">
			@endisset
            <li><a href="{{ url('/me') }}">Dashboard</a></li>
            <li><a href="{{ url('/kursus/all') }}">Semua Kursus</a></li>
			<li><a href="{{ url('/histori') }}">Histori Kursus</a></li>
            <li><a href="{{ url('/bookmark') }}">Bookmark</a></li>

			<li><div class="divider" style="margin-bottom: 8px;"></div></li>
			<li><a href="{{ url('/kelas') }}">Kelas</a></li>
			<li><div class="divider" style="margin-bottom: 8px;"></div></li>

			<li><a href="{{ url('/notifikasi') }}">Notifikasi</a></li>
            <li><a href="{{ url('/user/logout') }}">Log Out</a></li>
        </ul>

		<div class="col s12 main-header">
            <div class="row" style="padding: 20px 20px 0 20px; margin-bottom: 0;">
                <a href="#" data-activates="slide-out" class="button-collapse">
					<i class="material-icons left" style="font-size: 40px;">menu</i>
				</a>
				<a class='right button-collapse btn-menu' href='#' data-activates='slide-out'>
					{{ Auth::user()->name }}
					<i class="material-icons" style="font-size: 30px">arrow_drop_down</i>
				</a>
            </div>
            <div class="row no-margin-bottom valign-wrapper" style="height: 150px; margin-left: auto; margin-right: auto;">
				<a href="{{ url('/') }}" style="margin:auto">
					<img src="{{ asset('img/logo/logo-KIT.png') }}" alt="" style="width: 400px; margin: auto">
				</a>
            </div>
        </div>
        @yield('content')
    {{-- </div> --}}

	<footer class="teal page-footer">
		<div class="container">
			<div class="row">
				<div class="col l6 s12">
					<h5 class="white-text">KomputerKit</h5>
					<p class="grey-text text-lighten-4">Tempat belajar pemrograman mulai dari dasar hingga profesional.</p>
				</div>
				<div class="col l4 offset-l2 s12">
					<h5 class="white-text">Komtak Kami</h5>
					<ul>
						<li><a class="grey-text text-lighten-3" href="#!">Email</a></li>
						<li><a class="grey-text text-lighten-3" href="#!">Facebook</a></li>
						<li><a class="grey-text text-lighten-3" href="#!">Instagram</a></li>
						<li><a class="grey-text text-lighten-3" href="#!">Line</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
				© 2014 KomputerKit - Sidoarjo - Jawa Timur
				<a class="grey-text text-lighten-4 right" href="#!">Google Maps</a>
			</div>
		</div>
	</footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
	<script src="{{ asset('js/main_app.js') }}"></script>
	@yield('custom--js')
	@yield('content-js')
</body>
</html>
