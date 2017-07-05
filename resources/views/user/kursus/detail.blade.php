@extends('user.layouts.app')

@section('custom--css')
	<link href="https://fonts.googleapis.com/css?family=Acme|Fira+Sans:900" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">
@endsection

@section('content')
	<div class="DKC" style="position: relative; background-color: {{ $kursus->warna }}">
	<div class="row detail-kursus-container no-margin-bottom">
		<div class="dk-bg-miring z-depth-1"></div>
		<div class="dk-bg-miring-2" style="background-color: {{ $kursus->warna }}"></div>
		<div class="container-kursus">
			{{-- TOP ROW ->> Sekilas Tentang Kursus --}}
			<div class="dk-main-lk valign-wrapper">
				<div class="dk-img-container">
					<img src="{{ asset('img/kursus/'. $kursus->gambar) }}" class="dk-img" alt="{{ $kursus->gambar }}">
				</div>
			</div>
			<div class="dk-main-rk valign-wrapper">
				<div class="valign-container">
					<div class="kursus-kursus">
						Kursus
						<div id="border-bottom">&nbsp;</div>
					</div>
					<div class="kursus-title valign-wrapper">
						{{ $kursus->kursus }}
					</div>
					<div class="kursus-mini-detail">
						<small style="font-weight: 400; font-size: 13px"><i>{{ $kursus->waktu }} hari</i></small>
					</div>
					<div class="kursus-button">
						<a style="margin: 10px 2px;" href="{{ route('kursus.free.id', ['id' => $kursus->slug]) }}" class="btn-custom-revert waves-effect waves-light">Lihat Tutorial Gratis</a>
						<a style="margin: 10px 2px;" href="{{ route('kursus.checkout.id', ['id' => $kursus->slug]) }}" class="btn-custom-revert waves-effect waves-light">Ambil Kursus</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row" style="z-index: 3; display: block; position: relative">
		<div class="container">
			<div class="row">
				<div class="col m12">
					<div class="kursus-detail-content center-align">
						<div class="kdc-img center-align">
							<div class="kdc-imgc circle">
								<img class="" src="{{ asset('img/web/detail_kursus/pc1.png') }}" alt="">
							</div>
							<span class="ayo">Ayo belajar <br><span class="ayo-2">{{ $kursus->kursus }}</span></span>
						</div>
						<div class="kdc-p flow-text">
							<span class="kdcp-tentang" style="background-color: {{ $kursus->warna }}">Tentang</span>
							@php
								$array_p = preg_split('/(?<=[.?!;:])\s+/', $kursus->ket_kursus, -1, PREG_SPLIT_NO_EMPTY);
								$count_p = count($array_p);
								$p_1 = round($count_p / 2);
								$p_2 = $count_p - 1;
							@endphp
							<p class="white-text">
								@for ($i=0; $i < $p_1; $i++)
									{{ $array_p[$i] }}
								@endfor
							</p>
							<p class="white-text" style="">
								@for ($i=$p_1; $i <= $p_2; $i++)
									{{ $array_p[$i] }}
								@endfor
							</p>
							<p class="white-text" style="position: relative; margin-top: 100px;">
								<span class="kdcp-syarat" style="background-color: {{ $kursus->warna }}">Syarat Ikut Kursus</span>
								{{ $kursus->syarat }}
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row no-margin-bottom" style="margin-top: 80px; padding-top: 40px; overflow: hidden">
		<div class="container keunggulan-container">
			<div class="k-bg-miring"></div>
			<div class="row" style="position: relative">
				<div class="col m6 kursus-kanan-content">
					<div class="row">
						<div class="col s6">
							<div class="card-panel white z-depth-3 hoverable">
								<div class="row">
									<div class="col m12 valign-wrapper apa-yang-anda">
										<img class="circle" src="{{ asset('img/web/video-player.png') }}" alt="">
										<span style="font-weight: bold; margin: 5px 10px;">Video Tutorial</span>
										<i class="green-text material-icons right">check</i>
									</div>
									<div class="col m12 valign-wrapper apa-yang-anda">
										<img class="circle" src="{{ asset('img/web/books.png') }}" alt="">
										<span style="font-weight: bold; margin: 5px 10px;">Materi Pembelajaran</span>
										<i class="green-text material-icons right">check</i>
									</div>
									<div class="col m12 valign-wrapper apa-yang-anda">
										<img class="circle" src="{{ asset('img/web/list.png') }}" alt="">
										<span style="font-weight: bold; margin: 5px 10px;">Tugas</span>
										<i class="green-text material-icons right">check</i>
									</div>
									<div class="col m12 valign-wrapper apa-yang-anda">
										<img class="circle" src="{{ asset('img/web/clipboard.png') }}" alt="">
										<span style="font-weight: bold; margin: 5px 10px;">Contoh Pekerjaan</span>
										<i class="green-text material-icons right">check</i>
									</div>
									<div class="col m12 valign-wrapper apa-yang-anda">
										<img class="circle" src="{{ asset('img/web/chat.png') }}" alt="">
										<span style="font-weight: bold; margin: 5px 10px;">Diskusi dengan ahli</span>
										<i class="green-text material-icons right">check</i>
									</div>
								</div>
								<div class="center-align det-bot">
									Kursus
								</div>
							</div>
						</div>
						<div class="col s6">
							<div class="card-panel white z-depth-3 hoverable">
								<div class="row">
									<div class="col m12 valign-wrapper apa-yang-anda">
										<img class="circle" src="{{ asset('img/web/video-player.png') }}" alt="">
										<span style="font-weight: bold; margin: 5px 10px;">Video Tutorial</span>
										<i class="green-text material-icons right">check</i>
									</div>
									<div class="col m12 valign-wrapper apa-yang-anda">
										<img class="circle" src="{{ asset('img/web/books.png') }}" alt="">
										<span style="font-weight: bold; margin: 5px 10px;">Materi Pembelajaran</span>
										<i class="red-text material-icons right">close</i>
									</div>
									<div class="col m12 valign-wrapper apa-yang-anda">
										<img class="circle" src="{{ asset('img/web/list.png') }}" alt="">
										<span style="font-weight: bold; margin: 5px 10px;">Tugas</span>
										<i class="red-text material-icons right">close</i>
									</div>
									<div class="col m12 valign-wrapper apa-yang-anda">
										<img class="circle" src="{{ asset('img/web/clipboard.png') }}" alt="">
										<span style="font-weight: bold; margin: 5px 10px;">Contoh Pekerjaan</span>
										<i class="red-text material-icons right">close</i>
									</div>
									<div class="col m12 valign-wrapper apa-yang-anda">
										<img class="circle" src="{{ asset('img/web/chat.png') }}" alt="">
										<span style="font-weight: bold; margin: 5px 10px;">Diskusi dengan ahli</span>
										<i class="red-text material-icons right">close</i>
									</div>
								</div>
								<div class="center-align det-bot">
									Tutorial
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col m6 kdvc">
					<div class="kdv-imgc circle">
						<img class="" src="{{ asset('img/web/detail_kursus/vs.png') }}" alt="">
					</div>
					<div class="kdv-img-title center-align">
						<div class="kdvi-left">
							pilih <span>Kursus</span><br> atau <span>Tutorial</span>
						</div>
						<div class="kdvi-right">
							?
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row border-dk-row no-margin-top">

	</div>

	<div class="row top-container materi-container no-margin-bottom">
		<div class="col m12 l12" style="padding: 0 80px;">
			{{-- FOURTH ROWS ->> Materi Dalam Kursus --}}
			<div class="row">
				<div class="col s12 l12">
					<div class="kursus-materi-header">
						Materi
					</div>
					<div class="mlc">
						<div class="slick--carousel">
							@foreach ($materi as $m)
								<div class="mt-items left-align">
									<div class="card-materi card-panel white z-depth-3 hoverable">
										<div class="bdMateri"></div>
										<div class="card-sub-materi">
											<div class="materi-header">
												Materi
											</div>
											<div class="materi-title">
												{{ $m->materi }}
											</div>
											<div class="materi-content">
												{{ $m->ket_materi }}
											</div>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	</div>
@endsection

@section('custom--js')
	<script src="{{ asset('js/slick.js') }}" charset="utf-8"></script>
@endsection

@section('content-js')
	<script type="text/javascript">
		$(document).ready(function() {

			console.log("Berhasil");

			$('.slick--carousel').slick({
				centerMode: true,
				accessibility: false,
				variableWidth: true,
				slidesToShow: 3,
				autoplay: true,
 				autoplaySpeed: 5000,
				lazyLoad: 'ondemand',
			});
		});
	</script>
@endsection
