@extends('user.layouts.app')

@section('content')

	<div class="container">
		<div class="row">
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
									<a href="{{ url('/expert/'. $e->id_keahlian) }}" class="btn waves-effect waves-light">
										<i class="material-icons right">send</i>
										Lihat keahlian
									</a>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>

@endsection
