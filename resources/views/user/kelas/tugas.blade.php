@extends('user.layouts.app')

@section('content')
	<div class="container">

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
						<li class="tab col s4 m4 l4"><a class="amtr" href="{{ url('/kelas/kursus/'. $id . '/materi') }}">Materi</a></li>
						<li class="tab col s4 m4 l4"><a class="amtr active" href="{{ url('/kelas/kursus/'. $id . '/tugas') }}">Tugas</a></li>
						<li class="tab col s4 m4 l4"><a class="amtr" href="{{ url('/kelas/kursus/'. $id . '/diskusi') }}">Diskusi</a></li>
					</ul>
				{{-- </div> --}}
			</div>
		</div>


		<div class="row">
			<div class="col-md-12">
				@foreach ($tugas as $item)
					<a href="{{ route('kelas.kursus.tugas.detail', ['id' => $item->id_kursus.'--'.$item->id_detail_kursus,'id_materi' => $item->id_detail_tugas]) }}"><h3>{{ $item->tugas }}</h3></a> <br>
				@endforeach
			</div>
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
