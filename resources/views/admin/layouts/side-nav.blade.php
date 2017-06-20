<ul class="nav">
	{{-- DASHBOARD --}}
	<li class="{{ $active==='dashboard'?'active':'' }}">
		<a href="{{ route('admin.dashboard') }}">
			<i class="material-icons">dashboard</i>
			<p>Dashboard</p>
		</a>
	</li>

	{{-- MASTER DATA --}}
	<li class="li--main">
		<a href="#">
			<i class="material-icons">dashboard</i>
			<p>Master</p>
		</a>
	</li>
	<li class="li--main-child {{ $active === 'kursus' ? 'active':'' }}">
		<a href="{{ route('admin.kursus') }}">
			<i class="material-icons">person</i>
			<p>Kursus</p>
		</a>
	</li>
	<li class="li--main-child">
		<a href="table.html">
			<i class="material-icons">content_paste</i>
			<p>Materi</p>
		</a>
	</li>
	<li class="li--main-child">
		<a href="typography.html">
			<i class="material-icons">library_books</i>
			<p>Tugas</p>
		</a>
	</li>
	<li class="li--main-child">
		<a href="icons.html">
			<i class="material-icons">bubble_chart</i>
			<p>Promosi</p>
		</a>
	</li>
	<li class="li--main-child">
		<a href="maps.html">
			<i class="material-icons">location_on</i>
			<p>Pembimbing</p>
		</a>
	</li>
	<li class="li--main-child">
		<a href="notifications.html">
			<i class="material-icons text-gray">notifications</i>
			<p>Keahlian</p>
		</a>
	</li>
	<li class="li--main">
		<a href="#">
			<i class="material-icons">dashboard</i>
			<p>Transaksi</p>
		</a>
	</li>
	<li class="li--main-child">
		<a href="user.html">
			<i class="material-icons">person</i>
			<p>User Profile</p>
		</a>
	</li>
	<li class="li--main-child">
		<a href="table.html">
			<i class="material-icons">content_paste</i>
			<p>Table List</p>
		</a>
	</li>

	{{-- LAPORAN --}}
	<li class="li--main">
		<a href="#">
			<i class="material-icons">dashboard</i>
			<p>Laporan</p>
		</a>
	</li>
	<li class="li--main-child">
		<a href="user.html">
			<i class="material-icons">person</i>
			<p>User Profile</p>
		</a>
	</li>
	<li class="li--main-child">
		<a href="table.html">
			<i class="material-icons">content_paste</i>
			<p>Table List</p>
		</a>
	</li>
</ul>
