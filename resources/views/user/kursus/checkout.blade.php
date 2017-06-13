@extends('user.layouts.app')

@section('content')

	<div class="container">

		<div class="row" style="margin-top: 20px">
			<div class="col s12 l10 offset-l1">
				<div class="card-panel white">
					<form class="" action="{{ route('kursus.checkout.post', ['id' => $kursus->slug]) }}" method="post">
						<div class="row">
							<div class="col m7">
								<h5 style="margin-bottom: 30px; font-weight: 300">Detail Pembayaran</h5>
								{{-- <form class="" style="padding: 0;"> --}}
									{{ csrf_field() }}
									<div class="row no-margin-bottom">
										<div class="input-field col s12 l6">
											<input readonly name="id_kursus" id="first_name" value="{{ $kursus->id_kursus }}" type="text" class="validate">
											<input type="hidden" name="id_kursus" value="{{ $kursus->id_kursus }}">
											<label for="first_name">ID Kursus</label>
										</div>
										<div class="input-field col s12 l6">
											<input name="price" readonly id="price" value="{{ $kursus->harga }}" type="number" class="validate">
											<label for="price">Harga Kursus (Rp)</label>
										</div>
									</div>
									<div class="row no-margin-bottom">
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
									<hr style="border: 1px dashed rgb(162,162,162); margin: 20px 0;">
								{{-- </form> --}}
							</div>
							<div class="col m5">
								<h5 style="margin-bottom: 30px; font-weight: 300">Detail Kursus</h5>
								<h6>{{ $kursus->kursus }} <small>{{ $kursus->waktu }} Hari</small></h6>
								<p>
									{{ $kursus->ket_kursus }}
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col m7">
								<button type="submit" class="btn waves-effect waves-light btn-large right">
									<i class="material-icons right">send</i>
									Selesai
								</button>
							</div>
						</div>
					</form>
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
		});
	</script>
@endsection
