@extends('user.layouts.app')

@section('content')

	<div class="konf-1">
		<img src="{{ asset('img/web/expert/laptop.png') }}" alt="">
	</div>

	<div class="row konfirmasi-nav no-margin-bottom">
	</div>

	<div class="row no-margin-bottom">
		<div class="container">
			<div class="row">
				<div class="col s12 m8 offset-m2 l6 offset-l3">
					<div class="card-panel white">
						<h4 style="margin-bottom: 40px; font-weight: 300" class="center-align">Konfirmasi Pembayaran</h4>
						<form action="{{ url('/konfirmasi') }}" method="POST">
							{{ csrf_field() }}

							<div class="row">
								<div class="input-field col s12">
									<div class="form-group">
										<label class="control-label" for="detail_materi">Faktur</label>
										<input type="text" class="form-control" id="detail_materi" value="{{ $kursus->id_kursus }}/{{ $kursus->id_detail_kursus }}/{{ $kursus->slug }}/{{Auth::id()}}" disabled="">
										<input type="hidden" name="detail_materi" value="{{ $kursus->id_kursus }}/{{ $kursus->id_detail_kursus }}/{{ $kursus->slug }}/{{Auth::id()}}" readonly="">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12">
									<input type="text" class="form-control" id="atas_nama" name="atas_nama" value="{{ old('atas_nama') }}">
									<label class="control-label" for="atas_nama">Transfer Atas Nama</label>
									@if ($errors->has('atas_nama'))
										<span class="help-block red-text">
											<strong>{{ $errors->first('atas_nama') }}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input type="text" class="form-control" id="asal" name="bank_asal" value="{{ old('bank_asal') }}">
									<label class="control-label" for="asal">Asal Bank</label>
									@if ($errors->has('bank_asal'))
										<span class="help-block red-text">
											<strong>{{ $errors->first('bank_asal') }}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<select name="bank_tujuan">
									    <option value="" disabled selected>Pilih bank tujuan anda</option>
										@foreach ($bank as $b)
											@if ( $b->nama_bank === old('bank_tujuan') )
												<option value="{{ $b->nama_bank }}" selected>{{ $b->nama_bank }}</option>
											@else
												<option value="{{ $b->nama_bank }}">{{ $b->nama_bank }}</option>
											@endif
										@endforeach
								    </select>
									<label>Bank</label>
									@if ($errors->has('bank_tujuan'))
										<span class="help-block red-text">
											<strong>{{ $errors->first('bank_tujuan') }}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<label for="tgl_bayar">Tanggal Transfer</label>
									<input type="date" class="datepicker" id="tgl_bayar" name="tgl_bayar" value="{{ date('Y-m-d', strtotime(str_replace('/', '-', old('tgl_bayar')))) }}">
									@if ($errors->has('tgl_bayar'))
										<span class="help-block red-text">
											<strong>{{ $errors->first('tgl_bayar') }}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="chk-btn-collection">
								<a class="waves-effect waves-light btn-custom-revert a-back" style="margin-left: 0; width: 130px;">
									<i class="fa fa-mail-reply"></i> &nbsp;
									Batal
								</a>
								<button type="submit" class="waves-effect waves-light btn-custom-revert right" style="margin-right: 0;">
									<i class="fa fa-send"></i> &nbsp;
									Kirim Konfirmasi
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('content-js')
	<script type="text/javascript">
		$(document).ready(function(){$('.a-back').click(function(){setTimeout(function(){window.history.back()},1e3)}),$('.datepicker').pickadate({format:'dd/mm/yyyy',onSet:function(a){'select'in a&&this.close()}})});
	</script>
@endsection
