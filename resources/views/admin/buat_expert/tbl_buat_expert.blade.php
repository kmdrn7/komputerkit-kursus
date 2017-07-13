<table class="table table-bordered table-striped" id="DT">
	<thead>
		<tr>
			<th rowspan="2" class="text-center" width="70">ID Kursus</th>
			<th rowspan="2" class="text-center">Kursus</th>
			<th colspan="2" class="text-center">Aksi</th>
		</tr>
		<tr>
			<th class="text-center" style="width: 90px;">Hapus</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($kursus as $k)
			<tr>
				<td>{{ $k->id_kursus }}</td>
				<td>{{ $k->kursus }} - {{ $k->waktu }} Hari</td>
				<td>
					<button type="button" class="btn btn-danger btn-delete" onclick="showDeleteConfirmation('{{ $k->id_detail_keahlian }}')">
						Hapus
					</button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
