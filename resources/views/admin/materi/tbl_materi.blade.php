<table class="table table-bordered table-striped" id="DT">
	<thead>
		<tr>
			{{-- <th rowspan="2" class="text-center" width="70">ID Materi</th> --}}
			<th rowspan="2" class="text-center" width="60">No. Urut</th>
			<th rowspan="2" class="text-center" width="60">Paket</th>
			<th rowspan="2" class="text-center">Materi</th>
			<th colspan="2" class="text-center">Aksi</th>
		</tr>
		<tr>
			<th class="text-center" style="width: 90px;">Ubah</th>
			<th class="text-center" style="width: 90px;">Hapus</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($materi as $m)
			<tr>
				<td>{{ $m->no_urut }}</td>
				<td>{{ $m->paket }}</td>
				<td>{{ $m->materi }}</td>
				<td>
					<button type="button" class="btn btn-info btn-update" onclick="showUpdateForm('{{ $m->id_materi }}')">
						Update
					</button>
				</td>
				<td>
					<button type="button" class="btn btn-danger btn-delete" onclick="showDeleteConfirmation('{{ $m->id_materi }}')">
						Hapus
					</button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
