@extends('user.layouts.app')

@section('content')
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Kategori
					</div>

					<div class="panel-body">
						<div class="row ">
							@foreach ($kategori as $item)
								<a href="{{ route('kursus.free.id', ['id' => $item->slug]) }}" class="btn btn-primary">{{ $item->kategori }}</a>
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
						Semua Kursus
					</div>

					<div class="panel-body">
						<div class="row ">
							<style media="screen">
							</style>
							@foreach ($kursus as $item)
								@php
									$slug = $item->slug
								@endphp
								<a href="{{ route('kursus.free.id', $slug) }}" style="text-decoration: none; color: black;">
									<div class="col-md-4" style="padding: 10px; border: 1px solid">
										<h1>{{ $item->kursus }} <small style="font-size:12px">{{ $item->waktu }} Hari</small></h1>
										<p>slug : {{ $slug }}</p>
										<p>Rp {{ number_format($item->harga, 0, ",", ".") }}</p>
									</div>
								</a>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
