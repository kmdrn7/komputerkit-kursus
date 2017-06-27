<table class="table table-bordered table-striped" id="DT">
	<thead>
		<tr>
			<th rowspan="2" class="text-center" width="80">ID</th>
			<th rowspan="2" class="text-center">Promosi</th>
			<th rowspan="2" class="text-center">Keterangan Promosi</th>
			<th rowspan="2" class="text-center">Flag</th>
			<th rowspan="2" class="text-center">Created</th>
			<th colspan="2" class="text-center">Aksi</th>
		</tr>
		<tr>
			<th class="text-center" style="width: 90px;">Ubah</th>
			<th class="text-center" style="width: 90px;">Hapus</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($promosi as $p)
			<tr>
				<td>{{ $p->id_promosi }}</td>
				<td>{{ $p->promosi }}</td>
				<td>{{ substr($p->ket_promosi, 0, 20) }}...</td>
				<td>{{ $p->flag }}</td>
				<td>{{ $p->created_at }}</td>
				<td>
					<button type="button" class="btn btn-info btn-update" onclick="showUpdateForm('{{ $p->id_promosi }}')">
						Update
					</button>
				</td>
				<td>
					<button type="button" class="btn btn-danger btn-delete" onclick="showDeleteConfirmation('{{ $p->id_promosi }}')">
						Hapus
					</button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
