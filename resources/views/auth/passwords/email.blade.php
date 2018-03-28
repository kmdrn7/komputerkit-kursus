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
						<li class="tab col s3" style="height: 60px; line-height: 60px"><a class="" href="#reset-password">Reset Password</a></li>
					</ul>
					<div class="row" style="padding:25px 25px 30px 15px;">
						<form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
							{{ csrf_field() }}

							<div class="row no-margin-bottom {{ $errors->has('email') ? ' has-error' : '' }}">

								<div class="input-field col s12">
									<i class="material-icons prefix">account_circle</i>
									<input id="email" type="email" class="active" name="email" value="{{ old('email') }}" required>
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
									<button type="submit" class=" blue btn btn-large btn-primary col s12">
										Kirim Password Reset
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>

				@if (session('status'))
					<p>
						<div class="alert alert-success center-align">
							{{-- {{ session('status') }} --}}
							Kami telah mengirim konfirmasi perubahan password ke alamat email anda
						</div>
					</p>
				@endif
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
