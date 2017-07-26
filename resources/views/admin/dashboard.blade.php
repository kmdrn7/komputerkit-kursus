@extends('admin.layouts.app')

@section('page-title')
	Admin Dashboard
@endsection

@section('content')

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-header" data-background-color="blue">
						<i class="material-icons">info_outline</i>
					</div>
					<div class="card-content">
						<p class="category">Total User Aktif</p>
						<h3 class="title">{{ $user_active }}</h3>
					</div>
					<div class="card-footer">
						<div class="stats">
							<i class="material-icons text-danger">extension</i> <a href="{{ url('/admin/user') }}">Lihat semua user</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-header" data-background-color="blue">
						<i class="material-icons">info_outline</i>
					</div>
					<div class="card-content">
						<p class="category">Total User Registrasi</p>
						<h3 class="title">{{ $user }}</h3>
					</div>
					<div class="card-footer">
						<div class="stats">
							<i class="material-icons text-danger">extension</i> <a href="{{ url('/admin/user') }}">Lihat semua user</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-header" data-background-color="blue">
						<i class="material-icons">info_outline</i>
					</div>
					<div class="card-content">
						<p class="category">Pembayaran Baru</p>
						<h3 class="title">{{ $bayar }}</h3>
					</div>
					<div class="card-footer">
						<div class="stats">
							<i class="material-icons text-danger">extension</i> <a href="{{ url('/admin/user') }}">Lihat semua pembayaran</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-header" data-background-color="blue">
						<i class="material-icons">info_outline</i>
					</div>
					<div class="card-content">
						<p class="category">Kursus yang di Bookmark</p>
						<h3 class="title">{{ $bookmark }}</h3>
					</div>
					<div class="card-footer">
						<div class="stats">
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-header" data-background-color="green">
						<i class="material-icons">info_outline</i>
					</div>
					<div class="card-content">
						<p class="category">Kursus Dibeli</p>
						<h3 class="title">{{ $detail_kursus }}</h3>
					</div>
					<div class="card-footer">
						<div class="stats">
							<i class="material-icons text-danger">extension</i> <a href="{{ url('/admin/konfirmasi') }}">Lihat Detail</a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-header" data-background-color="green">
						<i class="material-icons">info_outline</i>
					</div>
					<div class="card-content">
						<p class="category">Kategori</p>
						<h3 class="title">{{ $kategori }}</h3>
					</div>
					<div class="card-footer">
						<div class="stats">
							<i class="material-icons text-danger">extension</i> <a href="{{ url('/admin/kategori') }}">Lihat semua kategori</a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-header" data-background-color="green">
						<i class="material-icons">info_outline</i>
					</div>
					<div class="card-content">
						<p class="category">Kursus Tersedia</p>
						<h3 class="title">{{ $kursus }}</h3>
					</div>
					<div class="card-footer">
						<div class="stats">
							<i class="material-icons text-danger">extension</i> <a href="{{ url('/admin/kursus') }}">Lihat semua kursus</a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-header" data-background-color="green">
						<i class="material-icons">info_outline</i>
					</div>
					<div class="card-content">
						<p class="category"><small>Pembimbing</small></p>
						<h3 class="title">{{ $pembimbing }}</h3>
					</div>
					<div class="card-footer">
						<div class="stats">
							<i class="material-icons text-danger">extension</i> <a href="{{ url('/admin/pembimbing') }}">Lihat semua pembimbing</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-header" data-background-color="orange">
						<i class="material-icons">info_outline</i>
					</div>
					<div class="card-content">
						<p class="category">Pesan Masuk</p>
						<h3 class="title">{{ $pesan_masuk }}</h3>
					</div>
					<div class="card-footer">
						<div class="stats">
							<i class="material-icons text-danger">extension</i> <a href="{{ url('/admin/messanger') }}">Lihat semua pesan</a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-header" data-background-color="orange">
						<i class="material-icons">info_outline</i>
					</div>
					<div class="card-content">
						<p class="category">Pesan Belum Dibaca</p>
						<h3 class="title">{{ $pesan_belum_dibaca }}</h3>
					</div>
					<div class="card-footer">
						<div class="stats">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection
