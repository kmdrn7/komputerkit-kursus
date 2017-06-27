<table class="table table-bordered table-striped" id="DT">
	<thead>
		<tr>
			<th rowspan="2" class="text-center" width="80">ID</th>
			<th rowspan="2" class="text-center">Bank</th>
			<th rowspan="2" class="text-center">Atas Nama</th>
			<th rowspan="2" class="text-center">No Rekening</th>
			<th colspan="2" class="text-center">Aksi</th>
		</tr>
		<tr>
			<th class="text-center" style="width: 90px;">Ubah</th>
			<th class="text-center" style="width: 90px;">Hapus</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($bank as $b)
			<tr>
				<td>{{ $b->id_bank }}</td>
				<td>{{ $b->nama_bank }}</td>
				<td>{{ $b->atas_nama }}</td>
				<td>{{ $b->no_rekening }}</td>
				<td>
					<button type="button" class="btn btn-info btn-update" onclick="showUpdateForm('{{ $b->id_bank }}')">
						Update
					</button>
				</td>
				<td>
					<button type="button" class="btn btn-danger btn-delete" onclick="showDeleteConfirmation('{{ $b->id_bank }}')">
						Hapus
					</button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
