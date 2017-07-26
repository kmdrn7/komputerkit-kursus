@extends('user.layouts.app')

@section('title')
	Diskusi
@endsection

@section('content')
	<div id="app">
		<div class="kelas--nav valign-wrapper">
			<div class="bnav-container container">
				<div class="bnsp-book center-align">
					<span class="left">
						<a href="{{ url('/kelas') }}" class="white-text waves-effect waves-light">
							<i class="fa fa-chevron-left"></i>
						</a>
					</span>
					{{ $kursus->kursus }}
					<br class="hide-on-med-and-up">
					<small style="font-size: 30px">({{ $kursus->waktu }} Hari)</small>
				</div>
				<div class="knsp-det center-align">
					Tanggal mulai : {{  $kursus->tgl_mulai->formatLocalized('%A, %d %B %Y') }} <br>
					Tanggal selesai : {{ $kursus->tgl_selesai->formatLocalized('%A, %d %B %Y') }}
				</div>
			</div>
		</div>

		<div class="row white" style="margin-bottom: 30px">
			<div class="col l12 s12 m12">
				{{-- <div class="container"> --}}
					<ul id="tabs-swipe-demo" class="tabs" style="max-width: 1280px">
						<li class="tab col s4 m4 l4"><a class="amtr" href="{{ url('/kelas/kursus/'. $id . '/materi') }}">Materi</a></li>
						<li class="tab col s4 m4 l4"><a class="amtr" href="{{ url('/kelas/kursus/'. $id . '/tugas') }}">Tugas</a></li>
						<li class="tab col s4 m4 l4"><a class="amtr active" href="{{ url('/kelas/kursus/'. $id . '/diskusi') }}">Diskusi</a></li>
					</ul>
				{{-- </div> --}}
			</div>
		</div>

		<div class="container" style="max-width: 600px!important; min-height: calc(100vh - 85px); margin-bottom: 40px">
			@php
				$sisa = $kursus->tgl_selesai->diffInDays(\Carbon\Carbon::now());				
			@endphp
			@if ( $sisa <= 5 )
				<div class="row">
					<div class="col s12">
						<div class="card-panel">
							<h4 class="no-margin-top center-align" style="font-weight: 400">Informasi</h4>
							<div class="row">
								<div class="col m12 s12">
									<p class="center-align">
										Segera lakukan perpanjangan kursus anda untuk bisa melanjutkan materi dan tugas yang anda dapatkan.
										Data kursus anda tidak akan hilang, namun ketika waktu kursus berakhir anda tidak bisa membuka kursus anda. {{  $sisa }}
									</p>
								</div>
								<div class="col m12 s12 center-align">
									<a href="{{ url('/kursus/checkout/'. $kursus->slug) }}" class="waves-effect waves btn-flat-custom btn-red">Perpanjang Kursus</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			@endif
			<div class="row no-margin-bottom">
				<div class="col s12 m12">
					<div class="card-panel white">
						<h5 style="font-weight: 500; margin: 15px;">
							Ruang Diskusi __
							<span style="font-size: 16px; font-weight: 400;">{{ $kursus->kursus }}</span>
							<br>
							<span style="text-align: right; float: right">
								<small>Pembimbing : {{ $kursus->pembimbing }}</small>
							</span>
						</h5>

						<div class="divider" style="margin: 30px 0;"></div>

						<chat-log :messages="messages"></chat-log>

						<div class="divider" style="margin: 30px 0 10px 0; clear: both;"></div>

						<div class="row white no-margin-bottom">
							<div class="col m12 s12">
								<chat-composer v-on:messagesent="addMessage"></chat-composer>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	{{-- MODAL LOADING --}}
	<div class="modal histori-loading" id="hlm">
		<div class="modal-content">
			<a href="javascript:void(0)" class="modal-action modal-close waves-effect waves-light right tooltipped" data-position="left" data-delay="50" data-tooltip="Batalkan proses"><i class="fa fa-close" style="font-size: 20px"></i></a>
			<div class="loading-wrapper-h">
				Memproses permintaan anda...
			</div>
			<div class="preloader-wrapper plwp-h active">
				<div class="spinner-layer spinner-blue">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div>
					<div class="gap-patch">
						<div class="circle"></div>
					</div>
					<div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>

				<div class="spinner-layer spinner-red">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div>
					<div class="gap-patch">
						<div class="circle"></div>
					</div>
					<div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>

				<div class="spinner-layer spinner-yellow">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div>
					<div class="gap-patch">
						<div class="circle"></div>
					</div>
					<div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>

				<div class="spinner-layer spinner-green">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div>
					<div class="gap-patch">
						<div class="circle"></div>
					</div>
					<div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('content-js')
	<script type="text/javascript">

		$(document).ready(function(){$('#hlm').modal({dismissible:!1,opacity:.8,inDuration:350,outDuration:200}),$(window).load(function(){$('html, body').animate({scrollTop:300},1500)}),$('.amtr').click(function(a){a.preventDefault(),$('#hlm').modal('open'),window.location.href=$(this).attr('href')})});const app=new Vue({el:'#app',data:{messages:[],messagesAdmin:[]},methods:{getAll(){axios.get('/api/pesan/all/'+$('#KJashkjasdb').val()).then(a=>{this.messages=a.data})},addMessage(a){this.messages.push(a),axios.post('/api/pesan',a).then(()=>{})},pullFromServer(a){axios.get('/api/pesan/'+a).then(b=>{if(0<b.data.length){this.messages.push(b.data[0]);var c={id_detail_kursus:b.data[0].id_detail_kursus,id_pesan:b.data[0].id_pesan};axios.post('/api/pesan/setFalse',c).then(()=>{$('.chat-log').animate({scrollTop:$('.chat-log')[0].scrollHeight},1e3)})}}).catch(function(b){console.log(b)})},userIsTyping(a){switch(a){case!0:break;case!1:break;default:}}},mounted(){this.getAll(),setInterval(function(){this.pullFromServer($('#KJashkjasdb').val())}.bind(this),1e3)}});
	</script>
@endsection
