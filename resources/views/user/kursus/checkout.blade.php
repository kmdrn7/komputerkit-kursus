@extends('user.layouts.app')

@section('content')
	<div class="chk-wrapper">
		{{-- Floating Image --}}
		<div class="chi-1">
			<img src="{{ asset('img/web/expert/laptop.png') }}" alt="">
		</div>
		{{-- Main Checkout Panel --}}
		<div class="row no-margin-top no-margin-bottom checkout-nav">

		</div>
		<div class="row no-margin-bottom checkout-container">
			<div class="container">
				<div class="row">
					<div class="col s12 m6 l6 offset-m3 offset-l3">
						<div class="card-panel white z-depth-3">
							<h4 style="margin-bottom: 40px; font-weight: 300" class="center-align">Detail Pembelian Kursus</h4>
							<form class="" style="" method="POST" action="{{ url('kursus/checkout/'. $kursus->slug) }}">
								{{ csrf_field() }}
								<div class="row">
									<div class="input-field col s12 l12">
										<input readonly name="nama_kursus" id="nama_kursus" value="{{ $kursus->kursus }}" type="text">
										<label for="first_name">Nama Kursus</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12 l6">
										<input readonly name="id_kursus" id="first_name" value="{{ $kursus->id_kursus }}" type="text">
										<input type="hidden" name="id_kursus" value="{{ $kursus->id_kursus }}">
										<label for="first_name">ID Kursus</label>
									</div>
									<div class="input-field col s12 l6">
										<input name="price" readonly id="price" value="{{ $kursus->harga }}" type="number">
										<label for="price">Harga Kursus (Rp)</label>
									</div>
								</div>
								<div class="row">
									<div class="col s12">
										<label for="radio">Lama Kursus</label>
										<p id="radio">
											@foreach ($kursus_lain as $kl)
												<input class="waktu-kursus" data-link="{{ url('/kursus/checkout/'. $kl->slug) }}" name="waktu" type="radio" id="test{{$kl->id_kursus}}" {{ $kursus->waktu==$kl->waktu?'checked':'' }}/>
												<label for="test{{$kl->id_kursus}}">
													<a href="{{ url('/kursus/checkout/'. $kl->slug) }}" style="text-decoration: none; color: black">{{$kl->waktu}} Hari</a>
												</label> <br>
											@endforeach
										</p>
									</div>
								</div>
								<hr style="border: 1px dashed rgb(162,162,162); margin: 30px 0;">
								<a class="waves-effect waves-light btn-custom-revert a-back" style="margin-left: 0; width: 130px;">
									<i class="fa fa-mail-reply"></i> &nbsp;
									Batal
								</a>
								<button type="submit" class="waves-effect waves-light btn-custom-revert right" style="margin-left: 0; width: 150px;">
									<i class="fa fa-send"></i> &nbsp;
									Beli
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('content-js')
	<script type="text/javascript">
		$(document).ready(function() {
			$('.waktu-kursus').click(function(event) {
				window.location.href = $(this).attr('data-link');
			});
			$('.a-back').click(function(event) {
				setTimeout(function() {
					window.history.back();
				}, 1000);
			});
		});
	</script>
@endsection
