@extends('user.layouts.app')

@section('content')

	<div class="row teal no-margin-bottom">
		<div class="container">
			<div class="row">
				<div class="col l3">
					<img class="img-responsive" src="{{ asset('img/'. $kursus->gambar) }}" alt="{{ $kursus->gambar }}" style="width:100%">
				</div>
				<div class="col l5">
					<div class="materi-kursus-title">
						{{ $kursus->kursus }}
					</div>
					<div class="materi-kursus-detail">
						{{ $kursus->ket_kursus }}
					</div>
				</div>
				<div class="col l4">
					<div class="tgl-mulai-head">
						Tanggal Mulai
					</div>
					<div class="tgl-mulai-content">
						{{  $kursus->tgl_mulai->formatLocalized('%A, %d %B %Y') }}
					</div>
					<div class="tgl-selesai-head">
						Tanggal Selesai
					</div>
					<div class="tgl-selesai-content">
						{{ $kursus->tgl_selesai->formatLocalized('%A, %d %B %Y') }}
					</div>
				</div>
			</div>
		</div>
	</div>
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

	<div class="container" style="width: 820px!important">
		<div class="row">
			@foreach ($materi as $m)
				<div class="col m12">
					<div class="card-panel z-depth-2" style="position: relative; ">
						<div class="row no-margin-bottom">
							<div class="col m8" style="height: 200px">
								<div class="kelas-materi-materi">
									Materi
								</div>
								<div class="kelas-materi-head">
									{{ $m->materi }}
								</div>
								<div class="kelas-materi-content">
									{{ substr($m->desc_materi, 0, 180) }}...
								</div>
								<div class="kelas-materi-button left">
									<a href="{{ route('kelas.kursus.materi.detail', ['id' => $id, 'id_materi' => $m->id_materi]) }}" class="btn btn-primary btn-large">Mulai Materi</a>
								</div>
							</div>
							<div class="col m4">
								<div class="kelas-materi-media valign-wrapper">
									<img src="{{ asset('img/web/youtube.png') }}" alt="" style="margin: auto">
								</div>
							</div>
						</div>
						<div class="leftKelasMateri"></div>
					</div>
				</div>
			@endforeach
		</div>
	</div>

@endsection

@section('content-js')
	<script type="text/javascript">
		$(document).ready(function() {
			$('.amtr').click(function(event) {
				event.preventDefault();
				window.location.href = $(this).attr('href');
			});
		});
	</script>
@endsection
