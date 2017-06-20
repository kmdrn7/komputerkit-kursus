
@extends('admin.layouts.app')

@section('page-title')
	Kursus
@endsection

@section('content')

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="orange">
                        <i class="material-icons">assignment</i>
						<h4 class="title">Data dari semua kursus</h4>
						<p class="category">New employees on 15th September, 2016</p>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Data Kursus</h4>
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="">
							<table class="table table-bordered table-striped" id="DT">
								<thead>
									<tr>
										<th>No.</th>
										<th>Kursus</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1.</td>
										<td>Andika</td>
									</tr>
								</tbody>
							</table>
                        </div>
                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
            </div>
		</div> <!-- Button trigger modal -->
		<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
		Launch demo modal
		</button>


	</div>
@endsection

@section('modal')
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Modal title</h4>
		  </div>
		  <div class="modal-body">
			...
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary">Save changes</button>
		  </div>
		</div>
	  </div>
	</div>
@endsection

@section('content-js')
	<script type="text/javascript">
		$(document).ready(function() {
			$('#DT').DataTable({
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Semua"]]
			});
		});
	</script>
@endsection
