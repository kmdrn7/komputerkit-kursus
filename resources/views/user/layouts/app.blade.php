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
            <li><div class="userView">
            <div class="background" style="background-color: #292C44;"></div>
            <a href="#!user"><img class="circle" src="{{ asset('img/com.jpg') }}"></a>
            <a href="#!name"><span class="white-text name">{{ Auth::user()->name }}</span></a>
            <a href="#!email"><span class="white-text email">{{ Auth::user()->email }}</span></a>
            </div></li>
			@isset( $id_detail_kursus )
				<input type="hidden" name="KJashkjasdb" id="KJashkjasdb" value="{{ $id_detail_kursus }}">
				<input type="hidden" name="aASDbjkbasd" id="aASDbjkbasd" value="{{ Auth::user()->name }}">
			@endisset
            <li><a href="{{ url('/me') }}">Dasbor</a></li>
            <li><a href="{{ url('/kursus/all') }}">Semua Kursus</a></li>
            <li><a href="pages/bookmark.html">Bookmark</a></li>
            <li><a href="{{ url('/kelas') }}">Kelas</a></li>
            <li><div class="divider" style="margin-bottom: 8px;"></div></li>
            <li><a href="#!">Kursus Saya</a></li>
            <li><div class="divider" style="margin-bottom: 8px;"></div></li>
            <li><a href="#!">Notifikasi</a></li>
            <li><a href="#!">Log Out</a></li>
        </ul>

		<div class="col s12 main-header">
            <div class="row" style="padding: 20px 20px 0 20px; margin-bottom: 0;">
                <a href="#" data-activates="slide-out" class="button-collapse">
					<i class="material-icons left" style="font-size: 40px;">menu</i>
				</a>
                <a href="#" class="btn-floating pulse right">
					<i class="material-icons right" style=";">notifications</i>
				</a>
				<!-- Dropdown Trigger -->
				{{-- <a href="#" data-activates="slide-out" class="button-collapse right">
					Andika Ahmad Ramdhan
					<i class="material-icons left" style="font-size: 40px;">menu</i>
				</a> --}}
				<a class='right button-collapse btn-menu' href='#' data-activates='slide-out'>
					{{ Auth::user()->name }}
					<i class="material-icons" style="font-size: 30px">arrow_drop_down</i>
				</a>

				<!-- Dropdown Structure -->
				{{-- <ul id='dropdown1' class='dropdown-content'> --}}
					{{-- <li><a href="#!">Profil</a></li> --}}
					{{-- <li><a href="#!">two</a></li> --}}
					{{-- <li class="divider"></li> --}}
					{{-- <li><a href="#!">three</a></li> --}}
				{{-- </ul> --}}
				{{-- <a href="" class=" right btn-menu">Menu</a>
				<a href="" class=" right btn-menu">Menu</a>
				<a href="" class=" right btn-menu">Menu</a> --}}
            </div>
            <div class="row no-margin-bottom valign-wrapper" style="height: 150px; margin-left: auto; margin-right: auto;">
				<a href="{{ url('/') }}" style="margin:auto">
					<img src="{{ asset('img/logo/logo-KIT.png') }}" alt="" style="width: 400px; margin: auto" class="bd">
				</a>
            </div>
        </div>
        @yield('content')
    {{-- </div> --}}
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
	<script src="{{ asset('js/main_app.js') }}"></script>
	@yield('custom--js')
	@yield('content-js')
</body>
</html>
