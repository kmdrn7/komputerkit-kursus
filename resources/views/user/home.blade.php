@extends('user.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
					<br><br>
					<pre>{{ Auth::guard('web')->user() }}</pre>
					<pre>{{ Auth::guard('admin')->user() }}</pre>
                </div>
            </div>
        </div>
    </div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Kursus 1 Teratas
				</div>

				<div class="panel-body">
					<div class="row ">
						<div class="col-md-12">
							{{ print_r($topFirst) }}
						</div>
						<div class="col-md-12">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Kursus 3 Teratas
				</div>

				<div class="panel-body">
					<div class="row ">
						<div class="col-md-12">
							{{ print_r($topThird) }}
						</div>
						<div class="col-md-12">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Masuk ke kelas
				</div>

				<div class="panel-body">
					<div class="row ">
						<a href="{{ route('kelas') }}" class="btn btn-warning">Masuk Kelas</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Kuasai hal yang kamu sukai
				</div>

				<div class="panel-body">
					<div class="row ">
						<a href="{{ route('expert') }}" class="btn btn-warning">Lihat Expertise</a>
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
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Kursus yan diikuti
				</div>

				<div class="panel-body">
					<div class="row ">
						{{ $id }}
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row ">
						<a href="{{ route('kursus.id', ['id' => 'all']) }}" class="btn btn-primary">Kursus Berbayar</a>
						<a href="{{ route('kursus.free.id', ['kategori' => 'all']) }}" class="btn btn-success">Kursus Gratis</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
