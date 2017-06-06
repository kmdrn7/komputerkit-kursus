@extends('user.layouts.app')

@section('content')
	Tugas : {{ $tugas->tugas }} <br>
	Jawaban : {{ $tugas->jawaban }} <br>
	Flag : {{ $tugas->flag_tugas }} <br>
@endsection
