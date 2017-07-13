@extends('user.layouts.app')

@section('content')

	<div class="detail-materi-container">

	</div>

	<div class="container">
		<div class="row">
			<div class="col m12">
				<div class="card-panel white">
					<h4 class="center-align det-materi-head">{{ $materi->materi }}</h4>
					<div class="iWrapper">
						<iframe src="{{ $materi->yt_embed }}" frameborder="0" allowfullscreen >
						</iframe>
					</div>
					<div class="btn-control center-align" style="margin: 10px 0;">
						@if ( $prev )
							<a href="{{ url('/kelas/kursus/' . $materi->id_kursus .'--'.$materi->id_detail_kursus . '/materi/' .$prev->id_detail_materi) }}" class="btn btn-large btn-ctl lft">
								<i class="material-icons left">navigate_before</i>
								<span>Prev</span>
							</a>
						@endif
						<a href="{{ url('/kelas/kursus/'. $materi->id_kursus .'--'.$materi->id_detail_kursus . '/materi') }}" class="btn btn-large btn-ctl ctr">
							Kembali ke playlist
							<i class="material-icons right">playlist_play</i>
						</a>
						@if ( $next )
							<a href="{{ url('/kelas/kursus/' . $materi->id_kursus .'--'.$materi->id_detail_kursus . '/materi/' .$next->id_detail_materi) }}" class="btn btn-large btn-ctl rgt">
								<span>Next</span>
								<i class="material-icons right">navigate_next</i>
							</a>
						@endif
					</div>
					<p class="center-align">
						{{ $materi->ket_materi }}
						@if ($materi->ket_materi_adv)
							<br><br>
							{{ $materi->ket_materi_adv }}
						@endif
					</p>
				</div>
			</div>
		</div>
	</div>

@endsection
