@extends('user/layouts/app')

@section('content')
	<div class="container" style="max-width: 980px!important">
		<div class="row">
			<div class="col l12 m12 s12 center-align">
				<div class="bookmark-page-header">
					Bookmark
				</div>
				<div class="bookmark-page-desc">
					Temukan semua kursus yang anda simpan ke dalam bookmark
				</div>
			</div>
		</div>

		<div class="row">
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
		</div>
	</div>
@endsection

@section('custom--js')
	<script src="{{ asset('js/fakeloader.min.js') }}" charset="utf-8"></script>
@endsection

@section('content-js')
	<script type="text/javascript">
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
				});
				// axios.post('bookmark/delete', bookmark).then(response => {
				// 	console.log(response);
				// });
			});
		});
	</script>
@endsection
