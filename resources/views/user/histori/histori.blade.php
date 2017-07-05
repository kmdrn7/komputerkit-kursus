@php
	$user = Auth::user();
	$name = explode(" ", $user->name);
@endphp

@extends('user/layouts/app')

@section('content')
	<div class="row histori-nav z-depth-1">
		<div class="hnav-container container">
			<div class="hn-left">
				<div class="hnl-ic circle">
					<img src="{{ asset('img/web/histori/top.png') }}" alt="">
				</div>
			</div>
			<div class="hn-right">
				<div class="hnsp-halo">Halo, {{ $name[0] }}!</div>
				<div class="hnsp-lihat">Lihat semua kursus yang pernah kamu ambil di <strong><a class="white-text" href="http://kursus.komputerkit.com">Kursus KomputerKit</a></strong></div>
				<div class="hnsp-member">Member sejak {{ $user->created_at->formatLocalized('%e %B %Y') }}</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row histori-row-content">
			{{-- Option Panel --}}
			<div class="col s12 m3 l3">
				<div class="card-panel white">
					<div class="row">
						<div class="col m12">
							<input type="date" class="datepicker">
						</div>
					</div>
				</div>
			</div>
			{{-- Result Panel --}}
			<div class="col s12 m9 l9">
				<div class="card-panel white">
					@include('user.histori.tbl_histori')
				</div>
			</div>
		</div>
	</div>
	{{-- <div class="row" style="margin-bottom: 0; padding: 50px 0;">
		<div class="container">
			@foreach ($month as $h)
				<div class="row no-margin-bottom">
					<div class="col m12">
						<!-- Bulan -->
						<h5>{{ $h->created_month->formatLocalized('%B %Y') }}</h5>
						@foreach ($histori as $hh)
							@if ($hh->created_month->format('n') == $h->created_month->format('n'))

								<div class="row no-margin-bottom">
									<div class="col s12 m12">
										<div class="card-panel white z-depth-2" style="position: relative; padding: 25px 25px 50px 25px;">
											<div class="histori-head">
												histori
											</div>
											<div class="histori-title">
												{{ $hh->kursus }}
											</div>
											<div class="histori-content">
												{{ substr($hh->ket_kursus, 0, 100) }}
											</div>

											@if ( $hh->flag_kursus === 1 )
												@if ( $hh->tgl_selesai->diffInDays($now) > 2 )
													<div class="histori-left-green"></div>
													<div class="histori-right">
														kursus anda sedang aktif
														akan berakhir pada {{ $hh->tgl_selesai->diffInDays($now) }}
													</div>
												@else
													<div class="histori-left-orange"></div>
													<div class="histori-right">
														kursus anda tinggal {{ $hh->tgl_selesai->diffInDays($now) }} Hari lagi
														segera lakukan perpanjangan
													</div>
												@endif
											@elseif ( $hh->flag_kursus === 2 )
												<div class="histori-left-orange"></div>
												<div class="histori-right">
													pembayaran anda sendang di proses oleh admin.
												</div>
											@else
												<div class="histori-left-red"></div>
												<!--<div class="histori-right">
													<a href="{{ url('/konfirmasi/'. $hh->id_kursus . '--' . $hh->id_detail_kursus) }}" class="button-ku2 waves-effect waves-light">
														<i class="material-icons">send</i>
													</a>
												</div>-->
												<div class="histori-right right">
													<a href="{{ url('/konfirmasi/'. $hh->id_kursus . '--' . $hh->id_detail_kursus) }}" class="button-ku2">Bukti Bayar</a>
												</div>
											@endif

										</div>
									</div>
								</div>

							@endif
						@endforeach
					</div>
				</div>
			@endforeach
		</div>
	</div> --}}

@endsection

@section('content-js')
	<script type="text/javascript">
		$(document).ready(function() {
			$('.datepicker').pickadate({
				selectMonths: true, // Creates a dropdown to control month
				selectYears: 15 // Creates a dropdown of 15 years to control year
			});
		});
	</script>
@endsection
