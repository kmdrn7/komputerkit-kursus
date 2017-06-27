<table class="table table-bordered table-striped" id="DT">
	<thead>
		<tr>
			<th rowspan="2" class="text-center" width="70">ID Tugas</th>
			<th rowspan="2" class="text-center">Tugas</th>
			<th colspan="2" class="text-center">Aksi</th>
		</tr>
		<tr>
			<th class="text-center" style="width: 90px;">Ubah</th>
			<th class="text-center" style="width: 90px;">Hapus</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($tugas as $t)
			<tr>
				<td>{{ $t->id_tugas }}</td>
				<td>{{ $t->tugas }}</td>				
				<td>
					<button type="button" class="btn btn-info btn-update" onclick="showUpdateForm('{{ $t->id_tugas }}')">
						Update
					</button>
				</td>
				<td>
					<button type="button" class="btn btn-danger btn-delete" onclick="showDeleteConfirmation('{{ $t->id_tugas }}')">
						Hapus
					</button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
