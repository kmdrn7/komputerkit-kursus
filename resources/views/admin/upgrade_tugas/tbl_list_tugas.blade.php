@if ( $from == 'modal' )
	<table class="table table-bordered table-striped table-hover" id="OldMateri">
@else
	<table class="table table-bordered table-striped table-hover" id="OldTable">
@endif
	<thead>
		<tr>
			<th width="60px">
				<div class="">
					<label for="checkAll">
						@if ( $from == 'modal' )
							<input id="checkAllM" type="checkbox" name="materiCheckBoxAll">
						@else
							<input id="checkAll" type="checkbox" name="materiCheckBoxAll">
						@endif
						All
					</label>
				</div>
			</th>
			<th class="text-center" width="60px">Tugas</th>
			<th class="text-center" width="80px">Paket</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($tugas as $t)
			<tr>
				<td>
					<div class="">
						<label for="materiCheckBox">
							@if ( $from == 'modal' )
								<input type="checkbox" name="materiCheckBoxM" value="{{ $t->id_tugas }}">
							@else
								<input type="checkbox" name="materiCheckBox" value="{{ $t->id_detail_tugas }}">
							@endif
						</label>
					</div>
				</td>
				<td class="text-center">{{ $t->tugas }}</td>
				<td class="text-center">{{ $t->paket }}</td>				
			</tr>
		@endforeach
	</tbody>
</table>
