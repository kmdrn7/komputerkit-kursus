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
				Keahlian
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row" style="margin-top: 60px;">
			<div class="card-panel center-align">
				Untuk saat ini keahlian masih belum dapat diakses.
			</div>
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
