@extends('layouts.app')

@section('content')

<div class="valign-wrapper" style="height: 100vh;">

    <div class="row z-depth-2" id="card-reg" style="padding-bottom: 30px">

		<div class="col s12 center-align z-depth" style="margin-top: -75px; ">
			<a href="{{ route('kk') }}">
				<img src="{{ asset('assets/img/logo/favicon.png') }}" alt="" style="width: 180px">
				<h6 style="font-weight: 500">Kursus Komputerkit</h6>
			</a>
		</div>

        <div class="col s12" style="padding: 0px 30px 0px 30px;">

            <h4 style="margin-bottom: 10px; font-weight: 300;" class="center-align">Reset Password</h4>

			@if (session('status'))
				<div class="alert alert-success">
					{{ session('status') }}
				</div>
			@endif

			<form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
				{{ csrf_field() }}

				<input type="hidden" name="token" value="{{ $token }}">

				<div class="row no-margin-bottom {{ $errors->has('email') ? ' has-error' : '' }}">

					<div class="input-field col s12">
						<input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required>
						<label for="email" class="col-md-4 control-label">E-Mail Address</label>

						@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
					</div>
				</div>

				<div class="row no-margin-bottom{{ $errors->has('password') ? ' has-error' : '' }}">

					<div class="input-field col s12">
						<input id="password" type="password" class="form-control" name="password" required>
						<label for="password" class="col-md-4 control-label">Password</label>

						@if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
					</div>
				</div>

				<div class="row no-margin-bottom {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
					<div class="input-field col s12">
						<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
						<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

						@if ($errors->has('password_confirmation'))
							<span class="help-block">
								<strong>{{ $errors->first('password_confirmation') }}</strong>
							</span>
						@endif
					</div>
				</div>

				<div class="input-field col s12">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-large btn-primary col s12">
							Reset Password
						</button>
					</div>
				</div>
			</form>
        </div>
    </div>
</div>

@endsection
