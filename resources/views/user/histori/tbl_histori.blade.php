@php
	$no = 1;
@endphp
<table class="bordered striped">
	<thead>
		<tr>
			<th>No.</th>
			<th>Kursus</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
	</thead>

	<tbody>
		@foreach ($histori as $h)
			<tr>
				<td class="">{{ $no++ }}</td>
				<td>{{ $h->kursus }}</td>
				<td>
					@if ( $h->flag_kursus == 2 || $h->flag_kursus == 0 )
						<span class="red-text">Belum aktif</span>
					@else
						<span class="green-text">Aktif</span>
					@endif
				</td>
				<td>
					@if ( $h->flag_kursus == 0 )
						Konfirmasi Bayar
					@elseif ( $h->flag_kursus == 2 )
						<span style="color: rgb(154,154,154); font-size: 15px;">tunggu konfirmasi</span>
					@else
						Lihat Detail
					@endif
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
