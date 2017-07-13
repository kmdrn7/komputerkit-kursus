
@extends('admin.layouts.app')

@section('page-title')
	Buat Expert
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
                    <div class="card-header card-header-icon" data-background-color="yellow" style="display: flex">
						<div class="header-left">
							<i class="material-icons">assignment</i>
							<h4 class="title">Manajemen keahlian kursus</h4>
							<p class="category">New employees on 15th September, 2016</p>
						</div>
						<div class="header-right">
							<button type="button" class="btn btn-round btn-just-icon btn-primary btn-add-item btn-lg" data-toggle="modal" data-target="#materi_lama">
								+
							</button>
							<button type="button" class="btn btn-round btn-just-icon btn-primary btn-refresh-item">
								<i class="fa fa-refresh" id="i-refresh"></i>
							</button>
						</div>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Data Keahlian</h4>
                        <div class="toolbar" style="margin-bottom: 15px;">
							<div class="form-group label-floating is-empty" style="margin-top: 0; max-width: 300px;">
								<label class="">Kursus</label>
								<select class="form-control" name="keahlian" style="flex: auto;">
									@foreach ($keahlian as $k)
										<option value="{{ $k->id_keahlian }}">{{ $k->keahlian }}</option>
									@endforeach
								</select>
								<span class="material-input"></span>
							</div>
						</div>
                        <div class="table-responsive" id="table--container">
							<div class="img-container">
								<img id="loading" class="img-loading" src="{{ asset('img/web/loading.gif') }}" alt="">
							</div>
							@include('admin.buat_expert.tbl_buat_expert')
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
	{{-- Modal Pilih Kursus --}}
	<div class="modal fade" id="materi_lama" tabindex="" role="dialog" aria-labelledby="" aria-hidden="true" style="overflow-y: auto">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="">Pilih Kursus</h4>
				</div>
				<div class="modal-body">
					<div class="row" style="margin-top: 15px">
						<div class="col-md-12">
							<div class="materi_lama_container" id="materi-lama--container">
								<table class="table table-bordered table-striped table-hover" id="OldTable">
									<thead>
										<tr>
											<th width="60px">
												<div class="">
													<label>
														<input id="checkAll" type="checkbox" name="materiCheckBoxAll">
														All
													</label>
												</div>
											</th>
											<th>Kursus</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($kursus_all as $k)
											<tr>
												<td>
													<div class="">
														<label>
															<input type="checkbox" name="materiCheckBox" value="{{ $k->id_kursus }}">
														</label>
													</div>
												</td>
												<td>{{ $k->kursus }} - {{ $k->waktu }} Hari</td>
											</tr>
										@endforeach
									</tbody>
								</table>

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
					<input type="hidden" id="id_keahlian_delete" value="">
					<table class="table table-striped">
						<tr>
							<td width="130px">ID Detail Kealian</td>
							<td id="id_keahlian_d"></td>
						</tr>
						<tr>
							<td>Materi</td>
							<td id="keahlian_d"></td>
						</tr>
						<tr>
							<td>Deskripsi</td>
							<td id="ket_keahlian_d"></td>
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
			axios.get('{{route('ajax.buatk')}}', {params: {id_keahlian: id}}).then(function (res) {
				$('#loading').css('display', 'none');
				$('#table--container').append(res.data);
				initialize();
				$('.btn-refresh-item').removeClass('fa-spin');
			});
		}

		function showDeleteConfirmation(id) {
			$('#modalLoading').modal('show');
			axios.get('/admin/daftar_keahlian/show/' + id).then(function (res) {
				// Initialize res in data var
				var data = res.data;
				console.log(data);
				// Load data from ajax
				$('#id_keahlian_delete').val(data[0].id_detail_keahlian);
				$('#id_keahlian_d').html(data[0].id_detail_keahlian);
				$('#keahlian_d').html(data[0].kursus);
				$('#ket_keahlian_d').html(data[0].ket_kursus.substring(0, 100) + '...');
				$('.bs-example-modal-sm').modal('show');
				$('#modalLoading').modal('hide');
			}).catch(function (ex) {
				console.log(ex);
			});
		}

		$(document).ready(function() {

			var id_expert_selected = $('select[name="keahlian"]').val();

			$('#OldTable').DataTable({
				"lengthMenu": [[-1], ["Semua"]]
			});

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

			$('select[name="keahlian"]').change(function(event) {
				id_expert_selected = $(this).val();
				$('.btn-refresh-item').addClass('fa-spin');
				fetch(id_expert_selected);
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
				fetch($('select[name="keahlian"]').val());
			});

			$('input[name="materiCheckBoxAll"]').change(function(event) {
				if ( $(this).is(':checked') ) {
					$('input[name="materiCheckBox"]').attr('checked', '');
				} else {
					$('input[name="materiCheckBox"]').removeAttr('checked');
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
				axios.post('{{ route('a.buatk.a') }}', {
					chk: checked,
					id_keahlian: $('select[name="keahlian"]').val(),
				}).then(function(res){
					console.log(res.data);
					$('#modalLoading').modal('hide');
					$('input[type="checkbox"]').iCheck('uncheck');
					fetch($('select[name="keahlian"]').val());
				});
			});

			$('#confirm_delete').click(function(event) {
				event.preventDefault();
				// Close This Modal
				$('#deleteModal').modal('hide');
				$('#modalLoading').modal('show');
				// Initialize ID
				var id = $('#id_keahlian_delete').val();
				var form = new FormData();
				form.append('id', id);
				// Post delete request
				axios.post('{{ route('a.buatk.d') }}', form).then(function (res) {
					console.log(res.data);
					$('#modalLoading').modal('hide');
					// Fill with new table
					fetch($('select[name="keahlian"]').val());
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
