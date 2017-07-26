<table class="table table-bordered table-striped" id="DT">
	<thead>
		<tr>
			<th rowspan="2" class="text-center" width="200">ID User/Nama</th>
			<th rowspan="2" class="text-center">Tugas</th>
			<th rowspan="2" class="text-center">Jawaban</th>
			<th colspan="2" class="text-center">Aksi</th>
		</tr>
		<tr>
			<th class="text-center" style="width: 90px;">Koreksi Tugas</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($tugas as $t)
			<tr>
				<td>{{ $t->id_user }}/{{ $t->name }}</td>
				<td>{{ $t->tugas }}</td>
				<td>{{ $t->jawaban }}</td>
				<td>
					@if ( $t->flag_det == 1 )
						<button type="button" class="btn btn-info" onclick="showUpdateForm('{{ $t->id_detail_tugas }}')">
							Lihat Koreksi
						</button>
					@else
						<button type="button" class="btn btn-info btn-update" onclick="showUpdateForm('{{ $t->id_detail_tugas }}')">
							Koreksi
						</button>
					@endif
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
