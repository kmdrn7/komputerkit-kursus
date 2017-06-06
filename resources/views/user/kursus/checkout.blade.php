@extends('user.layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				Nama Kursus : {{ $kursus->kursus }} <br>
				Deskripsi : <br>
				{{ $kursus->ket_kursus }} <br>
				Hari : {{ $kursus->waktu }}
			</div>
			<br><br>
			<pre>
				Kursus yang mungkin sama :
				@foreach ($kursus_lain as $item)
					<a href="{{ route('kursus.checkout.id', ['id' => $item->slug]) }}">{{ $item->kursus }} {{ $item->waktu }} Hari</a>
				@endforeach
			</pre>
		</div>

		<div class="row">
			<div class="col-md-12">
				<form action="{{ route('kursus.checkout.post', ['id' => $kursus->slug]) }}" method="POST">
					{{ csrf_field() }}
					<input type="hidden" name="id_kursus" value="{{ $kursus->id_kursus }}">
					<input type="text" name="bayar_kursus" value="{{ $kursus->harga }}">
					<button type="submit" name="submit" class="btn btn-success">Ikuti Kursus</button>
				</form>
			</div>
		</div>
	</div>

@endsection
