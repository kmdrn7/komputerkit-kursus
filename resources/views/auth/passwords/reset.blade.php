@extends('layouts.app')

@section('content')

	<div class="row no-margin-bottom">
		<div class="col s12">
			<div class="login-container">

				<p class="center-align" style="margin-bottom: 35px;">
					{{-- <img src="{{ asset('img/logo/favicon.png') }}" alt="" style="width: 200px"><br> --}}
					<span class="center-align" style="font-size:60px; line-height: 55px; font-weight: 900">Kursus <br> <small style="font-weight: 300">Komputer Kit</small></span>
				</p>

				<div class="card-panel white z-depth-1" style="padding: 0; margin-bottom: 25px; border-radius: 5px; overflow: hidden">
					<ul class="tabs tabs-fixed-width" style="overflow: hidden; height: 60px; border-bottom: 1.5px solid rgb(73,73,73)">
						<li class="tab col s3" style="height: 60px; line-height: 60px"><a class="{{ old('activated_tab') == 'login' || session('activated_tab') == 'login' ? 'active':'' }}" href="#reset">Reset Password</a></li>
					</ul>
					<div class="row no-margin-bottom" style="padding:0 25px 30px 15px;">
						<div id="reset" class="col s12 tab-col">
							@if (session('status'))
								<div class="alert alert-success">
									{{ session('status') }}
								</div>
							@endif
							@if ($errors->has('token'))
								<div class="help-block">
									<strong>{{ $errors->first('token') }}</strong>
								</div>
							@endif

							<form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
								{{ csrf_field() }}

								<input type="hidden" name="token" value="{{ $token }}">

								<div class="row no-margin-bottom {{ $errors->has('email') ? ' has-error' : '' }}">

									<div class="input-field col s12">
										<i class="material-icons prefix">email</i>
										<input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required>
										<label for="email" class="col-md-4 control-label">Email Anda</label>

										@if ($errors->has('email'))
											<span class="help-block">
												<strong>{{ $errors->first('email') }}</strong>
											</span>
										@endif
									</div>
								</div>

								<div class="row no-margin-bottom{{ $errors->has('password') ? ' has-error' : '' }}">

									<div class="input-field col s12">
										<i class="material-icons prefix">lock_open</i>
										<input id="password" type="password" class="form-control" name="password" required>
										<label for="password" class="col-md-4 control-label">Password Baru</label>

										@if ($errors->has('password'))
											<span class="help-block">
												<strong>{{ $errors->first('password') }}</strong>
											</span>
										@endif
									</div>
								</div>

								<div class="row no-margin-bottom {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
									<div class="input-field col s12">
										<i class="material-icons prefix">lock_open</i>
										<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
										<label for="password-confirm" class="col-md-4 control-label">Konfirmasi Password</label>

										@if ($errors->has('password_confirmation'))
											<span class="help-block">
												<strong>{{ $errors->first('password_confirmation') }}</strong>
											</span>
										@endif
									</div>
								</div>

								<div class="input-field col s12">
									<div class="col-md-6 col-md-offset-4 center-align">
										<button type="submit" class="btn btn-large btn-primary">
											<i class="material-icons center left">lock</i>
											Reset Password
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

@endsection
