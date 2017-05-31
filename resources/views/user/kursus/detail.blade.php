@extends('user.layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				Ini adalah kursus yang berbayar
				<br>
				Nama kursus : {{ $kursus->kursus }}
				<br><br>
				<h3>List materi : </h3>
				@foreach ($materi as $item)
					{{ $item->materi }} <br>
				@endforeach
			</div>
		</div>

		<br><br>
		Lihat kursus gratis
		<a href="{{ route('kursus.free.id', ['id' => $kursus->slug]) }}">Klik disini</a>

		<br><br>
		<a href="{{ route('kursus.checkout.id', ['id' => $kursus->slug]) }}">Ikuti kursus</a>
		<div class="row">
			<div class="col-md-12">
				<h3>Siswa yang masuk</h3>
				@foreach ($user as $usr)
					{{ $usr->name }}
				@endforeach
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<h3>Materi yang sama</h3>
				@foreach ($user as $usr)
					{{ $usr->name }}
				@endforeach
			</div>
		</div>
	</div>
@endsection
