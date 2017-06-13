<div class="row" style="padding: 10px 0px">
	@if ( count($kursus) > 0 )
		@foreach ($kursus as $ku)
			<div class="col l4 m4 s12">
				<div class="card-panel hoverable center-align white">
					<div class="kursus-img">
						<img src="{{ asset('img/'. $ku->gambar) }}" class="responsive-img" style="margin-bottom: 10px;" alt="">
					</div>
					<div class="kursus-title valign-wrapper">
						<h6 id="label-kursus" style="margin: auto">{{ $ku->kursus }}</h6>
					</div>
					<div class="kursus-buy">
						<a class="waves-effect waves-light btn my-button" href="{{ url('/kursus/'. $ku->slug) }}">Beli Kursus</a>
					</div>
					<div class="kurus-price">
						<p style="margin: 0; color: #6C6C6C; font-weight: 600; font-size: 20px;">Rp{{ number_format($ku->harga,0,",",".") }}</p>
					</div>
					<span style="font-size: 14px; color: #969696;">per minggu</span>
				</div>
			</div>
		@endforeach
	@else
		<div class="col m12 l12">
			<div class="center-align">
				Kategori yang anda inginkan tidak ada.
			</div>
		</div>
	@endif
</div>
@if ( count($kursus) > 0 )
	<div class="row">
		<div class="col l12 center-align">
			{{ $kursus->links() }}
		</div>
	</div>
@endif
