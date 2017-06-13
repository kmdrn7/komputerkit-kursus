@extends('user.layouts.app')

@section('content')
	<div id="app">
		<div class="container">

			<div class="row teal no-margin-bottom">
				<div class="container">
					<div class="row">
						<div class="col l3">
							<img class="img-responsive" src="{{ asset('img/'. $kursus->gambar) }}" alt="{{ $kursus->gambar }}" style="width:100%">
						</div>
						<div class="col l5">
							<div class="materi-kursus-title">
								{{ $kursus->kursus }}
							</div>
							<div class="materi-kursus-detail">
								{{ $kursus->ket_kursus }}
							</div>
						</div>
						<div class="col l4">
							<div class="tgl-mulai-head">
								Tanggal Mulai
							</div>
							<div class="tgl-mulai-content">
								{{  $kursus->tgl_mulai->formatLocalized('%A, %d %B %Y') }}
							</div>
							<div class="tgl-selesai-head">
								Tanggal Selesai
							</div>
							<div class="tgl-selesai-content">
								{{ $kursus->tgl_selesai->formatLocalized('%A, %d %B %Y') }}
							</div>
						</div>
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

			<div class="row">
				<div class="col-md-12">
					<h2>ChatRoom</h2>
					<span id="whoIsTyping">
						<strong><small>Admin is typing...</small></strong>
					</span>
					<chat-log :messages="messages"></chat-log>
					<chat-composer v-on:messagesent="addMessage"></chat-composer>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('content-js')
	<script type="text/javascript">

	$(document).ready(function() {
		$('.amtr').click(function(event) {
			event.preventDefault();
			window.location.href = $(this).attr('href');
		});
	});

	const app = new Vue({
		el: '#app',
		data: {
			messages : [],
			messagesAdmin : [],
		},
		methods: {
			getAll() {
				axios.get('/api/pesan/all/' + $('#KJashkjasdb').val()).then(response => {
					this.messages = response.data;
				});
			},
			addMessage(message) {
				this.messages.push(message);
				axios.post('/api/pesan', message).then(response => {
					console.log(response);
				});
			},
			addMessageAdmin(message) {
				this.messagesAdmin.push(message);
				axios.post('/admin/api/pesan', message).then(response => {
					console.log(response);
				});
			},
			pullFromServer(idDetailKursus) {
				axios.get('/api/pesan/' + idDetailKursus).then(response => {

					if ( response.data.length > 0 ) {

						this.messages.push(response.data[0]);
						var res = {
							'id_detail_kursus' : response.data[0].id_detail_kursus,
							'id_pesan' : response.data[0].id_pesan
						};
						axios.post('/api/pesan/setFalse', res).then(response => {
							console.log(response);
						});
					}
				})
				.catch(function (error){
					console.log(error);
				});

				console.log('selesai pull dari server');
			},
			pullFromServerAdmin(idDetailKursus) {
				axios.get('/admin/api/pesan?id=' + idDetailKursus).then(response => {
					console.log(response);
				})
				.catch(function (error){
					console.log(error);
				});
				console.log('selesai pull dari server admin');
			},
			userIsTyping(bool) {

				switch (bool) {
					case true:

						break;
					case false:

						break;
					default:

				}
			},
		},
		mounted() {
			this.getAll();

			setInterval(function () {
				this.pullFromServer($('#KJashkjasdb').val());
			}.bind(this), 2000)
		}
	});
	</script>
@endsection
