@php
	$nownow = \Carbon\Carbon::now();
@endphp

@extends('user.layouts.app')

@section('custom--css')
	<link rel="stylesheet" href="{{ asset('css/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">
@endsection

@section('content')

	<div class="row main-header no-margin-bottom" style="z-index: 11">
		<div id="header-main-panel" class="col l6 m9 s12 valign-wrapper" style="height: 100%; position: relative">
			<div class="valign-container" style="padding-left: 20px;">
				<h3 class="nav-header-title">Belajar koding mulai dari sekarang juga!!!</h3>
				<p class="nav-header-p">
					Tidak hanya orang IT yang harus jago koding. Semua orang harus bisa koding mulai dari sekarang.
					Dapatkan fasilitas khusus dengan mengikuti kursus mingguan di <strong>komputerkit.com</strong>.
					Dibantu oleh para pembimbing yang telah ahli dan materi dalam bentuk video tutorial untuk memudahkan anda.
				</p>
				<div class="button-collection center-align">
					<a href="{{ url('/kursus/all') }}" class="btn-custom btn-custom-large waves-effect waves-light">
						Mulai Kursus
						<i class="material-icons">code</i>
					</a>
					<a id="lihat_kursus" href="javascript:void(0)" class="btn-custom btn-custom-large waves-effect waves-light">
						Kursus Anda
						<i class="material-icons">assignment</i>
					</a>
				</div>
			</div>
		</div>
		<div id="header-second-panel" class="col l5 m8 s12 valign-wrapper" style="height: 100%; display: none; position: relative">
			<div class="header-navigation-back">
				<a id="kembali" href="javascript:void(0)" class="btn-custom">
					Kembali
					<i class="material-icons">arrow_back</i>
				</a>
			</div>
			<div class="valign-container" style="padding-left: 20px;">
				<h4 class="white-text">Kursus Aktif</h4>
				<div class="nav-header-item">
					<ul class="collapsible cl-no-mt" data-collapsible="accordion">
						@foreach ($kursus_anda as $ka)
							<li>
								<div class="collapsible-header">
									<i class="fa fa-tasks"></i>
									{{ $ka->kursus }}
								</div>
								<div class="collapsible-body white">
									<table class="striped bordered highlight">
										<tbody class="centered">
											<tr>
												<th class="center-align">Tgl. Selesai</th>
												<td>{{ $ka->tgl_selesai->formatLocalized('%A, %e %B %Y') }}</td>
												<td class="center-align"><a class="btn btn-info" style="margin-top: -3px" href="{{ url('kelas/kursus/'. $ka->id_kursus .'--'. $ka->id_detail_kursus. '/materi') }}">Masuk</a></td>
											</tr>
											<tr>
												<th class="center-align">Sisa Hari</th>
												<td>{{ $beda_hari = $nownow->diffInDays($ka->tgl_selesai, false) }}</td>
												<td class="center-align">
													@if ( $beda_hari <= 5 )
														<a class="btn" href="{{ url('kursus/checkout/'. $ka->slug) }}">Perpanjangan Kursus</a>
													@endif
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</li>
						@endforeach
					</ul>
				</div>
				<h4 class="white-text">Kursus Pending</h4>
				<div class="nav-header-item">
					<ul class="collapsible cl-no-mt" data-collapsible="accordion">
						@foreach ($kursus_tunggakan as $kt)
							<li>
								<div class="collapsible-header">
									<i class="fa fa-tasks"></i>
									{{ $kt->kursus }}
								</div>
								<div class="collapsible-body white">
									<table class="bordered highlight responsive-table">
										<tbody class="centered">
											<tr>
												<th class="center-align">Status</th>
												<td colspan="2">
													@if ( $kt->flag_kursus == 2 )
														Sedang di proses, menunggu konfirmasi
													@elseif ( $kt->flag_kursus == 0 )
														<a href="{{ url('konfirmasi/'. $kt->id_kursus . '--' . $kt->id_detail_kursus) }}" class="btn-custom-revert right">Konfirmasi Pembayaran</a>
													@endif
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
		<div class="btn-penawaran-container">
			<a class="btn-custom" data-target="mdl_penawaran" href="javascript:void(0)">
				<i class="material-icons">keyboard_arrow_up</i>
				Penawaran
			</a>
		</div>
	</div>

	<div class="no-margin-bottom main-kursus">
		<div class="container">
			<div class="row no-margin-bottom white-text">
				<div class="col s12 m12 center-align" style="margin-top: 30px;">
					<h3 class="main-kursus-title">Sudah lebih dari {{ $kursus_total }} kursus tersedia di <br> <a class="mkt-a" href="http://kursus.komputerkit.com">kursus.Komputerkit.com</a></h3>
					<h5 class="main-kursus-subtitle">Beberapa kursus yang mungkin menarik untuk anda</h5>
				</div>
			</div>
		</div>
		<div class="row no-margin-top no-margin-bottom" style="flex: none!important">
			<div class="col m12 s12 hide-on-med-and-down">
				<div class="floating-img-1">
					{{-- <img src="{{ asset('img/web/text-editor.png') }}" alt=""> --}}
				</div>
			</div>
		</div>
		<div class="container" style="flex: 3; max-width: 860px!important; padding: 0 35px;">
			<div class="row kursus-3-container">
				<div class="col m12 s12" style="padding: 0">
					<div class="slick--carousel">
						@foreach ($kursus as $k)
							<div class="s-items">
								<div class="si-image">
									<img data-lazy="/img/kursus/{{ $k->gambar }}" alt="">
								</div>
								<div class="si-title">
									<a href="{{ url('kursus/'. $k->slug) }}">
										{{ $k->kursus }}
									</a>
									<div class="border"></div>
								</div>
								<div class="si-price">
									Rp.{{ number_format($k->harga, 0, ",", ".") }} / {{ $k->waktu }} Hari
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	{{-- Border Gelombang --}}
	<div class="main-kursus-border"></div>

	<div class="main-expert">
		<div class="expert-top">
			<div class="container">
				<div class="row no-margin-bottom">
					<div class="col m12 s12">
						<div class="expert-title">
							Kuasai apa yang kamu suka
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="expert-bottom">
			<div class="container">
				<div class="row">
					<div class="col m12 s12">
						<div class="expert-content">
							<div class="ec-image">
								<div class="ec-img-pensil hide-on-med-and-down">
									<img src="{{ asset('img/web/expert/pensil.png') }}" alt="">
								</div>
								<div class="ec-img-laptop">
									<img src="{{ asset('img/web/expert/laptop.png') }}" alt="">
								</div>
								<div class="ec-img-kopi hide-on-med-and-down">
									<img src="{{ asset('img/web/expert/kopi.png') }}" alt="">
								</div>
							</div>
							<div style="max-width: 800px; margin: auto">
								<div class="ec-text">
									Dengan bantuan kami kalian bisa dengan mudah menguasai apa yang kalian suka.
									Kami akan membuatkan urutan pembelajaran untuk kalian yang ingin menguasai suatu hal.
								</div>
								<div class="ec-button">
									<a href="javascript:void(0)" class="btn-custom btn-custom-large" onclick="Materialize.toast('Fitur keahlian masih belum bisa diakses', 4000)">Lihat Keahlian</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		{{-- <div class="expert-divider"></div>

		<div class="expert-end"></div> --}}
	</div>

	<div class="main-kelas-container">
		<div class="container main-kelas">
			<div class="row no-margin-bottom">
				<div class="col l4 m4 s12 hide-on-med-and-down">
					<div class="mk-img-container">
						{{-- Gambar Kelas --}}
						<img src="{{ asset('img/web/kelas/bg.png') }}" alt="">
					</div>
				</div>
				<div class="col l8 m12 s12">
					<div class="mk-content-container">
						<div class="mkc-header">
							Kelas
						</div>
						<div class="mkc-content">
							Dengan fasilitas ruang kelas akan memudahkan anda melihat perkembangan kursus yang sedang anda ambil
							dan juga lihat beberapa penawaran khusus hanya untuk anda.
						</div>
						<div class="mkc-action">
							<a href="{{ route('kelas') }}" class="btn-custom-revert">Masuk Kelas</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="main-tutor-container">
		<div class="container">
			<div class="row no-margin-bottom">
				<div class="mt-floating-img"></div>
				<div class="col m12 s12">
					<div class="mt-top">
						<h3>Kursus <span style="font-family: exo; font-size: 50px">atau</span> Tutorial?</h3>
					</div>
					<div class="mt-bottom">
						<div class="row">
						    <div class="col m12 s12">
								<ul class="tabs tabs-fixed-width">
									<li class="tab col s3"><a class="active mtbs" href="#tab-kursus" onclick="false">Kursus</a></li>
									<li class="tab col s3"><a class="mtbs" href="#tab-tutor" onclick="false">Tutorial</a></li>
								</ul>
								<div class="tabs-item" id="tab-kursus" class="col s12">
									<p>
										<i class="material-icons tabs-icon">chrome_reader_mode</i> <br>
										Ikuti kursus untuk mendapatkan pengalaman belajar pemrograman yang sangat menyenangkan dan juga mengesankan.
									</p>
									<p>
										<a class="btn-custom" href="{{ url('/kursus/all') }}">Lihat Kursus</a>
									</p>
								</div>
								<div class="tabs-item" id="tab-tutor" class="col s12">
									<p>
										<i class="material-icons tabs-icon">play_circle_filled</i> <br>
										Ikuti tutorial untuk sekilas mengenal mengenal tentang kursus kami
									</p>
									<p>
										<a class="btn-custom" href="{{ url('/kursus/free/all') }}">Lihat Tutorial</a>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	{{-- Modal Penawaran --}}
	<div class="modal" id="mdl_penawaran">
		<div class="modal-content" style="padding-bottom: 0">
			<div class="row">
				<div class="col m12 s12 center-align">
					<h4>{{ $promosi->promosi }}</h4>
					<img src="{{ asset('img/promosi/'. $promosi->gambar) }}" alt="" style="margin-bottom: 10px"> <br>
					{{ $promosi->ket_promosi }}
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<a href="javascript:void(0)" class="modal-action modal-close waves-effect waves-light btn-flat">Tutup</a>
		</div>
	</div>

@endsection

@section('custom--js')
	<script src="{{ asset('js/slick.js') }}" charset="utf-8"></script>
@endsection

@section('content-js')
	<script type="text/javascript">
		$(document).ready(function() {

			$('.modal').modal({
				opacity: .8
			});

			$('ul.tabs').tabs();

			$('.slick--carousel').slick({
				autoplay: true,
				autoplaySpeed: 2000,
				lazyLoad: 'ondemand',
				accessibility: false,
			});

			$('#lihat_kursus').click(function(event) {
				$('#header-main-panel').hide('400');
				$('#header-second-panel').show('400');
			});

			$('#kembali').click(function(event) {
				$('#header-second-panel').hide('500');
				$('#header-main-panel').show('100');
			});

			// $('#btn_penawaran').click(function(event) {
			// 	$('#mdl_penawaran').modal('open');
			// });
		});
	</script>
@endsection
