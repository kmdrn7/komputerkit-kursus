<div class="row no-margin-bottom" style="padding: 10px 0px">
	@if ( count($kursus) > 0 )
		@foreach ($kursus as $ku)
			<div class="col l4 m4 s12" style="">
				@if ( count($bookmark) <= 0 )
					<button type="button" name="add_to_bookmark" data-id-kursus="{{ $ku->id_kursus }}" class="btn white bookmark-button waves-effect waves-blue add_to_bookmark">+ Bookmark</button>
				@endif

				@for ($i = 0; $i < count($bookmark); $i++)
					@if ( array_search($ku->id_kursus, (array)$bookmark[$i]) )
						<button type="button" name="add_to_bookmark" data-id-kursus="{{ $ku->id_kursus }}" data-id-bookmark="{{ $bookmark[$i]->id_bookmark }}" class="btn orange white-text bookmark-button waves-effect waves-blue add_to_bookmark">- Bookmark</button>
						@break
					@elseif ( $i === count($bookmark)-1 )
						<button type="button" name="add_to_bookmark" data-id-kursus="{{ $ku->id_kursus }}" data-id-bookmark="{{ $bookmark[$i]->id_bookmark }}" class="btn white bookmark-button waves-effect waves-blue add_to_bookmark">+ Bookmark</button>
					@endif
				@endfor
				<div class="card-panel hoverable center-align white">
					<div class="kursus-img">
						<img src="{{ asset('img/kursus/'. $ku->gambar) }}" class="responsive-img" style="margin-bottom: 10px;" alt="">
					</div>
					<div class="dk-title valign-wrapper">
						<h6 class="label-kursus" style="margin: auto">{{ substr($ku->kursus, 0, 25) }} <small>({{ $ku->waktu }}<span style="color: transparent">_</span>Hari)</small></h6>
					</div>
					<div class="kursus-buy">
						<a class="waves-effect waves-light btn my-button" href="{{ url('/kursus/'. $ku->slug) }}">Detail Kursus</a>
					</div>
					{{-- <div class="kurus-price">
						<p style="margin: 0; color: #6C6C6C; font-weight: 600; font-size: 20px;">Rp{{ number_format($ku->harga,0,",",".") }}</p>
					</div> --}}
				</div>
			</div>
		@endforeach
	@else
		<div class="col m12 l12">
			<div class="center-align">
				<div class="kursus-link-container">
					Kategori yang anda inginkan tidak ada.
				</div>
			</div>
		</div>
	@endif
</div>
@if ( count($kursus) > 0 )
	<div class="row no-margin-bottom">
		<div class="col s12 center-align">
			<div class="card-panel kursus-link-container">
				<div class="kursus-link-header">
					Menampilkan {{ $kursus->firstItem() }} s/d {{ $kursus->lastItem() }} dari {{ $kursus->total() }} Kursus.
				</div>
				{{ $kursus->links() }}
			</div>
		</div>
	</div>
@endif
