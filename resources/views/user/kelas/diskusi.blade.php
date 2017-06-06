@extends('user.layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>ChatRoom</h2>
				<chat-log :messages="messages"></chat-log>
				<chat-composer v-on:messagesent="addMessage"></chat-composer>
			</div>
		</div>
	</div>
@endsection
