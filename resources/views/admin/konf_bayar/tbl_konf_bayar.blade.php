<table class="table table-bordered table-striped" id="DT">
	<thead>
		<tr>
			<th rowspan="2" class="text-center" width="50">ID</th>
			<th rowspan="2" class="text-center">Nama</th>
			<th rowspan="2" class="text-center">Kursus</th>
			<th rowspan="2" class="text-center">Tgl Bayar</th>
			<th colspan="2" class="text-center">Aksi</th>
		</tr>
		<tr>
			<th class="text-center" style="width: 90px;">Konfirmasi</th>
			<th class="text-center" style="width: 90px;">Hapus</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($konfirmasi as $k)
			<tr>
				<td>{{ $k->id_bayar }}</td>
				<td>{{ $k->name }}</td>
				<td>{{ $k->kursus }}</td>
				<td>{{ $k->tgl_bayar }}</td>
				<td>
					@if ( $k->status == 0 || $k->status == 2 )
						<button type="button" class="btn btn-info btn-update" onclick="showUpdateForm('{{ $k->id_bayar }}')">
							Konfirmasi
						</button>
					@else
						<button type="button" class="btn btn-info btn-update" onclick="showUpdateForm('{{ $k->id_bayar }}')">
							Sudah Konfirmasi/Lihat
						</button>
					@endif
				</td>
				<td>
					<button type="button" class="btn btn-danger btn-delete" onclick="showDeleteConfirmation('{{ $k->id_bayar }}')">
						Hapus
					</button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
