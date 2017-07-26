@php
	$user = Auth::user();
	$name = explode(" ", $user->name);
@endphp

@section('title')
	Histori
@endsection

@extends('user/layouts/app')

@section('content')
	<div class="row histori-nav z-depth-1">
		<div class="hnav-container container">
			<div class="hn-left hide-on-med-and-down">
				<div class="hnl-ic circle">
					<img src="{{ asset('img/web/histori/top.png') }}" alt="">
				</div>
			</div>
			<div class="hn-right">
				<div class="hnsp-halo">Halo, {{ $name[0] }}!</div>
				<div class="hnsp-lihat">Lihat semua kursus yang pernah kamu ambil di <strong><a class="white-text" href="http://kursus.komputerkit.com">Kursus KomputerKit</a></strong></div>
				<div class="hnsp-member">Member sejak {{ $user->created_at->formatLocalized('%e %B %Y') }}</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row histori-row-content">
			{{-- Option Panel --}}
			<div class="col s12 m12 l3">
				<div class="card-panel white" style="position: relative">
					<div class="row rw-his-top no-margin-top ">
						<div class="col m12">
							<span>Filter Kursus</span>
						</div>
					</div>
					<p>
						<input type="checkbox" id="chk_all" checked />
						<label for="chk_all" class="black-text">Semua Histori</label>
					</p>
					<p style="color: rgb(70,70,70); font-weight: 300;">
						Hilangkan centang di atas untuk mencari kursus berdasarkan tanggal
					</p>
					<filter-container>
						<div class="row no-margin-bottom">
							<div class=" col m12">
								<label for="tgl_dari">Dari Tanggal</label>
								<input id="tgl_dari" name="tgl_dari" type="date" class="datepicker">
							</div>
						</div>
						<div class="row no-margin-bottom">
							<div class=" col m12">
								<label for="tgl_sampai">Sampai Tanggal</label>
								<input id="tgl_sampai" name="tgl_sampai" type="date" class="datepicker">
							</div>
						</div>
						<button type="button" class="btn-custom-revert waves-effect waves-light fw btn-cari-histori" style="margin-left: 0">
							<i class="fa fa-search"></i> &nbsp;
							Cari
						</button>
					</filter-container>
				</div>
			</div>
			{{-- Result Panel --}}
			<div class="col s12 m12 l9">
				<div class="card-panel white" style="overflow-x: scroll">
					<div class="row rw-his-top no-margin-top no-margin-bottom" style="margin-bottom: 20px">
						<div class="col m12">
							<span>Data Histori Pembelian</span>
						</div>
					</div>

					<div class="tbl-histori-container" style="max-width: 100%; overflow: hidden">
						<tbl-histori-container>
							@include('user.histori.tbl_histori')
						</tbl-histori-container>
						<div class="histori-scroll-info">
							Geser kiri dan kanan untuk melihat semua data
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

	{{-- MODAL DETAIL --}}
	<div class="modal h-dk-modal" id="hisDetail">
		<div class="mhc-img circle z-depth-1">
			<img src="{{ asset('img/ruby.jpg') }}" alt="gambar-detail-kursus.png" class="histori-detail-img">
		</div>
		<div class="modal-content">
			<form>
				<div class="row no-margin-top no-margin-bottom">
					<div class="col m12">
						<label for="kursus">Kursus</label>
						<input id="kursus" type="text" name="kursus" value="" readonly>
					</div>
				</div>
				<div class="row no-margin-top no-margin-bottom">
					<div class="col m6">
						<label for="waktu">Waktu (Hari)</label>
						<input id="waktu" type="text" name="waktu" readonly>
					</div>
					<div class="col m6">
						<label for="harga">Harga Bayar (Rp)</label>
						<input id="harga" type="text" name="harga" readonly>
					</div>
				</div>
				<div class="row no-margin-top no-margin-bottom">
					<div class="col m6">
						<label for="tgl_mulai">Tanggal Mulai</label>
						<input id="tgl_mulai" type="text" name="tgl_mulai" readonly>
					</div>
					<div class="col m6">
						<label for="tgl_selesai">Tanggal Selesai</label>
						<input id="tgl_selesai" type="text" name="tgl_selesai" readonly>
					</div>
				</div>
				<div class="row no-margin-bottom" style="margin-top: 10px;">
					<div class="col m12 center-align">
						<a id="link-kelas" href="" class="btn btn-large" style="display: block">Masuk ke kelas</a>
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer mh-footer">
			<a href="javascript:void(0)" class="modal-action modal-close waves-effect waves-light btn-flat right">Tutup</a>
		</div>
	</div>
@endsection

@section('content-js')
	<script type="text/javascript">
		function showDataDetail(c){$('#hlm').modal('open'),axios.get('/histori/show/'+c).then(function(d){$('#hlm').modal('close');var e=d.data[0];$('#kursus').val(e.kursus),$('#waktu').val(e.waktu),$('#harga').val(e.harga),$('#tgl_mulai').val(e.tgl_mulai.split(' ')[0]),$('#tgl_selesai').val(e.tgl_selesai.split(' ')[0]),$('#link-kelas').attr('href','/kelas/kursus/'+e.id_kursus+'--'+e.id_detail_kursus+'/materi'),$('.histori-detail-img').prop('src','/img/kursus/'+e.gambar),$('#hisDetail').modal('open'),$('#hisDetail').css({display:'flex','flex-direction':'column'})})}function fetchData(c=null){null===c?($('#hlm').modal('open'),axios.post('/histori/fetchData').then(function(d){$('tbl-histori-container').html(d.data),$('#hlm').modal('close')})):($('#hlm').modal('open'),axios.post('/histori/fetchData',c).then(function(d){$('tbl-histori-container').html(d.data),$('#hlm').modal('close')}))}function setSearch(c){!0==c?($('filter-container').hide('300'),fetchData()):$('filter-container').show('300')}$(document).ready(function(){$('.datepicker').pickadate({selectMonths:!0,selectYears:15,format:'yyyy-mm-dd',onSet:function(c){'select'in c&&this.close()}}),$('.modal').modal({opacity:.8}),$('#hlm').modal({dismissible:!1,opacity:.8,inDuration:350,outDuration:200}),$('filter-container').css('display','none'),$('#chk_all').change(function(){$(this).is(':checked')?setSearch(!0):setSearch(!1)}),$('.btn-cari-histori').click(function(){var d,e;d=$('input[name="tgl_dari"]').val(),e=$('input[name="tgl_sampai"]').val(),$('#chk_all').is(':checked')?fetchData():''!==d&&''!==e?fetchData({tgl_dari:d,tgl_sampai:e}):alert('Lengkapi kembali kolom pencarian tanggal')})});
	</script>
@endsection
