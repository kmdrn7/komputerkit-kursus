@extends('layouts.app')

@section('content')

<div class="valign-wrapper" style="height: 100vh;">

    <div class="row z-depth-2" id="card-reg" style="padding-bottom: 0px;">

		<div class="col s12 center-align z-depth" style="margin-top: -75px; ">
			<a href="{{ route('kk') }}">
				<img src="{{ asset('assets/img/logo/favicon.png') }}" alt="" style="width: 180px">
				<h6 style="font-weight: 500">Kursus Komputerkit</h6>
			</a>
		</div>

        <div class="col s12" style="padding: 0px 30px 0px 30px;">

            <h4 style="margin-bottom: 15px; font-weight: 300;" class="center-align">Login</h4>

			<form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="row no-margin-bottom {{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="input-field col s12">
                        <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required>
						<label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        @if ($errors->has('email'))
                            <span class="help-block">
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
						<div class="g-recaptcha" data-sitekey="6LdntiMUAAAAAKSj6TMlYRLW55v-ljGjAiENjKGC"></div>
						{!! $errors->first('g-recaptcha-response','<p class="alert alert-danger">:message</p>')!!}
					</div>
				</div>

				<div class="input-field col s12" style="padding: 0px;">
					<a href="{{ route('password.request') }}" style="font-size: 14px; padding: 7px 20px; border-radius: 2px;" class="blue-text waves-effect waves-grey left">
						Lupa kata sandi anda?
					</a>
					<button type="submit" class="blue waves-effect waves-light btn right">
						Login
					</button>
				</div>
            </form>
        </div>

		<div class="col l12 m12 s12 teal valign-wrapper z-depth-1" style="margin-top: 20px; height: 70px">
			<a href="{{ route('register') }}" class="" style="color: white; font-size: 20px; font-weight: 300; padding-left: 5px;">
				Belum punya user? Daftar disini
			</a>
		</div>
    </div>
</div>

@endsection
