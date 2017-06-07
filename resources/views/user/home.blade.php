@extends('user.layouts.app')

@section('content')

<div class="container" style="margin-top: 20px">

	<div class="row">
        <div class="col l12 m12 s12">
            <div class="card-panel white">
                <div class="row">
					<div class="col s12" style="">
	                    <h5 style="padding: 20px 30px;">Rekomendasi Kursus</h5>
	                    <div class="divider"></div>
	                </div>
	                <div class="col s12" style="padding: 20px;">
	                    <div class="col l4 m4 s12 hoverable" style="padding: 20px 10px;">
	                        <div class="col s12 center-align white" style="padding: 30px 0;">
	                            <a href="detail.html">
	                                <img src="images/plan-free.svg" class="responsive-img" style="margin-bottom: 10px;" alt="">
	                                <h6 id="label-kursus" class="">Html & Css</h6>
	                                <p><a class="waves-effect waves-light btn my-button">Beli Kursus</a></p>
	                                <p><a href="#">Add Bookmark</a></p>
	                                <p style="margin: 0; color: #6C6C6C; font-weight: 600; font-size: 20px;">Rp20.000</p>
	                                <span style="font-size: 14px; color: #969696;">per minggu</span>
	                            </a>
	                        </div>
	                    </div>
	                </div>
				</div>
            </div>
        </div>
    </div>

	<div class="row">
		<div class="col s12 m12">
			<div class="card-panel card-kelas white">
				<div class="panel-image bd">
					<img src="{{ asset('img/web/desk.png') }}" alt="">
				</div>
				<div class="panel-content bd">
					<div class="panel-content-header">
						Ruang Kelas
					</div>
					<div class="panel-content-main">
						Masuk ke ruang kelas untuk melihat pelajaran dan materi apa saja yang telah kalian ambil.
						Kalian juga bisa berdiskusi dengan para ahli untuk memecahkan masalah terkait coding yang kalian hadapi.
						Lihat tugas apa saja yang kalian dapatkan ketika mengikuti sebuah kursus.
					</div>
				</div>
				<div class="panel-option bd">
					<div class="panel-button">
						<a href="{{ route('kelas') }}" class="waves-effect waves-light btn"><i class="mdi-file-cloud left"></i>Masuk Kelas</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row no-margin-bottom teal card-panel" style="border-radius: 0px">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading white-text">
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

<div class="row teal card-panel" style="border-radius: 0px">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading white-text">
				Ikuti kursus
			</div>

			<div class="panel-body">
				<div class="row ">
					<a href="{{ url('kursus/all') }}" class="btn btn-warning">Kursus</a>
					<a href="{{ url('kursus/free/all') }}" class="btn btn-warning">Free Tutorial</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Semua Kursus
				</div>

				<div class="panel-body">
					<div class="row ">
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
