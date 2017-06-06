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

		<div class="row">
			<div class="col-md-12">
				@foreach ($materi as $item)
					<a href="{{ route('kelas.kursus.materi.detail', ['id' => $item->id_kursus.'--'.$item->id_detail_kursus,'id_materi' => $item->id_detail_materi]) }}"><h3>{{ $item->materi }}</h3></a> <br>
				@endforeach
			</div>
		</div>
	</div>
@endsection
