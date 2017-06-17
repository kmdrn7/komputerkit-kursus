@extends('user.layouts.app')

@section('content')
	<div class="container">
		<div class="row" style="background-color: #F5F6F7; margin-bottom: 0;">
            <div class="col s12">
				{{-- ROW HEADER CONTENT --}}
                <div class="row" style="margin-bottom: 0; padding: 40px 6%;">
					{{-- LEFT PANEL --}}
                    <div class="col l3 m12 s12" style="">
						{{-- KATEGORI KURSUS --}}
						<div class="row no-margin-bottom">
							<div class="col s12 m12 l12">
								<div class="card-panel">
									<div class="collection" style="border: 0;">
										<h6 id="label-kategori-2">Kategori Kursus</h6>
										<div class="divider"></div>
										<a style="border: 0; padding: 10px 25px;" href="{{ url('/kursus/all') }}" class="collection-item">Semua</a>
										@foreach ($kategori as $k)
											<a style="border: 0; padding: 10px 25px;" href="{{ url('/kursus/free/' . $k->slug) }}" class="collection-item">{{ $k->kategori }}</a>
										@endforeach
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
							@include('user.kursus.kursusfree')
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
				getPosts($(this).attr('href').split('page=')[1]);
				e.preventDefault();
			});
			$('')
			ch.keyup(function(e) {
				e.preventDefault();
				if(e.which == 13) {
					$('.kursus').html('');
					$('#loading').show();
					var req = '/kursus/free/' + window.location.href.split('/').pop() + '?kursus=' + ch.val();
					console.log(req);
					axios.get(req)
						.then(function (response) {
							$('#loading').hide();
							$('.kursus').html(response.data);
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
			var st = '/kursus/free/' + window.location.href.split('/').pop() + '?page=' + page + '&kursus=' + ch.val();

			console.log(st);
			axios.get(st)
				.then(function (response) {
					console.log(response);
					$('.kursus').html(response.data);
				})
				.catch(function (error) {
					console.log(error);
			});
		}
	</script>
@endsection
