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
			<th class="text-center" width="60px">No.</th>
			<th class="text-center" width="80px">Paket</th>
			<th class="text-center">Materi</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($materi as $m)
			<tr>
				<td>
					<div class="">
						<label for="materiCheckBox">
							@if ( $from == 'modal' )
								<input type="checkbox" name="materiCheckBoxM" value="{{ $m->id_materi }}">
							@else
								<input type="checkbox" name="materiCheckBox" value="{{ $m->id_detail_materi }}">
							@endif
						</label>
					</div>
				</td>
				<td class="text-center">{{ $m->no_urut }}</td>
				<td class="text-center">{{ $m->paket }}</td>
				<td>{{ $m->materi }}</td>
			</tr>
		@endforeach
	</tbody>
</table>
