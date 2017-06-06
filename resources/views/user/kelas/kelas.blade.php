@extends('user.layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Kelas</h2>
			</div>
		</div>
				
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Promosi
					</div>

					<div class="panel-body">
						<div class="row ">

						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Aktifitas Terbaru
					</div>

					<div class="panel-body">
						<div class="row ">

						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Kursus yang diikuti
					</div>

					<div class="panel-body">
						<div class="row ">
							@foreach ($qkursus as $item)
								@if ( $item->flag_kursus==1 )
									<a href="{{ route('kelas.kursus.materi', ['id' => $item->id_kursus.'--'.$item->id_detail_kursus]) }}" class="btn btn-success">{{ $item->kursus }} <small>({{ $item->waktu }} Hari) ({{ $item->flag_kursus==1 ? 'Aktif' : 'Tidak aktif' }})</small></a>
								@else
									<button class="btn btn-info">{{ $item->kursus }} <small>({{ $item->waktu }} Hari) ({{ $item->flag_kursus==1 ? 'Aktif' : 'Tidak aktif' }})</small></button>
								@endif
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Bookmark
					</div>

					<div class="panel-body">
						<div class="row ">
							@foreach ($qbookmark as $item)
								<div class="col-md-4">
									<h4 class="btn btn-info">{{ $item->kursus }}</h4>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
