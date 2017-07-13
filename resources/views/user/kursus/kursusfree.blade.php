<div class="row no-margin-bottom">
	@if ( count($kursus) > 0 )
		@foreach ($kursus as $ku)
			<a href="{{ url('/kursus/free/'. $ku->slug) }}" style="text-decoration: none; color: inherit">
				<div class="col l6 m6 s12" >
					<div class="card-panel hoverable kur-col" style="position: relative; z-index: 25; overflow: hidden">
						<div class="row no-margin-bottom">
				            <div class="col s12 m5 center-align" style="padding: 0;">
								<div class="kursus-free-img">
									<img src="{{ asset('img/kursus/'. $ku->gambar) }}" class="responsive-img" alt="">
								</div>
				            </div>
				            <div class="col s12 m7 left-align">
								<div class="kursus-free-title">
									{{ $ku->kursus }}
								</div>
								<div class="kursus-free-content">
									{{ substr($ku->ket_kursus, 0, 110) }}...
								</div>
				            </div>
				        </div>
						<div class="row no-margin-bottom no-margin-top kursus-slider valign-wrapper">
							<div class="col m12">
								<i class="material-icons kursus-icon white-text" style="font-size: 45px">search</i>
							</div>
						</div>
					</div>
				</div>
			</a>
		@endforeach
	@else
		<div class="col s12 m12 l12">
			<div class="center-align">
				<div class="kursus-link-container z-depth-1">
					Kategori yang anda inginkan tidak ada.
				</div>
			</div>
		</div>
	@endif
</div>
@if ( count($kursus) > 0 )
	<div class="row no-margin-bottom">
		<div class="col l12 s12 center-align">
			<div class="card-panel kursus-link-container">
				<div class="kursus-link-header">
					Menampilkan {{ $kursus->firstItem() }} s/d {{ $kursus->lastItem() }} dari {{ $kursus->total() }} Kursus.
				</div>
				{{ $kursus->links() }}
			</div>
		</div>
	</div>
@endif
