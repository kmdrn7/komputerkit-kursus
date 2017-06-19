@extends('admin.layouts.app')

@section('content')

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-header" data-background-color="orange">
						<i class="material-icons">content_copy</i>
					</div>
					<div class="card-content">
						<p class="category">Used Space</p>
						<h3 class="title">49/50<small>GB</small></h3>
					</div>
					<div class="card-footer">
						<div class="stats">
							<i class="material-icons text-danger">warning</i> <a href="#pablo">Get More Space...</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-header" data-background-color="green">
						<i class="material-icons">store</i>
					</div>
					<div class="card-content">
						<p class="category">Revenue</p>
						<h3 class="title">$34,245</h3>
					</div>
					<div class="card-footer">
						<div class="stats">
							<i class="material-icons">date_range</i> Last 24 Hours
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-header" data-background-color="red">
						<i class="material-icons">info_outline</i>
					</div>
					<div class="card-content">
						<p class="category">Fixed Issues</p>
						<h3 class="title">75</h3>
					</div>
					<div class="card-footer">
						<div class="stats">
							<i class="material-icons">local_offer</i> Tracked from Github
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-header" data-background-color="blue">
						<i class="fa fa-twitter"></i>
					</div>
					<div class="card-content">
						<p class="category">Followers</p>
						<h3 class="title">+245</h3>
					</div>
					<div class="card-footer">
						<div class="stats">
							<i class="material-icons">update</i> Just Updated
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6 col-md-12">
				<div class="card">
					<div class="card-header" data-background-color="orange">
						<h4 class="title">Employees Stats</h4>
						<p class="category">New employees on 15th September, 2016</p>
					</div>
					<div class="card-content table-responsive">
						<table class="table table-hover">
							<thead class="text-warning">
								<tr><th>ID</th>
								<th>Name</th>
								<th>Salary</th>
								<th>Country</th>
							</tr></thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>Dakota Rice</td>
									<td>$36,738</td>
									<td>Niger</td>
								</tr>
								<tr>
									<td>2</td>
									<td>Minerva Hooper</td>
									<td>$23,789</td>
									<td>Curaçao</td>
								</tr>
								<tr>
									<td>3</td>
									<td>Sage Rodriguez</td>
									<td>$56,142</td>
									<td>Netherlands</td>
								</tr>
								<tr>
									<td>4</td>
									<td>Philip Chaney</td>
									<td>$38,735</td>
									<td>Korea, South</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection
