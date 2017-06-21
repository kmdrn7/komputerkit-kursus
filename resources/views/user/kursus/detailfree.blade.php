@extends('user.layouts.app')

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
						<a style="margin: 10px 0;" href="#tutorial" class="button-ku2 waves-effect waves-light">Lihat Tutorial Gratis</a>
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

	<div class="row white top-container" style="margin-bottom: 0; padding: 50px 0;">
		{{-- FOURTH ROWS ->> Materi Dalam Kursus --}}
		<div class="row" id="tutorial">
			<div class="col s12 l10 offset-l1">
				<div class="row">
					<div class="col s12 center-align">
						<h5 style="color: #333;">Rekomendasi Kursus</h5>
						<div class="row"><div class="garis"></div></div>
					</div>
				</div>
				<ul class="collapsible popout" data-collapsible="accordion">
					@php
						$num = 0;
					@endphp
					@foreach ($materi as $m)
						@php
							$num++;
						@endphp
						<li data-id-materi="{{ $m->id_materi }}">
							<div class="collapsible-header">
								<span>{{ $num }}.</span> {{ $m->materi }}
							</div>
							<div class="collapsible-body" style="position: relative; padding: 20px!important; height: 300px;">
								<div class="bdMateri" style="top: 20px"></div>
								{{-- <div class="card-sub-materi"> --}}
									<div class="materi-header">
										Penjelasan
									</div>
									<div class="materi-title">
										{{ $m->materi }}
									</div>
									<div class="iWrapper">
										<iframe src="{{ $m->yt_embed }}" frameborder="0" allowfullscreen>
										</iframe>
									</div>
									<div class="materi-content center-align" style="margin-top: 15px;">
										{{ $m->ket_materi }}
									</div>
								{{-- </div> --}}
								<button type="button" class="waves-effect waves-light btn-floating closeMateri" id-materi="{{ $m->id_materi }}">
									<i class="material-icons right">close</i>
								</button>
							</div>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
@endsection

@section('content-js')
	<script type="text/javascript">
		$(document).ready(function() {
			$('.closeMateri').click(function(event) {
				event.preventDefault();
				var id = $(this).attr('id-materi');
				$('li[data-id-materi="'+ id +'"]').removeClass('active');
				$('li[data-id-materi="'+ id +'"]>.collapsible-header').removeClass('active');
				// $('li[data-id-materi="'+ id +'"]>.collapsible-body').css('display', 'none');
				$('li[data-id-materi="'+ id +'"]>.collapsible-body').hide('300');
			});
		});
	</script>
@endsection
