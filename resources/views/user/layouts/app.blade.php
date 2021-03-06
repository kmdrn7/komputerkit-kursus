<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - Kursus KomputerKit</title>

    <!-- Styles -->
	<link href="https://fonts.googleapis.com/css?family=Spectral:200,300,400,500,600,700,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
	@if ( env('APP_ENV') == 'local' )
		<link href="{{ asset('css/app.css?v=1.1.0') }}" rel="stylesheet">
		<link href="{{ asset('css/main-app.css?v=1.1.0' . rand(0,999)) }}" rel="stylesheet">
	@else
		<link href="{{ asset('css/app.css?v='. env('APP_VERSION', '1.1.1')) }}" rel="stylesheet">
		<link href="{{ asset('css/main-app.css?v='. env('APP_VERSION', '1.1.1')) }}" rel="stylesheet">
	@endif
	<script src="https://use.fontawesome.com/d8b86d541f.js"></script>
	@yield('custom--css')
</head>
<body>
	<ul id="slide-out" class="side-nav">
        <li>
			<div class="userView">
	            <div class="background" style="background-color: rgb(19,44,68)"></div>
	            <img class="circle" src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim(Auth::user()->email))) }}?d=retro&s=512" style="background-color: whitesmoke; padding: 2px;">
	            <span class="white-text name">{{ Auth::user()->name }}</span>
	            <span class="white-text email">{{ Auth::user()->email }}</span>
            </div>
		</li>
		@isset( $id_detail_kursus )
			<input type="hidden" name="KJashkjasdb" id="KJashkjasdb" value="{{ $id_detail_kursus }}">
			<input type="hidden" name="aASDbjkbasd" id="aASDbjkbasd" value="{{ Auth::user()->name }}">
		@endisset
        <li><a href="{{ url('/me') }}"><i class="fa fa-home"></i>Dashboard</a></li>
		<li><a href="{{ url('/profil') }}"><i class="fa fa-user"></i>Profil</a></li>
		<li><a href="{{ url('/histori') }}"><i class="fa fa-history"></i>Histori Kursus</a></li>
        <li><a href="{{ url('/bookmark') }}"><i class="fa fa-bookmark"></i>Bookmark</a></li>
		<li><a href="{{ url('/kursus/all') }}"><i class="fa fa-book"></i>Semua Kursus</a></li>
		<li><a href="{{ url('/kursus/free/all') }}"><i class="fa fa-book"></i>Semua Tutorial</a></li>

		<li><div class="divider" style="margin-bottom: 8px;"></div></li>
		<li><a href="{{ url('/kelas') }}"><i class="fa fa-desktop"></i>Kelas</a></li>
		<li><div class="divider" style="margin-bottom: 8px;"></div></li>

		{{-- <li><a href="{{ url('/notifikasi') }}"><i class="fa fa-bell"></i>Notifikasi</a></li> --}}
        <li><a href="{{ url('/user/logout') }}"><i class="fa fa-sign-out"></i>Log Out</a></li>
    </ul>

	<div class="row row-header">
		<div class="col s12">
			<div class="row" style="padding: 20px 20px 0 20px; margin-bottom: 0;">
				<a href="#" data-activates="slide-out" class="button-collapse button-nav-left">
					<i class="material-icons left white-text" style="font-size: 40px;">menu</i>
				</a>
				<a href="{{ url('/') }}" class="button-nav left hide-on-small-only">
					{{-- <strong>KomputerKit</strong><small>.com</small> --}}
					Beranda
				</a>
				<a href="{{ url('/kelas') }}" class="button-nav left hide-on-med-and-down">
					Masuk Kelas
				</a>
				<a href="{{ url('/kursus/all') }}" class="button-nav left hide-on-small-only">
					Kursus
				</a>
				<a href="{{ url('/kursus/free/all') }}" class="button-nav left hide-on-med-and-down">
					Tutorial
				</a>
				<a class='right button-main-header hide-on-small-only' href='{{ url('/user/logout') }}' style="margin-left: 10px">
					Logout
				</a>
				<a class='right button-main-header bmh-clickable hide-on-small-only' href='javascript:void(0)'>
					<i class="material-icons right">arrow_drop_down</i> {{ Auth::user()->name }}
				</a>
			</div>
		</div>
	</div>

	<div id="this--is--main--wrap">
		@yield('content')
	</div>

	<footer class="page-footer ft-top" id="this--is--main--footer">
		<div class="container">
			<div class="row ft-top">
				<div class="col l6 s12">
					<span class="white-text ft-header">Kursus Komputer Kit</span>
					<p class="ft-subheader grey-text text-lighten-4">Tempat belajar pemrograman mulai dari dasar hingga profesional.</p>
				</div>
				<div class="col l4 offset-l2 s12">
					<h5 class="white-text ft-kontak">Kontak Kami</h5>
					<ul>
						<li><a class="white-text text-lighten-3" href="mailto:komputerkit.dev@gmail.com"><i class="fa fa-inbox"></i>&nbsp; komputerkit.dev@gmail.com</a></li>
						<li><a class="white-text text-lighten-3" href="https://facebook.com"><i class="fa fa-facebook-square"></i>&nbsp; Facebook</a></li>
						<li><a class="white-text text-lighten-3" href="https://instagram.com"><i class="fa fa-instagram"></i>&nbsp; Instagram</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row no-margin-bottom ft-bot">
			<div class="col m12 s12">
				<div class="ft-copyright">
					<strong>Kursus KomputerKit</strong> &copy; 2016 - {{ date('Y') }} <span style="margin: 0 5px;">||</span> <i class="fa fa-code"></i>&nbsp; dengan &nbsp;❤&nbsp; di <strong>Buduran/Sidoarjo.</strong>
				</div>
			</div>
		</div>
	</footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
	<script src="{{ asset('js/main_app.js') }}"></script>
	<script type="text/javascript">
		$('.bmh-clickable').click(function(event) {
			$('.button-collapse').sideNav('show');
		});
	</script>
	@yield('custom--js')
	@yield('content-js')
</body>
</html>
