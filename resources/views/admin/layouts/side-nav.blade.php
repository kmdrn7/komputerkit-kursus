<ul class="nav">
	{{-- DASHBOARD --}}
	<li class="{{ $active==='dashboard'?'active':'' }}">
		<a href="{{ route('admin.dashboard') }}">
			<i class="material-icons">home</i>
			<p>Dashboard</p>
		</a>
	</li>

	{{-- MESSANGER --}}
	<li class="{{ $active==='messanger'?'active':'' }}">
		<a href="{{ route('admin.dashboard') }}">
			<i class="material-icons">message</i>
			<p>Messanger</p>
		</a>
	</li>

	{{-- MASTER DATA --}}
	<li class="li--main">
		<a href="#">
			<i class="material-icons">dashboard</i>
			<p>Master</p>
		</a>
	</li>
	<li class="li--main-child {{ $active === 'kategori' ? 'active':'' }}">
		<a href="{{ route('admin.kategori') }}">
			<i class="material-icons">loyalty</i>
			<p>Kategori</p>
		</a>
	</li>
	<li class="li--main-child {{ $active === 'kursus' ? 'active':'' }}">
		<a href="{{ route('admin.kursus') }}">
			<i class="material-icons">person</i>
			<p>Kursus</p>
		</a>
	</li>
	<li class="li--main-child {{ $active === 'materi' ? 'active':'' }}">
		<a href="{{ route('admin.materi') }}">
			<i class="material-icons">content_paste</i>
			<p>Materi</p>
		</a>
	</li>
	<li class="li--main-child {{ $active === 'tugas' ? 'active':'' }}">
		<a href="{{ route('admin.tugas') }}">
			<i class="material-icons">library_books</i>
			<p>Tugas</p>
		</a>
	</li>
	<li class="li--main-child {{ $active === 'promosi' ? 'active':'' }}">
		<a href="{{ route('admin.promosi') }}">
			<i class="material-icons">store</i>
			<p>Promosi</p>
		</a>
	</li>
	<li class="li--main-child {{ $active === 'pembimbing' ? 'active':'' }}">
		<a href="{{ route('admin.pembimbing') }}">
			<i class="material-icons">settings_input_composite</i>
			<p>Pembimbing</p>
		</a>
	</li>
	<li class="li--main-child {{ $active === 'expert' ? 'active':'' }}">
		<a href="{{ route('admin.expert') }}">
			<i class="material-icons">card_travel</i>
			<p>Keahlian</p>
		</a>
	</li>
	<li class="li--main-child {{ $active === 'bank' ? 'active':'' }}">
		<a href="{{ route('admin.bank') }}">
			<i class="material-icons">account_balance</i>
			<p>Bank</p>
		</a>
	</li>
	<li class="li--main-child {{ $active === 'user' ? 'active':'' }}">
		<a href="{{ route('admin.user') }}">
			<i class="material-icons">people</i>
			<p>User</p>
		</a>
	</li>

	{{-- TRANSAKSI --}}
	<li class="li--main">
		<a href="">
			<i class="material-icons">attach_money</i>
			<p>Transaksi</p>
		</a>
	</li>
	<li class="li--main-child">
		<a href="">
			<i class="material-icons">add_shopping_cart</i>
			<p>Konfirmasi Bayar</p>
		</a>
	</li>
	<li class="li--main-child">
		<a href="">
			<i class="material-icons">person</i>
			<p>Keahlian</p>
		</a>
	</li>
	<li class="li--main-child">
		<a href="">
			<i class="material-icons">supervisor_account</i>
			<p>Bagi Pembimbing</p>
		</a>
	</li>

	{{-- LAPORAN --}}
	<li class="li--main">
		<a href="#">
			<i class="material-icons">receipt</i>
			<p>Laporan</p>
		</a>
	</li>
	<li class="li--main-child">
		<a href="">
			<i class="material-icons">supervisor_account</i>
			<p>Laporan</p>
		</a>
	</li>
</ul>
