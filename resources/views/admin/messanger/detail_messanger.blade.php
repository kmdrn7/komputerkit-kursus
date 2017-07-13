@extends('admin.layouts.app')

@section('page-title')
	Chatting [ dengan {{ $detail->name }} ]
@endsection

@section('content')
	<input type="hidden" name="id_detail_kursus" id="id_detail_kursus" value="{{ $detail->id_detail_kursus }}">
	<div id="admin--messanger">
		<div class="container-fluid">
			<div class="img-container">
				<img id="loading" class="img-loading" src="{{ asset('img/web/loading.gif') }}" alt="">
			</div>
		</div>

		<div class="container-fluid" style="max-width: 600px!important" id="messanger-panel" style="display: none">
			<div class="row no-margin-bottom">
				<div class="col-sm-12 col-md-12">
					<div class="card white">
						<div class="card-content">
							<h5 style="font-weight: 500; margin: 15px;">
								Ruang Diskusi __
								<span style="font-size: 16px; font-weight: 400;">{{ $detail->kursus }}</span>
								<br>
								<span style="text-align: right; float: right">
									<small>Pembimbing : {{ $detail->pembimbing }}</small>
								</span>
							</h5>

							<div class="divider" style="margin: 30px 0;"></div>

							<chat-log :messages="messages"></chat-log>

							<div class="divider" style="margin: 30px 0 10px 0; clear: both;"></div>

							<div class="row white no-margin-bottom">
								<div class="col m12 s12">
									<chat-composer v-on:messagesent="addMessageAdmin"></chat-composer>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('content-js')
	<script type="text/javascript">
		const app = new Vue({
			el: '#admin--messanger',
			data: {
				messages : [],
				messagesAdmin : [],
			},
			methods: {
				getAll() {
					axios.get('/admin/api/pesan/all/' + $('#id_detail_kursus').val()).then(response => {
						this.messages = response.data;
						console.log(this.messages);
						$('#messanger-panel').show();
					});
				},
				addMessageAdmin(message) {
					this.messages.push(message);
					axios.post('/admin/api/pesan', message).then(response => {
						console.log(response);
					});
				},
				pullFromServerAdmin(idDetailKursus) {
					axios.get('/admin/api/pesan/' + idDetailKursus).then(response => {

						if ( response.data.length > 0 ) {

							this.messages.push(response.data[0]);

							var res = {
								'id_detail_kursus' : response.data[0].id_detail_kursus,
								'id_pesan' : response.data[0].id_pesan
							};

							axios.post('/admin/api/pesan/setFalse', res).then(response => {
								console.log(response);
								$(".chat-log").animate({ scrollTop: $('.chat-log')[0].scrollHeight}, 1000);
							});
						}
					})
					.catch(function (error){
						console.log(error);
					});
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
				$('#loading').hide();

				this.getAll();

				setInterval(function () {
					this.pullFromServerAdmin($('#id_detail_kursus').val());
				}.bind(this), 2000);
			}
		});
	</script>
@endsection
