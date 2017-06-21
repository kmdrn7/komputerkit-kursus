@extends('user.layouts.app')

@section('content')

	<div class="row white no-margin-bottom" style="padding: 5% 0;">
		<div class="container">
			<div class="col m12">
				@foreach ($expert as $e)
					<div class="row">
						<div class="col s12 m12">
							<div class="card-panel white">
								<div class="expert-head">
									Expert
								</div>
								<div class="expert-title">
									{{ $e->keahlian }}
								</div>
								<div class="expert-content">
									{{ $e->desc_keahlian }}
								</div>
								<div class="expert-left">

								</div>
								<div class="expert-right">
									<a href="{{ url('/expert/'. $e->id_keahlian) }}" class="button-ku2 waves-effect waves-light">
										<i class="material-icons right">send</i>
										Lihat keahlian
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="row white no-margin-bottom no-margin-top white-text" style="border-radius: 0px; margin-top: 0;">
						<div class="col-md-12">
							<div class="col s12" style="padding: 12px;">
								<div class="icon-block" style="background-color: #43496D; border: 1px solid #43496D">
									<div class="content-border">
										<h5 style="padding: 0 15px;">Ruang Kelas</h5>
										<p class="" style="font-family: 'Lato', sans-serif; font-weight:300; font-size: 17px; padding: 0 15px 10px 15px;">
											{{ $e->desc_keahlian }} <br> <br>
											<a style="font-family: 'Spectral', serif;" href="{{ route('kelas') }}" class="button-ku">Masuk Kelas</a>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>

@endsection
