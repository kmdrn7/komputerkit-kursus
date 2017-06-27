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
			<th class="text-center" width="60px">No.</th>
			<th class="text-center">Materi</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($materi as $m)
			<tr>
				<td>
					<div class="">
						<label>
							<input type="checkbox" name="materiCheckBox" value="{{ $m->id_materi }}">
						</label>
					</div>
				</td>
				<td class="text-center">{{ $m->no_urut }}</td>
				<td>{{ $m->materi }}</td>
			</tr>
		@endforeach
	</tbody>
</table>
