
@extends('admin.layouts.app')

@section('page-title')
	Tugas
@endsection

@section('custom--css')
	<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/skins/square/blue.css') }}" rel="stylesheet">
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
                    <div class="card-header card-header-icon" data-background-color="red" style="display: flex">
						<div class="header-left">
							<i class="material-icons">assignment</i>
							<h4 class="title">Data dari semua Tugas</h4>
							<p class="category">New employees on 15th September, 2016</p>
						</div>
						<div class="header-right">
							<button type="button" class="btn btn-round btn-just-icon btn-primary btn-add-item btn-lg" data-toggle="modal" data-target="#choose_method">
								+
							</button>
							<button type="button" class="btn btn-round btn-just-icon btn-primary btn-refresh-item">
								<i class="fa fa-refresh" id="i-refresh"></i>
							</button>
						</div>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Data Tugas</h4>
                        <div class="toolbar" style="margin-bottom: 15px;">
							<div class="form-group label-floating is-empty" style="margin-top: 0; max-width: 300px;">
								<label class="">Kursus</label>
								<select class="form-control" name="kursus" style="flex: auto;">
									@foreach ($kursus as $k)
										<option value="{{ $k->id_kursus }}">{{ $k->kursus }} - {{ $k->waktu }} Hari</option>
									@endforeach
								</select>
								<span class="material-input"></span>
							</div>
						</div>
                        <div class="table-responsive" id="table--container">
							<div class="img-container">
								<img id="loading" class="img-loading" src="{{ asset('img/web/loading.gif') }}" alt="">
							</div>
							@include('admin.tugas.tbl_tugas')
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
	{{-- Modal Pilih Metode --}}
	<div class="modal fade" id="choose_method" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="">Pilih Metode Masukan</h4>
				</div>
				<div class="modal-body">
					<div class="flex-group" style="text-align: center; display: flex;">
						<button id="baru" type="button" class="btn btn-success btn-lg" style="flex: 1; margin-right: 10px;">Masukkan baru</button>
						<button id="lama" type="button" class="btn btn-warning btn-lg" style="flex: 1">Masukkan tugas lama</button>
					</div>
					<br>
					<p>
						<strong>Masukkan baru :</strong> Masukkan tugas baru tanpa mengambi dari tugas sebelumnya <br>
						<strong>Masukkan tugas lama :</strong> Masukkan tugas lama yang ada pada kursus lain atau kursus yang sejenis
					</p>
				</div>
			</div>
		</div>
	</div>
	{{-- Modal New --}}
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="overflow-y: auto">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Tambahkan Tugas Baru</h4>
				</div>
				<form class="" action="{{ route('a.tugas.a') }}" method="post" id="form">
					<div class="modal-body">
	                    <div class="row">
	                        <div class="col-md-12">
								<div class="form-group label-floating is-empty">
									<label class="control-label">Tugas</label>
									<input name="tugas" type="text" class="form-control" value="">
								<span class="material-input"></span></div>
	                        </div>
	                    </div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating is-empty">
									<label class="control-label">Deskripsi Tugas</label>
									<textarea class="form-control" name="ket_tugas" rows="5" cols="80"></textarea>
								<span class="material-input"></span></div>
	                        </div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating is-empty">
									<label class="control-label">Jawaban Benar</label>
									<input name="jawaban_benar" type="text" class="form-control" value="">
								<span class="material-input"></span></div>
	                        </div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group label-floating is-empty">
									<label class="">Nilai Patokan</label>
									<input name="nilai_patokan" type="text" class="form-control" value="">
								<span class="material-input"></span></div>
	                        </div>
							<div class="col-md-6">
								<div class="form-group label-floating is-empty">
									<label class="">Flag Tugas</label>
									<input name="flag_tugas" type="number" min="0" max="1" maxlength="1" class="form-control" value="1">
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
	{{-- Modal Pilih Materi Lama --}}
	<div class="modal fade" id="materi_lama" tabindex="" role="dialog" aria-labelledby="" aria-hidden="true" style="overflow-y: auto">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="">Pilih Tugas Lama</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<label class="">Kursus</label><br>
							<select id="combo_materi_lama" class="" name="pilihan_kursus_lama" onchange="fetchMateriLama($(this).val())">
								@foreach ($kursus as $k)
									<option value="{{ $k->id_kursus }}">{{ $k->kursus }} - {{ $k->waktu }} Hari</option>
								@endforeach
							</select>
							<div class="img-container">
								<img id="loading--materi_lama" class="img-loading" src="{{ asset('img/web/loading.gif') }}" alt="">
							</div>
						</div>
					</div>
					<div class="row" style="margin-top: 15px">
						<div class="col-md-12">
							<div class="materi_lama_container" id="materi-lama--container">
								@include('admin.tugas.tbl_tugas_lama');
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<button id="save_lama" type="button" class="btn btn-primary">Tambahkan</button>
				</div>
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
				<form class="form" id="updateForm" action="{{ route('a.tugas.u') }}" method="post">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating is-empty">
									<label class="">ID Tugas</label>
									<input name="id_tugas_u" type="text" class="form-control" value="" readonly>
								<span class="material-input"></span></div>
	                        </div>
	                    </div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating is-empty">
									<label class="">Tugas</label>
									<input name="tugas_u" type="text" class="form-control" value="">
								<span class="material-input"></span></div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating is-empty">
									<label class="">Deskripsi Tugas</label>
									<textarea class="form-control" name="ket_tugas_u" rows="5" cols="80"></textarea>
								<span class="material-input"></span></div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating is-empty">
									<label class="">Jawaban Benar</label>
									<input name="jawaban_benar_u" type="text" class="form-control" value="">
								<span class="material-input"></span></div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group label-floating is-empty">
									<label class="">Nilai Patokan</label>
									<input name="nilai_patokan_u" type="text" class="form-control" value="">
								<span class="material-input"></span></div>
							</div>
							<div class="col-md-6">
								<div class="form-group label-floating is-empty">
									<label class="">Flag Tugas</label>
									<input name="flag_tugas_u" type="number" min="0" max="1" maxlength="1" class="form-control" value="1">
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
					<input type="hidden" id="id_tugas_delete" value="">
					<table class="table table-striped">
						<tr>
							<td width="130px">ID Tugas</td>
							<td id="id_tugas_d"></td>
						</tr>
						<tr>
							<td>Tugas</td>
							<td id="tugas_d"></td>
						</tr>
						<tr>
							<td>Deskripsi</td>
							<td id="ket_tugas_d"></td>
						</tr>
					</table>
					<strong>Pringatan!</strong> Jika tugas di hapus, maka semua data tugas yang berkitan dengan semua user juga akan dihapus,
					jadi berhati-hatilah jika akan menghapus tugas
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

@section('custom--js')
	<script src="{{ asset('js/select2.min.js') }}" charset="utf-8"></script>
	<script src="{{ asset('js/icheck.min.js') }}" charset="utf-8"></script>
@endsection

@section('content-js')
	<script type="text/javascript">

		function initialize() {
			// $('#loading').css('display', 'block');
			$('#DT').DataTable({
				"lengthMenu": [[10, 20, 50, -1], [10, 20, 50, "Semua"]]
			});
			$('#loading').css('display', 'none');
			$('#DT').css('display', 'block');
		}

		function fetch(id = '') {
			$('#loading').css('display', 'block');
			$('#DT_wrapper').remove('');
			axios.get('{{route('ajax.tugas')}}', {params: {id_kursus: id}}).then(function (res) {
				$('#loading').css('display', 'none');
				$('#table--container').append(res.data);
				initialize();
				$('.btn-refresh-item').removeClass('fa-spin');
			});
		}

		function fetchMateriLama(id) {
			$('#loading--materi_lama').css('display', 'block');
			$('#OldTable').remove('');
			axios.get('{{route('ajax.tugas')}}', {params: {id_kursus: id, fromWho: 'modal'}}).then(function (res) {
				$('#loading--materi_lama').css('display', 'none');
				console.log(res.data);
				$('#materi-lama--container').append(res.data);
				$('#OldTable').iCheck({
					checkboxClass: 'icheckbox_square-blue',
				});
				$('#checkAll').on('ifChecked', function (event) {
					$('input[name="materiCheckBox"]').iCheck('check');
				});
				$('#checkAll').on('ifUnchecked', function (event) {
					$('input[name="materiCheckBox"]').iCheck('uncheck');
				});
				$('input[name="materiCheckBox"]').on('ifChecked', function (event) {
					if ($('input[name="materiCheckBox"]').filter(':checked').length == $('input[name="materiCheckBox"]').length) {
						$('#checkAll').iCheck('check');
					}
				});
				console.log('berhasil');
			});
		}

		function showUpdateForm(id) {
			$('#modalLoading').modal('show');
			axios.get('/admin/tugas/show/' + id).then(function (res) {
				// Initialize res in data var
				var data = res.data;
				// Load data from ajax
				$('input[name="id_tugas_u"]').val(data.id_tugas);
				$('input[name="tugas_u"]').val(data.tugas);
				$('input[name="jawaban_benar_u"]').val(data.jawaban_benar);
				$('textarea[name="ket_tugas_u"]').val(data.ket_tugas);
				$('input[name="nilai_patokan_u"]').val(data.nilai_patokan);
				$('input[name="flag_tugas_u"]').val(data.flag_tugas);
				$('#updateModal').modal('show');
				$('#modalLoading').modal('hide');
				$('.modal').css('overflow-y', 'auto');
			}).catch(function (ex) {
				console.log(ex);
			});
		}

		function showDeleteConfirmation(id) {
			$('#modalLoading').modal('show');
			axios.get('/admin/tugas/show/' + id).then(function (res) {
				// Initialize res in data var
				var data = res.data;
				// Load data from ajax
				$('#id_tugas_delete').val(data.id_tugas);
				$('#id_tugas_d').html(data.id_tugas);
				$('#tugas_d').html(data.tugas);
				$('#ket_tugas_d').html(data.ket_tugas);
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
								if ( form[0][4].value !== '' ) {
									if ( form[0][5].value !== '' ) {
										return true;
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
									return true;
								}
							}
						}
					}
				}
			}

			return false;
		}

		$(document).ready(function() {

			var id_kursus_selected = $('select[name="kursus"]').val();

			$('select').select2();

			$('input').iCheck({
			    checkboxClass: 'icheckbox_square-blue',
			    increaseArea: '30%' // optional
			});

			$('#checkAll').on('ifChecked', function (event) {
			    $('input[name="materiCheckBox"]').iCheck('check');
			});

			$('#checkAll').on('ifUnchecked', function (event) {
			    $('input[name="materiCheckBox"]').iCheck('uncheck');
			});

			// Make "All" checked if all checkboxes are checked
			$('input[name="materiCheckBox"]').on('ifChecked', function (event) {
			    if ($('input[name="materiCheckBox"]').filter(':checked').length == $('input[name="materiCheckBox"]').length) {
			        $('#checkAll').iCheck('check');
			    }
			});

			$('select[name="kursus"]').change(function(event) {
				id_kursus_selected = $(this).val();
				$('.btn-refresh-item').addClass('fa-spin');
				fetch(id_kursus_selected);
			});

			initialize();

			$('#modalLoading').modal({
				backdrop: 'static',
				keyboard: false,
				show: false,
			});

			$('.btn-refresh-item').click(function(event) {
				event.preventDefault();
				$(this).addClass('fa-spin');
				fetch($('select[name="kursus"]').val());
			});

			$('#baru').click(function(event) {
				$('#choose_method').modal('hide');
				$('#modalLoading').modal('show');
				$('#modalLoading').modal('hide');
				$('#myModal').modal('show');
			});

			$('#lama').click(function(event) {
				$('#choose_method').modal('hide');
				$('#materi_lama').modal('show');
			});

			$('input[name="materiCheckBoxAll"]').change(function(event) {
				if ( $(this).is(':checked') ) {
					$('input[name="materiCheckBox"]').attr('checked', '');
				} else {
					$('input[name="materiCheckBox"]').removeAttr('checked');
				}
			});

			$('#save').click(function(event) {
				event.preventDefault();
				// Validate form
				if ( validateForm() ) {
					// initialize form input data
					$('#myModal').modal('hide');
					$('#modalLoading').modal('show');
					var id_kursus = $('select[name="kursus"]').val();
					var tugas = $('input[name="tugas"]').val();
					var ket_tugas = $('textarea[name="ket_tugas"]').val();
					var jawaban_benar = $('input[name="jawaban_benar"]').val();
					var nilai_patokan = $('input[name="nilai_patokan"]').val();
					var flag_tugas = $('input[name="flag_tugas"]').val();
					var form = new FormData();
					form.append('id_kursus', id_kursus);
					form.append('tugas', tugas);
					form.append('ket_tugas', ket_tugas);
					form.append('jawaban_benar', jawaban_benar);
					form.append('nilai_patokan', nilai_patokan);
					form.append('flag_tugas', flag_tugas);
					// Send post request
					axios.post('{{route("a.tugas.a")}}', form).then(function(res){
						console.log(res.data);
						// Reset
						$('#reset').click();
						// Reset the form + table
						$('#modalLoading').modal('hide');
						// Fill with new table
						fetch($('select[name="kursus"]').val());

					}).catch(function(er) {
						console.log(er);
					});
				} else {
					// Jika salah validasi
					alert('data yang anda masukkan belum lengkap');
					return false;
				}
			});

			$('#save_lama').click(function(event) {
				var checked = [];
				$('input[name="materiCheckBox"]:checked').each(function(index, el) {
					checked.push(el.value);
				});
				console.log(checked);
				$('#materi_lama').modal('hide');
				$('#modalLoading').modal('show');
				axios.post('{{ route('a.tugasold.a') }}', {
					chk: checked,
					id_kursus: $('select[name="kursus"]').val(),
				}).then(function(res){
					console.log(res.data);
					$('#modalLoading').modal('hide');
					$('input[type="checkbox"]').iCheck('uncheck');
					fetch($('select[name="kursus"]').val());
				});
			});

			$('#update').click(function(event) {
				event.preventDefault();
				// Validate form
				if ( validateForm('update') ) {
					// initialize form input data
					$('#updateModal').modal('hide');
					$('#modalLoading').modal('show');
					var id = $('input[name="id_tugas_u"]').val();
					var id_kursus = $('select[name="kursus"]').val();
					var tugas = $('input[name="tugas_u"]').val();
					var ket_tugas = $('textarea[name="ket_tugas_u"]').val();
					var jawaban_benar = $('input[name="jawaban_benar_u"]').val();
					var nilai_patokan = $('input[name="nilai_patokan_u"]').val();
					var flag_tugas = $('input[name="flag_tugas_u"]').val();
					var form = new FormData();
					form.append('id', id);
					form.append('id_kursus', id_kursus);
					form.append('tugas', tugas);
					form.append('ket_tugas', ket_tugas);
					form.append('jawaban_benar', jawaban_benar);
					form.append('nilai_patokan', nilai_patokan);
					form.append('flag_tugas', flag_tugas);

					// Send post request
					axios.post('{{route("a.tugas.u")}}', form).then(function(res){
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
							fetch($('select[name="kursus"]').val());
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
				var id = $('#id_tugas_delete').val();
				var form = new FormData();
				form.append('id', id);
				// Post delete request
				axios.post('{{ route('a.tugas.d') }}', form).then(function (res) {
					console.log(res.data);
					$('#modalLoading').modal('hide');
					// Fill with new table
					fetch($('select[name="kursus"]').val());
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
