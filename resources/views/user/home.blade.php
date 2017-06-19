@extends('user.layouts.app')

@section('content')

	<div class="container" style="margin-top: 20px">

		{{-- ROW PROMOSI DI AWAL --}}
		<div class="row">
			<div class="col l6 m6 s12">
				<div class="card-menu valign-wrapper">
				  <div class="row valign-wrapper" style="margin-bottom: 0; padding: 10px;">
					  <div class="col l2 m3 hide-on-small-only">
						  <img src="{{ asset('img/web/tugas.png') }}" class="responsive-img iklan-img" alt="icon">
					  </div>
					  <div class="col l6 m9 s12" id="label">
						  Perpanjang Kurus HTML Andaasd sad asd
					  </div>
					  <div class="col s3 hide-on-med-and-down">
						  <a href="" class="right" style="color: #aaabb3; text-decoration: underline;">Klik Disini</a>
					  </div>
					  <div class="col s1">
						  <i class="material-icons right">keyboard_arrow_right</i>
					  </div>
				  </div>
				</div>
			</div>
			<div class="col l6 m6 s12">
				<div class="card-menu valign-wrapper">
				  <div class="row valign-wrapper" style="margin-bottom: 0; padding: 10px;">
					  <div class="col l2 m3 hide-on-small-only">
						  <img src="{{ asset('img/web/tugas.png') }}" class="responsive-img iklan-img" alt="icon">
					  </div>
					  <div class="col l6 m9 s12" id="label">
						  Ikuti Seminar Online Komputerkit asd as dasd
					  </div>
					  <div class="col s3 hide-on-med-and-down">
						  <a href="" class="right" style="color: #aaabb3; text-decoration: underline;">Klik Disini</a>
					  </div>
					  <div class="col s1">
						  <i class="material-icons right">keyboard_arrow_right</i>
					  </div>
				  </div>
				</div>
			</div>
		</div>
	</div>

	{{-- REKOMENDASI KURSUS DAN KURSUS ANDA --}}
	<div class="container">
		<div class="row no-margin-bottom">
			<div class="col m12 l8">
				<div class="row no-margin-bottom">
					<div class="col s12 m12">
						<div class="card-panel">
							<div class="row">
								<div class="col s12">
									<h5 class="">Rekomendasi Kursus</h5>
									<div class="divider"></div>
								</div>
							</div>
							<div class="row no-margin-bottom">
								@foreach ($kursus as $k)
									<div class="col s12 m12 l4 center-align">
										<div class="card-panel z-depth-2 hoverable" style="height: 390px">
											<div class="kursus-img">
												<img src="{{ asset('img/'. $k->gambar) }}" class="responsive-img" style="margin-bottom: 10px;" alt="">
											</div>
											<div class="kursus-title">
												<h6 class="label-kursus" style="margin: auto">{{ $k->kursus }}</h6>
											</div>
											<div class="kursus-buy">
												<a class="waves-effect waves-light btn my-button" href="{{ url('/kursus/'. $k->slug) }}">Beli Kursus</a>
											</div>
											<div class="kurus-price">
												<p style="margin: 0; color: #6C6C6C; font-weight: 600; font-size: 20px;">Rp{{ number_format($k->harga,0,",",".") }}</p>
											</div>
											<span style="font-size: 14px; color: #969696;">per minggu</span>
										</div>
									</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col m12 l4">
				<div class="row no-margin-bottom">
					<div class="col s12 m12">
						<div class="card-panel" style="padding: 0">
							<div class="row ">
								<div class="col s12">
									<h5 style="padding: 20px 30px;">Kursus Anda</h5>
									<div class="divider"></div>
								</div>
								<div class="col s12">
									<ul class="collapsible" data-collapsible="accordion" style="box-shadow: none; margin: 0; border: 0;">
										@foreach ($kursus_anda as $ka)
											<li>
											  <div class="collapsible-header"><i class="material-icons right">keyboard_arrow_down</i>{{ $ka->kursus }}</div>
											  <div class="collapsible-body" style="padding: 0;">
												  <table class="responsive-table" style="background-color: #F9F9F9;">
													  <thead>
														  <tr>
															<th style="padding: 10px 20px;" >Mulai</th>
															<th style="padding: 10px 20px;" >Selesai</th>
															<th style="padding: 10px 20px;" >Sisa</th>
														</tr>
													  </thead>
													  <tbody>
														  <tr>
															  <td style="padding: 10px 20px;" >{{ $ka->tgl_mulai->format('d M Y') }}</td>
															  <td style="padding: 10px 20px;" >{{ $ka->tgl_selesai->format('d M Y') }}</td>
															  <td style="padding: 10px 20px;" >{{ $diff = $ka->tgl_mulai->diffInDays($ka->tgl_selesai) }} Hari</td>
														  </tr>
														  @if ($diff < 2)
															  <tr class="orange">
																  <td style="padding: 10px 20px; text-align: center" colspan="3">Segera lakukan perpanjangan kursus anda</td>
															  </tr>
														  @endif
													  </tbody>
												  </table>
											  </div>
											</li>
										@endforeach
									  </ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col m12 s12">
						<div class="row">
							<div class="col s12 m12">
								<div class="card-panel" style="padding: 0">
									<div class="row">
			                            <div class="col s12">
			                                <h5 style="padding: 20px 30px;">Pembayaran Pending</h5>
			                                <div class="divider"></div>
			                            </div>
			                            <div class="col s12">
			                                <div class="collection" style="margin: 0; border: 0;">
												@if ( count($kursus_tunggakan) > 0 )
													@foreach ($kursus_tunggakan as $kt)
														{{-- @if ( $kt-> )

														@endif --}}
														<a href="pages/bukti-bayar.html" class="collection-item">
															<span class="new badge red" data-badge-caption="Kirim Bukti Pembayaran"></span>
															{{ $kt->kursus }} : {{ $kt->waktu }} Hari
														</a>
													@endforeach
												@else
													<div class="collection-item center-align" style="color: rgb(111,111,111)">Tidak ada tunggakan.</div>
												@endif
			                                </div>
			                            </div>
			                        </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	{{-- Ruang Kelas --}}
	<div class="row teal no-margin-bottom">
		<div class="container" style="max-width: 860px;">
			<div class="row no-margin-bottom">
				<div class="col s12 m12">
					<div class="card-panel card-kelas white">
						<div class="row no-margin-bottom">
							<div class="col l2 m3 s4 offset-s4">
								<div class="kelas-image center-align">
									<img src="{{ asset('img/web/desk.png') }}" alt="" style="width: 100%;">
								</div>
							</div>
							<div class="col l10 m9 s12">
								<div class="kelas-text">
									<div class="kelas-title">
										Ruang Kelas
									</div>
									<div class="kelas-content">
										Masuk ke ruang kelas untuk melihat pelajaran dan materi apa saja yang telah kalian ambil.
										Diskusikan dengan pembimbing tentang masalah coding yang kalian hadapi.
									</div>
									<div class="kelas-button">
										<a href="{{ route('kelas') }}" class="waves-effect waves-light btn right">
											<i class="mdi-file-cloud"></i>
											Masuk ke Kelas
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	{{-- PILIHAN KURSUS --}}
	<div class="row" style="background-color: #F5F6F7; margin-bottom: 0;">
		<div class="col s12 white tutorial-panel">
			<div class="row" style="margin-bottom: 0; padding: 30px">
				<div class="container">
					<div class="col l7 offset-l5 m7 s12 bd" style="padding: 20px">
						<p style="font-size: 19px; text-align: justify">
							Lihat semua tutorial secara gratis tanpa dipungut biaya apapun. Mulai sebuah kursus untuk memperdalam sebuah materi.
							Dapatkan tugas untuk mengetahui seberapa kemampuan kalian dalam menguasai sebuah kursus.
							Tanyakan apapaun yang ingin kalian tanyakan mengenai tugas dengan fitur chat dengan para pembimbing ahli di <strong>KomputerKit</strong>
							sampai kalian memahami materi yang kalian ambil.
						</p>
						<div class="row" style="margin: auto;">
							<div class="col s12 center-on-small-only right-align">
								<a href="{{ url('kursus/free/all') }}" class="blue waves-effect waves-light btn-large tooltipped" data-position="left" data-delay="50" data-tooltip="Lihat semua tutorial gratis.">tutorial</a>
								<a href="{{ url('kursus/all') }}" class="blue waves-effect waves-light btn-large tooltipped" data-position="bottom" data-delay="50" data-tooltip="Ikuti kursus yang menakjubkan.">kursus</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">

	</div>

	<div class="row no-margin-bottom no-margin-top teal card-panel" style="border-radius: 0px; margin-top: 0px">
		<div class="col-md-12">
			<div class="container">
				<div class="row no-margin-bottom no-margin-top">
					<div class="col s12 l12 center-align">
						<div class="panel-heading white-text">
							<h3>Kuasai hal yang kamu sukai</h3>
						</div>

						<div class="panel-body">
							<p>
								Dengan fokus pada hal yang kalian suka, maka proses pembelajaran menjadi semakin menarik.
								Pembelajaran akan difokuskan pada hal yang kalian suka dan tentunya akan ada bimbingan khusus dari
								pada pembimbing di <strong>KomputerKit</strong>
							</p>
							<a href="{{ route('expert') }}" class="btn btn-warning">Mulai</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
