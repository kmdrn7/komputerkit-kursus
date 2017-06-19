@extends('user/layouts/app')

@section('content')

	<div class="container">
		@foreach ($month as $h)
			<div class="row no-margin-bottom">
				<div class="col m12">
					<h3>{{ $h->created_month->formatLocalized('%B %Y') }}</h3>
					@foreach ($histori as $hh)
						@if ($hh->created_month->format('n') == $h->created_month->format('n'))

							<div class="row no-margin-bottom">
								<div class="col s12 m12">
									<div class="card-panel white z-depth-2" style="position: relative">
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
											<div class="histori-right">
												<a href="{{ url('/konfirmasi/'. $hh->id_kursus . '--' . $hh->id_detail_kursus) }}" class="btn waves-effect waves-light">
													<i class="material-icons right">send</i>
												</a>
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

@endsection
