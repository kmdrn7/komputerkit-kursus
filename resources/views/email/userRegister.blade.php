@component('mail::message')

<h1>Registrasi Anda Berhasil</h1>

@component('mail::button', ['url' => route('verify', ['token' => $user->token, 'id' => $user->id_user])])
Konfirmasi Email
@endcomponent

Terimakasih telah mendaftarkan diri anda di kursus komputerkit. Kami akan selalu menambahkan fitur-fitur baru dan kursus terbaru untuk anda.<br><br>
<strong>{{ config('app.name') }}</strong> <br><br>

Klik <a href="{{ route('verify', ['token' => $user->token, 'id' => $user->id_user]) }}">disini</a> jika tidak muncul tombol konfirmasi.

@endcomponent
