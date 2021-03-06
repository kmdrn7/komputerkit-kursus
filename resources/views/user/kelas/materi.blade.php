@extends('user.layouts.app')

@section('title')
	Materi
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

	<script type="text/javascript">
		var materi_finished = 0;
		var materi_total = parseInt('{{ count($materi) }}');
	</script>

	<div class="row white" style="margin-bottom: 30px">
		<div class="col l12 s12 m12">
			{{-- <div class="container"> --}}
				<ul id="tabs-swipe-demo" class="tabs" style="max-width: 1280px">
					<li class="tab col s4 m4 l4"><a class="amtr active" href="{{ url('/kelas/kursus/'. $id . '/materi') }}">Materi</a></li>
					<li class="tab col s4 m4 l4"><a class="amtr" href="{{ url('/kelas/kursus/'. $id . '/tugas') }}">Tugas</a></li>
					<li class="tab col s4 m4 l4"><a class="amtr" href="{{ url('/kelas/kursus/'. $id . '/diskusi') }}">Diskusi</a></li>
				</ul>
			{{-- </div> --}}
		</div>
	</div>

	<div class="container" style="max-width: 820px!important; min-height: calc(100vh - 85px); margin-bottom: 40px">
		@if ( ($sisa = $kursus->tgl_selesai->diffInDays(\Carbon\Carbon::now())) <= 5 )
			<div class="row">
				<div class="col s12">
					<div class="card-panel">
						<h4 class="no-margin-top no-margin-bottom center-align" style="font-weight: 400">Informasi</h4>
						<div class="row">
							<div class="col m12 s12">
								<p class="center-align">
									Kursus yang anda ikuti tersisa {{ $sisa }} hari terhitung sejak anada mendaftar. Segera lakukan perpanjangan kursus anda untuk bisa melanjutkan materi dan tugas yang anda dapatkan.
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
		<div class="row">
			<div class="col s12">
				<div class="card-panel">
					<h4 class="no-margin-top" style="font-weight: 700">Progress Belajar</h4>
					<div class="progres-container">
						<div class="progress">
							<div class="determinate" style="width: 0%;"></div>
						</div>
						<div class="prog-text">
							0%
						</div>
					</div>
					<div class="" style="color: gray; font-style: italic; font-weight: 400">
						<span id="materi_finished">0</span> dari <span id="materi_total">0</span> Materi terselesaikan
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			@foreach ($materi as $m)
				<div class="col m12 s12">
					<div class="card-panel z-depth-2 kelas-materi-panel" style="position: relative; ">
						<div class="row no-margin-bottom" style="min-height: 170px; overflow: hidden; margin-bottom: 20px">
							<div class="col m8 s12">
								<div class="kelas-materi-materi">
									Materi
								</div>
								<div class="kelas-materi-head">
									{{ $m->no_urut }}. {{ $m->materi }}
								</div>
								<div class="kelas-materi-content">
									{{ substr($m->ket_materi, 0, 180) }}...
								</div>
							</div>
							<div class="col m4 s12">
								<div class="kelas-materi-media valign-wrapper">
									{{-- <img src="{{ asset('img/web/youtube.png') }}" alt="" style="margin: auto">
									{{ $m->yt_embed }} --}}
									<img src="https://img.youtube.com/vi/{{$m->yt_id}}/0.jpg" alt="" style="margin: auto; width: 100%" class="z-depth-2">
								</div>
							</div>
						</div>
						<div class="row no-margin-top no-margin-bottom">
							<div class="col m12 s12 no-margin-top">
								<div class="kelas-materi-button left">
									<a href="{{ route('kelas.kursus.materi.detail', ['id' => $id, 'id_materi' => $m->id_detail_materi]) }}" class="btn btn-primary btn-large">Mulai Materi</a>
								</div>
							</div>
						</div>
						@if ( $m->flag_materi == 1 )
							<script type="text/javascript">
								materi_finished+=1;
							</script>
							<div class="leftKelasMateriGreen"></div>
						@else
							<div class="leftKelasMateriGray"></div>
						@endif
					</div>
				</div>
			@endforeach
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

@section('content-js')
	<script type="text/javascript">
		$(document).ready(function() {

			var percentage = Math.floor((materi_finished / materi_total) * 100)+'%';

			$('#hlm').modal({
				dismissible: false,
				opacity: .8,
				inDuration: 350,
				outDuration: 200,
			});

			$('#materi_finished').html(materi_finished);
			$('#materi_total').html(materi_total);
			$('.prog-text').html(percentage);

			$('.determinate').animate({
				width: percentage,
			}, 1000);

			$('.amtr').click(function(event) {
				event.preventDefault();
				$('#hlm').modal('open');
				window.location.href = $(this).attr('href');
			});
		});
	</script>
@endsection
