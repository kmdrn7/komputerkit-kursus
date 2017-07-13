@extends('user.layouts.app')

@section('content')

	<div class="row expert-nav valign-wrapper">
		<div class="container">
			<div class="bnsp-book">Keahlian? apa itu?</div>
			<div class="xsp-lihat white-text">
				Keahlian di komputerkit akan memudahkan kalian untuk menjadi ahli dalam suatu bidang yang kalian sukai.
				Kursus akan kami kelompokkan berdasarkan keahlian yang ada.
			</div>
			<div class="hnsp-member"></div>
		</div>
	</div>

	<div class="row no-margin-bottom" style="margin-top: 60px;">
		<div class="container expert-container">
			{{-- Daftar Keahlian --}}
			<div class="row no-margin-bottom no-margin-top">
				<div class="col m12">
					<div class="kotak-daftar">
					</div>
				</div>
			</div>
			{{-- Row Keahlian --}}
			<div class="container">
				@foreach ($expert as $e)
					<div class="row no-margin-bottom">
						<div class="col s12 m12">
							<div class="card-panel white">
								<div class="ex-title">
									{{ $e->keahlian }}
								</div>
								<div class="ex-content">
									{{ $e->desc_keahlian }}
								</div>
								<div class="ex-right">
									<a href="{{ url('/expert/'. $e->id_keahlian) }}" class="btn-custom-revert waves-effect waves-light">
										<i class="material-icons right">send</i>
										Lihat keahlian
									</a>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div class="row no-margin-top no-margin-bottom">
				<div class="kotak-end"></div>
			</div>
		</div>
	</div>

@endsection
