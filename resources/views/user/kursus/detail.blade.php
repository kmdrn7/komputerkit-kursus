@extends('user.layouts.app')

@section('custom--css')
	<link rel="stylesheet" href="{{ asset('css/owl.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/owl.css') }}">
@endsection

@section('content')

	<div class="row top-container white no-margin-bottom" style="padding: 50px 0;">
		<div class="container">
			{{-- TOP ROW ->> Sekilas Tentang Kursus --}}
			<div class="row no-margin-bottom">
				<div class="col l7 m12 s12" style="padding: 10% 20px;">
					<div class="kursus-kursus">
						Kursus
						<div id="border-bottom">&nbsp;</div>
					</div>
					<div class="kursus-title valign-wrapper">
						{{ $kursus->kursus }}
					</div>
					<div class="kursus-mini-detail">
						<small style="font-weight: 300; font-size: 13px">{{ $kursus->waktu }} hari</small>
					</div>
					<div class="kursus-button">
						<a style="margin: 10px 0;" href="{{ route('kursus.free.id', ['id' => $kursus->slug]) }}" class="button-ku2 waves-effect waves-light">Lihat Tutorial Gratis</a>
						<a style="margin: 10px 0;" href="{{ route('kursus.checkout.id', ['id' => $kursus->slug]) }}" class="button-ku2 waves-effect waves-light">Ambil Kursus</a>
					</div>
				</div>
				<div class="col l5 m12 s12">
					<div class="col s12" style="margin: 20px 0;">
						<img src="{{ asset('img/'. $kursus->gambar) }}" class="materialboxed responsive-img" style="border-radius: 5px;" alt="js">
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row white no-margin-bottom" style="padding: 50px 0;">
		<div class="container">
			<div class="col l8 m12 s12" style="padding: 0 2%;">
				<h5>Tentang kursus ini</h5>
				<div class="row" style="margin-bottom: 50px;"><div class="garis" style="margin-left: 10px;"></div></div>
				<p>{{ $kursus->ket_kursus }}</p>
				<div class="row">
					<div class="col l6 m12 s12" style="margin: 10px 0;">
						<div class="center-align" style="background: linear-gradient(-4deg, #8bc6e7, #8d8bf2); padding: 1px 20px 30px 20px;">
							<p class="white-text" style="font-size: 18px; font-weight: 600;">Biaya Kursus</p>
							<a class="button-ku">Rp{{ number_format($kursus->harga,0,",",".") }}</a>
						</div>
					</div>
					<div class="col l6 m12 s12" style="margin: 10px 0;">
						<div class="center-align" style="background: linear-gradient(-4deg, #8bc6e7, #8d8bf2); padding: 1px 20px 30px 20px;">
							<p class="white-text" style="font-size: 18px; font-weight: 600;">Lama Kursus</p>
							<a class="button-ku">{{ $kursus->waktu }} Hari</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col l4 m12 s12" style="padding: 0 2%;">
				<h5>Apa yang anda dapatkan</h5>
				<div class="row" style="margin-bottom: 50px;"><div class="garis" style="margin-left: 10px;"></div></div>
				<div class="kursus-kanan-content" style="padding: 0 20px;">
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

	<!--<div class="container">
		{{-- SECOND ROW ->> Detail Tentang Kursus --}}
		<div class="row">
			<div class="col l6">
				<div class="kursus-detail-header">
					Tentang kursus ini
				</div>
				<div class="kursus-detail-content">
					{{ $kursus->ket_kursus }}
				</div>
			</div>
			<div class="col s12">
				<div class="row no-margin-bottom">
					<div class="col s6 m12 l6">
						<div class="kursus-kanan-head">
							Biaya Kursus
						</div>
						<div class="kursus-kanan-content">
							Rp{{ number_format($kursus->harga,0,",",".") }}
						</div>
					</div>
					<div class="col s6 m12 l6">
						<div class="kursus-kanan-head">
							Lama Kursus
						</div>
						<div class="kursus-kanan-content">
							{{ $kursus->waktu }} Hari
						</div>
					</div>
				</div>
				<div class="divider dvd-kursus"></div>
				<div class="row no-margin-bottom">
					<div class="col m12">
						<div class="kursus-kanan-head">
							Apa yang anda dapatkan
						</div>
						<div class="kursus-kanan-content">
							<div class="row">
								<div class="col m6">
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
									</div>
								</div>
								<div class="col m6">
									<div class="row">
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
		</div>
	</div>-->

	<!--<div class="row top-container white">
		<div class="container">
			{{-- THIRD ROW ->> Syarat Mengikuti Kursus --}}
			<div class="row center-align">
				<div class="col s12 center-align">
					<h5 style="color: #333;">Syarat Mengikuti Kursus</h5>
					<div class="row"><div class="garis"></div></div>
				</div>
				<div class="kursus-syarat-content">
					Syarat untuk mengikuti kursus ini adalah anda harus hafal teks berikut ini
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					dalam hanya 2 hari saja.
				</div>
			</div>
		</div>
	</div>-->

	<div class="white" style="padding: 0 0 50px 0;">
		<div class="divider"></div>
	</div>

	<div class="row white no-margin-bottom no-margin-top white-text" style="border-radius: 0px; margin-top: 0;">
		<div class="col-md-12">
			<div class="container">
				<div class="col s12" style="padding: 12px;">
					<div class="icon-block" style="background-color: #43496D; border: 1px solid #43496D">
						<div class="content-border">
							<h5 class="center white-text"><i class="material-icons">import_contacts</i></h5>
							<h5 class="center">Syarat Mengikuti Kursus</h5>
							<p class="center" style="font-family: 'Lato', sans-serif; font-weight:300; font-size: 17px; padding: 15px;">
								Syarat untuk mengikuti kursus ini adalah anda harus hafal teks berikut ini
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								dalam hanya 2 hari saja.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="white" style="padding: 50px 0 0 0;">
		<div class="divider"></div>
	</div>

	<div class="row top-container">
		{{-- FOURTH ROWS ->> Materi Dalam Kursus --}}
		<div class="row">
			<div class="col s12 l12">
				<div class="kursus-materi-header">
					Materi
				</div>
				<div class="owl-carousel owl-theme">
					@foreach ($materi as $m)
						<div class="item left-align">
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

@endsection

@section('custom--js')
	<script src="{{ asset('js/owl.js') }}" charset="utf-8"></script>
@endsection

@section('content-js')
	<script type="text/javascript">
		$(document).ready(function() {
			console.log("Berhasil");
			$(".owl-carousel").owlCarousel({
				items:4,
		        loop:false,
		        // center:true,
		        startPosition: 0,
				nav:false,
				dots:true,
				responsive:false,
				margin: 20,
			});
		});
	</script>
@endsection
