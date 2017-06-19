@extends('user.layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col s12 m6 offset-m3 l6 offset-l3">
				<div class="card-panel white">
					<form action="{{ url('/konfirmasi') }}" method="POST">
						@php
							print_r($errors)
						@endphp
						<div class="row">
							{{ csrf_field() }}
							<div class="input-field col s12">
								<div class="form-group">
									<label class="control-label" for="detail_materi">Faktur</label>
									<span class="help-block"></span>
									<input type="text" class="form-control" id="detail_materi" value="{{ $kursus->id_kursus }}/{{ $kursus->id_detail_kursus }}/{{ $kursus->slug }}/{{Auth::id()}}" disabled="">
									<input type="hidden" name="detail_materi" value="{{ $kursus->id_kursus }}/{{ $kursus->id_detail_kursus }}/{{ $kursus->slug }}/{{Auth::id()}}" readonly="">
								</div>
							</div>
							<div class="input-field col s12">
								<div class="form-group">
									<label class="control-label" for="atas_nama">Atas Nama</label>
									<span class="help-block"></span>
									<input type="text" class="form-control" id="atas_nama" name="atas_nama" value="{{ old('atas_nama') }}">
								</div>
							</div>
							<div class="input-field col s12">
								<div class="form-group">
									<label class="control-label" for="asal">Asal Bank</label>
									<span class="help-block"></span>
									<input type="text" class="form-control" id="asal" name="bank_asal" value="{{ old('bank_asal') }}">
								</div>
							</div>
							<div class="input-field col s12">
								<select name="bank_tujuan">
								    <option value="" disabled selected>Pilih bank tujuan anda</option>
									@foreach ($bank as $b)
										@if ( $b->nama_bank === old('nama_bank') )
											<option value="{{ $b->nama_bank }}" selected>{{ $b->nama_bank }}</option>
										@else
											<option value="{{ $b->nama_bank }}">{{ $b->nama_bank }}</option>
										@endif
									@endforeach
							    </select>
								<label>Bank</label>
							</div>
							<div class="input-field col s12">
								<label for="tgl_bayar">Tanggal Transfer</label>
								<input type="date" class="datepicker" id="tgl_bayar" name="tgl_bayar" value="{{ old('tgl_bayar') }}">
							</div>

							<div class="input-field col s12">
								<button type="submit" class="btn right">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('content-js')
	<script type="text/javascript">
		$(document).ready(function() {
			$('.datepicker').pickadate({
				format : 'dd/mm/yyyy',
		    });
		});
	</script>
@endsection
