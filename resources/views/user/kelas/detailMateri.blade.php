@extends('user.layouts.app')

@section('content')
	Materi : {{ $materi->materi }} <br>
	Deskripsi : {{ $materi->desc_materi }} <br>
	Flag : {{ $materi->flag_materi }} <br>
@endsection
