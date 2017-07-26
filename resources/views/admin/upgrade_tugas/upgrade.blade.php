
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
                    <div class="card-header card-header-icon" data-background-color="green" style="display: flex">
						<div class="header-left">
							<i class="material-icons">assignment</i>
							<h4 class="title">Data dari semua Tugas</h4>
							<p class="category">New employees on 15th September, 2016</p>
						</div>
						<div class="header-right">
							{{-- <button type="button" class="btn btn-round btn-just-icon btn-primary btn-add-item btn-lg" data-toggle="modal" data-target="#choose_method">
								+
							</button> --}}
							<button type="button" class="btn btn-round btn-just-icon btn-primary btn-refresh-item">
								<i class="fa fa-refresh" id="i-refresh"></i>
							</button>
						</div>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Data Materi</h4>
                        <div class="toolbar" style="margin-bottom: 15px;">
							<div class="form-group label-floating is-empty" style="margin-top: 0; max-width: 300px;">
								<label class="">Kursus</label>
								<select class="form-control select2" name="kursus" style="flex: auto;">
									@foreach ($combo_kursus as $c)
										<option value="{{ $c->id_kursus }}">{{ $c->kursus }} - {{ $c->waktu }} Hari</option>
									@endforeach
								</select>
								<span class="material-input"></span>
							</div>
						</div>
                        <div class="table-responsive" id="table--container">
							<div class="img-container">
								<img id="loading" class="img-loading" src="{{ asset('img/web/loading.gif') }}" alt="">
							</div>
							@include('admin.upgrade_tugas.tbl_upgrade')
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
	<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
		<div class="modal-dialog" style="max-width: 1080px; width: 85%;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="updateModalLabel">Detail Materi Kursus</h4>
					<input type="hidden" name="id_detail_kursus" value="">
					<input type="hidden" name="id_user" value="">
				</div>
				<div class="modal-body">
					<div class="row no-margin-top">
						<div class="col-md-12">
							<button type="button" class="btn btn-primary btn-upgrade-materi">
								<i class="fa fa-external-link"></i>&nbsp; Upgrade Tugas
							</button>
							<button type="button" class="btn btn-warning btn-tambah-materi">
								<i class="fa fa-plus-circle"></i>&nbsp; Tambahkan Manual
							</button>
						</div>
					</div>
					<div class="row" style="margin-top: 5px">
						<div id="loading--materi">
							<img id="loading" class="img-loading" src="{{ asset('img/web/loading.gif') }}" alt="">
						</div>
						<div class="col-md-12">
							<div id="list-materi--container"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<button type="button" class="btn btn-danger btn-hapus">
								<i class="fa fa-trash"></i>&nbsp; Hapus
							</button>
						</div>
					</div>
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
	{{-- Modal Upgrade Materi --}}
	<div class="modal fade" id="modalUpgrade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Upgrade Materi Kursus</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="img-container" id="loading-container">
								<img id="loading--upgrade" class="img-loading" src="{{ asset('img/web/loading.gif') }}" alt="">
							</div>
							<div class="select-container">
								<label for="paket_option">Pilih Paket</label>
								<select class="form-control no-select2" name="paket" id="paket_option">

								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
					<button id="upgrade" type="button" class="btn btn-primary">Upgrade</button>
				</div>
			</div>
		</div>
	</div>
	{{-- Modal Upgrade Materi Manual --}}
	<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
		<div class="modal-dialog" style="max-width: 1080px; width: 85%;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Tambah Manual Tugas Kursus</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div id="list-tambah--container"></div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
					<button id="tambahkan" type="button" class="btn btn-primary">Upgrade Materi</button>
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
			axios.get('{{route('ajax.uptugas')}}', {params: {id_kursus: id}}).then(function (res) {
				$('#loading').css('display', 'none');
				$('#table--container').append(res.data);
				initialize();
				$('.btn-refresh-item').removeClass('fa-spin');
			});
		}

		function fetchMateriKursus(id, id_user) {
			$('#list-materi--container').css('display', 'none');
			$('#loading--materi').css('display', 'block');
			axios.get('/admin/upgrade-tugas/show/' + id).then(function (res) {
				// Initialize res in data var
				$('input[name="id_detail_kursus"]').val(id);
				var data = res.data;
				// Load data from ajax
				$('#list-materi--container').append(data);

				$('#loading--materi').css('display', 'none');
				$('#list-materi--container').css('display', 'block');

				$('#OldTable').iCheck({
					checkboxClass: 'icheckbox_square-blue',
				});
				$('#checkAll').on('ifChecked', function (event) {
					$('input[name="materiCheckBox"]').iCheck('check');
				});
				$('#checkAll').on('ifUnchecked', function (event) {
					$('input[name="materiCheckBox"]').iCheck('uncheck');
				});
				$('#OldTable').DataTable({
					"lengthMenu": [[10, 20, 50, -1], [10, 20, 50, "Semua"]]
				});
				$('#updateModal').modal('show');
				$('#modalLoading').modal('hide');
				$('.modal').css('overflow-y', 'auto');
			}).catch(function (ex) {
				console.log(ex);
			});
		}

		function showModalMateri(id, id_user) {
			$('#list-materi--container').html('');
			$('#modalLoading').modal('show');
			$('input[name="id_user"]').val(id_user);
			fetchMateriKursus(id, id_user);
		}

		$(document).ready(function() {

			var id_kursus_selected = $('select[name="kursus"]').val();

			$('.select2').select2();

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

			$('select[name="kursus"]').change(function(event) {
				id_kursus_selected = $(this).val();
				$('.btn-refresh-item').addClass('fa-spin');
				fetch(id_kursus_selected);
			});

			$('#modalUpgrade').on('hidden.bs.modal', function () {
				$('.select-container').css('display', 'block');
				$('#loading--upgrade').css('display', 'none');
				$('#list-materi--container').html('');
				$('#loading-container').html('');
				$('#upgrade').css('visibility', 'visible');
				fetchMateriKursus($('input[name="id_detail_kursus"]').val(), $('input[name="id_user"]').val());
			})

			$('#modalTambah').on('hidden.bs.modal', function () {
				$('#list-materi--container').html('');
				$('#loading-container').html('');
				$(this).css('visibility', 'visible');
				fetchMateriKursus($('input[name="id_detail_kursus"]').val(), $('input[name="id_user"]').val());
			})

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

			$('.btn-upgrade-materi').click(function(event) {
				$('#modalLoading').modal('show');
				axios.get('{{ url('/admin/upgrade-tugas/fetch_option/') }}', {
					params: {
						id_kursus: $('select[name="kursus"]').val(),
					}
				}).then(function(res){
					$('#paket_option').html('');
					$('#paket_option').append(res.data);
					$('#modalUpgrade').modal('show');
					$('#modalLoading').modal('hide');
					$('#myModal').modal('show');
				});
			});

			$('.btn-tambah-materi').click(function(event) {
				$('#modalLoading').modal('show');
				axios.get('{{ url('/admin/upgrade-tugas/show/') }}' + '/'+$('select[name="kursus"]').val(), {
					params: {
						from: 'modal',
						id_kursus: $('select[name="kursus"]').val(),
					}
				}).then(function(res){
					$('#list-tambah--container').html('');
					$('#list-tambah--container').append(res.data);
					$('#OldMateri').iCheck({
						checkboxClass: 'icheckbox_square-blue',
					});
					$('#checkAllM').on('ifChecked', function (event) {
						$('input[name="materiCheckBoxM"]').iCheck('check');
					});
					$('#checkAll').on('ifUnchecked', function (event) {
						$('input[name="materiCheckBoxM"]').iCheck('uncheck');
					});
					$('#OldMateri').DataTable({
						"lengthMenu": [[10, 20, 50, -1], [10, 20, 50, "Semua"]]
					});
					$('#modalTambah').modal('show');
					$('#modalLoading').modal('hide');
				});
			});

			$('#tambahkan').click(function(event) {
				event.preventDefault();
				var checked = [];
				$('input[name="materiCheckBoxM"]:checked').each(function(index, el) {
					checked.push(el.value);
				});

				if ( checked.length < 1 ) {
					alert('Tidak ada materi yang akan ditambahkan');
				} else {

					console.log(checked);
					$('#list-tambah--container').html('');
					$(this).css('visibility', 'hidden');
					axios.post('/admin/upgrade-tugas/add', {
						id_detail_tugas: checked ,
						id_detail_kursus: $('input[name="id_detail_kursus"]').val(),
						id_user: $('input[name="id_user"]').val(),
					}).then(function(res) {
						console.log(res.data);
						$('#list-tambah--container').html('Berhasil tambahkan data materi ke user');
					}, function(res) {
						console.log("Error saat tambahkan materi, " + res.data);
					});
				}
			});

			$('.btn-hapus').click(function(event) {
				event.preventDefault();
				var checked = [];
				$('input[name="materiCheckBox"]:checked').each(function(index, el) {
					checked.push(el.value);
				});

				if ( checked.length < 1 ) {
					alert('Tidak ada materi yang akan dihapus');
				} else {

					console.log(checked);
					$('#list-materi--container').html('');
					$('#loading-container').html('');
					axios.post('/admin/upgrade-tugas/delete', { id_detail_tugas: checked }).then(function(res) {
						console.log(res.data);
						fetchMateriKursus($('input[name="id_detail_kursus"]').val(), $('input[name="id_user"]').val());
					}, function(res) {
						console.log("Error saat delete materi, " + res.data);
					});
				}
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

			$('#upgrade').click(function(event) {
				event.preventDefault();
				$('.select-container').css('display', 'none');
				$('#loading--upgrade').css('display', 'block');
				var data = {
					id_detail_kursus: $('input[name="id_detail_kursus"]').val(),
					id_kursus: $('select[name="kursus"]').val(),
					id_user: $('input[name="id_user"]').val(),
					paket: $('select[name="paket"]').val(),
				}
				axios.post('{{ url('/admin/upgrade-tugas/upgrade') }}', data).then(function(res) {
					if ( res.data.status == 1 ) {
						$('#loading-container').html('');
						$('#loading-container').append('Berhasil melakukan update paket di kursus ini');
					} else if ( res.data.status == 2 ) {
						$('#loading-container').html('');
						$('#loading-container').append('Maaf, gagal melakukan upgrade pada kursus ini <br> Paket sudah ada di dalam kursus ini');
					} else {
						$('#loading-container').html('');
						$('#loading-container').append('Maaf, gagal melakukan upgrade pada kursus ini <br> Lakukan refresh pada halaman ini');
					}

					$('#upgrade').css('visibility', 'hidden');
				}, function(res) {
					// console.log("Error " + res.data);
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
