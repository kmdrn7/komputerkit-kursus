@extends('user.layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col m12">
				Header keahlian
			</div>
		</div>

		<div class="row">
			<div class="col m4">
				<div class="row">
					@foreach ($detail as $d)
						<div class="col s12 m12">
							<div class="card-panel white">
								<div class="dx-head">
									Kursus
								</div>
								<div class="dx-title">
									{{ $d->kursus }}
								</div>
								<div class="dx-image">
									{{ $d->gambar }}
								</div>
								<div class="dx-content">
									{{ $d->ket_kursus }}
								</div>
								<div class="dx-left">

								</div>
								<div class="dx-right">
									<a href="{{ url('/kursus/'. $d->slug) }}" class="btn waves-effect waves-light">
										<i class="material-icons right">send</i>
									</a>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

@endsection
