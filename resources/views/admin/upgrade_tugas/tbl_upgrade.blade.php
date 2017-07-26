<table class="table table-bordered table-striped" id="DT">
	<thead>
		<tr>
			{{-- <th rowspan="2" class="text-center" width="70">ID Materi</th> --}}
			<th rowspan="2" class="text-center" width="60">ID Detail</th>
			<th rowspan="2" class="text-center">Nama</th>
			<th rowspan="2" class="text-center">Lama Kursus</th>
			<th colspan="2" class="text-center">Aksi</th>
		</tr>
		<tr>
			<th class="text-center" style="width: 90px;">Upgrade</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($kursus as $k)
			<tr>
				<td>{{ $k->id_detail_kursus }}</td>
				<td>{{ $k->name }}</td>
				<td>{{ floor(($now->diffInDays($k->tgl_mulai) + 1) / 7) }} Minggu {{ floor(($now->diffInDays($k->tgl_mulai) + 1) % 7) }} Hari</td>
				<td>
					<button type="button" class="btn btn-info btn-update" onclick="showModalMateri('{{ $k->id_detail_kursus }}', '{{ $k->id_user }}')">
						Lihat Tugas
					</button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
