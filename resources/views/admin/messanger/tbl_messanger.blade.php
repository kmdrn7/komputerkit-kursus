<div class="row" id="message-data" style="display: none">
	@foreach ($pesan as $p)
		<div class="col-md-4">
			<div class="card hover">
				<a href="{{ url('/admin/messanger/'. $p->id_user . '--' . $p->id_detail_kursus) }}" style="text-decoration: none; color: inherit" class="messanger-list-item">
					<div class="card-header card-header-icon" data-background-color="{{ $p->flag_pesan==1?'black':'blue' }}" style="display: flex">
						<div class="header-left">
							<i class="material-icons">message</i>
							<h4 class="title">{{ $p->name }}</h4>
							<p class="category">{{ $p->id_kursus }} -- 	{{ $p->kursus }}</p>
						</div>
					</div>
					<div class="card-content" style="height:120px; overflow: hidden">
						<h5 class="no-margin-bottom no-margin-top" style="color: rgb(142,142,142)">Pesan Terbaru</h5>
						<p>
							"{{ $p->pesan }}"							
						</p>
					</div>
					<!-- end content-->
				</a>
			</div>
			<!--  end card  -->
		</div>
	@endforeach
</div>
