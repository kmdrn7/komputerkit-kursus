@extends('admin.layouts.app')

@section('custom--css')
	<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('content')

	<div class="container">
	    <div class="row">
			<div class="col-login--outter">
		        <div class="col-login--inner">
					<div class="card card--login">
		                <div class="card-header" data-background-color="purple">
		                    <h4 class="title">Login Admin</h4>
							<p class="category">Login untuk mengatur kursus</p>
		                </div>
		                <div class="card-content">
		                    <form role="form" method="POST" action="{{ route('admin.login.submit') }}">
								{{ csrf_field() }}

								@if ( session('errLog') )
									<p class="material-input" style="text-align: center; color: red">
										<strong>{{ session('errLog') }}</strong>
									</p>
								@endif

		                        <div class="row">
		                            <div class="col-md-12">
										<div class="form-group label-floating is-empty">
											<label for="email" class="">E-Mail Address</label>
											<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="false">

											@if ($errors->has('email'))
												<span class="material-input">
													<strong>{{ $errors->first('email') }}</strong>
												</span>
											@endif
										</div>
		                            </div>
		                        </div>

		                        <div class="row">
		                            <div class="col-md-12">
										<div class="form-group label-floating is-empty">
											<label for="password" class="">Password</label>
											<input id="password" type="password" class="form-control" name="password" required autocomplete="false">

											@if ($errors->has('password'))
												<span class="material-input">
													<strong>{{ $errors->first('password') }}</strong>
												</span>
											@endif
										</div>
		                            </div>
		                        </div>
								<div class="row">
									<div class="col-md-12">
										<div class="g-recaptcha" data-sitekey="6LdntiMUAAAAAKSj6TMlYRLW55v-ljGjAiENjKGC"></div>
										@if ($errors->has('g-recaptcha-response'))
											<span class="material-input">
												<strong>{{ $errors->first('g-recaptcha-response') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										{{-- <div class="form-group"> --}}
											<div class="checkbox">
												<label>
													<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} />
													Remeber Me
												</label>
											</div>
										{{-- </div> --}}
									</div>
								</div>

								<a class="btn btn-info pull-left" href="{{ route('admin.password.requests') }}">
									Forgot Your Password?
								</a>
		                        <button type="submit" class="btn btn-primary pull-right">Login</button>
		                        <div class="clearfix"></div>
		                    </form>
		                </div>
		            </div>
		        </div>
			</div>
	    </div>
	</div>

@endsection
