<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kursus - KomputerKit.com</title>

    <!-- Styles -->
	<link href="https://fonts.googleapis.com/css?family=Spectral:200,300,400,500,600,700,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link href="{{ asset('css/app.css?v=1.0') }}" rel="stylesheet">
	<link href="{{ asset('css/main-app.css?v=1.0') }}" rel="stylesheet">
	<script src="https://use.fontawesome.com/d8b86d541f.js"></script>
	@yield('custom--css')
</head>
<body>
	<div class="row row-header">
		<div class="col s12">
			<div class="row center-align" style="padding: 20px 20px 0 20px; margin-bottom: 0;">
				<a href="{{ url('/') }}" class="button-nav left">
					<strong>KursusKomputerKit</strong>.com
				</a>
			</div>
		</div>
	</div>

	<div id="this--is--main--wrap">
		@yield('content')
	</div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
	<script src="{{ asset('js/main_app.js') }}"></script>
	<script type="text/javascript">
		$('.button-main-header').click(function(event) {
			$('.button-collapse').sideNav('show');
		});
	</script>
	@yield('custom--js')
	@yield('content-js')
</body>
</html>
