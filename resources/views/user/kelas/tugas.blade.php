@extends('user.layouts.app')

@section('title')
	Tugas
@endsection

@section('content')

	<div class="kelas--nav valign-wrapper">
		<div class="bnav-container container">
			<div class="bnsp-book center-align">
				<span class="left">
					<a href="{{ url('/kelas') }}" class="white-text waves-effect waves-light">
						<i class="fa fa-chevron-left"></i>
					</a>
				</span>
				{{ $kursus->kursus }}
				<br class="hide-on-med-and-up">
				<small style="font-size: 30px">({{ $kursus->waktu }} Hari)</small>
			</div>
			<div class="knsp-det center-align">
				Tanggal mulai : {{  $kursus->tgl_mulai->formatLocalized('%A, %d %B %Y') }} <br>
				Tanggal selesai : {{ $kursus->tgl_selesai->formatLocalized('%A, %d %B %Y') }}
			</div>
		</div>
	</div>

	<div class="row white" style="margin-bottom: 30px">
		<div class="col l12 s12 m12">
			{{-- <div class="container"> --}}
				<ul id="tabs-swipe-demo" class="tabs" style="max-width: 1280px">
					<li class="tab col s4 m4 l4"><a class="amtr" href="{{ url('/kelas/kursus/'. $id . '/materi') }}">Materi</a></li>
					<li class="tab col s4 m4 l4"><a class="amtr active" href="{{ url('/kelas/kursus/'. $id . '/tugas') }}">Tugas</a></li>
					<li class="tab col s4 m4 l4"><a class="amtr" href="{{ url('/kelas/kursus/'. $id . '/diskusi') }}">Diskusi</a></li>
				</ul>
			{{-- </div> --}}
		</div>
	</div>

	<div class="container" style="max-width: 860px!important; min-height: calc(100vh - 85px); margin-bottom: 40px">
		@if ( $kursus->tgl_selesai->diffInDays(\Carbon\Carbon::now()) <= 5 )
			<div class="row">
				<div class="col s12">
					<div class="card-panel">
						<h4 class="no-margin-top center-align" style="font-weight: 400">Informasi</h4>
						<div class="row">
							<div class="col m12 s12">
								<p class="center-align">
									Segera lakukan perpanjangan kursus anda untuk bisa melanjutkan materi dan tugas yang anda dapatkan.
									Data kursus anda tidak akan hilang, namun ketika waktu kursus berakhir anda tidak bisa membuka kursus anda.
								</p>
							</div>
							<div class="col m12 s12 center-align">
								<a href="{{ url('/kursus/checkout/'. $kursus->slug) }}" class="waves-effect waves btn-flat-custom btn-red">Perpanjang Kursus</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endif
		<div class="row" style="display:flex">
			<div class="col s12 m9 l9">
				<div class="row">
					@foreach ($tugas as $t)
						<div id="tugas-{{$t->id_detail_tugas}}" class="col s12 m12 center-align scrollspy--tugas" style="position:relative">
							<div class="card-panel white left-align" style="border-radius: 5px; position: relative">
								<div class="tugas-header">
									Tugas #{{ $t->id_detail_tugas }}
								</div>
								<div class="tugas-title">
									{{ $t->tugas }}
								</div>
								<div class="tugas-content">
									{{ $t->ket_tugas }}
								</div>
								<hr style="border: 1px dashed rgb(96,96,96)">
								@if ( !$t->jawaban && !$t->nilai_siswa )
									<div class="tugas-unggah-jawaban" style="display:none" id-tugas="{{ $t->id_detail_tugas }}">
								@elseif ( $t->jawaban )
									<div class="tugas-unggah-jawaban" id-tugas="{{ $t->id_detail_tugas }}">
								@else
									<div class="tugas-unggah-jawaban" id-tugas="{{ $t->id_detail_tugas }}">
								@endif
									@if ( $t->jawaban && $t->nilai_siswa )
										<div class="tugas-nilai">
											Nilai anda : {{ $t->nilai_siswa }}/{{ $t->nilai_patokan }}
										</div>
										<div class="tugas-jawaban-benar">
											Klik <a href="{{ $t->jawaban_benar }}" target="_blank">disini</a> untuk melihat jawaban yang sesuai
										</div>
									@elseif ( $t->jawaban )
										Tunggu jawaban di koreksi oleh pembimbing
									@else
										<span>
											Upload file anda menggunakan fasilitas google drive dalam bentuk archive .zip, kemudian salin link berbagi file di bawah ini.
											Klik <a href="http://youtube.com" target="_blank">disini</a> untuk tutorial upload jawaban anda.
										</span>
										<form action="{{ url('kelas/kursus/tugas/upload_jawaban/'. $t->id_detail_tugas) }}" method="POST">
											<div class="input-field">
												<div class="form-group" style="padding-bottom: 10px">
													{{ csrf_field() }}
													<input type="hidden" name="id" value="{{ $id }}">
													<input type="hidden" name="id_detail_tugas" value="{{ $t->id_detail_tugas }}">
													<label class="control-label" for="">Link Jawaban</label>
													<input type="text" class="form-control" name="link_jawaban" id="" placeholder="http://drive.google.com/...." style="margin-bottom: 5px">
													<span class="help-block red-text">
														@foreach ($errors->all() as $error)
															{{ $error }} <br>
														@endforeach
													</span>
												</div>
											</div>

											<button type="submit" class="btn"><i class="fa fa-send"></i>&nbsp; Kirim</button>
										</form>
									@endif
								</div>
								@if ( $t->flag_det == 1 )
									<div class="leftTugasGreen"></div>
								@else
									<div class="leftTugasOrange"></div>
								@endif
							</div>
							@if ( !$t->jawaban && !$t->nilai_siswa )
								<button type="button" data-tugas="{{ $t->id_detail_tugas }}" class="toggle-tugas btn-floating btn-small waves-effect waves-light orange" style="margin-top: -50px;">
									<i class="material-icons tugas-drop">keyboard_arrow_down</i>
								</button>
							@endif
						</div>
					@endforeach
				</div>
			</div>
			<div class="col hide-on-small-only m3 l3">
				<div id="stickySection">
					<div class="section-tugas-head">
						Daftar Tugas
					</div>
					<ul class="section table-of-contents">
						@foreach ($tugas as $t)
							<li><a href="#tugas-{{$t->id_detail_tugas}}">{{ $t->tugas }}</a></li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>

	{{-- MODAL LOADING --}}
	<div class="modal histori-loading" id="hlm">
		<div class="modal-content">
			<a href="javascript:void(0)" class="modal-action modal-close waves-effect waves-light right tooltipped" data-position="left" data-delay="50" data-tooltip="Batalkan proses"><i class="fa fa-close" style="font-size: 20px"></i></a>
			<div class="loading-wrapper-h">
				Memproses permintaan anda...
			</div>
			<div class="preloader-wrapper plwp-h active">
				<div class="spinner-layer spinner-blue">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div>
					<div class="gap-patch">
						<div class="circle"></div>
					</div>
					<div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>

				<div class="spinner-layer spinner-red">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div>
					<div class="gap-patch">
						<div class="circle"></div>
					</div>
					<div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>

				<div class="spinner-layer spinner-yellow">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div>
					<div class="gap-patch">
						<div class="circle"></div>
					</div>
					<div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>

				<div class="spinner-layer spinner-green">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div>
					<div class="gap-patch">
						<div class="circle"></div>
					</div>
					<div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('custom--js')
	<script src="{{ asset('js/sticky.min.js') }}" charset="utf-8"></script>
@endsection

@section('content-js')
	<script type="text/javascript">
		$(document).ready(function() {
			$('#stickySection').stick_in_parent();
			$('.scrollspy--tugas').scrollSpy({
		        // 'scrollOffset': 350,
		    });
			$('#hlm').modal({
				dismissible: false,
				opacity: .8,
				inDuration: 350,
				outDuration: 200,
			});


			$('.amtr').click(function(event) {
				event.preventDefault();
				$('#hlm').modal('open');
				window.location.href = $(this).attr('href');
			});
			$('.toggle-tugas').click(function(e) {
				e.preventDefault();
				var id = $(this).attr('data-tugas');
				$('div[id-tugas="' + id + '"]').toggle('300');

				if ( $(this).html().includes('arrow_down') ) {
					$(this).html('<i class="material-icons tugas-drop">keyboard_arrow_up</i>');
				} else {
					$(this).html('<i class="material-icons tugas-drop">keyboard_arrow_down</i>');
				}
			});
		});
	</script>
@endsection
