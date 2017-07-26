@extends('user/layouts/app')

@section('title')
	Bookmark
@endsection

@section('content')
	<div class="row bookmark-nav z-depth-1 valign-wrapper">
		<div class="bnav-container container">
			<div class="bnsp-book">Bookmark!</div>
			<div class="hnsp-lihat white-text">
				Lihat semua bookmark yang telah kamu simpan di
				<strong>
					<a class="white-text" href="http://kursus.komputerkit.com">Kursus KomputerKit</a>
				</strong>
			</div>
			<div class="hnsp-member"></div>
		</div>
	</div>

	<div class="container bookmark-container" style="max-width: 980px!important">
		<div class="row bmcpr no-margin-bottom">
			@if ( count($bookmark) > 0 )
				@foreach ($bookmark as $b)
					<div class="col m4 s12 col-bookmark" data-bookmark="{{ $b->id_bookmark }}">
						<div class="row no-margin-bottom">
							<div class="col s12 m12">
								<a href="{{ url('/kursus/'. $b->slug) }}" class="bookmark-a">
									<div class="card-panel white hoverable z-depth-2 bookmark-panel" style="position: relative">
										<div class="bookmark-header">
											Bookmark
										</div>
										<div class="bookmark-title">
											{{ $b->kursus }}
										</div>
										<div class="bookmark-hari">
											<small>{{ $b->waktu }} Hari</small>
										</div>
										<div class="bookmark-content">
											{{ substr($b->ket_kursus, 0, 150) }}
										</div>
										<div class="bookmark-left"></div>
										<div class="bookmark-right">
											<button type="button" class="waves-effect waves-orange btn-floating white center-align btn-delete-bookmark" id-bookmark="{{ $b->id_bookmark }}">
												<i class="material-icons">close</i>
											</button>
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				@endforeach
			@else
				<div class="col m12 center-align gray-text belum-ada-bookmark" style="margin-top: 100px">
					Belum ada bookmark yang kamu tambahkan.
				</div>
			@endif
		</div>
	</div>
@endsection

@section('custom--js')
	<script src="{{ asset('js/fakeloader.min.js') }}" charset="utf-8"></script>
@endsection

@section('content-js')
	<script type="text/javascript">
		var bkmCount = 0;
		$(document).ready(function() {


			$('.btn-delete-bookmark').click(function(event) {
				event.preventDefault();
				var id = $(this).attr('id-bookmark');
				var bookmark = {
					id_bookmark: id
				}
				$('.col-bookmark[data-bookmark="'+ id +'"]').hide(500, function() {
					axios.post('bookmark/delete', bookmark);
					$('.col-bookmark[data-bookmark="'+ id +'"]').remove();

					bkmCount = $('.col-bookmark').length;

					if ( bkmCount < 1 ) {
						$('<div class="col m12 center-align gray-text belum-ada-bookmark" style="margin-top: 100px">Belum ada bookmark yang kamu tambahkan. </div>').appendTo('.bmcpr');
					}
				});
			});

			// $('.btn-delete-bookmark').click(function(a){a.preventDefault();var b=$(this).attr('id-bookmark'),c={id_bookmark:b};$('.col-bookmark[data-bookmark="'+b+'"]').hide(500,function(){axios.post('bookmark/delete',c),$('.col-bookmark[data-bookmark="'+b+'"]').remove()})});
		});
	</script>
@endsection
