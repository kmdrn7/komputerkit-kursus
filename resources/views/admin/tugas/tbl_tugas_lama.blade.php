<table class="table table-bordered table-striped table-hover" id="OldTable">
	<thead>
		<tr>
			<th width="60px">
				<div class="">
					<label>
						<input id="checkAll" type="checkbox" name="materiCheckBoxAll">
						All
					</label>
				</div>
			</th>			
			<th class="text-center">Tugas</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($tugas as $t)
			<tr>
				<td>
					<div class="">
						<label>
							<input type="checkbox" name="materiCheckBox" value="{{ $t->id_tugas }}">
						</label>
					</div>
				</td>
				<td>{{ $t->tugas }}</td>
			</tr>
		@endforeach
	</tbody>
</table>
