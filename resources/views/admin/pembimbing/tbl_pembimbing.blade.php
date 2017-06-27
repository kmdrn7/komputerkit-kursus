<table class="table table-bordered table-striped" id="DT">
	<thead>
		<tr>
			<th rowspan="2" class="text-center" width="80">ID</th>
			<th rowspan="2" class="text-center">Pembimbing</th>
			<th rowspan="2" class="text-center">Keahlian</th>
			<th colspan="2" class="text-center">Aksi</th>
		</tr>
		<tr>
			<th class="text-center" style="width: 90px;">Ubah</th>
			<th class="text-center" style="width: 90px;">Hapus</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($pembimbing as $p)
			<tr>
				<td>{{ $p->id_pembimbing }}</td>
				<td>{{ $p->pembimbing }}</td>
				<td>{{ $p->keahlian }}</td>
				<td>
					<button type="button" class="btn btn-info btn-update" onclick="showUpdateForm('{{ $p->id_pembimbing }}')">
						Update
					</button>
				</td>
				<td>
					<button type="button" class="btn btn-danger btn-delete" onclick="showDeleteConfirmation('{{ $p->id_pembimbing }}')">
						Hapus
					</button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
