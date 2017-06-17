@extends('user.layouts.app')

@section('content')

	<div class="container" style="max-width: 960px!important">

		<div class="row no-margin-bottom">
			<div class="col m12">
				<span class="kelas-panel-head">Promosi</span>
				<div class="row">
					<div class="col s12 l12">
						<div class="card-panel white">
							<div class="row no-margin-bottom">
								<div class="col m7">
									<div class="promosi-title">
										{{ $promosi->promosi }}
									</div>
									<div class="promosi-content">
										{{ $promosi ->ket_promosi }}
									</div>
								</div>
								<div class="col m5">
									<div class="promosi-img">
										<img class="responsive-img" src="{{ asset('img/promo.png') }}" alt="">
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
									<div class="col m8">
										<div class="latest-title">
											Lanjutkan Kursus
											<span>{{ $latest->kursus }}</span>
										</div>
										<div class="latest-content">
											{{ $latest->no_urut }}. {{ $latest->materi }}
										</div>
									</div>
									<div class="col m4">
										<div class="latest-btn">
											<a href="{{ url('/kelas/kursus/'. $latest->id_kursus .'--'. $latest->id_detail_kursus . '/materi') }}" class="btn btn-large btn-primary orange">Lanjutkan Belajar</a>
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
							<div class="card-panel white z-depth-2" style="position: relative; border-radius: 6px">
								@if ($qk->flag_kursus == 1)
									<a href="{{ url('/kelas/kursus/'. $qk->id_kursus .'--'. $qk->id_detail_kursus . '/materi') }}" style="position:relative; text-decoration: none; color: black; display: block">
								@else
									<a href="!#" style="position:relative; text-decoration: none; color: black; display: block">
								@endif
									<div class="row">
										<div class="col m12">
											<div class="kursus-kursus" style="font-size: 14px; color: rgb(99,99,99)">
												Kursus
											</div>
											<div class="kelas-kursus-title">
												{{ $qk->kursus }}
											</div>
											<div class="kelas-kursus-detail">
												@if ( strlen($qk->ket_kursus) > 200 )
													{{ substr($qk->ket_kursus, 0, 200) }}...
												@else
													{{ substr($qk->ket_kursus, 0, 200) }}
												@endif
											</div>
										</div>
									</div>
								</a>

								@if ($qk->flag_kursus)
									<div class="leftKursusGreen"></div>
								@else
									<div class="leftKursusRed"></div>
								@endif

								<div class="divider"></div>
								<div class="row no-margin-bottom" style="margin-top: 15px;">
									<div class="col m12">
										@if ($qk->flag_kursus == 1)
											<span class="left" style="margin-top: 7px; font-weight: 300">Sisa {{ $qk->tgl_selesai->diffInDays($now) }} hari</span>
											{{-- <button type="button" class="waves-effect waves btn-flat btn-blue right">Lihat Kursus</button> --}}
											<a href="{{ url('/kelas/kursus/'. $qk->id_kursus .'--'. $qk->id_detail_kursus . '/materi') }}" class="waves-effect waves btn-flat btn-blue right">Lihat Kursus</a>
										@else
											<button type="button" class="waves-effect waves btn-flat btn-red right">Kirim bukti bayar</button>
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
