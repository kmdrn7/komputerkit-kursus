<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<h1>Reigster KomputerKit.com</h1>
		<a href="{{ route('verify', ['token' => $user->token, 'id' => $user->id_user]) }}">Klik untuk aktivasi akun</a>
	</body>
</html>
