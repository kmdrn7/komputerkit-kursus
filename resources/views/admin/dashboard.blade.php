@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    You are logged in!
					<br><br>
					<pre>{{ Auth::guard('admin')->user() }}</pre>
					<pre>{{ Auth::guard('web')->user() }}</pre>
                </div>
            </div>
        </div>

		<div class="col-md-12">
			<h2>ChatRoom</h2>
			<chat-log :messages="messages"></chat-log>
			<chat-composer v-on:messagesent="addMessage"></chat-composer>
		</div>
    </div>
</div>
@endsection
