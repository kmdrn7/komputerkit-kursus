
@extends('admin.layouts.app')

@section('page-title')
	Promosi
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
                    <div class="card-header card-header-icon" data-background-color="green" style="display: flex">
						<div class="header-left">
							<i class="material-icons">assignment</i>
							<h4 class="title">Data dari semua Promosi</h4>
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
                        <h4 class="card-title">Data Promosi</h4>
                        <div class="toolbar"></div>
                        <div class="table-responsive" id="table--container">
							<div class="img-container">
								<img id="loading" class="img-loading" src="{{ asset('img/web/loading.gif') }}" alt="">
							</div>
							@include('admin.promosi.tbl_promosi')
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
					<h4 class="modal-title" id="myModalLabel">Tambahkan Promosi Baru</h4>
				</div>
				<form class="" action="{{ route('a.promosi.a') }}" method="post" id="form">
					<div class="modal-body">
	                    <div class="row">
	                        <div class="col-md-12">
								<div class="form-group label-floating is-empty">
									<label class="control-label">Promosi</label>
									<input name="promosi" type="text" class="form-control" value="">
								<span class="material-input"></span></div>
	                        </div>
							<div class="col-md-12">
								<div class="form-group label-floating is-empty">
									<label class="control-label">Keterangan Promosi</label>
									<textarea class="form-control" name="ket_promosi" rows="3" cols="80"></textarea>
								<span class="material-input"></span></div>
	                        </div>
	                    </div>

						<div class="row">
	                        <div class="col-md-12">
								<div class="form-group label-floating is-empty">
									<label class="">Gambar</label>
									<input name="gambar" type="file" class="dropify form-control" data-max-file-size="2M" data-allowed-file-extensions="jpg JPEG png PNG jpeg bmp BMP"/>
								<span class="material-input"></span></div>
	                        </div>
	                    </div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group label-floating is-empty">
									<label class="">Status / Flag</label>
									<input name="flag" type="number" class="form-control" value="" max="1" min="0" step="1" maxlength="1" value=1>
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
				<form class="form" id="updateForm" action="{{ route('a.promosi.u') }}" method="post">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating is-empty">
									<label class="">ID Promosi</label>
									<input id="id_promosi" name="id_promosi" type="text" class="form-control" value="" readonly>
								<span class="material-input"></span></div>
	                        </div>
						</div>

						<div class="row">
	                        <div class="col-md-12">
								<div class="form-group label-floating is-empty">
									<label class="">Promosi</label>
									<input name="promosi_u" type="text" class="form-control" value="">
								<span class="material-input"></span></div>
	                        </div>
							<div class="col-md-12">
								<div class="form-group label-floating is-empty">
									<label class="">Keterangan Promosi</label>
									<textarea class="form-control" name="ket_promosi_u" rows="3" cols="80"></textarea>
								<span class="material-input"></span></div>
	                        </div>
	                    </div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group label-floating is-empty">
									<label class="">Status / Flag</label>
									<input name="flag_u" type="number" class="form-control" value="">
								<span class="material-input"></span></div>
	                        </div>
						</div>

						<div class="row">
	                        <div class="col-md-12">
								<div class="form-group label-floating is-empty">
									<label class="">Gambar Lama</label>
									<img id="gambar_lama" src="" alt="" class="img-responsive">
								<span class="material-input"></span></div>
	                        </div>
	                    </div>

	                    <div class="row">
	                        <div class="col-md-12">
								<div class="form-group label-floating is-empty">
									<label class="">Gambar Baru</label>
									<input name="gambar_u" type="file" class="dropify form-control" data-max-file-size="2M" data-allowed-file-extensions="jpg JPEG png PNG jpeg bmp BMP"/>
									<input type="hidden" name="gambar_u_lama" type="text" value="" />
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
					<input type="hidden" id="id_promosi_delete" value="">
					<table class="table table-striped">
						<tr>
							<td width="130px">ID Kursus</td>
							<td id="id_promosi_d"></td>
						</tr>
						<tr>
							<td>Kursus</td>
							<td id="promosi_d"></td>
						</tr>
						<tr>
							<td>Keterangan</td>
							<td id="ket_promosi_d"></td>
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
			$('#DT').css('display', 'block');
		}

		function fetch() {
			$('#loading').css('display', 'block');
			$('#DT_wrapper').remove('');
			axios.get('{{route('ajax.promosi')}}').then(function (res) {
				$('#loading').css('display', 'none');
				$('#table--container').append(res.data);
				initialize();
				$('.btn-refresh-item').removeClass('fa-spin');
			});
		}

		function showUpdateForm(id) {
			$('#modalLoading').modal('show');
			axios.get('/admin/promosi/show/' + id).then(function (res) {
				// Initialize res in data var
				var data = res.data;
				// Load data from ajax
				$('#id_promosi').val(data.id_promosi);
				$('input[name="promosi_u"]').val(data.promosi);
				$('textarea[name="ket_promosi_u"]').val(data.ket_promosi);
				$('input[name="flag_u"]').val(data.flag);
				$('#gambar_lama').attr('src', '/img/promosi/'+data.gambar);
				$('input[name="gambar_u_lama"]').val(data.gambar);
				$('#updateModal').modal('show');
				$('#modalLoading').modal('hide');
			}).catch(function (ex) {
				console.log(ex);
			});
		}

		function showDeleteConfirmation(id) {
			$('#modalLoading').modal('show');
			axios.get('/admin/promosi/show/' + id).then(function (res) {
				// Initialize res in data var
				var data = res.data;
				// Load data from ajax
				$('#id_promosi_delete').val(data.id_promosi);
				$('#id_promosi_d').html(data.id_promosi);
				$('#promosi_d').html(data.promosi);
				$('#ket_promosi_d').html(data.ket_promosi);
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
						if ( form[0][2].value !== '' ) {
							if ( form[0][3].value !== '' ) {
								return true;
							}
						}
					}
				}
			} else {
				var form = $('#form');
				if ( form[0][0].value !== '' ) {
					if ( form[0][1].value !== '' ) {
						if ( form[0][2].value !== '' ) {
							if ( form[0][4].value !== '' ) {
								return true;
							}
						}
					}
				}
			}

			return false;
		}

		$('.btn-delete').click(function(event) {
			// Prepare id
			var id = $(this).attr('data-id-promosi');
			// Show form
			$('#id_promosi_delete').val(id);
			$('#id_promosi_delete_info').html(id);
		});

		$(document).ready(function() {

			initialize();

			$('.btn-add-item').click(function(event) {
				$('input[name="flag"]').val('1');
			});

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
					var promosi = $('input[name="promosi"]').val();
					var ket_promosi = $('textarea[name="ket_promosi"]').val();
					var flag = $('input[name="flag"]').val();
					var gambar = $('input[name="gambar"]')[0].files[0];
					var form = new FormData();
					form.append('promosi', promosi);
					form.append('ket_promosi', ket_promosi);
					form.append('flag', flag);
					form.append('gambar', gambar);
					// Send post request
					axios.post('{{route("a.promosi.a")}}', form).then(function(res){
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
					var id = $('#id_promosi').val();
					var promosi = $('input[name="promosi_u"]').val();
					var ket_promosi = $('textarea[name="ket_promosi_u"]').val();
					var flag = $('input[name="flag_u"]').val();
					var gambar_lama = $('input[name="gambar_u_lama"]').val();

					if ( $('input[name="gambar_u"]')[0].files[0] !== '' ) {
						var gambar = $('input[name="gambar_u"]')[0].files[0];
					} else {
						var gambar = '';
					}

					var form = new FormData();
					form.append('id', id);
					form.append('promosi', promosi);
					form.append('ket_promosi', ket_promosi);
					form.append('flag', flag);
					form.append('gambar', gambar);
					form.append('gambar_lama', gambar_lama);

					// Send post request
					axios.post('{{route("a.promosi.u")}}', form).then(function(res){
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
				var id = $('#id_promosi_delete').val();
				var form = new FormData();
				form.append('id', id);
				// Post delete request
				axios.post('{{ route('a.promosi.d') }}', form).then(function (res) {
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
