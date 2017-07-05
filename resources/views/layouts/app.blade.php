<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <!-- CSRF Token -->
	    <meta name="csrf-token" content="{{ csrf_token() }}">

	    <title>Login - Kursus KomputerKit</title>

	    <!-- Styles -->
	    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<link href="{{ asset('css/login-app.css?v='. rand(0,999)) }}" rel="stylesheet">

		{{-- <link href="{{ asset('materialize/css/materialize.min.css') }}" rel="stylesheet"> --}}
		<script src='https://www.google.com/recaptcha/api.js?onload=CaptchaCallback&render=explicit' async defer></script>
		<script type="text/javascript">
			// var CaptchaCallback = function() {
			// 	grecaptcha.render('rc1', {'sitekey' : '6LdntiMUAAAAAKSj6TMlYRLW55v-ljGjAiENjKGC'});
			// 	grecaptcha.render('rc2', {'sitekey' : '6LdntiMUAAAAAKSj6TMlYRLW55v-ljGjAiENjKGC'});
			// };
			window.CaptchaCallback = function() {
		        var recaptchas = document.querySelectorAll('.g-recaptcha');
		        for (var i = 0; i < recaptchas.length; i++) {
		            grecaptcha.render(recaptchas[i], {
		                sitekey: recaptchas[i].getAttribute('data-sitekey')
		            });
		        }
		    }
		</script>
	</head>
	<body>
	  	@yield('content')
	    <!-- Scripts -->
	    <script src="{{ asset('js/app.js') }}"></script>
		{{-- <script src="{{ asset('materialize/js/materialize.min.js') }}"></script> --}}
		@yield('content-js')
	</body>
</html>
