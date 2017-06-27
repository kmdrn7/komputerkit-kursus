
@extends('admin.layouts.app')

@section('page-title')
	User
@endsection

@section('content')

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">

			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="yellow" style="display: flex">
						<div class="header-left">
							<i class="material-icons">assignment</i>
							<h4 class="title">Data dari semua User</h4>
							<p class="category">New employees on 15th September, 2016</p>
						</div>
						<div class="header-right">
							<button type="button" class="btn btn-round btn-just-icon btn-primary btn-add-item btn-lg" data-toggle="modal" data-target="#myModal">
								+
							</button>
							<button type="button" class="btn btn-round btn-just-icon btn-primary btn-refresh-item">
								<i class="fa fa-refresh" id="i-refresh"></i>
							</button>
						</div>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Data User</h4>
                        <div class="toolbar"></div>
                        <div class="table-responsive" id="table--container">
							<div class="img-container">
								<img id="loading" class="img-loading" src="{{ asset('img/web/loading.gif') }}" alt="">
							</div>
							@include('admin.user.tbl_user')
                        </div>
                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
            </div>
		</div>
	</div>
@endsection

@section('modal')
	{{-- Modal New --}}
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Tambahkan User Baru</h4>
				</div>
				<form class="" action="{{ route('a.user.a') }}" method="post" id="form">
					<div class="modal-body">
	                    <div class="row">
	                        <div class="col-md-12">
								<div class="form-group label-floating is-empty">
									<label class="control-label">Nama User</label>
									<input name="nama" type="text" class="form-control" value="">
								<span class="material-input"></span></div>
	                        </div>
	                    </div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group label-floating is-empty">
									<label class="control-label">Nickname</label>
									<input name="nickname" type="text" class="form-control" value="">
								<span class="material-input"></span></div>
	                        </div>
							<div class="col-md-6">
								<div class="form-group label-floating is-empty">
									<label class="control-label">Email</label>
									<input name="email" type="email" class="form-control" value="">
								<span class="material-input"></span></div>
	                        </div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group label-floating is-empty">
									<label class="">Password</label>
									<input name="password" type="password" class="form-control" value="">
								<span class="material-input"></span></div>
	                        </div>
							<div class="col-md-6">
								<div class="form-group label-floating is-empty">
									<label class="">Tgl Lahir</label>
									<input name="tgl_lahir" type="date" class="form-control" value="">
								<span class="material-input"></span></div>
	                        </div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating is-empty">
									<label class="control-label">Alamat</label>
									<textarea class="form-control" name="alamat" rows="3" cols="80"></textarea>
								<span class="material-input"></span></div>
	                        </div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group label-floating is-empty">
									<label class="">Sekolah</label>
									<input name="sekolah" type="text" class="form-control" value="">
								<span class="material-input"></span></div>
	                        </div>
							<div class="col-md-6">
								<div class="form-group label-floating is-empty">
									<label class="">Status</label>
									<input name="status" type="number" class="form-control" value="1" min="0" max="1" maxlength="1">
								<span class="material-input"></span></div>
	                        </div>
						</div>
					</div>
					<div class="modal-footer">
						{{-- <div class="row"> --}}
							<div class="col-md-12">
								<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
								<button id="reset" type="reset" class="btn btn-warning" value="Reset">Reset</button>
								<button id="save" type="button" class="btn btn-primary">Simpan</button>
							</div>
						{{-- </div> --}}
					</div>
				</form>
			</div>
		</div>
	</div>
	{{-- Modal Update  --}}
	<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true" style="overflow-y: auto">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="updateModalLabel">Update Data</h4>
				</div>
				<form class="form" id="updateForm" action="{{ route('a.pembimbing.u') }}" method="post">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating is-empty">
									<label class="">ID User</label>
									<input id="id_user" name="id_pembimbing" type="text" class="form-control" value="" readonly>
								<span class="material-input"></span></div>
	                        </div>
						</div>

						<div class="row">
	                        <div class="col-md-12">
								<div class="form-group label-floating is-empty">
									<label class="">Nama User</label>
									<input name="nama_u" type="text" class="form-control" value="">
								<span class="material-input"></span></div>
	                        </div>
	                    </div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group label-floating is-empty">
									<label class="">Nickname</label>
									<input name="nickname_u" type="text" class="form-control" value="">
								<span class="material-input"></span></div>
	                        </div>
							<div class="col-md-6">
								<div class="form-group label-floating is-empty">
									<label class="">Email</label>
									<input name="email_u" type="email" class="form-control" value="">
								<span class="material-input"></span></div>
	                        </div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group label-floating is-empty">
									<label class="">Password</label>
									<input name="password_u" type="text" class="form-control" value="" placeholder="Kosongkan jika tidak ingin mengubah password">
								<span class="material-input"></span></div>
	                        </div>
							<div class="col-md-6">
								<div class="form-group label-floating is-empty">
									<label class="">Tgl Lahir</label>
									<input name="tgl_lahir_u" type="date" class="form-control" value="">
								<span class="material-input"></span></div>
	                        </div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating is-empty">
									<label class="">Alamat</label>
									<textarea class="form-control" name="alamat_u" rows="3" cols="80"></textarea>
								<span class="material-input"></span></div>
	                        </div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group label-floating is-empty">
									<label class="">Sekolah</label>
									<input name="sekolah_u" type="text" class="form-control" value="">
								<span class="material-input"></span></div>
	                        </div>
							<div class="col-md-6">
								<div class="form-group label-floating is-empty">
									<label class="">Status</label>
									<input name="status_u" type="number" class="form-control" min="0" max="1" maxlength="1">
								<span class="material-input"></span></div>
	                        </div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button id="update" type="submit" class="btn btn-primary">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	{{-- Modal Konfimrasi Hapus --}}
	<div class="modal fade bs-example-modal-sm" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">Konfirmasi Hapus</h3>
				</div>
				<div class="modal-body" style="padding-top: 5px;">
					Data berikut akan dihapus, data yang dihapus tidak bisa dikembalikan lagi.
					<br><br>
					<input type="hidden" id="id_user_delete" value="">
					<table class="table table-striped">
						<tr>
							<td width="130px">ID User</td>
							<td id="id_user_d"></td>
						</tr>
						<tr>
							<td>Nama</td>
							<td id="nama_d"></td>
						</tr>
						<tr>
							<td>Email</td>
							<td id="email_d"></td>
						</tr>
					</table>
					<strong>Pringatan!</strong> Jika user di hapus, maka semua data yang berkitan dengan user ini juga akan dihapus,
					jadi berhati-hatilah jika akan menghapus user
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
					<button id="confirm_delete" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp;&nbsp; Ya</button>
				</div>
			</div>
		</div>
	</div>
	{{-- Modal Loading --}}
	<div class="modal fade" id="modalLoading" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					Sedang memproses permintaan anda ...
				</div>
				<div class="modal-footer">
				</div>
			</div>
		</div>
	</div>
@endsection


@section('content-js')
	<script type="text/javascript">

		function initialize() {
			// $('#loading').css('display', 'block');
			$('#DT').DataTable({
				"lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Semua"]]
			});
			$('#loading').css('display', 'none');
			$('#DT').css('display', 'block');
		}

		function fetch() {
			$('#loading').css('display', 'block');
			$('#DT_wrapper').remove('');
			axios.get('{{route('ajax.user')}}').then(function (res) {
				$('#loading').css('display', 'none');
				$('#table--container').append(res.data);
				initialize();
				$('.btn-refresh-item').removeClass('fa-spin');
			});
		}

		function showUpdateForm(id) {
			$('#modalLoading').modal('show');
			axios.get('/admin/user/show/' + id).then(function (res) {
				// Initialize res in data var
				var data = res.data;
				// Load data from ajax
				$('#id_user').val(data.id_user);
				$('input[name="nama_u"]').val(data.name);
				$('input[name="nickname_u"]').val(data.nickname);
				$('input[name="email_u"]').val(data.email);
				$('input[name="password_u"]').val('');
				$('input[name="tgl_lahir_u"]').val(data.tgl_lahir);
				$('input[name="sekolah_u"]').val(data.sekolah);
				$('input[name="status_u"]').val(data.status);
				$('textarea[name="alamat_u"]').val(data.alamat);
				$('#updateModal').modal('show');
				$('#modalLoading').modal('hide');
				$('.modal').css('overflow-y', 'auto');
			}).catch(function (ex) {
				console.log(ex);
			});
		}

		function showDeleteConfirmation(id) {
			$('#modalLoading').modal('show');
			axios.get('/admin/user/show/' + id).then(function (res) {
				// Initialize res in data var
				var data = res.data;
				// Load data from ajax
				$('#id_user_delete').val(data.id_user);
				$('#id_user_d').html(data.id_user);
				$('#nama_d').html(data.name);
				$('#email_d').html(data.email);
				$('.bs-example-modal-sm').modal('show');
				$('#modalLoading').modal('hide');
			}).catch(function (ex) {
				console.log(ex);
			});
		}

		function validateForm(whoIsThis) {

			if ( whoIsThis === 'update' ) {
				var form = $('#updateForm');
				if ( form[0][0].value !== '' ) {
					if ( form[0][1].value !== '' ) {
						if ( form[0][2].value !== '' ) {
							if ( form[0][3].value !== '' ) {
								if ( form[0][5].value !== '' ) {
									if ( form[0][6].value !== '' ) {
										if ( form[0][7].value !== '' ) {
											if ( form[0][8].value !== '' ) {
												return true;
											}
										}
									}
								}
							}
						}
					}
				}
			} else {
				var form = $('#form');
				if ( form[0][0].value !== '' ) {
					if ( form[0][1].value !== '' ) {
						if ( form[0][2].value !== '' ) {
							if ( form[0][3].value !== '' ) {
								if ( form[0][4].value !== '' ) {
									if ( form[0][5].value !== '' ) {
										if ( form[0][6].value !== '' ) {
											if ( form[0][7].value !== '' ) {
												return true;
											}
										}
									}
								}
							}
						}
					}
				}
			}

			return false;
		}

		$(document).ready(function() {

			initialize();

			$('#modalLoading').modal({
				backdrop: 'static',
				keyboard: false,
				show: false,
			});

			$('.btn-refresh-item').click(function(event) {
				event.preventDefault();
				$(this).addClass('fa-spin');
				fetch();
				// $('#i-refresh').removeClass('fa-spin');
			});

			$('#save').click(function(event) {
				event.preventDefault();
				// Validate form
				if ( validateForm() ) {
					// initialize form input data
					$('#myModal').modal('hide');
					$('#modalLoading').modal('show');
					var nama = $('input[name="nama"]').val();
					var email = $('input[name="email"]').val();
					var nickname = $('input[name="nickname"]').val();
					var password = $('input[name="password"]').val();
					var tgl_lahir = $('input[name="tgl_lahir"]').val();
					var alamat = $('textarea[name="alamat"]').val();
					var sekolah = $('input[name="sekolah"]').val();
					var status = $('input[name="status"]').val();
					var form = new FormData();
					form.append('nama', nama);
					form.append('email', email);
					form.append('nickname', nickname);
					form.append('password', password);
					form.append('tgl_lahir', tgl_lahir);
					form.append('alamat', alamat);
					form.append('sekolah', sekolah);
					form.append('status', status);
					// Send post request
					axios.post('{{route("a.user.a")}}', form).then(function(res){
						console.log(res.data);
						// Reset
						$('#reset').click();
						// Reset the form + table
						$('#modalLoading').modal('hide');
						// Fill with new table
						fetch();

					}).catch(function(er) {
						console.log(er);
					});
				} else {
					// Jika salah validasi
					alert('data yang anda masukkan belum lengkap');
					return false;
				}
			});

			$('#update').click(function(event) {
				event.preventDefault();
				// Validate form
				if ( validateForm('update') ) {
					// initialize form input data
					$('#updateModal').modal('hide');
					$('#modalLoading').modal('show');
					var id = $('#id_user').val();
					var nama = $('input[name="nama_u"]').val();
					var email = $('input[name="email_u"]').val();
					var nickname = $('input[name="nickname_u"]').val();
					var password = $('input[name="password_u"]').val();
					var tgl_lahir = $('input[name="tgl_lahir_u"]').val();
					var alamat = $('textarea[name="alamat_u"]').val();
					var sekolah = $('input[name="sekolah_u"]').val();
					var status = $('input[name="status_u"]').val();
					var form = new FormData();
					form.append('id', id);
					form.append('nama', nama);
					form.append('email', email);
					form.append('nickname', nickname);
					form.append('password', password);
					form.append('tgl_lahir', tgl_lahir);
					form.append('alamat', alamat);
					form.append('sekolah', sekolah);
					form.append('status', status);

					// Send post request
					axios.post('{{route("a.user.u")}}', form).then(function(res){
						console.log(res.data);
						if ( res.status > 200 && res.status < 500 ) {
							alert('error application code: ' + res.status + '<br><br>' + res.statusText)
						} else if ( res.status >= 500 ) {
							alert('error koneksi ke server, coba ulangi kembali')
						} else {
							// Reset
							$('#reset').click();
							// Reset the form + table
							$('#modalLoading').modal('hide');
							// Fill with new table
							fetch();
						}
					}).catch(function(er) {
						console.log(er);
					});
				} else {
					// Jika salah validasi
					alert('data yang anda masukkan belum lengkap');
					return false;
				}
			});

			$('#confirm_delete').click(function(event) {
				event.preventDefault();
				// Close This Modal
				$('#deleteModal').modal('hide');
				$('#modalLoading').modal('show');
				// Initialize ID
				var id = $('#id_user_delete').val();
				var form = new FormData();
				form.append('id', id);
				// Post delete request
				axios.post('{{ route('a.user.d') }}', form).then(function (res) {
					console.log(res);
					$('#modalLoading').modal('hide');
					// Fill with new table
					fetch();
				});
			});

			$('#updateForm').submit(function(event) {
				event.preventDefault();
			});

			$('#form').submit(function(event) {
				event.preventDefault();
			});
		});
	</script>
@endsection
