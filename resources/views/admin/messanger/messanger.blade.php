
@extends('admin.layouts.app')

@section('page-title')
	Messanger
@endsection

@section('content')

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-content">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Cari chatting kursus...">
							<span class="input-group-btn">
								<button class="btn btn-info" type="button"><span class="glyphicon glyphicon-search"></span></button>
							</span>
						</div><!-- /input-group -->
					</div>
				</div>
			</div><!-- /.col-lg-6 -->
		</div>
	</div>

	<div class="container-fluid">

		<div class="img-container">
			<img id="loading" class="img-loading" src="{{ asset('img/web/loading.gif') }}" alt="">
		</div>

		@include('admin.messanger.tbl_messanger')
	</div>
@endsection

@section('modal')
	{{-- Modal New --}}
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Tambahkan Pembimbing Baru</h4>
				</div>
				<form class="" action="{{ route('a.pembimbing.a') }}" method="post" id="form">
					<div class="modal-body">
	                    <div class="row">
	                        <div class="col-md-12">
								<div class="form-group label-floating is-empty">
									<label class="control-label">Pembimbing</label>
									<input name="pembimbing" type="text" class="form-control" value="">
								<span class="material-input"></span></div>
	                        </div>
							<div class="col-md-12">
								<div class="form-group label-floating is-empty">
									<label class="control-label">Keahlian</label>
									<textarea class="form-control" name="keahlian" rows="3" cols="80"></textarea>
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
	<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
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
									<label class="">ID Pembimbing</label>
									<input id="id_pembimbing" name="id_pembimbing" type="text" class="form-control" value="" readonly>
								<span class="material-input"></span></div>
	                        </div>
						</div>

						<div class="row">
	                        <div class="col-md-12">
								<div class="form-group label-floating is-empty">
									<label class="">Pembimbing</label>
									<input name="pembimbing_u" type="text" class="form-control" value="">
								<span class="material-input"></span></div>
	                        </div>
							<div class="col-md-12">
								<div class="form-group label-floating is-empty">
									<label class="">Keahlian</label>
									<textarea class="form-control" name="keahlian_u" rows="3" cols="80"></textarea>
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
					<input type="hidden" id="id_pembimbing_delete" value="">
					<table class="table table-striped">
						<tr>
							<td width="130px">ID Pembimbing</td>
							<td id="id_pembimbing_d"></td>
						</tr>
						<tr>
							<td>Pembimbing</td>
							<td id="pembimbing_d"></td>
						</tr>
						<tr>
							<td>Keahlian</td>
							<td id="keahlian_d"></td>
						</tr>
					</table>
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
			$('#message-data').css('display', 'block');
		}

		function fetch() {
			$('#loading').css('display', 'block');
			$('#DT_wrapper').remove('');
			axios.get('{{route('ajax.pembimbing')}}').then(function (res) {
				$('#loading').css('display', 'none');
				$('#table--container').append(res.data);
				initialize();
				$('.btn-refresh-item').removeClass('fa-spin');
			});
		}

		function showUpdateForm(id) {
			$('#modalLoading').modal('show');
			axios.get('/admin/pembimbing/show/' + id).then(function (res) {
				// Initialize res in data var
				var data = res.data;
				// Load data from ajax
				$('#id_pembimbing').val(data.id_pembimbing);
				$('input[name="pembimbing_u"]').val(data.pembimbing);
				$('textarea[name="keahlian_u"]').val(data.keahlian);
				$('#modalLoading').modal('hide');
				$('#updateModal').modal('show');
			}).catch(function (ex) {
				console.log(ex);
			});
		}

		function showDeleteConfirmation(id) {
			$('#modalLoading').modal('show');
			axios.get('/admin/pembimbing/show/' + id).then(function (res) {
				// Initialize res in data var
				var data = res.data;
				// Load data from ajax
				$('#id_pembimbing_delete').val(data.id_pembimbing);
				$('#id_pembimbing_d').html(data.id_pembimbing);
				$('#pembimbing_d').html(data.pembimbing);
				$('#keahlian_d').html(data.keahlian);
				$('#modalLoading').modal('hide');
				$('.bs-example-modal-sm').modal('show');
			}).catch(function (ex) {
				console.log(ex);
			});
		}

		function validateForm(whoIsThis) {

			if ( whoIsThis === 'update' ) {
				var form = $('#updateForm');
				if ( form[0][0].value !== '' ) {
					if ( form[0][1].value !== '' ) {
						return true;
					}
				}
			} else {
				var form = $('#form');
				if ( form[0][0].value !== '' ) {
					if ( form[0][1].value !== '' ) {
						return true;
					}
				}
			}

			return false;
		}

		$('.btn-delete').click(function(event) {
			// Prepare id
			var id = $(this).attr('data-id-promosi');
			// Show form
			$('#id_pembimbing_delete').val(id);
			$('#id_pembimbing_delete_info').html(id);
		});

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
					var pembimbing = $('input[name="pembimbing"]').val();
					var keahlian = $('textarea[name="keahlian"]').val();
					var form = new FormData();
					form.append('pembimbing', pembimbing);
					form.append('keahlian', keahlian);
					// Send post request
					axios.post('{{route("a.pembimbing.a")}}', form).then(function(res){
						console.log(res.data);
						// Reset
						$('#reset').click();
						// Reset the form + table
						$(".dropify-clear").click();
						$('#modalLoading').modal('hide');
						// Fill with new table
						fetch();
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
					var id = $('#id_pembimbing').val();
					var pembimbing = $('input[name="pembimbing_u"]').val();
					var keahlian = $('textarea[name="keahlian_u"]').val();
					var form = new FormData();
					form.append('id', id);
					form.append('pembimbing', pembimbing);
					form.append('keahlian', keahlian);

					// Send post request
					axios.post('{{route("a.pembimbing.u")}}', form).then(function(res){
						console.log(res.data);
						// Reset
						$('#reset').click();
						// Reset the form + table
						$(".dropify-clear").click();
						$('#modalLoading').modal('hide');
						// Fill with new table
						fetch();
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
				var id = $('#id_pembimbing_delete').val();
				var form = new FormData();
				form.append('id', id);
				// Post delete request
				axios.post('{{ route('a.pembimbing.d') }}', form).then(function (res) {
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
