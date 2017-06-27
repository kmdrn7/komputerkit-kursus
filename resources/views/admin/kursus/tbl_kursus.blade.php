<table class="table table-bordered table-striped" id="DT">
	<thead>
		<tr>
			<th rowspan="2" class="text-center" width="80">ID</th>
			<th rowspan="2" class="text-center">Kursus</th>
			<th rowspan="2" class="text-center">Waktu</th>
			<th rowspan="2" class="text-center">Kategori</th>
			<th colspan="2" class="text-center">Aksi</th>
		</tr>
		<tr>
			<th class="text-center" style="width: 90px;">Ubah</th>
			<th class="text-center" style="width: 90px;">Hapus</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($kursus as $k)
			<tr>
				<td>{{ $k->id_kursus }}</td>
				<td>{{ $k->kursus }}</td>
				<td>{{ $k->waktu }}</td>
				<td>{{ $k->kategori }}</td>
				<td>
					<button type="button" class="btn btn-info btn-update" onclick="showUpdateForm('{{ $k->id_kursus }}')">
						Update
					</button>
				</td>
				<td>
					<button type="button" class="btn btn-danger btn-delete" onclick="showDeleteConfirmation('{{ $k->id_kursus }}')">
						Hapus
					</button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
