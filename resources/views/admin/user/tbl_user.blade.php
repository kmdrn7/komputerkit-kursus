<table class="table table-bordered table-striped" id="DT">
	<thead>
		<tr>
			<th rowspan="2" class="text-center" width="80">ID</th>
			<th rowspan="2" class="text-center">Nama</th>
			<th rowspan="2" class="text-center">Nickname</th>
			<th rowspan="2" class="text-center">Email</th>
			<th rowspan="2" class="text-center">Status</th>
			<th colspan="2" class="text-center">Aksi</th>
		</tr>
		<tr>
			<th class="text-center" style="width: 90px;">Ubah</th>
			<th class="text-center" style="width: 90px;">Hapus</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($user as $u)
			<tr>
				<td>{{ $u->id_user }}</td>
				<td>{{ $u->name }}</td>
				<td>{{ $u->nickname }}</td>
				<td>{{ $u->email }}</td>
				<td>{{ $u->status }}</td>
				<td>
					{{-- <button type="button" class="btn btn-info btn-update" data-toggle="modal" data-target="#updateModal" data-id-keahlian="{{ $u->id_user }}" onclick="showUpdateForm('{{ $u->id_user }}')"> --}}

					<button type="button" class="btn btn-info btn-update" onclick="showUpdateForm('{{ $u->id_user }}')">
						Update
					</button>
				</td>
				<td>
					{{-- <button type="button" class="btn btn-danger btn-delete" data-toggle="modal" data-target=".bs-example-modal-sm" data-id-keahlian="{{ $u->id_user }}" onclick="showDeleteConfirmation('{{ $u->id_user }}')"> --}}
					<button type="button" class="btn btn-danger btn-delete" onclick="showDeleteConfirmation('{{ $u->id_user }}')">
						Hapus
					</button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
