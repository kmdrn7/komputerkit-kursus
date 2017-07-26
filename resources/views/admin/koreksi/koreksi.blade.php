
@extends('admin.layouts.app')

@section('page-title')
	Koreksi Tugas
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
                    <div class="card-header card-header-icon" data-background-color="blue" style="display: flex">
						<div class="header-left">
							<i class="material-icons">assignment</i>
							<h4 class="title">Data dari semua tugas yang dikumpulkan</h4>
							<p class="category">New employees on 15th September, 2016</p>
						</div>
						<div class="header-right">
							{{-- <button type="button" class="btn btn-round btn-just-icon btn-primary btn-add-item btn-lg" data-toggle="modal" data-target="#myModal">
								+
							</button> --}}
							<button type="button" class="btn btn-round btn-just-icon btn-primary btn-refresh-item">
								<i class="fa fa-refresh" id="i-refresh"></i>
							</button>
						</div>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Data Tugas</h4>
                        <div class="toolbar"></div>
                        <div class="table-responsive" id="table--container">
							<div class="img-container">
								<img id="loading" class="img-loading" src="{{ asset('img/web/loading.gif') }}" alt="">
							</div>
							@include('admin.koreksi.tbl_koreksi')
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
	{{-- Modal Update  --}}
	<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true" style="overflow-y: auto">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="updateModalLabel">Koreksi Tugas</h4>
				</div>
				<form class="form" id="updateForm" action="{{ route('a.koreksi.u') }}" method="post">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group label-floating is-empty">
									<label class="">ID Tugas/ID Detail Tugas</label>
									<input id="id_tugas" name="id_tugas" type="text" class="form-control" value="" readonly>
									<input type="hidden" name="id_user" value="">
									<input type="hidden" name="id_detail_tugas" value="">
								<span class="material-input"></span></div>
	                        </div>
							<div class="col-md-6">
								<div class="form-group label-floating is-empty">
									<label class="">Nama User</label>
									<input id="nama_u" name="nama_u" type="text" class="form-control" value="" readonly>
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
									<label class="">Jawaban Benar</label>
									<input name="jawaban_benar_u" type="text" class="form-control" value="">
									<span class="material-input"></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating is-empty">
									<label class="">Jawaban Siswa</label>
									<input  name="jawaban_siswa_u" type="text" class="form-control" value="">
								<span class="material-input"></span></div>
							</div>
						</div>

	                    <div class="row">
	                        <div class="col-md-6">
								<div class="form-group label-floating is-empty">
									<label class="">Nilai (Maksimal : <span id="nilai_patokan"></span>)</label>
									<input  name="nilai_u" type="number" class="form-control" value="">
								<span class="material-input"></span></div>
	                        </div>
							<div class="col-md-6">
								<div class="form-group label-floating is-empty">
									<label class="">Status</label>
									<input  name="flag_u" type="number" class="form-control" value="">
								<span class="material-input"></span></div>
	                        </div>
	                    </div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button id="update" type="submit" class="btn btn-primary">Simpan Koreksi</button>
					</div>
				</form>
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
			axios.get('{{route('ajax.koreksi')}}').then(function (res) {
				$('#loading').css('display', 'none');
				$('#table--container').append(res.data);
				initialize();
				$('.btn-refresh-item').removeClass('fa-spin');
			});
		}

		function showUpdateForm(idKursus) {
			$('#modalLoading').modal('show');
			axios.get('/admin/koreksi_tugas/show/' + idKursus).then(function (res) {
				// Initialize res in data var
				var data = res.data;
				console.log(data);
				// Load data from ajax
				$('input[name="id_tugas"]').val(data.id_tugas + '/' + data.id_detail_tugas);
				$('input[name="id_user"]').val(data.id_user);
				$('input[name="id_detail_tugas"]').val(data.id_detail_tugas);
				$('input[name="nama_u"]').val(data.name);
				$('input[name="tugas_u"]').val(data.tugas);
				$('input[name="jawaban_benar_u"]').val(data.jawaban_benar);
				$('input[name="jawaban_siswa_u"]').val(data.jawaban);
				$('#nilai_patokan').html(data.nilai_patokan);
				$('input[name="nilai_u"]').val(data.nilai_siswa);
				$('input[name="flag_u"]').val(data.flag_tugas);
				$('#modalLoading').modal('hide');
				$('#updateModal').modal('show');
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
										if ( form[0][6].value !== '' ) {
											return true;
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

			$('#update').click(function(event) {
				event.preventDefault();
				// Validate form
				if ( validateForm('update') ) {
					// initialize form input data
					$('#updateModal').modal('hide');
					$('#modalLoading').modal('show');
					var id_detail_tugas = $('input[name="id_detail_tugas"]').val();
					var id_tugas = $('input[name="id_tugas"]').val();
					var id_user = $('input[name="id_user"]').val();
					var nilai = $('input[name="nilai_u"]').val();
					var flag = $('input[name="flag_u"]').val();

					var form = new FormData();
					form.append('id_detail_tugas', id_detail_tugas);
					form.append('id_tugas', id_tugas);
					form.append('id_user', id_user);
					form.append('nilai_siswa', nilai);
					form.append('flag', flag);

					// Send post request
					axios.post('{{route("a.koreksi.u")}}', form).then(function(res){
						console.log(res.data);
						// Reset
						$('#reset').click();
						// Reset the form + table
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

			$('#updateForm').submit(function(event) {
				event.preventDefault();
			});
			$('#form').submit(function(event) {
				event.preventDefault();
			});
		});
	</script>
@endsection
