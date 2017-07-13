@php
	$no = 1;
@endphp
<table class="bordered striped">
	<thead>
		<tr>
			<th width="50">No.</th>
			<th>Kursus</th>
			<th width="150">Status</th>
			<th width="220">Aksi</th>
		</tr>
	</thead>

	<tbody>
		@foreach ($histori as $h)
			<tr>
				<td class="">{{ $no++ }}.</td>
				<td>{{ $h->kursus }} ({{ $h->waktu }} Hari)</td>
				<td>
					@if ( $h->flag_kursus == 2 || $h->flag_kursus == 0 )
						<strong><span class="red-text">Belum aktif</span></strong>
					@else
						<strong><span class="green-text">Aktif</span></strong>
					@endif
				</td>
				<td>
					@if ( $h->flag_kursus == 0 )
						<a href="{{ url('/konfirmasi/'. $h->id_kursus . '--' . $h->id_detail_kursus) }}" class="waves-effect waves-light btn red">Konfirmasi Bayar</a>
					@elseif ( $h->flag_kursus == 2 )
						<a href="#" class="btn btn-info disabled" style="text-transform: none">Tunggu konfirmasi</a>
						{{-- <span style="color: rgb(154,154,154); font-size: 15px;">tunggu konfirmasi</span> --}}
					@else
						<a href="javascript:void(0)" data-id-detail="{{ $h->id_detail_kursus }}" class="btn" onclick="showDataDetail({{$h->id_detail_kursus}})">Lihat Detail</a>
					@endif
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
