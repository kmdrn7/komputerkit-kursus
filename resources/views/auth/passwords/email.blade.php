@extends('layouts.app')

@section('content')

<div class="valign-wrapper" style="height: 100vh;">

    <div class="row z-depth-2" id="card-reg" style="padding-bottom: 30px;">

		<div class="col s12 center-align z-depth" style="margin-top: -75px; ">
			<a href="{{ route('kk') }}">
				<img src="{{ asset('img/logo/favicon.png') }}" alt="" style="width: 180px">
				<h6 style="font-weight: 500">Kursus KomputerKit</h6>
			</a>
		</div>

        <div class="col s12" style="padding: 0px 30px 0px 30px;">

            <h4 style="margin-bottom: 15px; font-weight: 300;" class="center-align">Reset Password</h4>

			@if (session('status'))
				<div class="alert alert-success center-align">
					{{-- {{ session('status') }} --}}
					Kami telah mengirim konfirmasi perubahan password ke alamat email anda
				</div>
			@endif

			<form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
				{{ csrf_field() }}

				<div class="row no-margin-bottom {{ $errors->has('email') ? ' has-error' : '' }}">

					<div class="input-field col s12">
						<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
						<label for="email" class="col-md-4 control-label">Alamat Email</label>

						@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
					</div>

				</div>

				<div class="row no-margin-bottom">
					<div class="input-field col s12">
						<button type="submit" class="btn btn-large btn-primary col s12">
							Send Password Reset Link
						</button>
					</div>
				</div>
			</form>
        </div>
    </div>
</div>
@endsection
