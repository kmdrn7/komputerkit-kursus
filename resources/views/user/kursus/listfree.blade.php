@extends('user.layouts.app')

@section('content')
	<div class="list-container">

	<div class="list-nav"></div>

	<div class="container" style="min-height: calc(100vh - 85px)">
		<div class="row">
            <div class="col s12 m12">
				{{-- ROW HEADER CONTENT --}}
                <div class="row" style="margin-bottom: 0; padding: 40px 6%">
					{{-- LEFT PANEL --}}
                    <div class="col l3 m12 s12 hide-on-med-and-down">
						{{-- KATEGORI KURSUS --}}
						<div class="row no-margin-bottom" style="flex; 1; display: flex">
							<div class="col s12 m12 l12" style="flex: 1; display: flex">
								<div class="card-panel" style="flex: 1">
									<div class="collection" style="border: 0;">
										<h5 id="label-kategori-2">Kategori Kursus</h5>
										<div class="divider"></div>
										<a style="border: 0; padding: 10px 25px;" href="{{ url('/kursus/free/all') }}" class="collection-item">Semua</a>
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
					<div class="col l3 m12 s12 hide-on-large-only">
						{{-- KATEGORI KURSUS --}}
						<div class="row no-margin-bottom" style="flex; 1; display: flex">
							<div class="col s12 m12 l12" style="flex: 1; display: flex">
								<div class="card-panel" style="flex: 1">
									<div class="collection" style="border: 0;">
										<h6 id="label-kategori-2">Kategori Kursus</h6>
										<div class="divider"></div>
										<a style="border: 0; padding: 10px 25px;" href="{{ url('/kursus/free/all') }}" class="collection-item">Semua</a>
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
                </div>
            </div>
        </div>
	</div>

	</div>
@endsection

@section('content-js')
	<script type="text/javascript">
		var ch=$('#search');$(window).on('hashchange',function(){if(window.location.hash){var a=window.location.hash.replace('#','');if(a==Number.NaN||0>=a)return!1;getPosts(a)}}),$(document).ready(function(){$(document).on('click','.pagination a',function(a){$('html, body').animate({scrollTop:100},300),getPosts($(this).attr('href').split('page=')[1]),a.preventDefault()}),ch.keyup(function(a){if(a.preventDefault(),13==a.which){$('.kursus').html(''),$('#loading').show();var b='/kursus/free/'+window.location.href.split('/').pop()+'?kursus='+ch.val();console.log(b),axios.get(b).then(function(c){$('#loading').hide(),$('.kursus').html(c.data)}).catch(function(c){console.log(c)})}}),$('#clear').click(function(){ch.text(''),ch.val('')})});function getPosts(a){var b='/kursus/free/'+window.location.href.split('/').pop()+'?page='+a+'&kursus='+ch.val();console.log(b),$('.kursus').html(''),$('#loading').show(),axios.get(b).then(function(c){console.log(c),$('.kursus').html(c.data),$('#loading').hide()}).catch(function(c){console.log(c)})}
	</script>
@endsection
