
@extends('admin.layouts.app')

@section('page-title')
	Konfirmasi Pembayaran
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
							<h4 class="title">Data dari semua konfirmasi pembayaran</h4>
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
                        <h4 class="card-title">Data Konfirmasi</h4>
                        <div class="toolbar"></div>
                        <div class="table-responsive" id="table--container">
							<div class="img-container">
								<img id="loading" class="img-loading" src="{{ asset('img/web/loading.gif') }}" alt="">
							</div>
							@include('admin.konf_bayar.tbl_konf_bayar')
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
					<h4 class="modal-title" id="updateModalLabel">Update Data</h4>
				</div>
				<form class="form" id="updateForm" action="{{ route('a.konf.u') }}" method="post">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating is-empty">
									<label class="">ID Bayar/Faktur</label>
									<input id="id_bayar" name="id_bayar" type="text" class="form-control" value="" readonly>
									<input type="hidden" name="id_id" value="">
								<span class="material-input"></span></div>
	                        </div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating is-empty">
									<label class="">Nama</label>
									<input id="nama_u" name="nama_u" type="text" class="form-control" value="" readonly>
								<span class="material-input"></span></div>
	                        </div>
						</div>

	                    <div class="row">
	                        <div class="col-md-6">
								<div class="form-group label-floating is-empty">
									<label class="">Kursus</label>
									<input name="kursus_u" type="text" class="form-control" value="">
								<span class="material-input"></span></div>
	                        </div>
	                        <div class="col-md-6">
								<div class="form-group label-floating is-empty">
									<label class="">Waktu (Hari)</label>
									<input name="waktu_u" type="number" step="1" class="form-control" value="">
								<span class="material-input"></span></div>
	                        </div>
	                    </div>

	                    <div class="row">
	                        <div class="col-md-6">
								<div class="form-group label-floating is-empty">
									<label class="">Harga (Rp)</label>
									<input  name="harga_u" type="number" class="form-control" value="">
								<span class="material-input"></span></div>
	                        </div>
							<div class="col-md-6">
								<div class="form-group label-floating is-empty">
									<label class="">Bayar/Transfer (Rp)</label>
									<input  name="bayar_u" type="number" class="form-control" value="">
								<span class="material-input"></span></div>
	                        </div>
	                    </div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating is-empty">
									<label class="">Atas Nama/Bank Asal/Bank Tujuan</label>
									<input  name="atas_nama_u" type="text" class="form-control" value="">
								<span class="material-input"></span></div>
							</div>
						</div>

						<div class="row">
	                        <div class="col-md-6">
								<div class="form-group label-floating is-empty">
									<label class="">Tgl Transfer</label>
									<input name="tgl_transfer_u" type="text" class="form-control" value="">
								<span class="material-input"></span></div>
	                        </div>
							<div class="col-md-6">
								<div class="form-group label-floating is-empty">
									<label class="">Keterangan Bayar</label>
									<input name="ket_u" type="text" class="form-control" value="">
								<span class="material-input"></span></div>
	                        </div>
	                    </div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button id="update" type="submit" class="btn btn-primary">Konfirmasi</button>
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
					<input type="hidden" id="id_konf_delete" value="">
					<table class="table table-striped">
						<tr>
							<td width="130px">ID Bayar/Faktur</td>
							<td id="id_bayar_d"></td>
						</tr>
						<tr>
							<td>Nama</td>
							<td id="nama_d"></td>
						</tr>
						<tr>
							<td>Kursus</td>
							<td id="kursus_d"></td>
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
			axios.get('{{route('ajax.konf')}}').then(function (res) {
				$('#loading').css('display', 'none');
				$('#table--container').append(res.data);
				initialize();
				$('.btn-refresh-item').removeClass('fa-spin');
			});
		}

		function showUpdateForm(idKursus) {
			$('#modalLoading').modal('show');
			axios.get('/admin/konfirmasi/show/' + idKursus).then(function (res) {
				// Initialize res in data var
				var data = res.data;
				if ( data.status == 1 ) {
					$('#update').css('visibility', 'hidden');
				} else {
					$('#update').css('visibility', 'visible');
				}
				// Load data from ajax
				$('#id_bayar').val(data.faktur);
				$('input[name="nama_u"]').val(data.name);
				$('input[name="kursus_u"]').val(data.kursus);
				$('input[name="waktu_u"]').val(data.waktu);
				$('input[name="harga_u"]').val(data.harga);
				$('input[name="bayar_u"]').val(data.bayar);
				$('input[name="atas_nama_u"]').val(data.atas_nama +'/'+ data.nama_bank + '/' + data.bank_tujuan);
				$('input[name="tgl_transfer_u"]').val(data.tgl_bayar);
				$('input[name="ket_u"]').val(data.ket_bayar);
				$('input[name="id_id"]').val(data.id_detail_kursus+'/'+data.id_kursus+'/'+data.id_bayar+'/'+data.id_user);
				$('#modalLoading').modal('hide');
				$('#updateModal').modal('show');
			}).catch(function (ex) {
				console.log(ex);
			});
		}

		function showDeleteConfirmation(idKursus) {
			$('#modalLoading').modal('show');
			axios.get('/admin/konfirmasi/show/' + idKursus).then(function (res) {
				// Initialize res in data var
				var data = res.data;
				// Load data from ajax
				$('#id_konf_delete').val(data.id_bayar);
				$('#id_bayar_d').html(data.faktur);
				$('#nama_d').html(data.name);
				$('#kursus_d').html(data.kursus);
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

			$('#update').click(function(event) {
				event.preventDefault();
				// Validate form
				if ( validateForm('update') ) {
					// initialize form input data
					$('#updateModal').modal('hide');
					$('#modalLoading').modal('show');
					var id_id = $('input[name="id_id"]').val();
					var waktu = $('input[name="waktu_u"]').val();
					var keterangan = $('input[name="ket_u"]').val();

					var form = new FormData();
					form.append('id_id', id_id);
					form.append('waktu', waktu);
					form.append('status', 1);
					form.append('keterangan', keterangan);

					// Send post request
					axios.post('{{route("a.konf.u")}}', form).then(function(res){
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

			$('#confirm_delete').click(function(event) {
				event.preventDefault();
				// Close This Modal
				$('#deleteModal').modal('hide');
				$('#modalLoading').modal('show');
				// Initialize ID
				var id = $('#id_konf_delete').val();
				var form = new FormData();
				form.append('id', id);
				// Post delete request
				axios.post('{{ route('a.konf.d') }}', form).then(function (res) {
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
