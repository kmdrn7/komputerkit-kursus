@extends('layouts.app')

@section('content')

	<div class="valign-wrapper" style="height: 100vh;">

	    <div class="row z-depth-2" id="card-reg" style="padding-bottom: 30px;">

			<div class="col s12 center-align z-depth" style="margin-top: -75px; ">
				<a href="{{ route('kk') }}">
					<img src="{{ asset('assets/img/logo/favicon.png') }}" alt="" style="width: 180px">
					<h6 style="font-weight: 500">Kursus KomputerKit</h6>
				</a>
			</div>

	        <div class="col s12" style="padding: 0px 30px 0px 30px;">

	            <h4 style="margin-bottom: 15px; font-weight: 300;" class="center-align">Register</h4>

				<form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
					{{ csrf_field() }}

					<div class="row no-margin-bottom {{ $errors->has('name') ? ' has-error' : '' }}">

						<div class="input-field col s12">
							<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
							<label for="name" class="col-md-4 control-label">Namse</label>

							@if ($errors->has('name'))
								<span class="help-block">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
							@endif
						</div>
					</div>

					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						<label for="email" class="col-md-4 control-label">E-Mail Address</label>

						<div class="col-md-6">
							<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

							@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
						</div>
					</div>

					<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
						<label for="password" class="col-md-4 control-label">Password</label>

						<div class="col-md-6">
							<input id="password" type="password" class="form-control" name="password" required>

							@if ($errors->has('password'))
								<span class="help-block">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
							@endif
						</div>
					</div>

					<div class="form-group">
						<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

						<div class="col-md-6">
							<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							<div class="g-recaptcha" data-sitekey="6LdntiMUAAAAAKSj6TMlYRLW55v-ljGjAiENjKGC"></div>
							{!! $errors->first('g-recaptcha-response','<p class="alert alert-danger">:message</p>')!!}
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							<button type="submit" class="btn btn-primary">
								Register
							</button>
						</div>
					</div>
				</form>
	        </div>
	    </div>
	</div>

@endsection
