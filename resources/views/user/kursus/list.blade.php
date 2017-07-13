@extends('user.layouts.app')

@section('content')
	<div class="list-container">

	<div class="list-nav"></div>

	<div class="container">
		<div class="row">
            <div class="col s12 m12">
				{{-- ROW HEADER CONTENT --}}
                <div class="row" style="margin-bottom: 0; padding: 40px 40px;">
					{{-- LEFT PANEL --}}
                    <div class="col l3 m12 s12 hide-on-med-and-down">
						{{-- KATEGORI KURSUS --}}
						<div class="row no-margin-bottom" style="flex; 1; display: flex">
							<div class="col s12 m12 l12" style="flex: 1; display: flex">
								<div class="card-panel" style="flex: 1">
									<div class="collection" style="border: 0;">
										<h5 id="label-kategori-2">Kategori Kursus</h5>
										<div class="divider"></div>
										<div class="list-inside-divider">
											<a style="border: 0; padding: 10px 25px;" href="{{ url('/kursus/all') }}" class="collection-item {{ $selected=='all'?'active':'' }}">Semua</a>
											@foreach ($kategori as $k)
												<a style="border: 0; padding: 10px 25px;" href="{{ url('/kursus/' . $k->slug) }}" class="collection-item {{ $selected==$k->slug?'active':'' }}">{{ $k->kategori }}</a>
											@endforeach
										</div>
										<div class="divider"></div>
									</div>
								</div>
							</div>
						</div>
						{{-- TINGKATAN KURSUS --}}
						{{-- Just in order to show --}}
						{{-- <div class="row">
							<div class="col s12 m12 l12">
								<div class="card-panel">
									<div class="collection" style="border: 0;">
										<h6 id="label-kategori-2">Tingkatan Kursus</h6>
	                                    <div class="divider"></div>
										  <p>
										  	<input type="checkbox" id="mudah" />
										  	<label for="mudah">Mudah</label>
										  </p>
										  <p>
										  	<input type="checkbox" id="sedang" />
										  	<label for="sedang">Sedang</label>
										  </p>
										  <p>
										  	<input type="checkbox" id="susah" />
										  	<label for="susah">Sulit</label>
										  </p>
									</div>
								</div>
							</div>
						</div> --}}
                    </div>
					{{-- RIGHT PANEL --}}
                    <div class="col l9 m12 s12">
						<div class="row no-margin-top no-margin-bottom">
							<div class="col s12 m12 l12">
								<div class="card-panel" style="padding: 0 20px">
									<div class="row no-margin-top no-margin-bottom">
										<div class="col l12 m12 s12">
											<div class="nav-wrapper">
											  {{-- <form> --}}
												<div class="input-field">
												  <input class="tooltipped" data-position="top" data-delay="50" data-tooltip="Tekan enter untuk mulai mencari" id="search" type="search" placeholder="Cari semua kursus ..." style="margin-bottom: 12px; border-bottom: 0px">
												  <label class="label-icon" for="search"><i class="material-icons">search</i></label>
												  <i id="clear" class="material-icons" style="margin-top: 5px">close</i>
												</div>
											  {{-- </form> --}}
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row" id="loading" style="display: none">
							<div class="col l12 center-align">
								<img src="{{ asset('img/web/loading.gif') }}" alt="">
							</div>
						</div>
						<div class="kursus">
							@include('user.kursus.kursus')
						</div>
                    </div>
					<div class="col l3 m12 s12 hide-on-large-only">
						{{-- KATEGORI KURSUS --}}
						<div class="row no-margin-bottom" style="flex; 1; display: flex">
							<div class="col s12 m12 l12" style="flex: 1; display: flex">
								<div class="card-panel" style="flex: 1">
									<div class="collection" style="border: 0;">
										<h5 id="label-kategori-2">Kategori Kursus</h5>
										<div class="divider"></div>
										<div class="list-inside-divider">
											<a style="border: 0; padding: 10px 25px;" href="{{ url('/kursus/all') }}" class="collection-item {{ $selected=='all'?'active':'' }}">Semua</a>
											@foreach ($kategori as $k)
												<a style="border: 0; padding: 10px 25px;" href="{{ url('/kursus/' . $k->slug) }}" class="collection-item {{ $selected==$k->slug?'active':'' }}">{{ $k->kategori }}</a>
											@endforeach
										</div>
										<div class="divider"></div>
									</div>
								</div>
							</div>
						</div>
						{{-- TINGKATAN KURSUS --}}
						{{-- Just in order to show --}}
						{{-- <div class="row">
							<div class="col s12 m12 l12">
								<div class="card-panel">
									<div class="collection" style="border: 0;">
										<h6 id="label-kategori-2">Tingkatan Kursus</h6>
	                                    <div class="divider"></div>
										  <p>
										  	<input type="checkbox" id="mudah" />
										  	<label for="mudah">Mudah</label>
										  </p>
										  <p>
										  	<input type="checkbox" id="sedang" />
										  	<label for="sedang">Sedang</label>
										  </p>
										  <p>
										  	<input type="checkbox" id="susah" />
										  	<label for="susah">Sulit</label>
										  </p>
									</div>
								</div>
							</div>
						</div> --}}
                    </div>
                </div>
            </div>
        </div>
	</div>

	</div>
@endsection

@section('content-js')
	<script type="text/javascript">
		var ch = $('#search');

		function initialize() {
			$('.add_to_bookmark').click(function(event) {
				var id_kursus = $(this).attr('data-id-kursus');
				var text = $(this).text();

				if ( text == '+ Bookmark' ) {

					$(this).css('transition', 'all .3 ease');
					$(this).removeClass('white');
					$(this).addClass('orange white-text');
					$(this).text('- Bookmark');

					axios.post('/bookmark/add', {id_kursus: id_kursus})
						.then(function(res) {
							console.log(res.data);
							Materialize.toast('Berhasil ditambahkan ke bookmark', 2500);
						}, function(res) {
							console.log(res.data);
							Materialize.toast('Gagal ditambahkan ke bookmark', 2500);
						});

				} else if ( text == '- Bookmark' ) {

					$(this).css('transition', 'all .3 ease');
					$(this).removeClass('orange white-text');
					$(this).addClass('white');
					$(this).text('+ Bookmark');
					var id_bookmark = $(this).attr('data-id-bookmark');
					var id_kursus = $(this).attr('data-id-kursus');

					axios.post('/bookmark/delete',
						{
							id_bookmark: id_bookmark,
							id_kursus: id_kursus,
						})
						.then(function(res) {
							console.log(res.data);
							Materialize.toast('Berhasil hapus dari bookmark', 2500);
						}, function(res) {
							console.log(res.data);
							Materialize.toast('Gagal hapus dari bookmark', 2500);
						});
				}
			});
		}

		$(window).on('hashchange', function() {
			if (window.location.hash) {
				var page = window.location.hash.replace('#', '');
				if (page == Number.NaN || page <= 0) {
					return false;
				} else {
					getPosts(page);
				}
			}
		});
		$(document).ready(function() {

			$(document).on('click', '.pagination a', function (e) {
				$('html, body').animate({
					scrollTop: 100
				}, 300)

				getPosts($(this).attr('href').split('page=')[1]);
				e.preventDefault();
			});

			initialize();

			ch.keyup(function(e) {
				e.preventDefault();
				if(e.which == 13) {
					$('.kursus').html('');
					$('#loading').show();
					var req = '/kursus/' + window.location.href.split('/').pop() + '?kursus=' + ch.val();
					axios.get(req)
						.then(function (response) {
							$('#loading').hide();
							$('.kursus').html(response.data);
							initialize();
						})
						.catch(function (error) {
							console.log(error);
						});
			    }
			});

			$('#clear').click(function(event) {
				ch.text('');
				ch.val('');
			});
		});

		function getPosts(page) {
			var st = '/kursus/' + window.location.href.split('/').pop() + '?page=' + page + '&kursus=' + ch.val();

			console.log(st);

			$('.kursus').html('');
			$('#loading').show();
			axios.get(st)
				.then(function (response) {
					$('#loading').hide();
					$('.kursus').html(response.data);
					initialize();
				})
				.catch(function (error) {
					console.log(error);
			});
		}
	</script>
@endsection
