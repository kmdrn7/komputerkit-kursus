@extends('user.layouts.app')

@section('custom--css')
	<link href="https://fonts.googleapis.com/css?family=Acme|Fira+Sans:900" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">
	<style>
		.youtube-player{position:relative;padding-bottom:56.23%;height:0;overflow:hidden;max-width:100%;background:#000}.youtube-player iframe{position:absolute;top:0;left:0;width:100%;height:100%;z-index:100;background:0 0}.youtube-player img{bottom:0;display:block;left:0;margin:auto;max-width:100%;width:100%;position:absolute;right:0;top:0;border:none;height:auto;cursor:pointer;-webkit-transition:.4s all;-moz-transition:.4s all;transition:.4s all}.youtube-player img:hover{-webkit-filter:brightness(75%)}.youtube-player .play{height:72px;width:72px;left:50%;top:50%;margin-left:-36px;margin-top:-36px;position:absolute;background:url(//i.imgur.com/TxzC70f.png) no-repeat;cursor:pointer}
	</style>
@endsection

@section('content')
	<div class="DKC" style="position: relative; background-color: {{ $kursus->warna }}">
	<a href="javascript:void(back)" class="btn-custom left" style="position: absolute; left: 80px; top: 75px; z-index: 15; border-radius: 4px" onclick="back()">
		<i class="fa fa-chevron-left"></i>&nbsp; Kembali
	</a>

	<div class="row detail-kursus-container no-margin-bottom">
		<div class="dk-bg-miring z-depth-1"></div>
		<div class="dk-bg-miring-2" style="background-color: {{ $kursus->warna }}"></div>
		<div class="container-kursus container valign-wrapper">
			{{-- TOP ROW ->> Sekilas Tentang Kursus --}}
			<div class="row main-det-kursus-row" style="width: 100%">
				<div class="col s12 m5 l6">
					<div class="dk-main-lk valign-wrapper">
						<div class="dk-img-container">
							<img src="{{ asset('img/kursus/'. $kursus->gambar) }}" class="dk-img" alt="{{ $kursus->gambar }}">
						</div>
					</div>
				</div>
				<div class="col s12 m7 l6">
					<div class="dk-main-rk valign-wrapper">
						<div class="valign-container">
							<div class="kursus-kursus">
								Tutorial
								{{-- <div id="border-bottom">&nbsp;</div> --}}
							</div>
							<div class="kursus-title valign-wrapper">
								{{ $kursus->kursus }}
							</div>
							<div class="kursus-button">
								<a style="margin: 10px 2px;" href="javascript:void(0)" class="btn-custom-revert waves-effect waves-light" id="btn-mulai-tutorial">Mulai Tutorial</a>
								<a style="margin: 10px 2px;" href="{{ route('kursus.id', ['id' => $kursus->slug]) }}" class="btn-custom-revert waves-effect waves-light">Lihat Kursus</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row" style="z-index: 3; display: block; position: relative">
		<div class="container">
			<div class="row center-align">
				<div class="col m12 l5">
					<div class="kdc-img center-align">
						<div class="kdc-imgc circle">
							<img class="" src="{{ asset('img/web/detail_kursus/pc1.png') }}" alt="">
						</div>
						<span class="ayo">Ayo belajar <br><span class="ayo-2">{{ $kursus->kursus }}</span></span>
					</div>
				</div>
				<div class="col m12 l7">
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
						<p class="kdcp-syarat" style="background-color: {{ $kursus->warna }}">Syarat Ikut Kursus</p>
						<p class="white-text" style="margin-top: 20px;">
							{{ $kursus->syarat }}
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row no-margin-bottom" style="margin-top: 30px; padding-top: 40px; overflow: hidden">
		<div class="container keunggulan-container">
			<div class="k-bg-miring"></div>
			<div class="row" style="position: relative">
				<div class="col l7 m12 s12 hide-on-small-only kursus-kanan-content">
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
				<div class="col l5 m12 s12 kdvc">
					<div class="row">
						<div class="col s12 m6 l12">
							<div class="kdv-imgc circle">
								<img class="" src="{{ asset('img/web/detail_kursus/vs.png') }}" alt="">
							</div>
						</div>
						<div class="col s12 m6 l12 valign-wrapper">
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
		</div>
	</div>
	<div class="row border-dk-row no-margin-top">

	</div>

	<div class="row top-container materi-container no-margin-bottom container" style="max-width: 980px">
		<div class="col m12 l12">
			{{-- FOURTH ROWS ->> Materi Dalam Kursus --}}
			<div class="row">
				<div class="col s12 m12 l12">
					<div class="kursus-materi-header">
						Materi Tutorial
					</div>
					<div class="mlfc">
						<ul class="collapsible popout" data-collapsible="accordion">
							@foreach ($materi as $m)
								<li class="materi-col-li">
									<div class="collapsible-header"><i class="fa fa-chevron-right" style="font-size: 15px"><strong>_</strong></i>{{ $m->no_urut }}. {{ $m->materi }}</div>
									<div class="collapsible-body white">
										<div class="row no-margin-bottom">
											<div class="col m12">
												<div class="clps-c">
													<div class="clp-vid">
														<div class="youtube-player z-depth-1" data-id="{{ $m->yt_id }}"></div>
													</div>
													<div class="clp-cnt">
														{{ $m->ket_materi }}
													</div>
													<div class="clp-cnt-a">
														{{ $m->ket_materi_adv }}
													</div>
												</div>
											</div>
										</div>
									</div>
								</li>
							@endforeach
							<li class="materi-col-li">
								<div class="collapsible-header center-align"><span style="font-size: 20px; font-weight: 300">Ingin ambil kursus secara lengkap? <strong><small>klik disini</small></strong></span></div>
								<div class="collapsible-body white">
									<div class="row no-margin-bottom">
										<div class="col m12">
											<div class="clps-c center-align">
												Ikuti kursus ini secara lengkap dan dapatkan banyak fitur yang tidak bisa kalian dapatkan disini.
												<div class="clpsc-btn">
													<a href="{{ url('kursus/'. $kursus->slug) }}" class="btn-custom-revert">Lihat Kursus</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	</div>

	{{-- MODAL --}}
	<div class="modal penawaran-modal" id="penawaran-modal">
		<div class="modal-content">
			<div class="row no-margin-bottom">
				<div class="col s12 m12 l6 hide-on-small-only">
					<div class="pimg-c">
						<img src="{{ asset('img/web/monitor.png') }}" class="pnw-left-img" alt="monitor.png">
					</div>
				</div>
				<div class="col s12 m12 l6 center-align valign-wrapper">
					<div class="valign-container" style="margin-top: 10px;">
						<h3><strong>Penawaran khusus hanya untuk anda</strong></h3>
						<p class="penawaran-p">
							Ikuti kursus <strong>{{ $kursus->kursus }}</strong> sekarang juga, dan dapatkan diskon pembelian khusus hari ini untuk anda, klik tombol di bawah ini untuk berlangganan. <strong>Ingat!!</strong> penawaran ini hanya untuk anda. <br style="line-height: 35px;">
							Banyak keunggulan yang bisa anda dapatkan ketika mengikuti kursus dibanding hanya dengan menonton video tutorial.
						</p>
						<p class="penawaran-p center-align" style="margin-top: 20px;">
							<a href="{{ url('/kursus/'. $kursus->slug) }}" class="btn-custom-revert">Ikuti Kursus Sekarang</a>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<a href="javascript:void(0)" class="modal-action modal-close waves-effect waves-light btn-flat"><i class="fa fa-close"></i>&nbsp; Tutup Penawaran</a>
		</div>
	</div>
@endsection

@section('custom--js')
	<script src="{{ asset('js/slick.js') }}" charset="utf-8"></script>
@endsection

@section('content-js')
	<script type="text/javascript">
		document.addEventListener("DOMContentLoaded",
		function() {
			var div, n,
				v = document.getElementsByClassName("youtube-player");
			for (n = 0; n < v.length; n++) {
				div = document.createElement("div");
				div.setAttribute("data-id", v[n].dataset.id);
				div.innerHTML = labnolThumb(v[n].dataset.id);
				div.onclick = labnolIframe;
				v[n].appendChild(div);
			}
		});

		function labnolThumb(id) {
			var thumb = '<img src="https://i.ytimg.com/vi/ID/hqdefault.jpg">',
				play = '<div class="play"></div>';
			return thumb.replace("ID", id) + play;
		}

		function labnolIframe() {
			var iframe = document.createElement("iframe");
			var embed = "https://www.youtube.com/embed/ID?autoplay=1";
			iframe.setAttribute("src", embed.replace("ID", this.dataset.id));
			iframe.setAttribute("frameborder", "0");
			iframe.setAttribute("allowfullscreen", "1");
			this.parentNode.replaceChild(iframe, this);
		}

		function back() {
			window.history.back();
		}

		$(document).ready(function() {

			$('.modal').modal({
				startingTop: '100%',
      			endingTop: '40px',
				opacity: .9
			});

			$('.slick--carousel').slick({
				centerMode: true,
				accessibility: false,
				variableWidth: true,
				slidesToShow: 3,
				autoplay: true,
 				autoplaySpeed: 5000,
				lazyLoad: 'ondemand',
			});

			$('#penawaran-modal').modal('open');

			$('#btn-mulai-tutorial').click(function(event) {
				$('html,body').animate({
					scrollTop: $('.materi-container')[0].offsetTop
				}, 2000);
			});
		});
	</script>
@endsection
