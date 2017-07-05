@extends('layouts.app')

@section('content')
	<div id="status" style="display: none">{{ session('success') }}</div>
	{{-- <div id="status" style="display: none">1</div> --}}
	<div class="row no-margin-bottom">
		<div class="login-container valign-wrapper">
			<div class="card-panel login-panel white z-depth-4">
				<div class="row fh">
					<div class="col m6 hide-on-small-and-down llc valign-wrapper">
						<div class="llc-c">
							<img src="{{ asset('img/logo/favicon.png') }}" alt="">
							<span><span>Kursus</span> KomputerKit.com</span>
						</div>
					</div>
					<div class="col m6 s12 lrc">
						<div class="row">
							<div class="col s12">
								<ul class="tabs tabs-fixed-width">
									@isset($activated_tab)
									@else
										@php
											$activated_tab = 'login';
										@endphp
									@endisset
									<li class="tab col s3"><a class="{{ old('activated_tab') == 'login' || session('activated_tab') == 'login' ? 'active':'' }}" href="#login">Login</a></li>
									<li class="tab col s3"><a class="{{ old('activated_tab') == 'register' || session('activated_tab') == 'register' ? 'active':'' }}" href="#register">Register</a></li>
								</ul>
							</div>
							{{-- Login --}}
							<div id="login" class="col s12 tab-col">
								<form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
					                {{ csrf_field() }}
									<input type="hidden" name="activated_tab" value="login" readonly>

					                <div class="row no-margin-bottom {{ $errors->has('email') ? ' has-error' : '' }}">
					                    <div class="input-field col s12">
					                        <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required>
											<label for="email" class="col-md-4 control-label">Email</label>

					                        @if ($errors->has('email'))
					                            <span class="help-block red-text">
					                                <strong>{{ $errors->first('email') }}</strong>
					                            </span>
					                        @endif
					                    </div>
					                </div>

					                <div class="row no-margin-bottom {{ $errors->has('password') ? ' has-error' : '' }}">
					                    <div class="input-field col s12">
											<input id="password" type="password" class="validate" name="password" required>
											<label for="password" class="col-md-4 control-label">Password</label>

					                        @if ($errors->has('password'))
					                            <span class="help-block">
					                                <strong>{{ $errors->first('password') }}</strong>
					                            </span>
					                        @endif
					                    </div>
					                </div>

					                <div class="row" style="margin-top: -20px">
					                    <div class="col s12">
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
											<input id="email_regis" type="email" class="form-control" name="email_regis" value="{{ old('email_regis') }}" required>
											<label for="email_regis" class="control-label">Email</label>

											@if ($errors->has('email'))
												<span class="help-block">
													<strong>{{ $errors->first('email_regis') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="row no-margin-bottom {{ $errors->has('password_regis') ? ' has-error' : '' }}">
										<div class="input-field col m6">
											<input id="password_regis" type="password" class="form-control" name="password_regis" required>
											<label for="password_regis" class="control-label">Password</label>

											@if ($errors->has('password_regis'))
												<span class="help-block">
													<strong>{{ $errors->first('password_regis') }}</strong>
												</span>
											@endif
										</div>
										<div class="input-field col m6">
											<input id="passwordregis-confirm" type="password" class="form-control" name="password_regis_confirmation" required>
											<label for="passwordregis-confirm" class="col-md-4 control-label">Confirm Password</label>
										</div>
									</div>

									<div class="row" style="margin-top: -15px">
										<div class="input-field col s12">
											<div id="rc1" class="g-recaptcha" data-sitekey="6LdntiMUAAAAAKSj6TMlYRLW55v-ljGjAiENjKGC"></div>
											{!! $errors->first('g-recaptcha-response','<p class="alert alert-danger">:message</p>')!!}
										</div>
									</div>

									<div class="row no-margin-bottom">
										<div class="col m12">
											<button type="submit" class="blue btn-large btn btn-primary">
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
			<div class="modal-footer">
				<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Tutup</a>
			</div>
		</div>
	</div>
@endsection

@section('content-js')
	<script type="text/javascript">
		$(document).ready(function() {

			$('.modal').modal();

			var i = $('#status').html();
			if ( i == 1 ) {
				$('#sc_modal').modal('open');
			}
		});
	</script>
@endsection
