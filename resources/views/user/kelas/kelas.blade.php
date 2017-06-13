@extends('user.layouts.app')

@section('content')

	<div class="container" style="width: 960px!important">

		<div class="row no-margin-bottom">
			<div class="col m12">
				<span class="kelas-panel-head">Promosi</span>
				<div class="row">
					<div class="col s12 l12">
						<div class="card-panel white">
							<span>I am a very simple card. I am good at containing small bits of information.
								I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.
							</span>
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
						<div class="card-panel white">
							<span>I am a very simple card. I am good at containing small bits of information.
								I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.
							</span>
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
							<div class="card-panel white z-depth-2" style="position: relative; border-radius: 6px;">
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
											<span class="left" style="margin-top: 7px; font-weight: 300">Sisa {{ $qk->tgl_mulai->diffInDays($qk->tgl_selesai) }} hari</span>
											<button type="button" class="waves-effect waves btn-flat btn-blue right">Lihat Kursus</button>
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
