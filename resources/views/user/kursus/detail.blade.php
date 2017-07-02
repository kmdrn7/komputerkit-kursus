@extends('user.layouts.app')

@section('custom--css')
	<link href="https://fonts.googleapis.com/css?family=Acme|Fira+Sans:900" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">
@endsection

@section('content')
	<div class="DKC" style="position: relative">
	<div class="row detail-kursus-container no-margin-bottom" style="background-color: #A62C46">
		<div class="dk-bg-miring z-depth-1"></div>
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

	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col m12">
					<div class="kursus-detail-header center-align">
						Ayo belajar {{ $kursus->kursus }}!!!
					</div>
					<div class="kursus-detail-content center-align">
						<div class="kdc-img">
							<img src="{{ asset('img/web/detail_kursus/pc1.png') }}" alt="">
						</div>
						<p class="kdc-p">
							{{ $kursus->ket_kursus }}
						</p>
					</div>
				</div>
				<div class="col m6"></div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col m8 ">
					<div class="apa-yang-anda">
						Yang anda dapatkan ketika mengikuti kursus ini
					</div>
				</div>
				<div class="col m4 kursus-kanan-content">
					<div class="row">
						<div class="col s12">
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="container">
			<div class="row center-align">
				<div class="col s12 center-align">
					<h5 style="color: #333;">Syarat Mengikuti Kursus</h5>
					<div class="row"><div class="garis"></div></div>
				</div>
				<div class="kursus-syarat-content">
					{{ $kursus->syarat }}
				</div>
			</div>
		</div>
	</div>

	<div class="row top-container">
		<div class="col m12 l12" style="padding: 0 80px;">
			{{-- FOURTH ROWS ->> Materi Dalam Kursus --}}
			<div class="row">
				<div class="col s12 l12">
					<div class="kursus-materi-header">
						Materi
					</div>
					<div class="slick--carousel">
						@foreach ($materi as $m)
							<div class="mt-items left-align">
								{{-- <div class="row">
								<div class="col s12 m12"> --}}
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
								{{-- </div>
							</div> --}}
						</div>
					@endforeach
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
