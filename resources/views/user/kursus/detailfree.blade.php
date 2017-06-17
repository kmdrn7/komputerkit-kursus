@extends('user.layouts.app')

@section('content')

	<div class="row top-container" style="background-color: gray; margin-top: 20px">
		<div class="container">
			{{-- TOP ROW ->> Sekilas Tentang Kursus --}}
			<div class="row red no-margin-bottom valign-wrapper">
				<div class="col s12 l7">
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
						<a href="#tutorial" class="btn btn-large waves-effet waves-light">Lihat Tutorial</a>
					</div>
				</div>
				<div class="col s12 l5 ">
					<div class="col s12" style="margin: 20px 0;">
						<img src="{{ asset('img/'. $kursus->gambar) }}" class="materialboxed responsive-img" style="border-radius: 5px;" alt="js">
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
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
			<div class="col l6">
				<div class="row no-margin-bottom">
					<div class="col m12">
						<div class="kursus-kanan-head">
							Apa yang anda dapatkan
						</div>
						<div class="kursus-kanan-content">
							<div class="row">
								<div class="col m6">
									<div class="row no-margin-bottom">
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
											<i class="red-text material-icons right">close</i>
										</div>
									</div>
								</div>
								<div class="col m6">
									<div class="row no-margin-bottom">
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
								</div>
							</div>
						</div>
						<div class="kursus-kanan-footer center-align">
							Ingin mengikuti kursus secara keseluruhan? Ingin mendapatkan bimbingan para ahli? Jangan khawatir,
							segera ikuti kursus yang sesungguhnya untuk materi ini dengan klik tombol di bawah ini. <br>
							<a href="{{ url('/kursus/'. $kursus->slug) }}" class="waves-effect waves-light btn">
								<i class="material-icons right">cloud</i>
								Lihat Kursus
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row top-container white">
		<div class="container">
			{{-- THIRD ROW ->> Syarat Mengikuti Kursus --}}
			<div class="row center-align">
				<div class="kursus-syarat-header">
					Syarat Mengkuti Kursus
				</div>
				<div class="kursus-syarat-content">
					Syarat untuk mengikuti kursus ini adalah anda harus hafal teks berikut ini
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					dalam hanya 2 hari saja.
				</div>
			</div>
		</div>
	</div>

	<div class="row top-container" style="max-width: 1200px!important">
		{{-- FOURTH ROWS ->> Materi Dalam Kursus --}}
		<div class="row" id="tutorial">
			<div class="col s12 l10 offset-l1">
				<div class="kursus-materi-header">
					Tutorial
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
