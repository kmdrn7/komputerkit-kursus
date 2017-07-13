@extends('user.layouts.app')

@section('content')

	<div class="row dx-nav z-depth-1 valign-wrapper">
		<div class="bnav-container container">
			<div class="bnsp-book center-align">
				<span class="left">
					<a href="javascript:void(0)" class="white-text waves-effect waves-light" onclick="goBack()">
						<i class="fa fa-chevron-left"></i>
					</a>
				</span>
				{{ $x->keahlian }}!
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row" style="margin-top: 60px;">
			@foreach ($detail as $d)
				<div class="col s12 m3 l3">
					<div class="card-panel white dx-col-cont">
						<div class="dx-head" style="background-color: #2896A2">&nbsp;</div>
						<div class="dx-imgc red">							
							<img src="{{ asset('img/kursus/'. $d->gambar) }}" alt="" class="dx-image">
						</div>

						<div class="dx-sc-c">
							<div class="dx-title">
								{{ $d->kursus }}
							</div>
						</div>
						<div class="dx-bottom red">
							asd
						</div>
						{{-- <a href="{{ url('/kursus/'. $d->slug) }}" class="btn-custom-revert waves-effect waves-light right">
							Buka
						</a> --}}
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection

@section('content-js')
	<script type="text/javascript">
		function goBack() {
			setTimeout(function() {
				window.history.back();
			}, 500);
		}
	</script>
@endsection
