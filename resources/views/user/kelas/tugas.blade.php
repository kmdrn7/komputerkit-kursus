@extends('user.layouts.app')

@section('content')
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<a href="{{ route('kelas.kursus.materi', ['id' => $id]) }}" class="btn btn-primary">Materi</a>
				<a href="{{ route('kelas.kursus.tugas', ['id' => $id]) }}" class="btn btn-primary">Tugas</a>
				<a href="{{ route('kelas.kursus.diskusi', ['id' => $id]) }}" class="btn btn-primary">Pesan</a>
			</div>
		</div>

		<br>
		<div class="row">
			<div class="col-md-12">
				@foreach ($tugas as $item)
					<a href="{{ route('kelas.kursus.tugas.detail', ['id' => $item->id_kursus.'--'.$item->id_detail_kursus,'id_materi' => $item->id_detail_tugas]) }}"><h3>{{ $item->tugas }}</h3></a> <br>
				@endforeach
			</div>
		</div>
	</div>
@endsection
