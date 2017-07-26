@extends('user.layouts.app')

@section('title')
	Kelas
@endsection

@section('content')

	<div class="kelas-nav valign-wrapper">
		<div class="bnav-container container">
			<div class="bnsp-book center-align">
				<span class="left">
					<a href="{{ url('') }}" class="white-text waves-effect waves-light">
						<i class="fa fa-chevron-left"></i>
					</a>
				</span>
				Kelas
			</div>
		</div>
	</div>

	<div class="container kelas-container" style="max-width: 960px!important; padding: 60px 0;">

		<div class="row no-margin-bottom">
			<div class="col m12">
				<span class="kelas-panel-head">Promosi</span>
				<div class="row">
					<div class="col s12 l12">
						<div class="card-panel white">
							<div class="row no-margin-bottom kpr">
								<div class="col m7 s12" style="flex:1">
									<div class="promosi-title">
										{{ $promosi->promosi }}
									</div>
									<div class="promosi-content">
										{{ $promosi->ket_promosi }}
									</div>
								</div>
								<div class="col m5 s12 valign-wrapper" style="flex:1">
									<div class="promosi-img">
										<img class="responsive-img" src="{{ asset('img/promosi/'. $promosi->gambar) }}" alt="">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row no-margin-bottom">
			<div class="col m12">
				<span class="kelas-panel-head">Aktifitas Terbaru</span>
				<div class="row">
					<div class="col s12 l12">
						<div class="card-panel white" style="position: relative">
							<div class="row no-margin-bottom">
								@if ( $latest )
									<div class="col m8 s12">
										<div class="latest-title">
											Lanjutkan Kursus
											<span>{{ $latest->kursus }}</span>
										</div>
										<div class="latest-content">
											{{ $latest->no_urut }}. {{ $latest->materi }}
										</div>
									</div>
									<div class="col m4 s12">
										<div class="latest-btn">
											<a href="{{ url('/kelas/kursus/'. $latest->id_kursus .'--'. $latest->id_detail_kursus . '/materi/'. $latest->id_detail_materi) }}" class="btn btn-large btn-primary orange">Lanjutkan Belajar</a>
										</div>
									</div>
								@else
									<div class="col m12 center-align" style="color: rgb(75,75,75)">
										Anda belum mengikuti kursus, segera ikuti kursus untuk mendapat manfaatnya.
									</div>
								@endif
							</div>
							<div id="latestLeft"></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row no-margin-bottom">
			<div class="col m12">
				<span class="kelas-panel-head">Kursus yang diikuti</span>
				<div class="row no-margin-bottom">
					@foreach ($qkursus as $qk)
						<div class="col s12 m6 l6">
							<div class="card-panel kelas-kursus-panel white z-depth-1 hoverable" style="position: relative; border-radius: 6px">
								@if ($qk->flag_kursus == 1)
									@php
										$sisa = $qk->tgl_selesai->diffInDays($now);
									@endphp
									@if ( $sisa < 1 )
										<a href="{{ url('/kursus/checkout/'. $qk->slug) }}" style="position:relative; text-decoration: none; color: black; display: block">
									@else
										<a href="{{ url('/kelas/kursus/'. $qk->id_kursus .'--'. $qk->id_detail_kursus . '/materi') }}" style="position:relative; text-decoration: none; color: black; display: block">
									@endif
								@elseif ( $qk->flag_kursus == 2 )
									<div class="contain" style="position:relative; color: black; display: block">
								@else
									<a href="{{ url('/konfirmasi/'. $qk->id_kursus .'--'.$qk->id_detail_kursus) }}" style="position:relative; text-decoration: none; color: black; display: block">
								@endif
									<div class="row kk-content-wrapper">
										<div class="col m12">
											<div class="kursus-kursus" style="font-size: 14px; color: rgb(99,99,99)">
												Kursus
											</div>
											<div class="kelas-kursus-title">
												{{ $qk->kursus }}
											</div>
											<div class="kelas-kursus-detail">
												@if ( strlen($qk->ket_kursus) > 150 )
													{{ substr($qk->ket_kursus, 0, 150) }}...
												@else
													{{ substr($qk->ket_kursus, 0, 150) }}
												@endif
											</div>
										</div>
									</div>
								@if ( $qk->flag_kursus == 1 )
									</a>
								@elseif ( $qk->flag_kursus == 2 )
									</div>
								@else
									</a>
								@endif

								@if ($qk->flag_kursus == 1)
									@php
										$sisa = $qk->tgl_selesai->diffInDays($now);
									@endphp
									@if ( $sisa <= 2 )
										<div class="leftKursusRed"></div>
									@else
										<div class="leftKursusGreen"></div>
									@endif
								@else
									<div class="leftKursusRed"></div>
								@endif

								<div class="divider"></div>
								<div class="row no-margin-bottom" style="margin-top: 15px;">
									<div class="col m12 s12">
										@if ($qk->flag_kursus == 1)
											@php
												$sisa = $now->diffInDays($qk->tgl_selesai);
											@endphp
											@if ( $sisa <= 2 && $sisa > 0 )
												<div class="kelas-card-bot-container" style="display:flex; flex-direction: row">
													<div class="kbc-l" style="flex=1">
														<span class="" style="margin-top: 7px; font-weight: 300;">Hanya sisa {{ $sisa }} hari, kursus akan non-aktif bila melalui batas hari</span>
													</div>
													<div class="kcb-r" style="flex: none">
														<a href="{{ url('/kelas/kursus/'. $qk->id_kursus .'--'. $qk->id_detail_kursus . '/materi') }}" class="waves-effect waves btn-flat-custom btn-blue">Lihat Kursus</a>
													</div>
												</div>
											@elseif ( $sisa <= 2 )
												<div class="kelas-card-bot-container" style="display:flex; flex-direction: row">
													<div class="kbc-l" style="flex=1">
														<span class="" style="margin-top: 7px; font-weight: 300;">Lakukan perpanjangan untuk melanjutkan kursus ini.</span>
													</div>
													<div class="kcb-r" style="flex: none">
														<a href="{{ url('/kursus/checkout/'. $qk->slug) }}" class="waves-effect waves btn-flat-custom btn-red">Perpanjang</a>
													</div>
												</div>
											@else
												<span class="left" style="margin-top: 7px; font-weight: 300">Sisa {{ $sisa }} hari</span>
												<a href="{{ url('/kelas/kursus/'. $qk->id_kursus .'--'. $qk->id_detail_kursus . '/materi') }}" class="waves-effect waves btn-flat-custom btn-blue right">Lihat Kursus</a>
											@endif
										@elseif ( $qk->flag_kursus == 2 )
											<span class="left" style="margin-top: 7px; font-weight: 300; height: 44px">Pembayaran anda sedang dikonfirmasi oleh admin</span>
										@else
											<a href="{{ url('/konfirmasi/'. $qk->id_kursus .'--'.$qk->id_detail_kursus) }}" class="waves-effect waves btn-flat-custom btn-red right">Kirim bukti bayar</a>
										@endif
									</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

@endsection
