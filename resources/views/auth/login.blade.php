@extends('layouts.app')

@section('content')
	<div id="status" style="display: none">{{ session('success') }}</div>
	<div id="error" style="display: none">{{ session('err_login_time') }}</div>
	<div class="row no-margin-bottom">
		<div class="col s12">
		<div class="login-container">

			<p class="center-align" style="margin-bottom: 35px;">
				{{-- <img src="{{ asset('img/logo/favicon.png') }}" alt="" style="width: 200px"><br> --}}
				<span class="center-align" style="font-size:60px; line-height: 55px; font-weight: 900">Kursus <br> <small style="font-weight: 300">Komputer Kit</small></span>
			</p>

			<div class="card-panel white z-depth-1" style="padding: 0; margin-bottom: 25px; border-radius: 5px; overflow: hidden">
				<ul class="tabs tabs-fixed-width" style="overflow: hidden; height: 60px; border-bottom: 1.5px solid rgb(73,73,73)">
					@isset($activated_tab)
					@else
						@php
						$activated_tab = 'login';
						@endphp
					@endisset
					<li class="tab col s3" style="height: 60px; line-height: 60px"><a class="{{ old('activated_tab') == 'login' || session('activated_tab') == 'login' ? 'active':'' }}" href="#login">Login</a></li>
					<li class="tab col s3" style="height: 60px; line-height: 60px"><a class="{{ old('activated_tab') == 'register' || session('activated_tab') == 'register' ? 'active':'' }}" href="#register">Register</a></li>
				</ul>
				<div class="row" style="padding:0 25px 30px 15px;">
					{{-- Login --}}
					<div id="login" class="col s12 tab-col">
						<form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
							{{ csrf_field() }}

							@if ( session('aktivasi') )
								<span class="help-block red-text">
									<strong>{{ session('aktivasi') }}</strong>
								</span>
							@endif

							@if ($errors->has('identitas'))
								<span class="help-block red-text">
									<strong>{{ $errors->first('identitas') }}</strong>
								</span>
							@endif

							<input type="hidden" name="activated_tab" value="login" readonly>

							<div class="row no-margin-bottom {{ $errors->has('email') ? ' has-error' : '' }}">
								<div class="input-field col s12">
									<i class="material-icons prefix">account_circle</i>
									<input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required>
									<label for="email" class="col-md-4 control-label" data-error="Email anda salah" data-success="">Email</label>

									@if ($errors->has('email'))
										<span class="help-block red-text">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="row no-margin-bottom {{ $errors->has('password') ? ' has-error' : '' }}">
								<div class="input-field col s12">
									<i class="material-icons prefix">lock_open</i>
									<input id="password" type="password" class="validate" name="password" required>
									<label for="password" class="col-md-4 control-label">Password</label>

									@if ($errors->has('password'))
										<span class="help-block">
											<strong>{{ $errors->first('password') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="row" style="margin-top: -30px">
								<div class="col s12" style="padding-left: 17px">
									<p>
										<input type="checkbox" id="indeterminate-checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} />
										<label for="indeterminate-checkbox">Remember me</label>
									</p>
								</div>
							</div>

							<div class="row" style="margin-top: -15px">
								<div class="input-field col s12">
									<div id="rc2" class="g-recaptcha" data-sitekey="6LdntiMUAAAAAKSj6TMlYRLW55v-ljGjAiENjKGC"></div>
									{!! $errors->first('g-recaptcha-response','<p class="alert alert-danger">:message</p>')!!}
								</div>
							</div>

							<div class="input-field col s12" style="padding: 0px;">
								<a href="{{ route('password.request') }}" style="font-size: 14px; padding: 7px 20px; border-radius: 2px;" class="blue-text waves-effect waves-grey left">
									<strong>Lupa kata sandi anda?</strong>
								</a>
								<button type="submit" class="blue waves-effect waves-light btn right">
									Login
								</button>
							</div>
						</form>
					</div>
					{{-- Register --}}
					<div id="register" class="col s12 tab-col">
						<form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
							{{ csrf_field() }}
							<input type="hidden" name="activated_tab" value="register" readonly>

							<div class="row no-margin-bottom {{ $errors->has('name') ? ' has-error' : '' }}">

								<div class="input-field col s12">
									<i class="material-icons prefix">account_box</i>
									<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
									<label for="name" class="control-label">Nama</label>

									@if ($errors->has('name'))
										<span class="help-block">
											<strong>{{ $errors->first('name') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="row no-margin-bottom {{ $errors->has('email_regis') ? ' has-error' : '' }}">

								<div class="input-field col m12">
									<i class="material-icons prefix">email</i>
									<input id="email_regis" type="email" class="form-control" name="email_regis" value="{{ old('email_regis') }}" required>
									<label for="email_regis" class="control-label">Email</label>

									@if ($errors->has('email_regis'))
										<span class="help-block">
											<strong>{{ $errors->first('email_regis') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="row no-margin-bottom {{ $errors->has('password_regis') ? ' has-error' : '' }}">
								<div class="input-field col m12">
									<i class="material-icons prefix">lock_outline</i>
									<input id="password_regis" type="password" class="form-control" name="password_regis" required>
									<label for="password_regis" class="control-label">Password</label>

									@if ($errors->has('password_regis'))
										<span class="help-block">
											<strong>{{ $errors->first('password_regis') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="row no-margin-bottom">
								<div class="input-field col m12">
									<i class="material-icons prefix">lock_outline</i>
									<input id="passwordregis-confirm" type="password" class="form-control" name="password_regis_confirmation" required>
									<label for="passwordregis-confirm" class="col-md-4 control-label">Konfirmasi Password</label>
								</div>
							</div>

							<div class="row" style="margin-top: -10px">
								<div class="input-field col s12">
									<div id="rc1" class="g-recaptcha" data-sitekey="6LdntiMUAAAAAKSj6TMlYRLW55v-ljGjAiENjKGC"></div>
									{!! $errors->first('g-recaptcha-response','<p class="alert alert-danger">:message</p>')!!}
								</div>
							</div>

							<div class="row no-margin-bottom">
								<div class="col m12">
									<button type="submit" class="blue btn btn-large btn-primary" style="width: 100%;">
										Register
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		</div>
		<!-- Modal Structure -->
		<div id="sc_modal" class="modal bottom-sheet">
			<div class="modal-content">
				<div class="modal-body">
					<div class="success-panel center-align">
						{{-- @if ( session('success') ) --}}
						Pendaftaran berhasil, silahkan konfirmasi email anda dengan membuka email yang sudah kami kirimkan ke email anda.
						{{-- @endif --}}
					</div>
				</div>
			</div>
			<div class="modal-footer center-align">
				<a href="javascript:void(0)" class="modal-action modal-close waves-effect waves-light btn" style="float: none">Tutup</a>
			</div>
		</div>
		<div id="udah_login_modal" class="modal bottom-sheet">
			<div class="modal-content">
				<div class="modal-body">
					<div class="success-panel center-align">
						@php
							$time = session('err_login_time');
						@endphp
						@if ( $time > 120 )
							Akun anda sudah ada yang menggunakan di suatu tempat, logout terlebih dahulu akun anda untuk menggunakan di tempat lain.
						@else
							Akun anda sudah ada yang menggunakan di suatu tempat, logout terlebih dahulu akun anda untuk menggunakan di tempat lain. Atau tunggu {{ $time }} menit untuk login kembali.
						@endif
					</div>
				</div>
			</div>
			<div class="modal-footer center-align">
				<a href="javascript:void(0)" class="modal-action modal-close waves-effect waves-light btn" style="float: none">Tutup</a>
			</div>
		</div>
	</div>
@endsection

@section('content-js')
	<script type="text/javascript">
		$(document).ready(function() {

			$('.modal').modal({
				dismissible: false,
			    opacity: .9,
			});

			var i = $('#status').html();
			var err = $('#error').html();
			if ( i == 1 ) {
				$('#sc_modal').modal('open');
			}
			if ( err != '' ) {
				$('#udah_login_modal').modal('open');
			}
		});
	</script>
@endsection
