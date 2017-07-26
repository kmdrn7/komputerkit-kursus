@extends('user.layouts.app')

@section('title')
	Profil
@endsection

@section('content')
	{{-- @if ( session('is_modal_password_opened') )
		<input type="hidden" name="is_modal_password_opened" value="1">
	@else
		<input type="hidden" name="is_modal_password_opened" value="0">
	@endif --}}

	<div class="profil-nav z-depth-1"></div>

	<div class="container profil-container" style="max-width: 860px!important">
		<div class="row">
			<div class="col m12 s12">
				<h3 class="header-profil">Profil</h3>
			</div>
		</div>
		<div class="row">
			<div class="col s12 m12 l12">
				<div class="profil-wrapper z-depth-3">
					<div class="profil-top-panel">
						<div class="ptp-imgc circle valign-wrapper z-depth-1">
							<img src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($user->email))) }}?d=retro&s=512" alt="profil_picture" class="img-top-profil">
						</div>
						<p class="profil-warn">
							Masuk ke <strong><a target="_blank" href="http://gravatar.com">Gravatar</a></strong> untuk mengubah foto profil anda
						</p>
					</div>
					<div class="profil-bottom-panel white">
						<div class="row">
							<div class="col s12 m8 l8 offset-m2 offset-l2">
								<form class="" action="{{ route('post.profil') }}" method="post">

									{{ csrf_field() }}

									<div class="row">
										<div class="input-field col s12 m6">
											<input value="{{ $user->name }}" id="name" type="text" class="validate" name="name">
											<label class="active" for="name">Nama</label>
											@if ($errors->has('name'))
												<div class="help-block red-text">
													<strong>{{ $errors->first('name') }}</strong>
												</div>
											@endif
										</div>
										<div class="input-field col s12 m6">
											<input value="{{ $user->nickname }}" id="nickname" type="text" class="validate" name="nickname">
											<label class="active" for="nickname">Panggilan</label>
											@if ($errors->has('nickname'))
												<div class="help-block red-text">
													<strong>{{ $errors->first('nickname') }}</strong>
												</div>
											@endif
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12 m6">
											<input value="{{ $user->email }}" id="email" type="email" class="validate" name="email" readonly disabled>
											<label class="active" for="email">Email</label>
											@if ($errors->has('email'))
												<div class="help-block red-text">
													<strong>{{ $errors->first('email') }}</strong>
												</div>
											@endif
										</div>
										<div class="input-field col s12 m6">
											<input value="{{ date('Y-m-d', strtotime(str_replace('/', '-', $user->tgl_lahir))) }}" id="tgl_lahir" type="date" class="datepicker" name="tgl_lahir">
											<label class="active" for="tgl_lahir">Tanggal Lahir</label>
											@if ($errors->has('tgl_lahir'))
												<div class="help-block red-text">
													<strong>{{ $errors->first('tgl_lahir') }}</strong>
												</div>
											@endif
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<textarea id="alamat" name="alamat" value="" class="materialize-textarea">{{ $user->alamat }}</textarea>
											<label for="alamat">Alamat</label>
											@if ($errors->has('alamat'))
												<div class="help-block red-text">
													<strong>{{ $errors->first('alamat') }}</strong>
												</div>
											@endif
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12 m12">
											<input value="{{ $user->sekolah }}" id="sekolah" type="text" class="validate" name="sekolah">
											<label class="active" for="sekolah">Sekolah</label>
											@if ($errors->has('sekolah'))
												<div class="help-block red-text">
													<strong>{{ $errors->first('sekolah') }}</strong>
												</div>
											@endif
										</div>
									</div>
									<div class="row no-margin-bottom">
										<div class="col m6 s12" style="padding-top: 5px; padding-bottom: 5px">
											<a href="#ubah_password" class="col s12 btn waves-effect waves-light btn-large left"><i class="fa fa-lock"></i>&nbsp;&nbsp; Ubah Password</a>
										</div>
										<div class="col m6 s12" style="padding-top: 5px; padding-bottom: 5px">
											<button type="submit" class="col s12 btn waves-effect waves-light btn-large right"><i class="fa fa-save"></i>&nbsp;&nbsp; Simpan Profil</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	{{-- MODAL --}}
	<div id="ubah_password" class="modal update_password_modal">
		<form class="" action="{{ route('profil.password') }}" method="post">
			<div class="modal-content">
				<h4>Ubah Password</h4>
				{{ csrf_field() }}
				<div class="row no-margin-top no-margin-bottom">
					<div class="input-field col s12">
						<input type="hidden" name="is_modal_password" value="1">
						<input type="hidden" name="cache_modal_password" value="{{ old('is_modal_password') }}">
						<input id="old_password" type="password" class="validate" name="old_password">
						<label for="old_password">Password Lama</label>
						@if ($errors->has('old_password'))
							<div class="help-block red-text">
								<strong>{{ $errors->first('old_password') }}</strong>
							</div>
						@endif
					</div>
				</div>
				<div class="row no-margin-top no-margin-bottom">
					<div class="input-field col s12">
						<input id="new_password" type="password" class="validate" name="new_password">
						<label for="new_password">Password Baru</label>
						@if ($errors->has('new_password'))
							<div class="help-block red-text">
								<strong>{{ $errors->first('new_password') }}</strong>
							</div>
						@endif
					</div>
				</div>
				<div class="row no-margin-top no-margin-bottom">
					<div class="input-field col s12">
						<input id="new_password" type="password" class="validate" name="new_password_confirmation">
						<label for="new_password_confirmation">Konfirmasi Password</label>
						@if ($errors->has('new_password_confirmation'))
							<div class="help-block red-text">
								<strong>{{ $errors->first('new_password_confirmation') }}</strong>
							</div>
						@endif
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<input type="reset" name="reset_form" value="" style="display: none">
				<a href="javascript:void(0);" onclick="reset_form()" class="modal-action modal-close waves-effect waves-green btn-flat left">Batal</a>
				<button type="submit" class="modal-action waves-effect waves-green right btn-flat right">Simpan Password</button>
			</div>
		</form>
	</div>

	<input type="hidden" name="cache_pass_succ" value="{{ session('up_pass_succ') }}">
	<input type="hidden" name="first_login" value="{{ session('first_login') }}">
@endsection

@section('content-js')
	<script type="text/javascript">
		$(document).ready(function(){$('.datepicker').pickadate({selectMonths:!0,selectYears:100,format:'yyyy-mm-dd',onSet:function(a){'select'in a&&this.close()}}),$('.modal').modal({complete:function(){reset_form()}}),'1'==$('input[name="cache_pass_succ"]').val()&&Materialize.toast('Update password telah berhasil',5e3,'rounded profil-toast-top'),'1'==$('input[name="first_login"]').val()&&Materialize.toast('Lengkapi data diri anda untuk memulai semua hal yang menyenangkan disini',5e3,'rounded profil-toast-top'),1==$('input[name="cache_modal_password"]').val()&&$('#ubah_password').modal('open')});function reset_form(){$('input[name="reset_form"]').click()}
	</script>
@endsection
